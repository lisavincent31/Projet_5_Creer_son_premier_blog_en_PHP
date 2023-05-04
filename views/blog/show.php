<div class="container p-4">
    <h1 class="text-center"><?= $params['post']->title ?></h1>
    <div class="row">
        <div class="col-6 m-auto">
            <small><?= $params['post']->chapo ?></small>
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
        
            <?php if(isset($_SESSION['auth'])) : ?>
                <h3 class="mt-4">Laisser un commentaire</h3>
                <form action="<?= URL.'/posts/'.$params['post']->id.'comments/create/' ?>" method="POST">
                    <div class="form-group">
                        <label for="comment">Message</label>
                        <input type="text" name="comment" class="form-control">
                    </div>
                </form>
            <?php endif ?>
            <a href="<?= URL ?>/posts/" class="btn btn-secondary float-end mt-5">Revenir en arrière</a>
        </div>
    </div>
</div>