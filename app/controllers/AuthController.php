<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function login()
    {
        $this->call->view('auth/login');
    }

    public function logout()
    {
        redirect('login');
    }
}