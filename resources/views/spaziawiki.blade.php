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
    .sidebar .nav-link.active {
        color: orangered;
    }
    .accordion-button {
        background-color: transparent !important;  /* plus de fond blanc */
        color: inherit;                            /* garde ta couleur de texte */
        box-shadow: none !important;               /* enlève l’ombre */
        padding: 6px 6px 6px 6px;
        font-size: 0.95rem;
    }
    .accordion-button:not(.collapsed) {
        color: orangered;
        background-color: #101015; 
        box-shadow: none !important;
    }
    .accordion-body{
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
    .article_top{
        padding-top: 70px;
    }

        /* Appliquer sur les sous-accordéons */
    .accordion .accordion .accordion-button {
    font-size: 0.95rem;         /* même taille que ton premier niveau */
    padding: 8px 15px;          /* même padding */
    }

    .accordion .accordion .accordion-body a {
    font-size: 0.9rem;
    padding: 4px 10px;
    }
    .accordion-body-custom{
        padding: 0px
    }
    .accordion-button:hover{
        background-color: aquamarine  
    }
/* Enlève la bordure de l’item */
.accordion-item {
  border: none;
  background-color: transparent;  /* si tu veux tout transparent */
}

/* Effet hover même quand il est ouvert */
.accordion-button:not(.collapsed):hover {
  background-color: rgb(148, 148, 148, 0.3);
  color: orangered;
}

/* Effet hover sur tout l'item */
.accordion-item:hover {
  background-color: rgb(148, 148, 148, 0.3);  /* fond au survol */
  font-size: 50px;
  border-radius: 10px;         /* optionnel : coins arrondis */
}

/* Pour Chrome, Edge, Safari (scrollbar navigateur ou menu) */
html::-webkit-scrollbar {
    width: 12px; /* largeur du scroll */
}

html::-webkit-scrollbar-track {
    background: #101015; /* fond */
}

html::-webkit-scrollbar-thumb {
    background-color: orange; /* curseur */
    border-radius: 10px;
    border: 2px solid #101015; /* bordure autour du curseur */
}

html::-webkit-scrollbar-thumb:hover {
    background-color: darkorange; /* hover */
}

/* Pour Firefox */
html {
    scrollbar-width: thin;            /* taille fine */
    scrollbar-color: orange #101015;  /* curseur / track */
}

</style>
<div class="row article_top caracterefont containerahover" style="max-width: 100%; padding-left: 5%;">
    <nav class="col-md-3 col-lg-2 d-md-block sidebar caracterefont p-0 ">
        <div class="position-fixed p-3 overflow-auto" style="min-height: 100vh;
                        max-height: 100px;
                height: 200px;
        overflow-y: scroll;">
            <h6>Règlements</h6>
            <ul class="nav flex-column mb-2">
                <li><a class="nav-link ajax-link" href="{{ route('wiki.show', 'reglement-en-jeu') }}">💡Règlement en jeu</a></li>
                <li><a class="nav-link ajax-link" href="{{ route('wiki.show', 'reglement-discord') }}">💡Règlement Discord</a></li>
            </ul>

            <h6>GAMEPLAY</h6>
            <div class="accordion" id="accordionPanelsTutorielspratiquess">
                <div class="accordion-item containerahover">
                    <h2 class="accordion-header" id="headingGestion">
                        <button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#notationSidebarEcognome"
                                aria-expanded="false" aria-controls="notationSidebarEcognome">
                            📖 EcoGnome
                        </button>
                    </h2>
                    <div id="notationSidebarEcognome" class="accordion-collapse collapse" data-bs-parent="#notationSidebarEcognome">
                        <div class="accordion-body">
                            <a class="ajax-link" href="{{ route('wiki.show', 'ecognomebasique') }}">EcoGnome Basique</a>
                            <a class="ajax-link" href="{{ route('wiki.show', 'ecognomeavancer') }}">EcoGnome Avancer</a>
                        </div>
                    </div>
                </div>
            </div>    
            <ul class="nav flex-column mb-2">
                <li><a class="nav-link ajax-link" href="{{ route('wiki.show', 'prix-mininum') }}">🏠 Prix Mininum</a></li>
            </ul>
            <div class="accordion" id="accordionPanelsTutorielspratiques">

                <div class="accordion-item containerahover">
                        <h2 class="accordion-header" id="headingGestion">
                            <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#Tutorielspratiques"
                                    aria-expanded="false" aria-controls="Tutorielspratiques">
                                📋Tutoriels pratiques
                            </button>
                        </h2>
                        <div id="Tutorielspratiques" class="accordion-collapse collapse" data-bs-parent="#Tutorielspratiques">
                            <div class="accordion-body">
                                <a class="ajax-link" href="{{ route('wiki.show', 'quetedemétier') }}">Quête de métier</a>
                                <a class="ajax-link" href="{{ route('wiki.show', 'personnaliserdesaffiches') }}">Personnaliser des affiches</a>
                            </div>
                        </div>
                </div>    
            </div>
            <div class="accordion" id="accordionPanelsLois">
                <div class="accordion-item containerahover">
                    <h2 class="accordion-header" id="headingGestion">
                        <button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#notationSidebarLois"
                                aria-expanded="false" aria-controls="notationSidebarLois">
                            🛠️ Lois
                        </button>
                    </h2>
                    <div id="notationSidebarLois" class="accordion-collapse collapse" data-bs-parent="#notationSidebarLois">
                        <div class="accordion-body">
                            <a class="ajax-link" href="{{ route('wiki.show', 'activite') }}">Activité</a>
                            <a class="ajax-link" href="{{ route('wiki.show', 'culture') }}">Culture</a>
                        </div>
                    </div>
                </div>
            </div>
                <ul class="nav flex-column mb-2">
                    <li><a class="nav-link ajax-link" href="{{ route('wiki.show', 'fédaration') }}">🏠 Fédaration</a></li>
                </ul>
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item containerahover">
                    <h2 class="accordion-header" id="headingGestion">
                        <button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#notationSidebar"
                                aria-expanded="false" aria-controls="notationSidebar">
                            🛠️ Notation
                        </button>
                    </h2>
                    <div id="notationSidebar" class="accordion-collapse collapse" data-bs-parent="#notationSidebar">
                        <div class="accordion-body">
                            <a class="ajax-link" href="{{ route('wiki.show', 'activite') }}">Activité</a>
                            <a class="ajax-link" href="{{ route('wiki.show', 'culture') }}">Culture</a>
                            <a class="ajax-link" href="{{ route('wiki.show', 'gestion') }}">Gestion</a>
                            <a class="ajax-link" href="{{ route('wiki.show', 'métier') }}">Métier</a>
                            <a class="ajax-link" href="{{ route('wiki.show', 'unesco') }}">Unesco</a>
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
                        <a class="accordion-button collapsed ajax-link" style="text-decoration: none;" href="{{ route('wiki.show', 'batiment-metiers') }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCulture" aria-expanded="false" aria-controls="collapseCulture">
                            👷🏼・𝐁𝐚𝐭𝐢𝐦𝐞𝐧𝐭𝐬-𝐌𝐞𝐭𝐢𝐞𝐫𝐬
                        </a>
                    </h2>
                    <div id="collapseCulture" class="accordion-collapse collapse" data-bs-parent="#notationSidebar">
                        <div class="accordion-body accordion-body-custom">

                        <!-- sous-accordion -->
                        <div class="accordion" id="subCultureAccordion">

                            <!-- Sous catégorie 1 -->
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSousCat1">
                                <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseSousCat1"
                                        aria-expanded="false" aria-controls="collapseSousCat1">
                                🏗️ Basique
                                </button>
                            </h2>
                            <div id="collapseSousCat1" class="accordion-collapse collapse"
                                data-bs-parent="#subCultureAccordion">
                                <div class="accordion-body">
                                    <a class="ajax-link" href="{{ route('wiki.show', 'maconnerie') }}">🧱 1. Maconnerie</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🪚 2. Menuiserie</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🌾 3. Agriculture</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🥩 4. Boucherie</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🐟 5. Poissonnier</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🧵 6. Couturier</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🪛 7. Ingénieur basique</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">⚓ 8. Constructeur navale</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🔥 9. Fondeur</a>
                                </div>
                            </div>
                            </div>

                            <!-- Sous catégorie 2 -->
                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSousCat2">
                                <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseSousCat2"
                                        aria-expanded="false" aria-controls="collapseSousCat2">
                                🛠️ Avancée
                                </button>
                            </h2>
                            <div id="collapseSousCat2" class="accordion-collapse collapse"
                                data-bs-parent="#subCultureAccordion">
                                <div class="accordion-body">
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🧪 10. Engrais</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🗑 11. Agent de Tri</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🥣 12. Mouture</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🔨 13. Forgeron</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🏺 14. Poterie</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🪟 15. Travail du verre</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🍽 16. Cuisine</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🍞17. Boulangerie</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">⚙19. Mécanicien</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🧻 20. Production de Papier</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🍹 21. Barman</a>
                                </div>
                            </div>
                            </div>

                            <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSousCat3">
                                <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseSousCat3"
                                        aria-expanded="false" aria-controls="collapseSousCat3">
                                🛠️ Moderne
                                </button>
                            </h2>
                            <div id="collapseSousCat3" class="accordion-collapse collapse"
                                data-bs-parent="#subCultureAccordion">
                                <div class="accordion-body">
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🛢 22. Forage pétrolier</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🔥 23. Fonte avancée</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🧬 24. Bio chimiste</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🥘 25. Cuisine avancée</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🥐26. Boulangerie avancée</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🌳 27. Composite</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🔨 28. Maconnerie avancée</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">🏭 29. Industriel</a>
                                    <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-2') }}">⚡30. Électronique</a>
                                </div>
                            </div>
                        </div>

                    </div><!-- /sub-accordion -->

                    </div>
                </div>
            </div>
            <h6>ITEMS ET MACHINES</h6>
            <div class="accordion" id="accordionPanelsItemsduSpaziamod">
                <div class="accordion-item containerahover">
                    <h2 class="accordion-header" id="headingGestion">
                        <button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#notationSidebarItemsduSpaziamod"
                                aria-expanded="false" aria-controls="notationSidebarItemsduSpaziamod">
                            📖 Items du Spaziamod
                        </button>
                        
                    </h2>
                    <div id="notationSidebarItemsduSpaziamod" class="accordion-collapse collapse" data-bs-parent="#notationSidebarItemsduSpaziamod">
                        <div class="accordion-body">
                            <a class="ajax-link" href="{{ route('wiki.show', 'activite') }}">Activité</a>
                            <a class="ajax-link" href="{{ route('wiki.show', 'culture') }}">Culture</a>
                        </div>
                    </div>
                </div>
            </div>
    </nav>
    <div class="col-md-6 " style="padding-left: 5%;" id="wiki-content" >
        @if(isset($article))
            {{-- Page article --}}
            <h1>{{ $article->title }}</h1>
            @if($article->image)
                <img src="{{ asset('storage/'.$article->image) }}" alt="{{ $article->title }}" class="img-fluid mb-3">
            @endif
            <div>{!! $article->content !!}</div>
            @if (Auth::user()->role === '2')
                <a href="{{ route('wiki.edit', $article->slug) }}">Modifier</a>
            @endif

        @elseif(isset($articles))
            {{-- Page liste --}}
            <h1>Derniers articles</h1>
            @foreach($articles as $art)
                <h2><a class="ajax-link" href="{{ route('wiki.show',$art->slug) }}">{{ $art->title }}</a></h2>
                <p>{{ Str::limit(strip_tags($art->content),150) }}</p>
            @endforeach

            {{ $articles->links() }}
        @endif
    </div>
    <div class="col-md-3"></div>
</div>

<script>
document.addEventListener('click', function (e) {
    const link = e.target.closest('a.ajax-link'); // on ne prend que les liens AJAX
    if (!link) return;

    e.preventDefault();

    fetch(link.href, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(res => res.text())
    .then(html => {
        document.getElementById('wiki-content').innerHTML = html;
        window.history.pushState({}, '', link.href); // mettre à jour l'URL sans reload
    })
    .catch(err => console.error(err));
});

// gérer l'historique (retour navigateur)
window.addEventListener('popstate', function () {
    fetch(window.location.href, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(res => res.text())
    .then(html => {
        document.getElementById('wiki-content').innerHTML = html;
    });
});
</script>


@endsection
