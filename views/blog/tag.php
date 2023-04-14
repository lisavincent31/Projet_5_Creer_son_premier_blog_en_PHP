<div class="container p-4">
    <h1 class="text-center p-y m-5">Tous les articles <?= $params['tag']->name ?></h1>
    <?php foreach($params['tag']->getPosts() as $post): ?>
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title"><?= $post->title ?></h2>
                <a href="<?= URL .'/posts/'. $post->id ?>" class="btn btn-primary float-end">Lire l'article</a>
            </div>
        </div>
    <?php endforeach ?>
</div>