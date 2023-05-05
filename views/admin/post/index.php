<div class="container">
    <h1 class="text-center my-4">Gestion des articles</h1>

    <div class="row">
        <div class="col-10 m-auto">
            <a href="<?= URL.'/admin/posts/create' ?>" class="btn btn-success my-3">Ajouter un article</a>
        </div>
    </div>
    <div class="row">
        <div class="col-10 m-auto bg-white p-2 border">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Edité le</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($params['posts'] as $post): ?>
                        <tr>
                            <th scope="row"><?= $post->id ?></th>
                            <td><?= $post->title ?></td>
                            <td><?= $post->getUpdatedAt() ?></td>
                            <td class="d-flex">
                                <a href="<?= URL.'/posts/'.$post->id ?>" class="bg-primary btn-action m-2">
                                    <i class="bi bi-eye text-white"></i>
                                </a>
                                <a href="<?= URL.'/admin/posts/edit/'.$post->id ?>" class="bg-warning btn-action m-2">
                                    <i class="bi bi-pencil text-white"></i>
                                </a>
                                <form action="<?= URL.'/admin/posts/delete/'.$post->id ?>" method="POST" class="d-inline">
                                    <button type="submit" class="bg-danger btn-action m-2">
                                        <i class="bi bi-trash text-white"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>