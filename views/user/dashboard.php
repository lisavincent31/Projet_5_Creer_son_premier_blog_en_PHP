<div class="container">
    <?php if(isset($_GET['success'])) : ?>
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <div class="d-flex align-items-center">
                <p>Vous êtes connecté.</p>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <h1 class="text-center m-3 p-4">Tableau de bord</h1>
    <div class="row justify-content-between my-2">
        <div class="col-10 m-auto bg-light p-2 card">
            <h2 class="text-center">Vos commentaires</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col-5">Titre du post</th>
                        <th scope="col-5">Commentaire</th>
                        <th scope="col-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($params['comments'] as $comment) : ?>
                        <tr>
                            <td><?= $comment->getPost() ?></td>
                            <td><?= $comment->content ?></td>
                            <td>
                                <div class="d-flex flex-column">
                                    <a href="" class="btn btn-warning btn-action m-2">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="" class="btn btn-danger btn-action m-2">
                                        <i class="bi bi-trash-fill"></i>
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