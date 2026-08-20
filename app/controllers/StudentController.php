<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');


class StudentController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['student'] = $this->student_data();
        $this->call->view('student/home', $data);
    }


    public function profile()
    {
        $data['student'] = $this->student_data();
        $this->call->view('student/profile', $data);
    }

    
    public function access()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['student_access'] = true;
        redirect('student/profile');
    }

    
    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['student_access'] = false;
        redirect('student');
    }

    
    private function student_data()
    {
        return [
            'student_id'  => 'MCC2024-00170',
            'name'        => 'Joyce L. Ulip',
            'course'      => 'BS Information Technology',
            'year'        => '3rd Year',
            'section'     => 'F4',
            'email'       => 'joyceulip56@gmail.com',
            'address'     => 'Tigkan Naujan Oriental Mindoro ',
            'contact_no'  => '09661755003',
            'hobbies'     => 'Watching Tiktok',
            'description' => 'I am a hardworking and responsible student who is always willing to learn new things. I am friendly, determined, and committed to achieving my goals. I believe that every challenge is an opportunity to improve myself and gain new experiences.',
            'Facebook'    => 'https://www.facebook.com/ULIPJOYCE23',
        ];
    }
}
