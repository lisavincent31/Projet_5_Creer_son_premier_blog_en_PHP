<div class="container">
    <?php if(isset($_GET['success'])) : ?>
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <div class="d-flex align-items-center">
                <p>Vous êtes connecté.</p>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <div class="m-3 p-4">
        <h1 class="text-center">Bienvenue <?= $_SESSION['user']['firstname'] ?></h1>
        <h2 class="text-center">sur votre tableau de bord</h2>
    </div>
    <div class="row">
        <div class="col-10 m-auto bg-white p-3 border rounded">
            <h2 class="mb-4">Liste de vos commentaires</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col-1">#</th>
                        <th scope="col-1">Post</th>
                        <th scope="col-3">Commentaire</th>
                        <th scope="col-2">Auteur</th>
                        <th scope="col-2">Status</th>
                        <th scope="col-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($params['comments'] as $comment) : ?>
                        <tr>
                            <th scope="row"><?= $comment->id ?></th>
                            <td><?= $comment->getPost()->title ?></td>
                            <td><?= $comment->content ?></td>
                            <td><?= $comment->getAuthor(); ?></td>
                            <?php switch($comment->status) {
                                case 'accepted':
                                    echo "<td class='text-success'>Accepté</td>";
                                    break;
                                case 'pending':
                                    echo "<td class='text-warning'>En attente</td>";
                                    break;
                                case 'ignored':
                                    echo "<td class='text-secondary'>Ignoré</td>";
                                    break;
                                case 'deleted':
                                    echo "<td class='text-danger'>Supprimé</td>";
                                    break;
                            } ?>
                            <td>
                                <?php if($comment->status == 'accepted') : ?>
                                    <a href="<?= URL."/posts/{$comment->getPost()->id}" ?>" class="bg-primary btn-action">
                                        <i class="bi bi-eye text-white"></i>
                                    </a>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>