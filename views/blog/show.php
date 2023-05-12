<div class="container p-4">
    <?php if(isset($_SESSION['success'])) : ?>
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <div class="d-flex align-items-center">
                <p><?= $_SESSION['success'] ?></p>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <div class="col-10 m-auto m-2 p-3 text-center">
        <h1><?= $params['post']->title ?></h1>
        <small><?= $params['post']->chapo ?></small>
    </div>
    <div class="row bg-white border p-2">
        <div class="col-10 m-auto">
            <div class="d-flex mt-3">
                <?php foreach($params['post']->getTags() as $tag) : ?>
                    <span class="badge bg-<?= $tag->badge ?> m-1"><?= $tag->name ?></span>
                <?php endforeach ?>
            </div>
            <p class="lead mt-3"><?= $params['post']->content ?></p>
            <div class="d-flex justify-content-between">
                <small>Auteur : <?= $params['author']->getFullName() ?></small>
                <small class="text-muted">Publié le : <?= $params['post']->getCreatedAt() ?></small>
            </div>
        </div>
        <div class="border-top mt-4"></div>
        <div class="col-10 m-auto">
            <div class="mt-4">
                <h3>Commentaires :</h3>
                <table class="table">
                    <tbody>
                        <?php foreach($params['post']->getComments() as $comment) : ?>
                            <?php if($comment->status == "accepted") : ?>
                                <tr class="row">
                                    <td class="card-text col-7"><?= $comment->content ?></td>
                                    <td class="card-text col-2">
                                        <span class="float-end">_ <?= $comment->getCommentAuthor((int) $comment->id) ?></span>
                                    </td>
                                    <td class="col-3">
                                        <span class="text-muted float-end">
                                            <?= $comment->getCommentUpdate((int) $comment->id) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endif ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            
            <?php if(isset($_SESSION['auth'])) : ?>
                <form action="<?= URL.'/posts/'.$params['post']->id.'/comment/create/' ?>" class="d-flex justify-content-between" method="POST">
                    <div class="form-floating col-10">
                        <input type="text" name="content" class="form-control" placeholder="Laisser un commentaire">
                        <label for="comment">Laissez un commentaire :</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-small">Valider</button>
                </form>
            <?php endif ?>
        </div>
    </div>
    <div class="row">
        <a href="<?= URL ?>/posts/" class="btn btn-secondary float-end my-3 col-3 float-end">Revenir au blog</a>
    </div>
</div>