<?php

namespace App\Models;

use DateTime;

class Post extends Model{

    protected $table = 'posts';

    public function getCreatedAt(): string
    {
        return (new DateTime($this->created_at))->format('d/m/Y à H:m');
    }

    public function getButton(): string
    {
        return <<<HTML
        <a href="/Projet_5_Creer_son_premier_blog_en_PHP/posts/$this->id" class="btn btn-primary float-end mt-2">Lire l'article</a>
HTML;
    }
}

?>