<?php 

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\User;

class UserController extends Controller 
{
    // return the view of all the users website for the admin
    public function index() 
    {
        $this->isAdmin();
        $users = (new User($this->getDB()))->all();

        return $this->view('admin.user.index', compact('users'));
    }

}

?>