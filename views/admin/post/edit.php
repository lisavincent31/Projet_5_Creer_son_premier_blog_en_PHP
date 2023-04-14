<h1>Modifier <?= $params['post']->title ?></h1>

<form action="<?= URL . '/admin/posts/edit/' . $params['post']->id ?>" method="post" class="m-4">

    <div class="form-group">
        <label for="title">Titre :</label>
        <input type="text" class="form-control m-2" name="title" id="title" value="<?=$params['post']->title ?>">
    </div>
    <div class="form-group">
        <label for="chapo">Chapô :</label>
        <textarea class="form-control m-2" name="chapo" id="chapo"><?=$params['post']->chapo ?></textarea>
    </div>
    <div class="form-group">
        <label for="content">Contenu :</label>
        <textarea class="form-control m-2" name="content" id="content" rows="8"><?=$params['post']->content ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary mt-4">Enregistrer les modifications</button>
</form>