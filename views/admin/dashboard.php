<div class="container">
    <?php if(isset($_GET['success'])) : ?>
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <div class="d-flex align-items-center">
                <p>Vous êtes connecté.</p>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <h1 class="text-center m-3 p-4">Tableau de bord Administrateur</h1>
    <div class="row justify-content-between">
        <div class="col-12 bg-light p-2 card mb-2">
            <h2 class="text-center">Utilisateurs</h2>
        </div>
        <div class="col-7 bg-light p-2 card">
            <h2 class="text-center">Les articles</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Edité le</th>
                        <th scope="col">Voir</th>
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
                            <td><?= $post->getButton(); ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="col-4 bg-light p-2 card">
            <h2 class="text-center">Les commentaires</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Post</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">Voir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>4</td>
                        <td>4</td>
                        <td>Manu</td>
                        <td><button class="btn btn-primary">Voir l'article</button></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>4</td>
                        <td>Manu</td>
                        <td><button class="btn btn-primary">Voir l'article</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>4</td>
                        <td>Manu</td>
                        <td><button class="btn btn-primary">Voir l'article</button></td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>4</td>
                        <td>Manu</td>
                        <td><button class="btn btn-primary">Voir l'article</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>