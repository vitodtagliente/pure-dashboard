<?php

namespace App\Controllers;
use Pure\Controller;
use Pure\Template\View;
use Pure\Auth;
use App\Model\User;

class AuthController extends Controller {

    public function login_view(){
        if(Auth::check())
        {
            // already logged in
            redirect(base_url('dashboard'));
        }
    	else view('auth/login.php');
    }

    public function register_view(){
        view('auth/register.php');
    }

    public function authenticate(){
        $email = request('email');
        $password = request('password');

        if(Auth::authenticate("email = '$email' AND password = '$password'"))
        {
            redirect(base_url('dashboard'));
        }
        else redirect(base_url('login', array('msg' => 'Authentication failed')));
    }

    public function logout(){
        Auth::logout();
        redirect(base_url('login'));
    }
}

?>
