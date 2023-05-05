<?php

namespace App\Models;

use DateTime;

class Post extends Model{

    protected $table = 'posts';

    public function getCreatedAt(): string
    {
        return (new DateTime($this->created_at))->format('d/m/Y à H:i');
    }

    public function getUpdatedAt(): string
    {
        return (new DateTime($this->updated_at))->format('d F Y');
    }

    public function getButton(): string
    {
        return <<<HTML
        <a href="/Projet_5_Creer_son_premier_blog_en_PHP/posts/$this->id" class="mt-2 position-relative bottom-0">Lire l'article</a>
HTML;
    }

    public function getTags() 
    {
        return $this->query("
            SELECT t.* FROM tags t
            INNER JOIN post_tag pt ON pt.tag_id = t.id
            WHERE pt.post_id = ?
        ", [$this->id]);
    }

    public function getComments()
    {
        return $this->query("
        SELECT c.* FROM comments c
        INNER JOIN comment_post cp ON cp.comment_id = c.id
        WHERE cp.post_id = ?
        ", [$this->id]);
    }

    public function getCommentAuthor(int $id)
    {
        $author = $this->query("
        SELECT firstname FROM users
        INNER JOIN comments on comments.author = users.id
        WHERE comments.id = ?
        ", [$id]);

        return $author[0]->firstname;
    }
    public function getCommentUpdate(int $id)
    {
        $update = $this->query("
        SELECT updated_at FROM comments
        WHERE comments.id = ?
        ", [$id]);

        $date = (new DateTime($update[0]->updated_at))->format('d M Y');
        return $date;
    }

    public function create(array $data, ?array $relations = null)
    {
        $data['author'] = 1;
        
        parent::create($data);

        $id = $this->db->getPDO()->lastInsertId();

        foreach($relations as $tag_id) {
            $statement = $this->db->getPDO()->prepare('INSERT post_tag (post_id, tag_id) VALUES (?, ?)');
            $statement->execute([$id, $tag_id]);
        }

        return true;
    }

    public function update(int $id, array $data, ?array $relations = null)
    {
        parent::update($id, $data);

        $statement = $this->db->getPDO()->prepare('DELETE FROM post_tag WHERE post_id = ?');
        $result = $statement->execute([$id]);

        foreach($relations as $tag_id) {
            $statement = $this->db->getPDO()->prepare('INSERT post_tag (post_id, tag_id) VALUES (?, ?)');
            $statement->execute([$id, $tag_id]);
        }

        if($result) {
            return true;
        }
    }

}

?>