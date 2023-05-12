<?php 

namespace App\Controllers;

class HomeController extends Controller {

    // return the view of the website's homepage
    public function home()
    {
        return $this->view('home');
    }
}