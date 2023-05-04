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
<div class="container vh-50">
    <h1 class="text-center mt-4">Se connecter</h1>

    <div class="row">
        <form action="<?= URL.'/login' ?>" method="post" class="col-6 m-auto mt-4">

            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                <label for="email">Email :</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">
                <label for="password">Mot de passe :</label>
            </div>
            <button type="submit" class="btn btn-primary float-end mb-4 mt-4">Se connecter</button>
        </form>
    </div>
    <div class="row mt-4">
        <div class="col-6 m-auto">
            <div class="d-flex flex-column justify-content-center">
                <p>Vous n'avez pas encore de compte ? Cliquez <a href="<?= URL.'/signup/' ?>">ici</a> pour vous inscrire.</p>
            </div>
        </div>
    </div>
</div>