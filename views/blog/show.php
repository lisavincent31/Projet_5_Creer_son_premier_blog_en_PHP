<div class="container p-4">
    <h1><?= $params['post']->title ?></h1>
    <small><?= $params['post']->chapô ?></small>
    <div class="d-flex mt-3">
        <?php foreach($params['post']->getTags() as $tag) : ?>
            <span class="badge bg-<?= $tag->badge ?> m-1"><?= $tag->name ?></span>
        <?php endforeach ?>
    </div>
    <p class="lead mt-3"><?= $params['post']->content ?></p>
    <div class="d-flex justify-content-between">
        <small>Auteur : <?= $params['author']->getFullName() ?></small>
        <small class="badge text-info">Publié le : <?= $params['post']->getCreatedAt() ?></small>
    </div>

    <a href="/Projet_5_Creer_son_premier_blog_en_PHP/posts/" class="btn btn-secondary float-end mt-5">Revenir en arrière</a>
</div>