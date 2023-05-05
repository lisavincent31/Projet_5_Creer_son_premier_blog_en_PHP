<?php 

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller 
{
    public function index() 
    {
        $this->isAdmin();
        $comments = (new Comment($this->getDB()))->allByStatus();

        return $this->view('admin.comment.index', compact('comments'));
    }

    public function show(int $id) 
    {
        $this->isAdmin();
        $comment = (new Comment($this->getDB()))->findById($id);

        return $this->view('user.comment.form', compact('comment'));
    }

}

?>