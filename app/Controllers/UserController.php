<?php 

namespace App\Controllers;

use App\Models\User;
use App\Validation\Validator;

class UserController extends Controller {

    public function login()
    {
        return $this->view('auth.login');
    }

    public function loginPost()
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'email' => ['required', 'min:3'],
            'password' => ['required'],
        ]);

        if($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: ' .URL.'/login');
            exit;
        }

        $user = (new User($this->getDB()))->getByEmail($_POST['email']);

        if(password_verify($_POST['password'], $user->password)) {
            $_SESSION['auth'] = (int) $user->isAdmin;
            if($_SESSION['auth'] == 1) {
                return header('Location: ' .URL.'/admin/dashboard?success=true');
            }else{
                return header('Location: ' .URL.'/?success=true');
            }

        }else{
            $_SESSION['errors']['password'] = ['Mot de passe incorrect.'];
            header('Location: ' .URL.'/login');
            exit;
        }
    }
    
    public function signup() 
    {
        return $this->view('auth.signup');
    }

    public function signupPost() 
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'firstname' => ['required', 'min:3'],
            'lastname' => ['required', 'min:3'],
            'email' => ['required', 'min:3', 'unique'],
            'password' => ['required', 'min:3'],
        ]);

        if($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: ' .URL.'/signup');
            exit;
        }else{
            $user = new User($this->getDB());

            $result = $user->create($_POST);

            if($result) {
                $this->loginPost();
            }
        }
    }

    public function logout() 
    {
        session_destroy();

        return header('Location: ' .URL.'/');
    }
}