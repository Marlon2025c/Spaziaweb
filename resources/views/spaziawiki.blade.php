@extends('layouts.app')
@section('title', 'Spazia - Wiki')
@section('content')

    <style>
        /* ─── Fond général (même dégradé que le hero de la home) ────── */
        .wk-shell {
            position: relative;
            background: #0a0a10;
            padding: 100px 5% 6rem;
        }
        .wk-shell-gradient {
            position: absolute; inset: 0; z-index: 0;
            background:
                radial-gradient(ellipse 70% 50% at 12% 8%, rgba(249,115,22,.16) 0%, transparent 55%),
                radial-gradient(ellipse 55% 45% at 88% 25%, rgba(34,197,94,.12) 0%, transparent 55%),
                radial-gradient(ellipse 90% 70% at 50% 100%, rgba(16,185,129,.08) 0%, transparent 50%),
                #0a0a10;
        }
        .wk-shell-grid {
            position: absolute; inset: 0; z-index: 0;
            background-image: radial-gradient(circle, rgba(255,255,255,.05) 1px, transparent 1px);
            background-size: 40px 40px;
            mask-image: radial-gradient(ellipse 90% 60% at 50% 0%, black 40%, transparent 100%);
            -webkit-mask-image: radial-gradient(ellipse 90% 60% at 50% 0%, black 40%, transparent 100%);
        }
        .wk-shell > .row { position: relative; z-index: 1; }

        /* ─── Carte sidebar ─────────────────────────────────────── */
        .wk-sidebar-card {
            background: rgba(255,255,255,.03);
            border: 1px solid rgba(255,255,255,.07);
            border-radius: 18px;
            padding: 1.25rem 1rem;
            position: sticky;
            top: 125px;
            max-height: calc(100vh - 145px);
            overflow-y: auto;
        }

        .wk-sidebar-card::-webkit-scrollbar {
            width: 8px;
        }

        .wk-sidebar-card::-webkit-scrollbar-track {
            background: transparent;
        }

        .wk-sidebar-card::-webkit-scrollbar-thumb {
            background-color: #f97316;
            border-radius: 10px;
        }

        .sidebar h6 {
            font-size: .78rem;
            text-transform: uppercase;
            letter-spacing: .12em;
            font-weight: 700;
            color: #fb923c;
            margin-top: 18px;
            margin-bottom: 8px;
            padding-left: 10px;
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,.75);
            padding: 6px 10px;
            border-radius: 8px;
            transition: background .2s, color .2s;
        }

        .sidebar .nav-link:hover {
            background: rgba(249,115,22,.08);
            color: #fb923c;
        }

        .sidebar .nav-link.active {
            background: rgba(249,115,22,.12);
            color: #fb923c;
            font-weight: 600;
        }

        .accordion-button {
            background-color: transparent;
            color: rgba(255,255,255,.85);
            box-shadow: none !important;
            padding: 8px 10px;
            font-size: 0.95rem;
            border-radius: 8px;
        }

        .accordion-button:hover {
            background-color: rgba(249,115,22,.08);
            color: #fb923c;
        }

        .accordion-button:not(.collapsed) {
            background-color: rgba(249,115,22,.12);
            border-radius: 8px 8px 0 0;
            color: #fb923c;
            box-shadow: none !important;
        }

        .accordion-body {
            background-color: rgba(255,255,255,.02);
            border-radius: 0 0 8px 8px;
        }

        .accordion-body a {
            display: block;
            padding: 6px 10px;
            font-size: 0.9rem;
            text-decoration: none;
            color: rgba(255,255,255,.7);
            border-radius: 6px;
            transition: background .2s, color .2s;
        }

        .accordion-body a:hover {
            background-color: rgba(249,115,22,.08);
            color: #fb923c;
        }

        .accordion-body a.active {
            background-color: rgba(249,115,22,.14);
            color: #fb923c;
            font-weight: 600;
        }

        .accordion-button::after {
            transition: transform 0.2s ease-in-out;
            filter: invert(63%) sepia(53%) saturate(1274%) hue-rotate(337deg) brightness(101%) contrast(96%);
        }

        .accordion-button:not(.collapsed)::after {
            transform: rotate(180deg);
        }

        .article_top {
            padding-top: 0;
        }

        /* Appliquer sur les sous-accordéons */
        .accordion .accordion .accordion-button {
            font-size: 0.9rem;
            padding: 6px 12px;
        }

        .accordion .accordion .accordion-body a {
            font-size: 0.85rem;
            padding: 4px 14px;
        }

        .accordion-body-custom {
            padding: 0px
        }

        /* Enlève la bordure de l’item */
        .accordion-item {
            border: none;
            background-color: transparent;
        }

        /* Icônes toujours alignées */
        .accordion-button {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* Pour Chrome, Edge, Safari (scrollbar navigateur ou menu) */
        html::-webkit-scrollbar {
            width: 12px;
        }

        html::-webkit-scrollbar-track {
            background: #101015;
        }

        html::-webkit-scrollbar-thumb {
            background-color: #f97316;
            border-radius: 10px;
            border: 2px solid #101015;
        }

        html::-webkit-scrollbar-thumb:hover {
            background-color: #ea580c;
        }

        /* Pour Firefox */
        html {
            scrollbar-width: thin;
            scrollbar-color: #f97316 #101015;
        }

        /* ─── Carte contenu article ─────────────────────────────── */
        .wk-content-card {
            background: rgba(255,255,255,.03);
            border: 1px solid rgba(255,255,255,.07);
            border-radius: 18px;
            padding: 2rem;
            min-height: 300px;
            color: rgba(255,255,255,.8);
        }

        .wk-content-card img.img-fluid { border-radius: 12px; }

        .wk-content-card p, .wk-content-card li { color: rgba(255,255,255,.75); line-height: 1.8; }

        .wk-content-card a { color: #fb923c; }

        .wk-content-card h1, .wk-content-card h2, .wk-content-card h3,
        .wk-content-card h4, .wk-content-card h5, .wk-content-card h6 { color: #fff; font-weight: 800; }

        @media (max-width: 767px) {
            .wk-sidebar-card { position: static; margin-bottom: 2rem; }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <div class="wk-shell">
    <div class="wk-shell-gradient"></div>
    <div class="wk-shell-grid"></div>
    <div class="row article_top caracterefont containerahover" style="max-width: 100%;">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar caracterefont p-0">
            <div class="wk-sidebar-card">
                <div class="accordion" id="accordionMainWiki">
                    <h6>Règlements</h6>
                    <ul class="nav flex-column mb-2">
                        <li><a class="nav-link ajax-link" href="{{ route('wiki.show', 'reglement-en-jeu') }}">💡Règlement en
                                jeu</a></li>
                        <li><a class="nav-link ajax-link" href="{{ route('wiki.show', 'reglement-discord') }}">💡Règlement
                                Discord</a></li>
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

                            <h6>Métiers</h6>
                            <!-- Culture -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingCulture">
                                    <a class="accordion-button collapsed ajax-link" style="text-decoration: none;"
                                        href="{{ route('wiki.show', 'batiments-metiers') }}" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseCulture" aria-expanded="false"
                                        aria-controls="collapseCulture">
                                        👷🏼 Batiment-Métiers
                                    </a>
                                </h2>
                                        <div id="collapseCulture" class="accordion-collapse collapse" data-bs-parent="#accordionMainWiki">
                                            <div class="accordion-body  accordion-body-custom">

                                                <!-- sous-accordion -->
                                                <div class="accordion " id="accordionBatimentsMetiers">

                                                    <!-- Sous catégorie 1 -->
                                                    <div class="accordion-item" >
                                                        <h2 class="accordion-header" id="headingBasique">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseBasique"
                                                                aria-expanded="false" aria-controls="collapseBasique">
                                                                🏗️ Basique
                                                            </button>
                                                        </h2>
                                                        <div id="collapseBasique" class="accordion-collapse collapse" data-bs-parent="#accordionBatimentsMetiers">
                                                            <div class="accordion-body">
                                                                <a class="ajax-link" data-slug="ecognome-basique" href="{{ route('wiki.show', '1-maconnerie') }}">🧱 1. Maconnerie</a>
                                                                <a class="ajax-link" data-slug="ecognome-basique" href="{{ route('wiki.show', '2-menuiserie') }}">🪚 2. Menuiserie</a>
                                                                <a class="ajax-link" data-slug="ecognome-basique" href="{{ route('wiki.show', '3-agriculture') }}">🌾 3. Agriculture</a>
                                                                <a class="ajax-link" data-slug="ecognome-basique" href="{{ route('wiki.show', '4-boucherie') }}">🥩 4. Boucherie</a>
                                                                <a class="ajax-link" data-slug="ecognome-basique" href="{{ route('wiki.show', '5-poissonnier') }}">🐟 5. Poissonnier</a>
                                                                <a class="ajax-link" data-slug="ecognome-basique" href="{{ route('wiki.show', '6-couturier') }}">🧵 6. Couturier</a>
                                                                <a class="ajax-link" data-slug="ecognome-basique" href="{{ route('wiki.show', '7-ingénieur-basique') }}">🪛 7. Ingénieur basique</a>
                                                                <a class="ajax-link" data-slug="ecognome-basique" href="{{ route('wiki.show', '8-constructeur-navale') }}">⚓ 8. Constructeur navale</a>
                                                                <a class="ajax-link" data-slug="ecognome-basique" href="{{ route('wiki.show', '9-fondeur') }}">🔥 9. Fondeur</a>
                                                                <a class="ajax-link" data-slug="ecognome-basique" href="{{ route('wiki.show', 'brasseur') }}">🍺 10. Brasseur</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Sous catégorie 2 -->
                                                    <div class="accordion-item ">
                                                        <h2 class="accordion-header" id="headingAvancee">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseAvancee"
                                                                aria-expanded="false" aria-controls="collapseAvancee">
                                                                🛠️ Avancée
                                                            </button>
                                                        </h2>
                                                        <div id="collapseAvancee" class="accordion-collapse collapse"data-bs-parent="#accordionBatimentsMetiers" >
                                                            <div class="accordion-body">
                                                                <a class="ajax-link" href="{{ route('wiki.show', '10-engrais') }}">🧪 11. Engrais</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '12-mouture') }}">🥣 12. Mouture</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '13-forgeron') }}">🔨 13. Forgeron</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '15-travail-du-verre') }}">🪟 14. Travail du verre</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '16-cuisine') }}">🍽 15. Cuisine</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '17-boulangerie') }}">🍞16.Boulangerie</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '14-poterie') }}">🏺 17. Poterie</a>
                                                                <!-- <a class="ajax-link" href="{{ route('wiki.show', '11-agent-de-Tri') }}">🗑 Ingénieur avancée</a> -->
                                                                <a class="ajax-link" href="{{ route('wiki.show', '19-mécanicien') }}">⚙18.Mécanicien</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', 'recycleur') }}">🧬 19. Recycleur</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '18-peinture') }}">🖼 20. Peinture</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '20-production-de-papier') }}">🧻 21. Production de Papier</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '21-barman') }}">🍹 22. Barman</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingModerne">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseModerne"
                                                                aria-expanded="false" aria-controls="collapseModerne">
                                                                🛠️ Moderne
                                                            </button>
                                                        </h2>
                                                        <div id="collapseModerne" class="accordion-collapse collapse" data-bs-parent="#accordionBatimentsMetiers">
                                                            <div class="accordion-body ">
                                                                <a class="ajax-link" href="{{ route('wiki.show', '27-composite') }}">🌳 23. Composite</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '28-maconnerie-avancée') }}">🔨 24. Maconnerie avancée</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '23-fonte-avancée') }}">🔥 25. Fonte avancée</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '22-forage-pétrolier') }}">🛢 26. Forage pétrolier</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '25-cuisine-avancée') }}">🥘 27. Cuisine avancée</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '26-boulangerie-avancée') }}">🥐28. Boulangerie avancée</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '29-industriel') }}">🏭 29. Industriel</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '30-électronique') }}">⚡30. Électronique</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div><!-- /sub-accordion -->

                                            </div>
                                        </div>

                                        
                            </div>
                            <h6>Niveaux de Ville</h6>
                            <!-- Culture -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingCulture">
                                    <a class="accordion-button collapsed ajax-link" style="text-decoration: none;"
                                        href="{{ route('wiki.show', 'batiments-metiers') }}" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseNVVILLE" aria-expanded="false"
                                        aria-controls="collapseNVVILLE">
                                        🏙️ Niveaux de Ville
                                    </a>
                                </h2>
                                        <div id="collapseNVVILLE" class="accordion-collapse collapse" data-bs-parent="#accordionMainWiki">
                                            <div class="accordion-body">

                                                <!-- sous-accordion -->
                                                <div class="accordion " id="accordionNVVILLE">

                                                    <!-- Sous catégorie 1 -->
                                                    <div class="accordion-item" >
                                                        <h2 class="accordion-header" id="headingBasique">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseBasique"
                                                                aria-expanded="false" aria-controls="collapseBasique">
                                                                🏗️ De 2 à 4 joueurs
                                                            </button>
                                                        </h2>
                                                        <div id="collapseBasique" class="accordion-collapse collapse" data-bs-parent="#accordionNVVILLE">
                                                            <div class="accordion-body">
                                                                <a class="ajax-link" data-slug="2-a-4-niveaux-1" href="{{ route('wiki.show', '2-a-4-niveaux-1') }}">🏚️ Niveaux 1</a>
                                                                    <a class="ajax-link" data-slug="2-a-4-niveaux-2" href="{{ route('wiki.show', '2-a-4-niveaux-2') }}">🏠 Niveaux 2</a>
                                                                    <a class="ajax-link" data-slug="2-a-4-niveaux-3" href="{{ route('wiki.show', '2-a-4-niveaux-3') }}">🏘️ Niveaux 3</a>
                                                                    <a class="ajax-link" data-slug="2-a-4-niveaux-4" href="{{ route('wiki.show', '2-a-4-niveaux-4') }}">🏙️ Niveaux 4</a>
                                                                    <a class="ajax-link" data-slug="2-a-4-niveaux-5" href="{{ route('wiki.show', '2-a-4-niveaux-5') }}">🌆 Niveaux 5</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Sous catégorie 2 -->
                                                    <div class="accordion-item ">
                                                        <h2 class="accordion-header" id="headingAvancee">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseAvancee"
                                                                aria-expanded="false" aria-controls="collapseAvancee">
                                                                🛠️ De 5 à 8 joueurs
                                                            </button>
                                                        </h2>
                                                        <div id="collapseAvancee" class="accordion-collapse collapse"data-bs-parent="#accordionNVVILLE" >
                                                            <div class="accordion-body">
                                                                <a class="ajax-link" data-slug="5-a-8-niveaux-1" href="{{ route('wiki.show', '5-a-8-niveaux-1') }}">🏚️ Niveaux 1</a>
                                                                <a class="ajax-link" data-slug="5-a-8-niveaux-2" href="{{ route('wiki.show', '5-a-8-niveaux-2') }}">🏠 Niveaux 2</a>
                                                                <a class="ajax-link" data-slug="5-a-8-niveaux-3" href="{{ route('wiki.show', '5-a-8-niveaux-3') }}">🏘️ Niveaux 3</a>
                                                                <a class="ajax-link" data-slug="5-a-8-niveaux-4" href="{{ route('wiki.show', '5-a-8-niveaux-4') }}">🏙️ Niveaux 4</a>
                                                                <a class="ajax-link" data-slug="5-a-8-niveaux-5" href="{{ route('wiki.show', '5-a-8-niveaux-5') }}">🌆 Niveaux 5</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingModerne">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseModerne"
                                                                aria-expanded="false" aria-controls="collapseModerne">
                                                                🛠️ De 9 à 16+ joueurs
                                                            </button>
                                                        </h2>
                                                        <div id="collapseModerne" class="accordion-collapse collapse" data-bs-parent="#accordionNVVILLE">
                                                            <div class="accordion-body ">
                                                                        <a class="ajax-link" data-slug="9-a-16-niveaux-1" href="{{ route('wiki.show', '9-a-16-niveaux-1') }}">🏚️ Niveaux 1</a>
                                                                        <a class="ajax-link" data-slug="9-a-16-niveaux-2" href="{{ route('wiki.show', '9-a-16-niveaux-2') }}">🏠 Niveaux 2</a>
                                                                        <a class="ajax-link" data-slug="9-a-16-niveaux-3" href="{{ route('wiki.show', '9-a-16-niveaux-3') }}">🏘️ Niveaux 3</a>
                                                                        <a class="ajax-link" data-slug="9-a-16-niveaux-4" href="{{ route('wiki.show', '9-a-16-niveaux-4') }}">🏙️ Niveaux 4</a>
                                                                        <a class="ajax-link" data-slug="9-a-16-niveaux-5" href="{{ route('wiki.show', '9-a-16-niveaux-5') }}">🌆 Niveaux 5</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div><!-- /sub-accordion -->

                                            </div>
                                        </div>

                                        
                            </div>    
                        <h6>MODS CUSTOM</h6>
                        <div class="accordion" id="accordionPanelsItemsduSpaziamod">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingItemsMachinesCustom">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#notationSidebarItemsMachinesCustom" aria-expanded="false"
                                        aria-controls="notationSidebarItemsMachinesCustom">
                                        📖 Items & Machines Custom
                                    </button>
                                </h2>
                                <div id="notationSidebarItemsMachinesCustom" class="accordion-collapse collapse" data-bs-parent="#accordionMainWiki">
                                    <div class="accordion-body">
                                        <a class="ajax-link" href="{{ route('wiki.show', 'recette-modifier') }}">Recette Modifier</a>
                                        <a class="ajax-link" href="{{ route('wiki.show', 'nouveautés') }}">Nouveautés</a>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingMetiersCustom">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#notationSidebarMetiersCustom" aria-expanded="false"
                                        aria-controls="notationSidebarMetiersCustom">
                                        🛠️ Métiers Custom
                                    </button>
                                </h2>
                                <div id="notationSidebarMetiersCustom" class="accordion-collapse collapse" data-bs-parent="#accordionMainWiki">
                                    <div class="accordion-body">
                                        <a class="ajax-link" href="{{ route('wiki.show', 'chercheur-spaziamod') }}">🔬 Chercheur</a>
                                        <a class="ajax-link" href="{{ route('wiki.show', 'brasseur-spaziamod') }}">🍺 Brasseur</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="col-md-9 col-lg-8" style="padding-left: 5%;">
            <div class="wk-content-card" id="wiki-content">
                @include('wiki._content', ['article' => $article ?? null, 'message' => $message ?? null])
            </div>
        </div>
    </div>
    </div>

    <script>
        document.addEventListener('click', function(e) {
            const link = e.target.closest('a.ajax-link');
            if (!link) return;

            e.preventDefault();

            // Supprime toutes les classes 'active'
            document.querySelectorAll('.accordion-body a.active, .nav-link.active').forEach(a => a.classList.remove('active'));

            // Ajoute 'active' au lien cliqué
            link.classList.add('active');
            // Détruire Summernote si présent
            if ($('#summernote').length) {
                $('#summernote').summernote('destroy');
            }
            fetch(link.href, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.text())
            .then(html => {
                document.getElementById('wiki-content').innerHTML = html;
                window.history.pushState({}, '', link.href);
            })
            .catch(err => console.error(err));
        });

    </script>

    <script>
        document.querySelectorAll('.accordion-collapse').forEach(collapse => {
            collapse.addEventListener('hidden.bs.collapse', function () {
                collapse.querySelectorAll('a.ajax-link.active').forEach(a => a.classList.remove('active'));
            });
        });
    </script>

@endsection
