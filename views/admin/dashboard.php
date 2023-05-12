<div class="container bg-light">
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
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h5>Liste des articles</h5>
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Tags</th>
                                <th scope="col">Edité le</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($params['posts'] as $post): ?>
                                <tr>
                                    <th scope="row"><?= $post->id ?></th>
                                    <td><?= $post->title ?></td>
                                    <td>
                                        <?php foreach($post->getTags() as $tag) : ?>
                                            <span class="badge bg-<?= $tag->badge ?> m-1"><?= $tag->name ?></span>
                                        <?php endforeach ?>
                                    </td>
                                    <td><?= $post->getUpdatedAt() ?></td>
                                    <td>
                                        <a href="<?= URL."/posts/{$post->id}" ?>" class="bg-primary btn-action m-2">
                                            <i class="bi bi-eye text-white"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <h5>Liste des commentaires</h5>
            </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
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
                                        
                                        <div class="d-flex">
                                            <a href="<?= URL."/posts/{$comment->getPost()->id}" ?>" class="bg-primary btn-action">
                                                <i class="bi bi-eye text-white"></i>
                                            </a>
                                            <a href="<?= URL.'/admin/comments/'.$comment->id ?>" class="bg-success btn-action">
                                                <i class="bi bi-check text-white"></i>
                                            </a>
                                            <a href="<?= URL.'/admin/comments/delete/'.$comment->id ?>" class="bg-danger btn-action">
                                                <i class="bi bi-trash text-white"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <h5>Liste des utilisateurs</h5>
            </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Admis le</th>
                                <th scope="col">Rôle</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($params['users'] as $user): ?>
                                <tr>
                                    <td><?= $user->getFullName() ?></td>
                                    <td><?= $user->getCreatedAt() ?></td>
                                    <?php switch($user->isAdmin) {
                                        case 1:
                                            echo "<td class='text-danger'>Administrateur</td>";
                                            break;
                                        case 0:
                                            echo "<td class='text-success'>Utilisateur</td>";
                                            break;
                                    } ?>
                                    <td>
                                        <a href="" class="bg-warning btn-action m-2">
                                            <i class="bi bi-pencil text-white"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>