<?php if(isset($_SESSION['errors'])) : ?>

    <?php foreach($_SESSION['errors'] as $errorsArray) : ?>
        <?php foreach($errorsArray as $error) : ?>
            <div class="alert alert-danger">
                <li><?= $error ?></li>
            </div>
        <?php endforeach ?>
    <?php endforeach ?>

<?php endif ?>
<?php session_destroy() ?>
<h1>Se connecter</h1>

<form action="<?= URL.'/login' ?>" method="post" class="m-4">

    <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" class="form-control m-2" name="email" id="email" value="">
    </div>

    <div class="form-group">
        <label for="password">Mot de passe :</label>
        <input type="password" class="form-control m-2" name="password" id="password" value="">
    </div>
    <button type="submit" class="btn btn-primary mt-4">Se connecter</button>
</form>