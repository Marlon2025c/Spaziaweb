@extends('layouts.app')
@section('title', 'Spazia - Accueil')
@section('content')

<style>
    body {
        background-color: #f8f9fa;
    }
    .sidebar {
        min-height: 100vh;
        border-right: 1px solid #ddd;
    }
    .sidebar h6 {
        font-size: 0.9rem;
        text-transform: uppercase;
        color: #666;
        margin-top: 15px;
        margin-bottom: 10px;
        padding-left: 10px;
    }
    .sidebar .nav-link {
        color: #333;
        padding: 8px 15px;
    }
    .sidebar .nav-link.active {
        background-color: #0d6efd;
        color: white;
    }
    .accordion-button {
        background-color: transparent;
        color: #333;
        padding: 8px 15px;
        font-size: 0.95rem;
    }
    .accordion-button:not(.collapsed) {
        background-color: #0d6efd;
        color: white;
    }
    .accordion-body a {
        display: block;
        padding: 6px 20px;
        font-size: 0.9rem;
        text-decoration: none;
        color: #555;
    }
    .accordion-body a:hover {
        background-color: #f1f1f1;
        color: #000;
    }
    .accordion-button::after {
        transition: transform 0.2s ease-in-out;
    }
    .accordion-button:not(.collapsed)::after {
        transform: rotate(180deg);
    }
    .article_top{
        padding-top: 50px;
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

</style>

<div class="row article_top">
    <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
        <div class="position-sticky p-3">
            <h6>Navigation</h6>
            <ul class="nav flex-column mb-2">
                <li><a class="nav-link" href="{{ route('home') }}">🏠 Accueil</a></li>
            </ul>

            <h6>GAMEPLAY</h6>
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingGestion">
                        <button class="accordion-button" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseGestion"
                                aria-expanded="true" aria-controls="collapseGestion">
                            🛠️ Notation
                        </button>
                    </h2>
                    <div id="collapseGestion" class="accordion-collapse collapse" data-bs-parent="#notationSidebar">
                        <div class="accordion-body">
                            <a class="ajax-link" href="{{ route('wiki.show', 'gestion-article-1') }}">Activité</a>
                            <a class="ajax-link" href="{{ route('wiki.show', 'gestion-article-2') }}">Culture</a>
                            <a class="ajax-link" href="{{ route('wiki.show', 'gestion-article-2') }}">Gestion</a>
                            <a class="ajax-link" href="{{ route('wiki.show', 'gestion-article-2') }}">Métier</a>
                            <a class="ajax-link" href="{{ route('wiki.show', 'gestion-article-2') }}">Unesco</a>
                            <a class="ajax-link" href="{{ route('wiki.show', 'gestion-article-2') }}">Ecologie</a>
                            <a class="ajax-link" href="{{ route('wiki.show', 'gestion-article-2') }}">Event</a>
                            <a class="ajax-link" href="{{ route('wiki.show', 'gestion-article-2') }}">Architecture</a>
                        </div>
                    </div>
                </div>

                <!-- Culture -->
<div class="accordion-item">
  <h2 class="accordion-header" id="headingCulture">
    <button class="accordion-button collapsed" type="button"
            data-bs-toggle="collapse" data-bs-target="#collapseCulture"
            aria-expanded="false" aria-controls="collapseCulture">
        👷🏼・𝐁𝐚𝐭𝐢𝐦𝐞𝐧𝐭𝐬-𝐌𝐞𝐭𝐢𝐞𝐫𝐬
    </button>
  </h2>
  <div id="collapseCulture" class="accordion-collapse collapse" data-bs-parent="#notationSidebar">
    <div class="accordion-body">

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
                <a class="ajax-link" href="{{ route('wiki.show', 'culture-article-1') }}">🧱 1. Maconnerie</a>
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

                <!-- Architecture -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingArchitecture">
                        <button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseArchitecture"
                                aria-expanded="false" aria-controls="collapseArchitecture">
                            🏛️ Architecture
                        </button>
                    </h2>
                    <div id="collapseArchitecture" class="accordion-collapse collapse" data-bs-parent="#notationSidebar">
                        <div class="accordion-body">
                            <a class="ajax-link" href="{{ route('wiki.show', 'architecture-article-1') }}">Article Architecture 1</a>
                            <a class="ajax-link" href="{{ route('wiki.show', 'architecture-article-2') }}">Article Architecture 2</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        
    </nav>

    <div class="col-md-9 p-4" id="wiki-content">
        @if(isset($article))
            {{-- Page article --}}
            <h1>{{ $article->title }}</h1>
            @if($article->image)
                <img src="{{ asset('storage/'.$article->image) }}" alt="{{ $article->title }}" class="img-fluid mb-3">
            @endif
            <div>{!! $article->content !!}</div>
            <a href="{{ route('wiki') }}" class="btn btn-secondary mt-3">← Retour à la liste</a>

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
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@endsection
