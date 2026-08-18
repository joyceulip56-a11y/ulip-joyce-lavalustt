<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');


class StudentMiddleware
{
    public function handle(Closure $next)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $allowed = isset($_SESSION['student_access']) && $_SESSION['student_access'] === true;

        if ($allowed) {
            return $next();
        }
        redirect('student');
    }
}
