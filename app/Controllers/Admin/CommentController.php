<?php 

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller 
{
    // return the view of all the comments
    public function index() 
    {
        $this->isAdmin();
        $comments = (new Comment($this->getDB()))->allByStatus();

        return $this->view('admin.comment.index', compact('comments'));
    }

    // // 
    // public function show(int $id) 
    // {
    //     $this->isAdmin();
    //     $comment = (new Comment($this->getDB()))->findById($id);

    //     return $this->view('user.comment.form', compact('comment'));
    // }

    // create a new comment for a post
    public function commentPost(int $id)
    {
        $this->isUser();

        $comment = new Comment($this->getDB());
        $post = [$id];

        $result = $comment->create($_POST, $post);

        if($result) {
            $_SESSION['success'] = 'Votre commentaire a bien été créé. Il faudra attendre sa validation par l\'administrateur.';
            return header('Location: ' . URL . '/posts/'.$id);
        }
    }

    // update the status comment in accepted by the admin
    public function accept(int $id)
    {
        $this->isAdmin();
        $comment = new Comment($this->getDB());

        $result = $comment->accept($id);

        if($result) {
            $_SESSION['success'] = 'Le status du commentaire est passé en accepté avec succès.';
            return header('Location: '. URL .'/admin/comments');
        }
    }

    // update the status comment in deleted by the admin
    public function delete(int $id)
    {
        $this->isAdmin();
        $comment = new Comment($this->getDB());

        $result = $comment->delete($id);

        if($result) {
            $_SESSION['success'] = 'Le status du commentaire est passé en supprimé avec succès.';
            return header('Location: '. URL .'/admin/comments');
        }
    }
}

?>