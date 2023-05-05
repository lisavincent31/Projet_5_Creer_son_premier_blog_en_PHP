<?php 

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\User;

class UserController extends Controller 
{
    public function index() 
    {
        $this->isAdmin();
        $users = (new User($this->getDB()))->all();

        return $this->view('admin.user.index', compact('users'));
    }

    public function show(int $id) 
    {
        $this->isAdmin();
        $user = (new User($this->getDB()))->findById($id);

        return $this->view('admin.user.form', compact('user'));
    }

    public function account()
    {
        $this->isUser();
        $user = (new User($this->getDB()))->findById($_SESSION['user']['id']);

        return $this->view('user.account.index', compact('user'));
    }

}

?>