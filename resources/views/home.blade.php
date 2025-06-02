@extends('layouts.app')
@section('title', 'Spazia - Accueil')
@section('content')
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

        .nav-li-texts0p:hover {
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

        .shine {
            position: relative;
            display: inline-block;
            overflow: hidden;
        }

        .shine::before {
            content: '';
            position: absolute;
            top: 0;
            left: -150%;
            width: 200%;
            height: 100%;
            background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, .4) 50%, rgba(255, 255, 255, 0) 100%);
            transform: skewX(-25deg);
            z-index: 2;
            pointer-events: none;
            /* Empêche toute interaction */
            opacity: 0;
            transition: none;
            /* Désactive les transitions qui garderaient l'effet */
        }

        .shine:hover::before {
            opacity: 1;
            animation: shine 0.75s ease-in-out;
        }

        @keyframes shine {
            from {
                left: -150%;
            }

            to {
                left: 150%;
            }
        }

        /* Réinitialiser après l'animation */
        .shine:hover::before {
            animation: shine 0.75s ease-in-out forwards;
        }

        .shine:not(:hover)::before {
            animation: none;
            opacity: 0;
        }
    </style>
    <div class="background-container">
        <!-- Image de fond -->
        <img class="background-image" src="{{ asset('img/spazia.png') }}" alt="SpaziaEco Background">
        <h1 class="centered-title">SpaziaEco</h1>
    </div>
    <div class="container col-container">
        <div class="row justify-content-center">
            <!-- Exemple de 5 colonnes -->
            <div class="col-lg-2 col-custom text-center">
                <img src="{{ asset('img/pioche.png') }}" width="60" height="60" {{-- http://localhost/Spaziaweb/public/img/pioche.png --}}
                    fill="currentColor" class="bi bi-backpack2-fill" viewBox="0 0 16 16" alt="">
                <p><b>Haute Collab</b></p>
            </div>
            <div class="col-lg-2 col-custom text-center">
                <img src="{{ asset('img/protection.png') }}" width="60" height="60" fill="currentColor"
                    class="bi bi-backpack2-fill" viewBox="0 0 16 16" alt="">
                <p><b>Staff actif</b></p>
            </div>
            <div class="col-lg-2 col-custom text-center">
                <img src="{{ asset('img/file.png') }}" width="60" height="60" fill="currentColor"
                    class="bi bi-backpack2-fill" viewBox="0 0 16 16" alt="">
                <p><b>Mods</b></p>
            </div>
            <div class="col-lg-2 col-custom text-center">
                <img src="{{ asset('img/event.png') }}" width="60" height="60" fill="currentColor"
                    class="bi bi-backpack2-fill" viewBox="0 0 16 16" alt="">
                <p><b>Events</b></p>
            </div>
            <div class="col-lg-2 col-custom text-center">
                <img src="{{ asset('img/money.png') }}" width="60" height="60" fill="currentColor"
                    class="bi bi-backpack2-fill" viewBox="0 0 16 16" alt="">
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
                    Rejoins un monde où chaque décision compte. Bâtis ta ville, choisis ton métier et développe ton économie
                    tout en respectant l'écosystème. Un système de notation récompense les meilleures villes, et l'histoire
                    de SpaziaEco continue d'évoluer depuis la saison 5.

                    Plonge dans l'aventure et écris ta propre légende.

                    Rejoignez-nous dès maintenant et laisse ton empreinte sur SpaziaEco.

                </p>
                <p class="custom-p">
                    Prépare-toi à une expérience de jeu sans limites sur SpaziaEco, où ta légende débute.
                </p>
            </div>
            <div class="col-lg-6 d-flex justify-content-center">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/kWGF39p8TxE?si=DVams8XYM2mU4ccH"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>



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
            <div class="row custom-section">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="tiles d-flex justify-content-evenly">

                        @foreach ($articles as $article)
                            <div class="card card-darkmode" style="width: 30rem;">
                                <div class="shine" style="height: 200px; background-color: #f0f0f0;">
                                    <img src="{{ asset('storage/' . $article->logo) }}" class="card-img-top"
                                        style="height: 100%; width: 100%; object-fit: contain;" alt="...">
                                </div>
                                <div class="card-body">
                                    <span class="text-uppercase tag-darkmode d-inline-block mb-2 bg-success lh-1 rounded-1">
                                        <b>{{ $article->tag }}</b>
                                    </span>
                                    <h5 class="text-uppercase"><b>{{ $article->title }}</b></h5>
                                    <p style="color:#767676 !important;">
                                        {{ \Carbon\Carbon::parse($article->date)->translatedFormat('d F Y') }}
                                    </p>
                                    <p style="color:#767676 !important;">
                                        <a href="{{ $article->lien_pubhtml5 }}" target="_blank">Voir l'article complet</a>
                                    </p>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
                <div class="col-1"></div>
            </div>
        </section>
        <br>
        <br><br><br><br><br><br><b></b>
        <div id="now-playing">
            <p>Chargement...</p>

        </div>
        <audio id="radioPlayer" controls style="height: 20px; width: 100%;">
            <source id="radioSource" src="https://192.168.1.12/radio/8000/radio.mp3" type="audio/mpeg">
            Votre navigateur ne supporte pas l'audio HTML5.
        </audio>
        <script>
            let lastTitle = "";
            let lastArtist = "";

            async function fetchNowPlaying() {
                try {
                    const response = await fetch('{{ route('nowplaying.local') }}');
                    const data = await response.json();
                    const song = data.now_playing?.song;

                    const artist = song?.artist || "Artiste inconnu";
                    const title = song?.title || "Titre inconnu";
                    const art = song?.art || "https://via.placeholder.com/300x300?text=Pas+d'image";
                    const duration = data.now_playing?.duration || 180; // durée en secondes (par défaut 3 min)

                    if (artist !== lastArtist || title !== lastTitle) {
                        const html = `
                        <h2>${artist} - ${title}</h2>
                        <img src="${art}" alt="Pochette de la musique">
                    `;
                        document.getElementById("now-playing").innerHTML = html;

                        lastArtist = artist;
                        lastTitle = title;
                    }

                    // Refaire la requête après durée estimée de la chanson
                    setTimeout(fetchNowPlaying, duration * 1000);

                } catch (error) {
                    console.error(error);
                    document.getElementById("now-playing").innerHTML = `<p>Impossible de récupérer les données</p>`;
                    setTimeout(fetchNowPlaying, 30000); // Réessaie dans 30s en cas d'erreur
                }
            }

            fetchNowPlaying();
        </script>
        <iframe style="height: 500px; width: 500px;"src='https://online.pubhtml5.com/lgual/laxz/' seamless='seamless'
            scrolling='no' frameborder='0' allowtransparency='true' allowfullscreen='true'></iframe>
    @endsection
