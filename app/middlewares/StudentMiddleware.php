<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Middleware: StudentMiddleware
 *
 * Protects the /student/profile route.
 * Access condition (unique to this activity):
 *   The request is only allowed through when $_SESSION['student_access']
 *   is set to true. A visitor first "unlocks" the profile page by
 *   hitting /student/access (see StudentController::access()).
 * If the condition is not satisfied, the request is redirected back
 * to the student home page instead of reaching the controller/view.
 */
class StudentMiddleware
{
    /**
     * Handle the incoming request.
     *
     * @param Closure $next
     * @return mixed
     */
    public function handle(Closure $next)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $allowed = isset($_SESSION['student_access']) && $_SESSION['student_access'] === true;

        if ($allowed) {
            return $next();
        }

        // Not authorized: send them back to the home page.
        redirect('student');
    }
}
