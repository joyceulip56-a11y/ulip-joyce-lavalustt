<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: StudentController
 *
 * Handles the Student Home page and the (middleware-protected)
 * Student Profile page for the Student Information Page laboratory
 * activity.
 */
class StudentController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * GET /student
     * Displays the student home / landing page.
     */
    public function index()
    {
        $data['student'] = $this->student_data();
        $this->call->view('student/home', $data);
    }

    /**
     * GET /student/profile
     * Protected by StudentMiddleware.
     * Displays the full student profile.
     */
    public function profile()
    {
        $data['student'] = $this->student_data();
        $this->call->view('student/profile', $data);
    }

    /**
     * GET /student/access
     * Simple demo "login" action that satisfies the middleware's
     * access condition, then redirects to the protected profile page.
     * This is the unique access condition used for this activity:
     * a session flag $_SESSION['student_access'].
     */
    public function access()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['student_access'] = true;
        redirect('student/profile');
    }

    /**
     * GET /student/logout
     * Revokes access so the middleware blocks /student/profile again.
     */
    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['student_access'] = false;
        redirect('student');
    }

    /**
     * Sample student information passed from the controller to the view.
     * TODO: Replace the values below with your own information.
     *
     * @return array
     */
    private function student_data()
    {
        return [
            'student_id'  => 'MCC2023-01237',
            'name'        => 'Jhon Michael Riel',
            'course'      => 'BS Information Technology',
            'year'        => '3rd Year',
            'section'     => 'F5',
            'email'       => 'rieljohnmichael026@gmail.com',
            'address'     => 'Barcenaga, Naujan, Oriental Mindoro, Philippines',
            'contact_no'  => '09513657032',
            'hobbies'     => 'Coding, Basketball, Gaming',
            'description' => 'Mas sumarap.',
        ];
    }
}
