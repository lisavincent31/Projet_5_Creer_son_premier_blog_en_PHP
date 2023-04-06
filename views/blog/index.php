<div class="container p-4">
    <h1 class="text-center p-y m-5">Les derniers articles</h1>
    <?php foreach($params['posts'] as $post): ?>
        <div class="card mb-4">
            <div class="card-header">
                <h2 class="card-title"><?= $post->title ?></h2>
                <p class="lead"><?= $post->chapô ?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="badge bg-info">Publié le : <?= $post->getCreatedAt() ?></small>
                    <?= $post->getButton(); ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>