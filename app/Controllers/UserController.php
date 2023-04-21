<?php 

namespace App\Controllers;

use App\Models\User;

class UserController extends Controller {

    public function login()
    {
        return $this->view('auth.login');
    }

    public function loginPost()
    {
        $user = (new User($this->getDB()))->getByEmail($_POST['email']);

        if(password_verify($_POST['password'], $user->password)) {
            $_SESSION['auth'] = (int) $user->isAdmin;
            return header('Location: ' .URL.'/admin/posts?success=true');
        }else{
            return header('Location: '. URL . '/login');
        }
    }

    public function logout() 
    {
        session_destroy();

        return header('Location: ' .URL.'/');
    }
}