<h1>Administration des articles</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Publié le</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($params['posts'] as $post): ?>
            <tr>
                <th scope="row"><?= $post->id ?></th>
                <td><?= $post->title ?></td>
                <td><?= $post->getCreatedAt() ?></td>
                <td class="d-flex">
                    <a href="#" class="btn btn-warning btn-action m-2">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="<?= URL.'/admin/posts/delete/'.$post->id ?>" method="POST" class="d-inline">
                        <button type="submit" class="btn btn-danger btn-action m-2">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                 
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>