<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>

</head>
<style>
    .nav-ul-a {
        color: white;
    }

    .nav-li-textsp:hover {
        background: rgb(148, 148, 148, 0.3);
        color: white;
    }

    .navbar {
        background-color: #0e0e0e45;
        transition: background-color 0.3s;
        /* Transition pour un changement en douceur */
    }

    .navbar-header {
        background-color: rgba(0, 0, 0, 1);
        transition: background-color 0.3s;
        /* Transition pour un changement en douceur */
    }

    .fixed-top {
        transition: background-color 0.3s;
        /* Transition pour le changement de couleur */
    }

    /* Classe pour la navbar avec une couleur de fond opaque */
    .navbar-scrolled {
        background-color: #101015;
        /* Changez la couleur comme vous le souhaitez */
    }
</style>

<body>
    <div class="fixed-top">
        <section class="navbar-header p-0">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Section pour le lecteur de radio (à gauche) -->
                    <div class="me-auto">
                    </div>
                    <!-- Section pour les liens (à droite) -->
                    <ul class="p-0 m-0 d-flex">
                        <li class="list-group-item nav-li-textsp">
                            <a class="link-underline-dark nav-ul-a btn btn-sm p-2" href="#">
                                Support
                            </a>
                        </li>
                        <li class="list-group-item nav-li-textsp">
                            <a class="fw-bold link-underline-dark nav-ul-a btn btn-sm p-2" href="#">
                                Discord
                            </a>
                        </li>
                        <li class="list-group-item nav-li-textsp">
                            <a class="fw-bold link-underline-dark nav-ul-a btn btn-sm p-2" href="#">
                                Connexion / Inscription
                            </a>
                        </li>
                        <li class="list-group-item nav-li-textsp">
                            <a class="fw-bold link-underline-dark nav-ul-a btn btn-sm p-2" href="#">
                                Paramètre
                            </a>
                        </li>
                        <li class="list-group-item nav-li-textsp">
                            <a class="link-underline-dark nav-ul-a btn btn-sm p-2" href="#">
                                Vote
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item nav-li-textsp">
                            <a class="navbar-brand nav-ul-a p-1" href="#">
                                <img src="{{ asset('img/spaziaeco logo.png') }}" alt="Logo" height="60"
                                    width="auto" class="rounded">
                                SpaziaEco
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-li-textsp">
                            <a class="nav-link text-uppercase  nav-ul-a p-2" aria-current="page" href="#">
                                <h6 class="m-0">Accueil</h6>
                            </a>
                        </li>
                        <li class="nav-li-textsp">
                            <a class="nav-link text-uppercase nav-ul-a p-2" href="#">
                                <h6 class="m-0">Notations</h6>
                            </a>
                        </li>
                        <li class="nav-li-textsp">
                            <a class="nav-link text-uppercase  nav-ul-a p-2" href="#">
                                <h6 class="m-0">Jornal</h6>
                            </a>
                        </li>
                        <li class="nav-li-textsp">
                            <a class="nav-link text-uppercase nav-ul-a p-2" href="#">
                                <h6 class="m-0">Wiki</h6>
                            </a>
                        </li>
                        <li class="nav-li-textsp">
                            <a class="nav-link text-uppercase nav-ul-a p-2" href="#">
                                <h6 class="m-0">Vote</h6>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div>
        <img class="img-fluid" src="{{ asset('img/spazia.png') }}" alt="">
        <!-- http://localhost/Spaziaweb/public/img/spazia.png -->
        <h1>Bienvenue sur Mon Site</h1>
        <p>Profitez de nos fonctionnalités exclusives !</p>
    </div>

    <h1>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis totam consequuntur aliquid neque harum
        aspernatur aliquam delectus, eaque, voluptate magni quibusdam laudantium? Incidunt consectetur doloremque, quas
        minus amet libero dolorem?</h1>
    <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet voluptas nisi et laborum possimus consectetur
        molestiae harum quo nostrum provident quidem assumenda, ex aperiam optio, iste sint numquam? Facilis, accusamus.
    </h1>
    <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa repellendus
        molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
    <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa repellendus
        molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
    <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa repellendus
        molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
    <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa repellendus
        molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
    <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa repellendus
        molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
    <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa repellendus
        molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
    <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa repellendus
        molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
    <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa repellendus
        molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
    <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa repellendus
        molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
    <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa repellendus
        molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
    <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa repellendus
        molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
    <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa repellendus
        molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
    <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa repellendus
        molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
    <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa repellendus
        molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        window.onscroll = function() {
            var navbar = document.querySelector('.fixed-top');
            if (window.pageYOffset > 50) { // Ajustez la valeur selon vos besoins
                navbar.classList.add('navbar-scrolled'); // Ajouter la classe pour changer la couleur
            } else {
                navbar.classList.remove('navbar-scrolled'); // Retirer la classe
            }
        };
    </script>
</body>

</html>
