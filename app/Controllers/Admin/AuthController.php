<?php 

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class AuthController extends Controller 
{
    // Return the dashboard admin view with all posts, comments and users
    public function admin() 
    {
        $this->isAdmin();
        $posts = (new Post($this->getDB()))->all();
        $comments = (new Comment($this->getDB()))->all();
        $users = (new User($this->getDB()))->all();

        return $this->view('admin.dashboard', compact('posts', 'comments', 'users'));
    }

    // return the dashboard user view with all comments write by him
    public function user() 
    {
        $this->isUser();
        $comments = (new Comment($this->getDB()))->getByUser((int) $_SESSION['user']['id']);

        return $this->view('user.dashboard', compact('comments'));
    }

}

?>