<div class="container p-4">
    <h1 class="text-center p-y m-5">Les derniers articles</h1>
    <?php foreach($params['posts'] as $post): ?>
        <div class="card mb-4">
            <div class="card-header">
                <h2 class="card-title"><?= $post->title ?></h2>
                <div class="d-flex">
                    <?php foreach($post->getTags() as $tag) : ?>
                        <span class="badge bg-<?= $tag->badge ?> m-1">
                            <a href="<?= URL . '/tags/' . $tag->id ?>"class="text-white text-decoration-none"><?= $tag->name ?></a>
                        </span>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="card-body">
                <p class="lead"><?= $post->chapo ?></p>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-info">Dernière modification le : <?= $post->getUpdatedAt() ?></small>
                    <?= $post->getButton(); ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>