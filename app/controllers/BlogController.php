<?php 

namespace App\Controllers;

class BlogController extends Controller {

    public function index()
    {
        $statement = $this->db->getPDO()->query('SELECT * FROM posts ORDER BY created_at DESC');
        $posts = $statement->fetchAll();
        return $this->view('blog.index', compact('posts'));
    }

    public function show(int $id)
    {
        $post_statement = $this->db->getPDO()->query('SELECT * FROM posts WHERE id = '.$id);
        $post = $post_statement->fetch();

        $author_statement = $this->db->getPDO()->query('SELECT * FROM users WHERE id ='.$post->author);
        $author = $author_statement->fetch();

        return $this->view('blog.show', compact('post', 'author'));
    }

}