<div class="container p-4">
    <h1 class="text-center p-y m-5">Les derniers articles</h1>
    <?php foreach($params['posts'] as $post): ?>
        <div class="card mb-4">
            <div class="card-header">
                <h2 class="card-title"><?= $post->title ?></h2>
                <small><?= $post->created_at ?></small>
                <p class="small"><?= $post->chapô ?></p>
                <a href="/Projet_5_Creer_son_premier_blog_en_PHP/posts/<?= $post->id ?>" class="btn btn-primary float-end mt-2">Lire plus</a>
            </div>
        </div>
    <?php endforeach ?>
</div>