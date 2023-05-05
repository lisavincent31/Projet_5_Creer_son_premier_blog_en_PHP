<?php

namespace App\Models;

use DateTime;
use App\Models\User;

class Comment extends Model {

    protected $table = 'comments';

    public function getPost()
    {
        $post = $this->query("
        SELECT p.title FROM posts p
        INNER JOIN comment_post cp ON cp.post_id = p.id 
        WHERE cp.comment_id = ?
        ", [$this->id]);

        return $post[0]->title;
    }

    public function getAuthor()
    {
        $author = $this->query("
        SELECT firstname, lastname FROM users
        INNER JOIN comments ON comments.author = users.id
        WHERE comments.id = ?
        ", [$this->id]);

        return $author[0]->firstname." ".$author[0]->lastname;
    }
}

?>