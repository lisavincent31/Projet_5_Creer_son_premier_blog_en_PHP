<div class="container p-4">
    <h1 class="text-center"><?= $params['post']->title ?></h1>
    <div class="row">
        <div class="col-10 m-auto">
            <small><?= $params['post']->chapo ?></small>
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
                <form action="<?= URL.'/posts/'.$params['post']->id.'comments/create/' ?>" method="POST">
                    <div class="form-group">
                        <label for="comment">Laissez un commentaire</label>
                        <input type="text" name="comment" class="form-control">
                    </div>
                </form>
            <?php endif ?>
            <a href="<?= URL ?>/posts/" class="btn btn-secondary float-end mt-5 col-3">Revenir en arrière</a>
        </div>
    </div>
</div>