<div class="container">
    <h1 class="text-center my-4">Gestion des comptes</h1>

    <div class="row">
        <div class="col-10 m-auto">
            <a href="<?= URL.'/admin/users/create' ?>" class="btn btn-success my-3">Ajouter un utilisateur</a>
        </div>
    </div>
    <div class="row">
        <div class="col-10 m-auto bg-white p-2 border">
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