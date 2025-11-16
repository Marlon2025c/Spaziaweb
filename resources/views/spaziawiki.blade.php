@extends('layouts.app')
@section('title', 'Spazia - Accueil')
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
                                                                <a class="ajax-link" href="{{ route('wiki.show', '10-engrais') }}">🧪 10. Engrais</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '12-mouture') }}">🥣 11. Mouture</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '13-forgeron') }}">🔨 12. Forgeron</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '15-travail-du-verre') }}">🪟 13. Travail du verre</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '16-cuisine') }}">🍽 14. Cuisine</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '17-boulangerie') }}">🍞15.Boulangerie</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '14-poterie') }}">🏺 16. Poterie</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '11-agent-de-Tri') }}">🗑 17. Ingénieur avancée</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '19-mécanicien') }}">⚙18.Mécanicien</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '18-peinture') }}">🖼 19. Peinture</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '20-production-de-papier') }}">🧻 20. Production de Papier</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '21-barman') }}">🍹 21. Barman</a>
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
                                                                <a class="ajax-link" href="{{ route('wiki.show', '27-composite') }}">🌳 22. Composite</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '28-maconnerie-avancée') }}">🔨 23. Maconnerie avancée</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '23-fonte-avancée') }}">🔥 24. Fonte avancée</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '22-forage-pétrolier') }}">🛢 25. Forage pétrolier</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '25-cuisine-avancée') }}">🥘 26. Cuisine avancée</a>
                                                                <a class="ajax-link" href="{{ route('wiki.show', '26-boulangerie-avancée') }}">🥐27. Boulangerie avancée</a> 
                                                                <a class="ajax-link" href="{{ route('wiki.show', '24-bio-chimiste') }}">🧬 28. Bio chimiste</a>                             
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
                                                                @if (Auth::check())
                                                                     @if (Auth()->user()->hasRole([7, 8]))
                                                                        <a class="ajax-link" data-slug="2-a-4-niveaux-4" href="{{ route('wiki.show', '2-a-4-niveaux-4') }}">🏙️ Niveaux 4</a>
                                                                        <a class="ajax-link" data-slug="2-a-4-niveaux-5" href="{{ route('wiki.show', '2-a-4-niveaux-5') }}">🌆 Niveaux 5</a>
                                                                    @endif
                                                                @endif
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
                                                                @if (Auth::check())
                                                                     @if (Auth()->user()->hasRole([7, 8]))
                                                                        <a class="ajax-link" data-slug="5-a-8-niveaux-4" href="{{ route('wiki.show', '5-a-8-niveaux-4') }}">🏙️ Niveaux 4</a>
                                                                        <a class="ajax-link" data-slug="5-a-8-niveaux-5" href="{{ route('wiki.show', '5-a-8-niveaux-5') }}">🌆 Niveaux 5</a>
                                                                    @endif
                                                                @endif
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
                                                                @if (Auth::check())
                                                                     @if (Auth()->user()->hasRole([7, 8]))
                                                                        <a class="ajax-link" data-slug="9-a-16-niveaux-4" href="{{ route('wiki.show', '9-a-16-niveaux-4') }}">🏙️ Niveaux 4</a>
                                                                        <a class="ajax-link" data-slug="9-a-16-niveaux-5" href="{{ route('wiki.show', '9-a-16-niveaux-5') }}">🌆 Niveaux 5</a>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div><!-- /sub-accordion -->

                                            </div>
                                        </div>

                                        
                            </div>    
                        <h6>ITEMS ET MACHINES</h6>
                        <div class="accordion" id="accordionPanelsItemsduSpaziamod">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingGestion">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#notationSidebarItemsduSpaziamod" aria-expanded="false"
                                        aria-controls="notationSidebarItemsduSpaziamod">
                                        📖 Items du Spaziamod
                                    </button>

                                </h2>
                                <div id="notationSidebarItemsduSpaziamod" class="accordion-collapse collapse" data-bs-parent="#accordionMainWiki">
                                    <div class="accordion-body">
                                        <a class="ajax-link" href="{{ route('wiki.show', 'recette-modifier') }}">Recette Modifier</a>
                                        <a class="ajax-link" href="{{ route('wiki.show', 'nouveautés') }}">Nouveautés</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="col-md-6" style="padding-left: 5%;" id="wiki-content">
            @if (isset($article) || isset($articles))
                @include('wiki._content', ['article' => $article ?? null, 'articles' => $articles ?? null])
            @else
                {{-- Au cas où on arrive direct sur un slug via URL --}}
                @php
                    $slug = request()->route('slug');
                    $article = $slug ? \App\Models\WikiArticle::where('slug', $slug)->first() : null;
                    $articles = !$article ? \App\Models\WikiArticle::orderBy('id', 'desc')->paginate(10) : null;
                @endphp
            @endif
        </div>
        <div class="col-md-3"></div>
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
