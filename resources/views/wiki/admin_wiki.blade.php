@extends('layouts.app')
@section('title', 'Spazia - WikiAdmin')
@section('content')
    <style>
        /* Google Font Import - Poppins */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            /* ===== Colors ===== */
            --body-color: #E4E9F7;
            --sidebar-color: #FFF;
            --primary-color: #695CFE;
            --primary-color-light: #F6F5FF;
            --toggle-color: #DDD;
            --text-color: #707070;

            /* ====== Transition ====== */
            --tran-03: all 0.2s ease;
            --tran-03: all 0.3s ease;
            --tran-04: all 0.3s ease;
            --tran-05: all 0.3s ease;
        }

        body {
            min-height: 100vh;
            background-color: var(--body-color);
            transition: var(--tran-05);
        }

        ::selection {
            background-color: var(--primary-color);
            color: #fff;
        }

        body.dark {
            --body-color: #18191a;
            --sidebar-color: #242526;
            --primary-color: #3a3b3c;
            --primary-color-light: #3a3b3c;
            --toggle-color: #fff;
            --text-color: #ccc;
        }

        /* ===== Sidebar ===== */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            padding: 10px 14px;
            background: var(--sidebar-color);
            transition: var(--tran-05);
            z-index: 100;
        }

        .sidebar.close {
            width: 88px;
        }

        /* ===== Reusable code - Here ===== */
        .sidebar li {
            height: 50px;
            list-style: none;
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .sidebar header .image,
        .sidebar .icon {
            min-width: 60px;
            border-radius: 6px;
        }

        .sidebar .icon {
            min-width: 60px;
            border-radius: 6px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .sidebar .text,
        .sidebar .icon {
            color: var(--text-color);
            transition: var(--tran-03);
        }

        .sidebar .text {
            font-size: 17px;
            font-weight: 500;
            white-space: nowrap;
            opacity: 1;
        }

        .sidebar.close .text {
            opacity: 0;
        }

        /* =========================== */

        .sidebar header {
            position: relative;
        }

        .sidebar header .image-text {
            display: flex;
            align-items: center;
        }

        .sidebar header .logo-text {
            display: flex;
            flex-direction: column;
        }

        header .image-text .name {
            margin-top: 2px;
            font-size: 18px;
            font-weight: 600;
        }

        header .image-text .profession {
            font-size: 16px;
            margin-top: -2px;
            display: block;
        }

        .sidebar header .image {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar header .image img {
            width: 40px;
            border-radius: 6px;
        }

        .sidebar header .toggle {
            position: absolute;
            top: 50%;
            right: -25px;
            transform: translateY(-50%) rotate(180deg);
            height: 25px;
            width: 25px;
            background-color: var(--primary-color);
            color: var(--sidebar-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            cursor: pointer;
            transition: var(--tran-05);
        }

        body.dark .sidebar header .toggle {
            color: var(--text-color);
        }

        .sidebar.close .toggle {
            transform: translateY(-50%) rotate(0deg);
        }

        .sidebar .menu {
            margin-top: 40px;
        }

        .sidebar li.search-box {
            border-radius: 6px;
            background-color: var(--primary-color-light);
            cursor: pointer;
            transition: var(--tran-05);
        }

        .sidebar li.search-box input {
            height: 100%;
            width: 100%;
            outline: none;
            border: none;
            background-color: var(--primary-color-light);
            color: var(--text-color);
            border-radius: 6px;
            font-size: 17px;
            font-weight: 500;
            transition: var(--tran-05);
        }

        .sidebar li a {
            list-style: none;
            height: 100%;
            background-color: transparent;
            display: flex;
            align-items: center;
            height: 100%;
            width: 100%;
            border-radius: 6px;
            text-decoration: none;
            transition: var(--tran-03);
        }

        .sidebar li a:hover {
            background-color: var(--primary-color);
        }

        .sidebar li a:hover .icon,
        .sidebar li a:hover .text {
            color: var(--sidebar-color);
        }

        body.dark .sidebar li a:hover .icon,
        body.dark .sidebar li a:hover .text {
            color: var(--text-color);
        }

        .sidebar .menu-bar {
            height: calc(100% - 55px);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow-y: scroll;
        }

        .menu-bar::-webkit-scrollbar {
            display: none;
        }

        .sidebar .menu-bar .mode {
            border-radius: 6px;
            background-color: var(--primary-color-light);
            position: relative;
            transition: var(--tran-05);
        }

        .menu-bar .mode .sun-moon {
            height: 50px;
            width: 60px;
        }

        .mode .sun-moon i {
            position: absolute;
        }

        .mode .sun-moon i.sun {
            opacity: 0;
        }

        body.dark .mode .sun-moon i.sun {
            opacity: 1;
        }

        body.dark .mode .sun-moon i.moon {
            opacity: 0;
        }

        .menu-bar .bottom-content .toggle-switch {
            position: absolute;
            right: 0;
            height: 100%;
            min-width: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            cursor: pointer;
        }

        .toggle-switch .switch {
            position: relative;
            height: 22px;
            width: 40px;
            border-radius: 25px;
            background-color: var(--toggle-color);
            transition: var(--tran-05);
        }

        .switch::before {
            content: '';
            position: absolute;
            height: 15px;
            width: 15px;
            border-radius: 50%;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            background-color: var(--sidebar-color);
            transition: var(--tran-04);
        }

        body.dark .switch::before {
            left: 20px;
        }

        .home {
            position: absolute;
            top: 0;
            top: 0;
            left: 250px;
            height: 100vh;
            width: calc(100% - 250px);
            background-color: var(--body-color);
            transition: var(--tran-05);
        }

        .home .text {
            font-size: 30px;
            font-weight: 500;
            color: var(--text-color);
            padding: 12px 60px;
        }

        .sidebar.close~.home {
            left: 78px;
            height: 100vh;
            width: calc(100% - 78px);
        }

        body.dark .home .text {
            color: var(--text-color);
        }


        .content-section {
            display: none;
        }

        .content-section.hidden {
            display: none;
        }

        .content-section:not(.hidden) {
            display: block;
        }

        .menu-links {
            padding: 0;
        }
    </style>
    <style>
        p {
            margin-top: 5px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
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

        .custom-p {
            color: white
        }

        .custom-section {
            padding: 6rem 0;
        }

        .section-title {
            margin: 0 0 1.5rem;
            font-size: 2.25rem;
            font-style: normal;
            font-weight: 700;
            line-height: 2.625rem;
        }

        .btn-secondary {
            color: #fff;
            background-color: #737373;
            border-color: #737373;
            box-shadow: 0 0 0 8px rgba(255, 255, 255, .05);
        }

        .card-darkmode {
            background-color: #14141b;
        }

        .card-darkmode-p {
            color: white
        }

        .tag-darkmode {
            color: white;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 700;
        }
    </style>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="{{ asset('img/spaziaeco logo.png') }}" alt="">
                </span>
                <div class="text logo-text">
                    <span class="name">Spazia Eco</span>
                    <span class="profession">Wiki Admin</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#" onclick="showContent('admin_commande_wiki')">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Admin Command</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#" onclick="showContent('command_chron_wiki')">
                            <i class='bx bx-bar-chart-alt-2 icon'></i>
                            <span class="text nav-text">Command chron</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#" onclick="showContent('notation_wiki')">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Notation</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#" onclick="showContent('guite_wiki')">
                            <i class='bx bx-pie-chart-alt icon'></i>
                            <span class="text nav-text">Guite</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#" onclick="showContent('bug_wiki')">
                            <i class='bx bx-heart icon'></i>
                            <span class="text nav-text">BUG</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#" onclick="showContent('liste_staff')">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">Liste staff</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>
                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>

            </div>
        </div>
    </nav>
    <section class="home">
        <div class="content-section" id="admin_commande_wiki" style="padding: 12px 60px;">
            <h2>Wiki des Commandes Admin</h2>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Commande</th>
                        <th scope="col">Commande rapide</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($adminCommands->where('group', 'Admin') as $adminCommands)
                        <tr>
                            <td>{{ $adminCommands->command }}</td>
                            <td>{{ $adminCommands->quick_command }}</td>
                            <td>{{ $adminCommands->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="text content-section hidden" id="command_chron_wiki">
            <h2>Command chron</h2>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Commande</th>
                        <th scope="col">Commande rapide</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($adminCommands->where('group', 'chron') as $adminCommands)
                        <tr>
                            <td>{{ $adminCommands->command }}</td>
                            <td>{{ $adminCommands->quick_command }}</td>
                            <td>{{ $adminCommands->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="text content-section hidden" id="notation_wiki">Wiki des Notation</div>
        <div class="text content-section hidden" id="guite_wiki">Guide du Petit Modo</div>
        <div class="text content-section hidden" id="bug_wiki">Wiki de bug connus</div>
        <div class="text content-section hidden" id="liste_staff">Liste de Staff</div>
    </section>
    <script>
        function showContent(sectionId) {
            // Hide all content sections
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.add('hidden');
            });

            // Show the selected content section
            document.getElementById(sectionId).classList.remove('hidden');
        }
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");


        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        })

        searchBtn.addEventListener("click", () => {
            sidebar.classList.remove("close");
        })

        modeSwitch.addEventListener("click", () => {
            body.classList.toggle("dark");

            if (body.classList.contains("dark")) {
                modeText.innerText = "Light mode";
            } else {
                modeText.innerText = "Dark mode";

            }
        });
    </script>
@endsection
