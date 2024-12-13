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
    p{
        margin-top: 5px;
    }
    h1, h2, h3, h4,h5, h6 {
        color: white
    }

    body {
        background-color: #101015
    }

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

    @-webkit-keyframes tilt {
        0% {
            transform: rotate(0deg);
        }

        25% {
            transform: rotate(-10deg);
        }

        50% {
            transform: rotate(10deg);
        }

        75% {
            transform: rotate(-5deg);
        }

        100% {
            transform: rotate(0deg);
        }
    }

    @keyframes tilt {
        0% {
            transform: rotate(0deg);
        }

        25% {
            transform: rotate(-10deg);
        }

        50% {
            transform: rotate(10deg);
        }

        75% {
            transform: rotate(-5deg);
        }

        100% {
            transform: rotate(0deg);
        }
    }

    /* Appliquer l'animation seulement au survol */
    .shakeme:hover .svg-icon {
        animation-name: tilt;
        animation-duration: 0.6s;
        animation-iteration-count: 1;
        animation-timing-function: ease-in-out;
    }

    .svg-icon {
        display: inline-block;
    }

    .dropdown-toggle::after {
        display: none !important;
        /* Masque la flèche par défaut de Bootstrap */
    }

    .dropdown-menu {
        opacity: 0;
        transition: opacity 2s ease;
        /* Transition de 2 secondes pour l'apparition */
    }

    .dropdown-menu.show {
        opacity: 1;
        /* Lors de l'affichage, l'opacité passe à 1 */
    }

    /* Conteneur de l'image de fond */
    .background-container {
        position: relative;
        text-align: center;
    }

    /* Image de fond qui occupe toute la largeur */
    .background-image {
        width: 100%;
        height: 500px;
        object-fit: cover;
    }

    /* Centrage du titre SpaziaEco */
    .centered-title {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 3rem;
        font-weight: bold;
    }

    /* Conteneur des colonnes */
    .col-container {
        position: relative;
        top: -100px;
        /* Ajuste la position des colonnes */
    }

    /* Style des colonnes */
    .col-custom {
        background-color: rgba(255, 255, 255);
        /* Couleur de fond légèrement transparente */
        padding: 40px;
        border-radius: 4px;
        margin-bottom: 20px;
        margin-left: 20px
    }
    .custom-p{
        color: white
    }
    .custom-section{
        padding: 6rem 0;
    }
    .section-title{
        margin: 0 0 1.5rem;
        font-size: 2.25rem;
        font-style: normal;
        font-weight: 700;
        line-height: 2.625rem;
    }
    .btn-secondary{
        color: #fff;
    background-color: #737373;
    border-color: #737373;
    box-shadow: 0 0 0 8px rgba(255, 255, 255, .05);
    }

    .card-darkmode{
        background-color: #14141b;
    }

    .card-darkmode-p{
        color: white
    }
    .tag-darkmode{
        color: white;
        padding: .25em .4em;
        font-size: 75%;
        font-weight: 700;
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
                        <li class="list-group-item nav-li-textsp dropdown">
                            <a class="fw-bold link-underline-dark nav-ul-a btn btn-sm p-2 d-flex align-items-center justify-content-center dropdown-toggle"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                style="position: relative;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    fill="currentColor" class="bi bi-gear-fill me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                </svg>
                                <span class="dropdown-toggle-icon" style="font-size: 14px;">▼</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
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
    <div class="background-container">
        <!-- Image de fond -->
        <img class="background-image" src="{{ asset('img/spazia.png') }}" alt="SpaziaEco Background">
        <!-- http://localhost/Spaziaweb/public/img/spazia.png -->
        <h1 class="centered-title">SpaziaEco</h1>
    </div>
    <div class="container col-container">
        <div class="row justify-content-center">
            <!-- Exemple de 5 colonnes -->
            <div class="col-lg-2 col-custom text-center">
                <img src="{{ asset('img/pioche.png') }}" width="60" height="60"
                    {{-- http://localhost/Spaziaweb/public/img/pioche.png --}}
                    fill="currentColor" class="bi bi-backpack2-fill" viewBox="0 0 16 16" alt="">
                <p><b>Haute Collab</b></p>
            </div>
            <div class="col-lg-2 col-custom text-center">
                <img src="{{ asset('img/protection.png') }}" width="60" height="60"
                    fill="currentColor" class="bi bi-backpack2-fill" viewBox="0 0 16 16" alt="">
                <p><b>Staff actif</b></p>
            </div>
            <div class="col-lg-2 col-custom text-center">
                <img src="{{ asset('img/file.png') }}" width="60" height="60"
                    fill="currentColor" class="bi bi-backpack2-fill" viewBox="0 0 16 16" alt="">
                <p><b>Mods</b></p>
            </div>
            <div class="col-lg-2 col-custom text-center">
                <img src="{{ asset('img/event.png') }}" width="60" height="60"
                    fill="currentColor" class="bi bi-backpack2-fill" viewBox="0 0 16 16" alt="">
                <p><b>Events</b></p>
            </div>
            <div class="col-lg-2 col-custom text-center">
                <img src="{{ asset('img/money.png') }}" width="60" height="60"
                    fill="currentColor" class="bi bi-backpack2-fill" viewBox="0 0 16 16" alt="">
                <p><b>Monnaie Unique</b></p>
            </div>
        </div>
    </div>
    <div>
        <section class="row custom-section">
            <div class="col-1"></div>
            <div class="col-lg-5"> <!-- Centre le conteneur dans la colonne -->
                    <h1 class="pt-4 pb-4"><b>Découvre SpaziaEco</b></h1>
                    <p class="custom-p" style="text-align: justify;">
                        Rejoins une communauté engagée dans la création d’un monde virtuel durable, où chaque joueur contribue à l’équilibre de l’écosystème. Construis, explore, et commerce dans un environnement réaliste inspiré par la nature. Défie tes compétences de gestion et d’ingéniosité pour prospérer tout en préservant les ressources de SpaziaEco.
                    </p>
                    <p class="custom-p">
                    Prépare-toi à une expérience de jeu sans limites sur SpaziaEco, où ta légende débute.
                    </p>
            </div>
            <div class="col-lg-6 d-flex justify-content-center">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/iSsfR7TKrv0?si=pRlWsWJW5aJz_nFO" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </section>
        <section class="custom-section">
            <div class="text-center mb-5">
                <a class="btn btn-secondary col-12 col-lg-3 mt-5" href="">Upadate</a>
                <a class="btn btn-secondary col-12 col-lg-3 mt-5" href="">Journal</a>
            </div>
            <div class="">
                <h2 class="section-title text-center mt-3">
                    Actualités
                </h2>
            </div>
            <div class="">
                <div class="tiles d-flex justify-content-evenly">
                    <div class="card card-darkmode" style="width: 30rem;">
                        <img src="{{ asset('img/testhobe.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <span class="text-uppercase tag-darkmode d-inline-block mb-2 bg-success lh-1 rounded-1"><b>Live</b></span>
                        <h5 class="text-uppercase"><b>live</b></h5>
                        <p style="color:#767676 !important;">07 novembre 2024</p>
                        <p style="color:#767676 !important;">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                    <div class="card card-darkmode" style="width: 30rem;">
                        <img src="{{ asset('img/testhobe.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <span class="text-uppercase tag-darkmode d-inline-block mb-2 bg-success lh-1 rounded-1"><b>Journal</b></span>
                        <h5 class="text-uppercase"><b>Journal</b></h5>
                        <p style="color:#767676 !important;">01 novembre 2024</p>
                        <p style="color:#767676 !important;">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                    <div class="card card-darkmode" style="width: 30rem;">
                        <img src="{{ asset('img/testhobe.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div>
                                <span class="text-uppercase tag-darkmode d-inline-block mb-2 bg-success lh-1 rounded-1"><b>Update</b></span>
                            </div>
                        <h5 class="text-uppercase"><b>Update</b></h5>
                        <p style="color:#767676 !important;">03 novembre 2024</p>
                        <p class="" style="color:#767676 !important;">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <br><br><br><br><br><br><b></b>
        <h1>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis totam consequuntur aliquid neque harum
            aspernatur aliquam delectus, eaque, voluptate magni quibusdam laudantium? Incidunt consectetur doloremque,
            quas
            minus amet libero dolorem?</h1>
        <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet voluptas nisi et laborum possimus
            consectetur
            molestiae harum quo nostrum provident quidem assumenda, ex aperiam optio, iste sint numquam? Facilis,
            accusamus.
        </h1>
        <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa
            repellendus
            molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
        <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa
            repellendus
            molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
        <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa
            repellendus
            molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
        <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa
            repellendus
            molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
        <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa
            repellendus
            molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
        <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa
            repellendus
            molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
        <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa
            repellendus
            molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
        <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa
            repellendus
            molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
        <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa
            repellendus
            molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
        <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa
            repellendus
            molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
        <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa
            repellendus
            molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
        <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa
            repellendus
            molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
        <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa
            repellendus
            molestias officia iusto ipsa, minima est quam, natus dignissimos? Ullam esse excepturi possimus beatae!</h1>
        <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio fugiat laborum eius saepe et culpa
            repellendus
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
