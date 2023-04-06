<?php 

namespace App\Controllers;

use App\Models\Post;
use App\Models\User;

class BlogController extends Controller {

    public function index()
    {
        $post = new Post($this->getDB());
        $posts = $post->all();
       
        return $this->view('blog.index', compact('posts'));
    }

    public function show(int $id)
    {
        $post = new Post($this->getDB());
        $post = $post->findById($id);

        $author = new User($this->getDB());
        $author = $author->findById($post->author);

        return $this->view('blog.show', compact('post', 'author'));
    }

}