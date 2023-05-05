<div class="container">
    <h1 class="text-center my-4">Gestion des commentaires</h1>

    <div class="row">
        <div class="col-10 m-auto bg-white p-2 border">
            <table class="table">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Commentaire</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Edité le</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </thead>
                <tbody>
                    <?php foreach($params['comments'] as $comment) : ?>
                        <tr>
                            <th scope="row"><?= $comment->id ?></th>
                            <td><?= $comment->content ?></td>
                            <td><?= $comment->getAuthor() ?></td>
                            <td><?= $comment->getCreatedAt() ?></td>
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
                                <a href="" class="bg-primary btn-action">
                                    <i class="bi bi-eye text-white"></i>
                                </a>
                                <a href="" class="bg-warning btn-action">
                                    <i class="bi bi-pencil text-white"></i>
                                </a>
                                <a href="" class="bg-danger btn-action">
                                    <i class="bi bi-trash text-white"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>