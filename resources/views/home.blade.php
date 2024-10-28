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
    h1 {
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
            <div class="col-md-2 col-custom text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                    class="bi bi-backpack2-fill" viewBox="0 0 16 16">
                    <path d="M5 13h6v-3h-1v.5a.5.5 0 0 1-1 0V10H5z" />
                    <path
                        d="M6 2v.341C3.67 3.165 2 5.388 2 8v1.191l-1.17.585A1.5 1.5 0 0 0 0 11.118V13.5A1.5 1.5 0 0 0 1.5 15h1c.456.607 1.182 1 2 1h7c.818 0 1.544-.393 2-1h1a1.5 1.5 0 0 0 1.5-1.5v-2.382a1.5 1.5 0 0 0-.83-1.342L14 9.191V8a6 6 0 0 0-4-5.659V2a2 2 0 1 0-4 0z" />
                </svg>
                <p>Colonne 1</p>
            </div>
            <div class="col-md-2 col-custom text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                    class="bi bi-shield-shaded" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M8 14.933a1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56" />
                </svg>
                <p>Colonne 2</p>
            </div>
            <div class="col-md-2 col-custom text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60 fill="currentColor"
                    class="bi bi-sign-no-parking-fill" viewBox="0 0 16 16">
                    <path
                        d="M13.292 14A8 8 0 0 1 2 2.707l3.5 3.5V12h1.283V9.164h1.674zm.708-.708-4.37-4.37C10.5 8.524 11 7.662 11 6.587c0-1.482-.955-2.584-2.538-2.584H5.5v.79L2.708 2.002A8 8 0 0 1 14 13.293Z" />
                    <path
                        d="M6.777 7.485v.59h.59zm1.949.535L6.777 6.07v-.966H8.27c.893 0 1.419.539 1.419 1.482 0 .769-.35 1.273-.963 1.433Z" />
                </svg>
                <p>Colonne 3</p>
            </div>
            <div class="col-md-2 col-custom text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                    class="bi bi-ev-front-fill" viewBox="0 0 16 16">
                    <path
                        d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848Zm6.75.51a.186.186 0 0 0-.23.034L6.05 7.246a.188.188 0 0 0 .137.316h1.241l-.673 2.195a.19.19 0 0 0 .085.218c.075.043.17.03.23-.034l2.88-3.187a.188.188 0 0 0-.137-.316H8.572l.782-2.195a.19.19 0 0 0-.085-.218Z" />
                </svg>
                <p>Colonne 4</p>
            </div>
            <div class="col-md-2 col-custom text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                    class="bi bi-coin" viewBox="0 0 16 16">
                    <path
                        d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z" />
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12" />
                </svg>
                <p>Colonne 5</p>
            </div>
        </div>
    </div>
    <div>

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
