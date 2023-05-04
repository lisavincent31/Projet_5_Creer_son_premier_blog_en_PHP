<?php 

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class AuthController extends Controller 
{
    public function admin() 
    {
        $this->isAdmin();
        $posts = (new Post($this->getDB()))->all();

        return $this->view('admin.dashboard', compact('posts'));
    }

    public function user() 
    {

    }

}

?>