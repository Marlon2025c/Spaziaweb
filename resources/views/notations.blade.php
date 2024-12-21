<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <title>Notation</title>
    
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
    
    @include('include.navbar')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h1>notation</h1>
</body>
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
</html>
