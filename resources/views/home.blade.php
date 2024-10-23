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
                            <a class="fw-bold link-underline-dark nav-ul-a btn btn-sm p-2 d-flex align-items-center justify-content-center shakeme"
                                href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-discord svg-icon me-1" viewBox="0 0 16 16">
                                    <path
                                        d="M13.545 2.907a13.2 13.2 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.2 12.2 0 0 0-3.658 0 8 8 0 0 0-.412-.833.05.05 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.04.04 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032q.003.022.021.037a13.3 13.3 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019q.463-.63.818-1.329a.05.05 0 0 0-.01-.059l-.018-.011a9 9 0 0 1-1.248-.595.05.05 0 0 1-.02-.066l.015-.019q.127-.095.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.05.05 0 0 1 .053.007q.121.1.248.195a.05.05 0 0 1-.004.085 8 8 0 0 1-1.249.594.05.05 0 0 0-.03.03.05.05 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.2 13.2 0 0 0 4.001-2.02.05.05 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.03.03 0 0 0-.02-.019m-8.198 7.307c-.789 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612m5.316 0c-.788 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612" />
                                </svg>
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
