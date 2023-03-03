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
        <link href="assets/css/styles.css" rel="stylesheet" />
        <link href="assets/css/theme.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="assets/img/favicon/favicon-32x32.png" alt="Logo">
                    <span>Lisa VINCENT _ Blog</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="views/blog.php">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Se connecter</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <header class="py-5 bg-image-full" style="background-image: url('https://cdn.pixabay.com/photo/2016/11/19/22/53/apple-1841553_960_720.jpg'); background-repeat:no-repeat; background-position:center;background-size:cover;">
            <div class="text-center my-5">
                <img class="img-fluid rounded-circle mb-4" src="assets/img/profil.jpg" alt="...">
                <h1 class="text-white fs-3 fw-bolder">Lisa VINCENT</h1>
                <p class="text-white mb-0">Explorez le monde passionnant de la création d'applications web.</p>
            </div>
        </header>
        <!-- Content section-->
        <section class="py-5">
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2>Développeuse d'applications web</h2>
                        <p class="lead">Envie d'un site web pour développer votre activité ?</p>
                        <p class="mb-0">Remplissez le formulaire de contact ci-dessous, je vous répondrais dans les plus bref délais.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Image element - set the background image for the header in the line below-->
        <div class="py-5 bg-image-full" style="background-image: url('https://source.unsplash.com/4ulffa6qoKA/1200x800')">
            <!-- Put anything you want here! The spacer below with inline CSS is just for demo purposes!-->
            <div class="text-white" style="height: 8rem">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <h3 class="mb-5">Téléchargez mon CV</h3>
                            <a class="text-white" href="assets/file/cv_lisavincent.pdf" download>
                                <i class="bi bi-file-earmark-arrow-down"></i>
                            </a>
                        </div>
                        <div class="col-md-6 text-center">
                            <h3 class="mb-5">Mes réseaux</h3>
                            <ul class="nav justify-content-evenly list-unstyled d-flex">
                                <li class="ms-3">
                                    <a class="text-white" href="#">
                                        <i class="bi bi-github"></i>
                                    </a>
                                </li>
                                <li class="ms-3">
                                    <a class="text-white" href="#">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                </li>
                                <li class="ms-3">
                                    <a class="text-white" href="#">
                                        <i class="bi bi-twitter"></i>
                                    </a>
                                </li>
                                <li class="ms-3">
                                    <a class="text-white" href="#">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                </li>
                                <li class="ms-3">
                                    <a class="text-white" href="#">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content section-->
        <section class="py-5">
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h3>Formulaire de contact</h3>
                        <form action="" method="post">
                            <div class="form-group form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Votre nom">
                                <label for="name">Votre nom</label>
                            </div>
                            <div class="form-group form-floating mb-3">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Votre email">
                                <label for="name">Votre email</label>
                            </div>
                            <div class="form-group form-floating mb-3">
                                <textarea type="text" class="form-control" name="email" id="email" col="6" row="6" placeholder="Votre message"></textarea>
                                <label for="name">Votre message</label>
                            </div>
                            <button type="submit" class="btn btn-primary float-end">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright © Lisa VINCENT 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/theme.js"></script>
    </body>
</html>

