@extends('layouts.app')
@section('title', 'Spazia - DashboardV2')
@section('content')


    <style>
        .sidebar h6 {
            font-size: 0.9rem;
            text-transform: uppercase;
            margin-top: 15px;
            margin-bottom: 10px;
            padding-left: 10px;
        }

        .sidebar .nav-link {
            color: white;
            padding: 6px 6px 6px 6px;
        }


        .accordion-button {
            background-color: transparent;
            /* plus de fond blanc */
            color: inherit;
            /* garde ta couleur de texte */
            box-shadow: none !important;
            /* enlève l’ombre */
            padding: 6px 6px 6px 6px;
            font-size: 0.95rem;
        }

        .accordion-button:not(.collapsed) {
            background-color: rgb(148, 148, 148, 0.3);
            border-radius: 10px 10px 0px 0px;
            color: orangered;
            box-shadow: none !important;
        }


        .accordion-body {
            background-color: #101015;
        }

        .accordion-body a {
            display: block;
            padding: 6px 6px 6px 6px;
            font-size: 0.9rem;
            text-decoration: none;
            color: white;
        }

        .accordion-button::after {
            transition: transform 0.2s ease-in-out;
        }

        .accordion-button:not(.collapsed)::after {
            transform: rotate(180deg);
        }

        .article_top {
            padding-top: 70px;
        }

        /* Appliquer sur les sous-accordéons */
        .accordion .accordion .accordion-button {
            font-size: 0.95rem;
            /* même taille que ton premier niveau */
            padding: 8px 15px;
            /* même padding */
        }

        .accordion .accordion .accordion-body a {
            font-size: 0.9rem;
            padding: 4px 10px;
        }

        .accordion-body-custom {
            padding: 0px
        }


        /* Enlève la bordure de l’item */
        .accordion-item {
            border: none;
            background-color: transparent;
            /* si tu veux tout transparent */
        }

        /* Effet hover même quand il est ouvert */



        /* Pour Chrome, Edge, Safari (scrollbar navigateur ou menu) */
        html::-webkit-scrollbar {
            width: 12px;
            /* largeur du scroll */
        }

        html::-webkit-scrollbar-track {
            background: #101015;
            /* fond */
        }

        html::-webkit-scrollbar-thumb {
            background-color: orange;
            /* curseur */
            border-radius: 10px;
            border: 2px solid #101015;
            /* bordure autour du curseur */
        }

        html::-webkit-scrollbar-thumb:hover {
            background-color: darkorange;
            /* hover */
        }

        /* Pour Firefox */
        html {
            scrollbar-width: thin;
            /* taille fine */
            scrollbar-color: orange #101015;
            /* curseur / track */
        }


        

        /* Rendre les sous-catégories plus nettes */
        .accordion .accordion .accordion-button {
            font-size: 0.9rem;
            padding: 6px 12px;
        }

        /* Lien des sous-éléments */
        .accordion .accordion .accordion-body a {
            font-size: 0.85rem;
            padding: 4px 14px;
        }

        /* Icônes toujours alignées */
        .accordion-button {
            display: flex;
            align-items: center;
            gap: 6px; /* espace entre icône et texte */
        }

        .sidebar .sidebar-fixed {
        position: fixed;
        top: 70px;        /* adapte à la hauteur du header */
        bottom: 0;         /* ou calceur pour aligner avec ton layout — tu peux utiliser left: auto et right: auto si besoin */
        width: 250px;     /* adapte la largeur ou calcule-la (ex: width: 16.6667%) */
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
        padding-top: 70px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <div class="row article_top caracterefont containerahover" style="max-width: 100%; padding-left: 5%;">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar caracterefont p-0">
            <div class="sidebar-fixed">
                <div class="accordion" id="accordionMainWiki">
                    <h6>Règlements</h6>
                    <ul class="nav flex-column mb-2">
                        <li><a class="nav-link ajax-link" href="#" onclick="loadSection('home')">🏠 Accueil</a></li>
                        <li><a class="nav-link ajax-link" href="#" onclick="loadSection('users')">👤 Utilisateurs</a></li>
                        <li><a class="nav-link ajax-link" href="#" onclick="loadSection('servers')">🖥️ Serveurs</a></li>
                        <li><a class="nav-link ajax-link" href="#" onclick="loadSection('stats')">📊 Statistiques</a></li>
                    </ul>

                    <h6>GAMEPLAY</h6>
                
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#notationSidebarEcognome" aria-expanded="false"
                                aria-controls="notationSidebarEcognome">
                                📖 EcoGnome
                            </button>
                        </h2>
                        <div id="notationSidebarEcognome" class="accordion-collapse collapse" data-bs-parent="#accordionMainWiki">
                            <div class="accordion-body">
                                <a class="ajax-link" href="{{ route('wiki.show', 'ecognome-basique') }}">EcoGnome
                                    Basique</a>
                            </div>
                        </div>
                    </div>
                    <ul class="nav flex-column mb-2">
                        <li><a class="nav-link ajax-link" href="{{ route('wiki.show', 'prix-mininum') }}">🏠 Prix Mininum</a>
                        </li>
                    </ul>
                    <div class="accordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingGestion">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#Tutorielspratiques" aria-expanded="false"
                                    aria-controls="Tutorielspratiques">
                                    📋Tutoriels pratiques
                                </button>
                            </h2>
                            <div id="Tutorielspratiques" class="accordion-collapse collapse" data-bs-parent="#accordionMainWiki"
                                >
                                <div class="accordion-body">
                                    <a class="ajax-link" href="{{ route('wiki.show', 'quetedemétier') }}">Quête de métier</a>
                                    <a class="ajax-link"
                                        href="{{ route('wiki.show', 'personnaliserdesaffiches') }}">Personnaliser des
                                        affiches</a>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingGestion">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#notationSidebarLois" aria-expanded="false"
                                    aria-controls="notationSidebarLois">
                                    🛠️ Lois
                                </button>
                            </h2>
                            <div id="notationSidebarLois" class="accordion-collapse collapse" data-bs-parent="#accordionMainWiki">
                                <div class="accordion-body">
                                    <a class="ajax-link" href="{{ route('wiki.show', 'loi-route') }}">Loi Route</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'taxe') }}">Taxe</a>
                                </div>
                            </div>
                        </div>
                        <ul class="nav flex-column mb-2">
                            <li><a class="nav-link ajax-link" href="{{ route('wiki.show', 'fédaration') }}">🏠 Fédération</a></li>
                        </ul>

                        <ul class="nav flex-column mb-2">
                            <li><a class="nav-link ajax-link" href="{{ route('wiki.show', 'guide-des-unsco') }}">📜 Guide des UNSCO</a></li>
                        </ul>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingGestion">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#notationSidebar" aria-expanded="false" aria-controls="notationSidebar">
                                    🛠️ Notation
                                </button>
                            </h2>
                            <div id="notationSidebar" class="accordion-collapse collapse" data-bs-parent="#accordionMainWiki">
                                <div class="accordion-body">
                                    <a class="ajax-link" href="{{ route('wiki.show', 'activite') }}">Activité</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture') }}">Culture</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'gestion') }}">Gestion</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'métier') }}">Métier</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'unesco') }}">UNSCO</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'ecologie') }}">Ecologie</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'event') }}">Event</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'architecture') }}">Architecture</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        {!! $content !!}
        <div class="col-md-1"></div>
    </div>

<script>
function loadSection(section) {
    fetch("{{ url('/dashboardv2/load') }}/" + section, {
        headers: { "X-Requested-With": "XMLHttpRequest" }
    })
    .then(res => res.text())
    .then(html => {
        document.getElementById('dashboard-content').innerHTML = html;
    });
}
</script>

@endsection