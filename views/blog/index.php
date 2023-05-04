<div class="container p-4">
    <h1 class="text-center mb-4">Les derniers articles</h1>
    <div class="row mb-2 align-items-stretch">
        <?php foreach($params['posts'] as $post): ?>
            <div class="col-md-6 mb-2">
                <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-md-350 position-relative post-card">
                    <div class="col p-4 d-flex flex-column position-static">
                        <div class="d-flex align-items-center">
                            <?php foreach($post->getTags() as $tag) : ?>
                                <strong class="badge bg-<?= $tag->badge ?> d-inline-block mb-2 mx-2">
                                    <a href="<?= URL . '/tags/' . $tag->id ?>" class="text-white text-decoration-none"><?= $tag->name ?></a>
                                </strong>
                            <?php endforeach ?>
                        </div>
                        <h3 class="mb-0"><?= $post->title ?></h3>
                        <div class="mb-1 text-muted">Modifié le : <?= $post->getUpdatedAt() ?></div>
                        <p class="card-text mb-auto post-chapo"><?= $post->chapo ?></p>
                        <?= $post->getButton(); ?>
                    </div>
                </div>
            </div>
                <!-- <div class="card mb-4">
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
                </div> -->
        <?php endforeach ?>
    </div>
</div>