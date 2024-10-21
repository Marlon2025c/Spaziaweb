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

<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a class="navbar-brand " href="#">
                        <img src="{{ asset('img/spaziaeco logo.png') }}" alt="Logo" width="30" height="24"
                            class="d-inline-block align-text-top ">
                        SpaziaEco
                    </a>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link nav-button text-uppercase" aria-current="page" href="#">
                            <h6>Accueil</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-button text-uppercase" href="#">
                            <h6>Notations</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-button text-uppercase" href="#">
                            <h6>Jornal</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-button text-uppercase" href="#">
                            <h6>Wiki</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-button text-uppercase" href="#">
                            <h6>Vote</h6>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div>
        <img class="img-fluid" src="{{ asset('img/spazia.png') }}" alt="">
        // http://localhost/Spaziaweb/public/img/spazia.png
        <h1>Bienvenue sur Mon Site</h1>
        <p>Profitez de nos fonctionnalités exclusives !</p>
    </div>

    <h1>sdqdqsdsqdqsd</h1>
    <h1>sdqdqsdsqdqsd</h1>
    <h1>sdqdqsdsqdqsd</h1>
    <h1>sdqdqsdsqdqsd</h1>
    <h1>sdqdqsdsqdqsd</h1>
    <h1>sdqdqsdsqdqsd</h1>
    <h1>sdqdqsdsqdqsd</h1>
    <h1>sdqdqsdsqdqsd</h1>
    <h1>sdqdqsdsqdqsd</h1>
    <h1>sdqdqsdsqdqsd</h1>
    <h1>sdqdqsdsqdqsd</h1>
    <h1>sdqdqsdsqdqsd</h1>
    <h1>sdqdqsdsqdqsd</h1>
    <h1>sdqdqsdsqdqsd</h1>
    <h1>sdqdqsdsqdqsd</h1>
    <h1>sdqdqsdsqdqsd</h1>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        window.onscroll = function() {
            var navbar = document.querySelector('.navbar');
            if (window.pageYOffset > 50) { // Ajustez la valeur selon vos besoins
                navbar.classList.add('navbar-scrolled'); // Ajouter la classe pour changer la couleur
            } else {
                navbar.classList.remove('navbar-scrolled'); // Retirer la classe
            }
        };
    </script>
</body>

</html>
