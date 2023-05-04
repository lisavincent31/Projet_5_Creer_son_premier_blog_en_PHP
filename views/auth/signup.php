<!-- Errors notification -->
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
<!-- Form Signup -->
<div class="container">
    <h1 class="text-center mt-4">Inscription</h1>
    <div class="row">
        <form action="<?= URL.'/signup' ?>" class="mt-2 col-6 m-auto" method="POST">
            <div class="form-floating mb-3">
                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Prénom">
                <label for="firstname">Prénom :</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Nom">
                <label for="lastname">Nom :</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                <label for="email">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">
                <label for="password">Mot de passe</label>
            </div>
            <!-- <div class="form-floating mb-3">
                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirmation du mot de passe">
                <label for="confirmPassword">Confirmation du mot de passe :</label>
            </div> -->
            <button type="submit" class="btn btn-primary float-end mt-4 mb-4">S'inscrire</button>
        </form>
    </div>
    <div class="row mt-4">
        <div class="col-6 m-auto">
            <div class="d-flex flex-column justify-content-center">
                <p>Vous avez déjà un compte ? Cliquez <a href="<?= URL.'/login/' ?>">ici</a> pour vous connecter.</p>
            </div>
        </div>
    </div>
</div>