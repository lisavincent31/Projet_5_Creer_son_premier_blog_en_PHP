<div class="container p-4">
    <h1><?= $params['post']->title ?></h1>
    <small><?= $params['post']->chapô ?></small>
    <p class="lead mt-4"><?= $params['post']->content ?></p>
    <div class="d-flex justify-content-between">
        <small>Auteur : <?= $params['author']->firstname ?> <?= $params['author']->lastname ?></small>
        <small class="badge bg-info">Publié le : <?= $params['post']->getCreatedAt() ?></small>
    </div>

    <a href="/Projet_5_Creer_son_premier_blog_en_PHP/posts/" class="btn btn-secondary float-end mt-5">Revenir en arrière</a>
</div>