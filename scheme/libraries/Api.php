<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Api
{
    private $_lava;

    protected $refresh_token_table;
    protected $payload_token_expiration;
    protected $refresh_token_expiration;
    protected $allow_origin;

    private $jwt_secret;
    private $refresh_token_key;

    protected $jwt_issuer;
    protected $jwt_audience;

    protected $rate_limit_enabled;
    protected $rate_limit_requests;
    protected $rate_limit_seconds;

    public function __construct()
    {
        $this->_lava = lava_instance();

        $this->_lava->call->library('cache');
        $this->_lava->config->load('api');

        if (!config_item('api_helper_enabled')) {
            show_error('Api Helper is disabled or set up incorrectly.');
        }

        // Load configuration
        $this->refresh_token_table =
            config_item('refresh_token_table') ?? $this->refresh_token_table;

        $this->payload_token_expiration =
            (int) (
                config_item('payload_token_expiration')
                ?? $this->payload_token_expiration
            );

        $this->refresh_token_expiration =
            (int) (
                config_item('refresh_token_expiration')
                ?? $this->refresh_token_expiration
            );

        $this->jwt_secret =
            config_item('jwt_secret');

        $this->refresh_token_key =
            config_item('refresh_token_key');

        $this->allow_origin =
            config_item('allow_origin');

        // JWT configuration
        $this->jwt_issuer =
            config_item('jwt_issuer') ?? $this->jwt_issuer;

        $this->jwt_audience =
            config_item('jwt_audience') ?? $this->jwt_audience;

        // Rate limit configuration
        $this->rate_limit_enabled =
            (bool) (
                config_item('rate_limit_enabled') ?? true
            );

        $this->rate_limit_requests =
            (int) (
                config_item('rate_limit_requests')
                ?? $this->rate_limit_requests
            );

        $this->rate_limit_seconds =
            (int) (
                config_item('rate_limit_seconds')
                ?? $this->rate_limit_seconds
            );

        if (
            empty($this->jwt_secret) ||
            strlen($this->jwt_secret) < 32
        ) {
            show_error(
                'JWT secret is missing or too weak. Use at least 32 random characters.'
            );
        }

        if (
            empty($this->refresh_token_key) ||
            strlen($this->refresh_token_key) < 32
        ) {
            show_error(
                'Refresh token key is missing or too weak.'
            );
        }

        $this->handle_cors();

        if (
            ($_SERVER['REQUEST_METHOD'] ?? '')
            === 'OPTIONS'
        ) {
            http_response_code(204);
            exit;
        }
    }

    // ------------------------------------------------------
    // CORS
    // ------------------------------------------------------

    public function handle_cors()
    {
        $origin =
            $_SERVER['HTTP_ORIGIN'] ?? '';

        if (is_array($this->allow_origin)) {

            $allowed =
                in_array(
                    $origin,
                    $this->allow_origin,
                    true
                );

        } else {

            $allowed =
                $this->allow_origin === '*'
                || $this->allow_origin === $origin;
        }

        if ($allowed && $origin) {

            header(
                "Access-Control-Allow-Origin: $origin"
            );

            header(
                'Access-Control-Allow-Credentials: true'
            );

        } elseif ($this->allow_origin === '*') {

            header(
                'Access-Control-Allow-Origin: *'
            );
        }

        header(
            'Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With, X-RateLimit-*'
        );

        header(
            'Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS'
        );

        header(
            'Access-Control-Max-Age: 3600'
        );

        header(
            'Content-Type: application/json; charset=UTF-8'
        );
    }

    // ------------------------------------------------------
    // API BODY
    // ------------------------------------------------------

    public function body()
    {
        $contentType =
            $_SERVER['CONTENT_TYPE'] ?? '';

        if (
            stripos(
                $contentType,
                'application/json'
            ) !== false
        ) {

            $input =
                json_decode(
                    file_get_contents('php://input'),
                    true
                );

            return is_array($input)
                ? $this->sanitize_input($input)
                : [];
        }

        if ($_POST) {
            return $this->sanitize_input($_POST);
        }

        parse_str(
            file_get_contents('php://input'),
            $formData
        );

        return $this->sanitize_input(
            $formData ?? []
        );
    }

    public function get_query_params()
    {
        return $this->sanitize_input($_GET);
    }

    private function sanitize_input($data)
    {
        array_walk_recursive(
            $data,
            function (&$value) {

                if (is_string($value)) {

                    $value = trim(
                        htmlspecialchars(
                            $value,
                            ENT_QUOTES,
                            'UTF-8'
                        )
                    );
                }
            }
        );

        return $data;
    }

    // ------------------------------------------------------
    // REQUEST METHOD
    // ------------------------------------------------------

    public function require_method(string $method)
    {
        if (
            ($_SERVER['REQUEST_METHOD'] ?? '')
            !== strtoupper($method)
        ) {
            $this->respond_error(
                'Method Not Allowed',
                405
            );
        }
    }

    // ------------------------------------------------------
    // RATE LIMIT
    // ------------------------------------------------------

    public function rate_limit(
        $key = null,
        $requests = null,
        $seconds = null
    ) {
        if (!$this->rate_limit_enabled) {
            return;
        }

        $requests =
            $requests ?? $this->rate_limit_requests;

        $seconds =
            $seconds ?? $this->rate_limit_seconds;

        if ($key === null) {

            $ip =
                $_SERVER['REMOTE_ADDR']
                ?? 'unknown';

            $raw_key =
                'rate_limit:' . $ip;

        } else {

            $raw_key =
                'rate_limit:' . $key;
        }

        $safe_key =
            str_replace(
                [
                    ':',
                    '/',
                    '\\',
                    '*',
                    '?',
                    '"',
                    '<',
                    '>',
                    '|'
                ],
                '_',
                $raw_key
            );

        $safe_key =
            preg_replace(
                '/[^a-zA-Z0-9_\-]/',
                '_',
                $safe_key
            );

        $cache =
            $this->_lava->cache;

        $current =
            $cache->get($safe_key);

        $window_start =
            $cache->get(
                $safe_key . '_start'
            );

        $current =
            is_numeric($current)
                ? (int) $current
                : 0;

        $window_start =
            is_numeric($window_start)
                ? (int) $window_start
                : 0;

        $now = time();

        if (
            $window_start === 0 ||
            ($now - $window_start) >= $seconds
        ) {

            $cache->write(
                1,
                $safe_key,
                $seconds
            );

            $cache->write(
                $now,
                $safe_key . '_start',
                $seconds
            );

            $remaining =
                $requests - 1;

        } else {

            if ($current >= $requests) {

                $reset_time =
                    $window_start + $seconds;

                $this->respond_rate_limit_exceeded(
                    $requests,
                    $current,
                    $reset_time
                );
            }

            $cache->write(
                $current + 1,
                $safe_key,
                $seconds
            );

            $remaining =
                $requests - ($current + 1);
        }

        header(
            "X-RateLimit-Limit: $requests"
        );

        header(
            "X-RateLimit-Remaining: $remaining"
        );

        header(
            "X-RateLimit-Reset: "
            . ($window_start + $seconds)
        );
    }

    private function respond_rate_limit_exceeded(
        $limit,
        $used,
        $reset_time
    ) {
        $retry_after =
            max(
                0,
                $reset_time - time()
            );

        header(
            "Retry-After: $retry_after"
        );

        $this->respond(
            [
                'error' =>
                    'Too many requests. Please try again later.',

                'limit' =>
                    $limit,

                'used' =>
                    $used,

                'remaining' =>
                    0,

                'reset_at' =>
                    date('c', $reset_time),

                'retry_after' =>
                    $retry_after
            ],
            429
        );
    }

    // ------------------------------------------------------
    // RESPONSE
    // ------------------------------------------------------

    public function respond(
        $data,
        $code = 200
    ) {
        http_response_code($code);

        echo json_encode(
            $data,
            JSON_UNESCAPED_SLASHES |
            JSON_UNESCAPED_UNICODE
        );

        exit;
    }

    public function respond_error(
        $message,
        $code = 400
    ) {
        $this->respond(
            [
                'error' =>
                    $message,

                'status' =>
                    $code
            ],
            $code
        );
    }

    // ------------------------------------------------------
    // BASE64
    // ------------------------------------------------------

    private function base64UrlEncode($data)
    {
        return rtrim(
            strtr(
                base64_encode($data),
                '+/',
                '-_'
            ),
            '='
        );
    }

    private function base64UrlDecode($data)
    {
        $pad =
            strlen($data) % 4;

        if ($pad) {

            $data .=
                str_repeat(
                    '=',
                    4 - $pad
                );
        }

        return base64_decode(
            strtr(
                $data,
                '-_',
                '+/'
            )
        );
    }

    // ------------------------------------------------------
    // JWT ENCODE
    // ------------------------------------------------------

    public function encode_jwt($payload)
    {
        $header = [
            'alg' => 'HS256',
            'typ' => 'JWT'
        ];

        $headerEnc =
            $this->base64UrlEncode(
                json_encode($header)
            );

        $now = time();

        $payload =
            array_merge(
                [
                    'iat' =>
                        $now,

                    'exp' =>
                        $now +
                        $this->payload_token_expiration,

                    'iss' =>
                        $this->jwt_issuer,

                    'aud' =>
                        $this->jwt_audience,

                    'jti' =>
                        bin2hex(
                            random_bytes(16)
                        )
                ],
                $payload
            );

        $payloadEnc =
            $this->base64UrlEncode(
                json_encode($payload)
            );

        $signature =
            hash_hmac(
                'sha256',
                "$headerEnc.$payloadEnc",
                $this->jwt_secret,
                true
            );

        $sigEnc =
            $this->base64UrlEncode(
                $signature
            );

        return
            "$headerEnc.$payloadEnc.$sigEnc";
    }

    // ------------------------------------------------------
    // JWT DECODE
    // ------------------------------------------------------

    public function decode_jwt($token)
    {
        $parts =
            explode('.', $token);

        if (count($parts) !== 3) {
            return null;
        }

        [
            $headerEnc,
            $payloadEnc,
            $sigEnc
        ] = $parts;

        $header =
            json_decode(
                $this->base64UrlDecode(
                    $headerEnc
                ),
                true
            );

        if (
            ($header['alg'] ?? '')
            !== 'HS256'
        ) {
            return null;
        }

        $validSig =
            hash_hmac(
                'sha256',
                "$headerEnc.$payloadEnc",
                $this->jwt_secret,
                true
            );

        if (
            !hash_equals(
                $this->base64UrlEncode(
                    $validSig
                ),
                $sigEnc
            )
        ) {
            return null;
        }

        return json_decode(
            $this->base64UrlDecode(
                $payloadEnc
            ),
            true
        );
    }

    // ------------------------------------------------------
    // JWT VALIDATION
    // ------------------------------------------------------

    public function validate_jwt($token)
    {
        $payload =
            $this->decode_jwt($token);

        if (!$payload) {
            return null;
        }

        if (
            !isset(
                $payload['sub'],
                $payload['exp'],
                $payload['iat']
            )
        ) {
            return null;
        }

        if (
            $payload['exp'] < time() ||
            ($payload['iat'] ?? 0) > time()
        ) {
            return null;
        }

        if (
            ($payload['iss'] ?? '')
            !== $this->jwt_issuer
        ) {
            return null;
        }

        if (
            ($payload['aud'] ?? '')
            !== $this->jwt_audience
        ) {
            return null;
        }

        return $payload;
    }

    // ------------------------------------------------------
    // GET BEARER TOKEN
    // ------------------------------------------------------

    public function get_bearer_token()
    {
        $header =
            $_SERVER['HTTP_AUTHORIZATION']
            ?? $_SERVER['REDIRECT_HTTP_AUTHORIZATION']
            ?? '';

        if (
            !$header &&
            function_exists('apache_request_headers')
        ) {

            $headers =
                apache_request_headers();

            $header =
                $headers['Authorization']
                ?? $headers['authorization']
                ?? '';
        }

        if (!$header) {
            return null;
        }

        /*
         * Expected header:
         *
         * Authorization: Bearer TOKEN
         */

        if (
            preg_match(
                '/Bearer\s+(\S+)/i',
                $header,
                $matches
            )
        ) {
            return $matches[1];
        }

        return null;
    }

    // ------------------------------------------------------
    // REQUIRE JWT
    // ------------------------------------------------------

    public function require_jwt()
    {
        $token =
            $this->get_bearer_token();

        $payload =
            $this->validate_jwt(
                $token ?? ''
            );

        if (!$payload) {

            $this->respond_error(
                'Unauthorized',
                401
            );
        }

        return $payload;
    }

    // ------------------------------------------------------
    // ISSUE TOKENS
    // ------------------------------------------------------

    public function issue_tokens($user_data)
    {
        $user_id =
            $user_data['id'];

        $now =
            time();

        $scopes =
            $user_data['scopes']
            ?? ['read'];

        $access_payload = [

            'sub' =>
                $user_id,

            'role' =>
                $user_data['role']
                ?? 'user',

            'scopes' =>
                $scopes
        ];

        $refresh_payload = [

            'sub' =>
                $user_id,

            'type' =>
                'refresh',

            'jti' =>
                bin2hex(
                    random_bytes(16)
                )
        ];

        $access_token =
            $this->encode_jwt(
                $access_payload
            );

        $refresh_token =
            $this->encode_jwt(
                $refresh_payload
            );

        $hashed_refresh =
            hash_hmac(
                'sha256',
                (string) $refresh_token,
                $this->refresh_token_key
            );

        $this->cleanup_expired_refresh_tokens(
            $user_id
        );

        $expires_at =
            date(
                'Y-m-d H:i:s',
                $now +
                $this->refresh_token_expiration
            );

        $this->_lava->db->raw(
            "INSERT INTO {$this->refresh_token_table}
            (user_id, token, expires_at, jti)
            VALUES (?, ?, ?, ?)",
            [
                $user_id,
                $hashed_refresh,
                $expires_at,
                $refresh_payload['jti']
            ]
        );

        return [

            'access_token' =>
                $access_token,

            'refresh_token' =>
                $refresh_token,

            'expires_in' =>
                $this->payload_token_expiration,

            'token_type' =>
                'Bearer'
        ];
    }

    // ------------------------------------------------------
    // REFRESH ACCESS TOKEN
    // ------------------------------------------------------

    public function refresh_access_token(
        $refresh_token
    ) {
        $payload =
            $this->validate_jwt(
                $refresh_token
            );

        if (
            !$payload ||
            ($payload['type'] ?? '')
            !== 'refresh'
        ) {

            $this->respond_error(
                'Invalid refresh token',
                403
            );
        }

        $hashed =
            hash_hmac(
                'sha256',
                $refresh_token,
                $this->refresh_token_key
            );

        $stmt =
            $this->_lava->db->raw(
                "SELECT * FROM {$this->refresh_token_table}
                 WHERE token = ?
                 AND expires_at > NOW()
                 LIMIT 1",
                [$hashed]
            );

        $found =
            $stmt->fetch(
                PDO::FETCH_ASSOC
            );

        if (!$found) {

            $this->respond_error(
                'Refresh token expired or revoked',
                403
            );
        }

        $this->revoke_refresh_token(
            $refresh_token
        );

        $new_tokens =
            $this->issue_tokens(
                [
                    'id' =>
                        $payload['sub']
                ]
            );

        $this->respond(
            [
                'message' =>
                    'Tokens refreshed successfully',

                'tokens' =>
                    $new_tokens
            ]
        );
    }

    // ------------------------------------------------------
    // REVOKE REFRESH TOKEN
    // ------------------------------------------------------

    public function revoke_refresh_token(
        $refresh_token
    ) {
        $hashed =
            hash_hmac(
                'sha256',
                $refresh_token,
                $this->refresh_token_key
            );

        $this->_lava->db->raw(
            "DELETE FROM {$this->refresh_token_table}
             WHERE token = ?",
            [$hashed]
        );
    }

    // ------------------------------------------------------
    // CLEANUP REFRESH TOKENS
    // ------------------------------------------------------

    public function cleanup_expired_refresh_tokens(
        $user_id = null
    ): void {

        $sql =
            "DELETE FROM {$this->refresh_token_table}
             WHERE expires_at < NOW()";

        $params = [];

        if ($user_id !== null) {

            $sql .=
                " AND user_id = ?";

            $params[] =
                $user_id;
        }

        $this->_lava->db->raw(
            $sql,
            $params
        );
    }

    // ------------------------------------------------------
    // BASIC AUTH
    // ------------------------------------------------------

    public function check_basic_auth(
        $valid_user,
        $valid_pass
    ) {
        $user =
            $_SERVER['PHP_AUTH_USER']
            ?? '';

        $pass =
            $_SERVER['PHP_AUTH_PW']
            ?? '';

        return
            hash_equals(
                $user,
                $valid_user
            )
            &&
            hash_equals(
                $pass,
                $valid_pass
            );
    }

    public function require_basic_auth(
        $valid_user,
        $valid_pass
    ) {
        if (
            !$this->check_basic_auth(
                $valid_user,
                $valid_pass
            )
        ) {

            header(
                'WWW-Authenticate: Basic realm="API"'
            );

            $this->respond_error(
                'Unauthorized',
                401
            );
        }
    }
}