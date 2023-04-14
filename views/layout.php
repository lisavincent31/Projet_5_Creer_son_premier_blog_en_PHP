<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="blog, développeuse d'application web, développement web" />
        <meta name="author" content="Lisa VINCENT" />
        <title>Lisa VINCENT : Mon premier blog en PHP</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'app.css' ?>" rel="stylesheet" />
        <link href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'theme.css' ?>" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="<?= URL.'/' ?>">
                    <img src="public/img/favicon/favicon-32x32.png" alt="Logo">
                    <span>Lisa VINCENT _ Blog</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="<?= URL.'/' ?>">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= URL.'/posts/' ?>">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= URL.'/admin/posts' ?>">Tableau de bord</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- Page Content -->
        <div class="container-fluid">
            <?= $content ?>
        </div>

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright © Lisa VINCENT 2023</p></div>
        </footer>

        <!-- Script Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>