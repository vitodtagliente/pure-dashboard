<?php

namespace App\Controllers;
use Pure\Controller;
use Pure\Template\View;
use Pure\Auth;

class DashboardController extends Controller {

    public function __construct(){
        if(Auth::check() == false)
        {
            // no user authenticated
            // redirect to login
            redirect(base_url('login'));
        }
    }

    public function home(){
        view('dashboard.php');
    }

}

?>
