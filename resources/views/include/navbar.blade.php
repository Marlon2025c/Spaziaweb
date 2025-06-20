<div class="fixed-top">
    <section class="navbar-header p-0">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <div style="display: flex; align-items: center; ">
                    <style>
                        #now-playing {
                        display: flex;
                        align-items: center;
                        gap: 8px;
                        font-size: 0.85rem; /* texte un peu plus petit */
                        }

                        #now-playing h2 {
                        margin: 0;
                        font-weight: normal;
                        max-width: 200px;
                        white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        }

                        #playImage {
                        width: 50px !important;
                        height: 50px !important;
                        object-fit: cover;
                        border-radius: 5px;
                        cursor: pointer;
                        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
                        transition: box-shadow 0.3s ease;
                        }

                        #playImage:hover {
                        box-shadow: 0 0 15px rgba(0, 128, 255, 0.5);
                        }

                        #togglePlay {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        background: rgba(0,0,0,0.6);
                        color: white;
                        border: none;
                        border-radius: 50%;
                        width: 20px !important;
                        height: 20px !important;
                        font-size: 14px !important;
                        cursor: pointer;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        padding: 0;
                        }
                    </style>
                    <div id="now-playing" style="display: flex; align-items: center; gap: 10px;">
                        <p>Chargement...</p>
                    </div>
                    <audio id="radioPlayer" controls style="height: 30px; width: auto; flex-grow: 1;" >
                        <source src="https://spazia.fr/radio-proxy" type="audio/mpeg">
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
                                    <div style="position: relative; display: inline-block; width: 50px; height: 50px;">
                                        <img id="playImage" src="${art}" alt="Pochette">
                                        <button id="togglePlay">▶️</button>
                                    </div>
                                    <h6>${artist} - ${title}</h6>
                                    `;
                                document.getElementById("now-playing").innerHTML = html;

                                document.getElementById("togglePlay").addEventListener("click", () => {
                                    const audio = document.getElementById("radioPlayer");
                                    const btn = document.getElementById("togglePlay");
                                    if (audio.paused) {
                                        audio.src = "https://spazia.fr/radio-proxy";
                                        audio.load();
                                        audio.play();
                                        btn.textContent = "⏸️";
                                    } else {
                                        audio.pause();
                                        btn.textContent = "▶️";
                                    }
                                });

                                    lastArtist = artist;
                                    lastTitle = title;
                                }
                                console.log('Données reçues:', data);
                                console.log('Image:', art);
                                // Refaire la requête après durée estimée de la chanson
                                setTimeout(fetchNowPlaying, duration * 1000);

                            } catch (error) {
                                console.error(error);
                                document.getElementById("now-playing").innerHTML = `<p>Impossible de récupérer les données</p>`;
                                setTimeout(fetchNowPlaying, 30000); // Réessaie dans 30s en cas d'erreur
                            }
                        }

                        fetchNowPlaying();
                        const audio = document.getElementById("radioPlayer");
                        audio.volume = 0.2;
                    </script>
                </div>
                <!-- Section pour le lecteur de radio (à gauche) -->
                <div class="me-auto">
                </div>
                <!-- Section pour les liens (à droite) -->
                <ul class="p-0 m-0 d-flex">
                    <li class="list-group-item nav-li-textsp">
                        <a class="link-underline-dark nav-ul-a btn btn-sm p-2" href="{{ route('support') }}">
                            Support
                        </a>
                    </li>
                    <li class="list-group-item nav-li-textsp">
                        <a class="fw-bold link-underline-dark nav-ul-a btn btn-sm p-2 d-flex align-items-center justify-content-center shakeme"
                            href="https://discord.gg/yx3PUySCN8" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-discord svg-icon me-1" viewBox="0 0 16 16">
                                <path
                                    d="M13.545 2.907a13.2 13.2 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.2 12.2 0 0 0-3.658 0 8 8 0 0 0-.412-.833.05.05 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.04.04 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032q.003.022.021.037a13.3 13.3 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019q.463-.63.818-1.329a.05.05 0 0 0-.01-.059l-.018-.011a9 9 0 0 1-1.248-.595.05.05 0 0 1-.02-.066l.015-.019q.127-.095.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.05.05 0 0 1 .053.007q.121.1.248.195a.05.05 0 0 1-.004.085 8 8 0 0 1-1.249.594.05.05 0 0 0-.03.03.05.05 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.2 13.2 0 0 0 4.001-2.02.05.05 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.03.03 0 0 0-.02-.019m-8.198 7.307c-.789 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612m5.316 0c-.788 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612" />
                            </svg>
                            Discord
                        </a>
                    </li>
                    @if (Auth::check())
                        <li class="list-group-item nav-li-textsp dropdown">
                            <a class="fw-bold link-underline-dark nav-ul-a btn btn-sm p-2 d-flex align-items-center justify-content-center dropdown-toggle"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                style="position: relative;">
                                <img src="{{ Auth::user()->avatar }}"
                                    alt="Avatar de {{ Auth::user()->name }}"class="rounded-circle" width="30">
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Bienvenue, {{ Auth::user()->name }}</a></li>
                                @if (Auth::user()->role === '2')
                                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                                @endif
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                @if (Auth::user()->name === 'aym' || Auth::user()->name === 'Freki Liches' || Auth::user()->name === 'Akina' || Auth::user()->name === 'Marlon Cross')
                                <li>
                                    <button id="startAppBtn" class="dropdown-item">Lancer l'application</button>
                                        <button id="stopAppBtn" class="dropdown-item" disabled>Arrêter l'application</button>

                                        <script>
                                            const startBtn = document.getElementById('startAppBtn');
                                            const stopBtn = document.getElementById('stopAppBtn');
                                        
                                            startBtn.addEventListener('click', function () {
                                                fetch("{{ route('start-notepad') }}", {
                                                    method: "POST",
                                                    headers: {
                                                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                                        "Content-Type": "application/json"
                                                    },
                                                    body: JSON.stringify({})
                                                })
                                                .then(res => res.json())
                                                .then(data => {
                                                    console.log("Réponse API :", data);
                                                    alert("Application lancée !");
                                                    startBtn.disabled = true;
                                                    stopBtn.disabled = false;
                                                })
                                                .catch(error => {
                                                    console.error("Erreur :", error);
                                                    alert("Erreur lors du lancement.");
                                                });
                                            });
                                        
                                            stopBtn.addEventListener('click', function () {
                                                fetch("{{ route('stop-notepad') }}", {
                                                    method: "POST",
                                                    headers: {
                                                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                                        "Content-Type": "application/json"
                                                    },
                                                    body: JSON.stringify({})
                                                })
                                                .then(res => res.json())
                                                .then(data => {
                                                    console.log("Réponse API :", data);
                                                    alert("Application arrêtée !");
                                                    stopBtn.disabled = true;
                                                    startBtn.disabled = false;
                                                })
                                                .catch(error => {
                                                    console.error("Erreur :", error);
                                                    alert("Erreur lors de l'arrêt.");
                                                });
                                            });
                                        </script>
                                        
                                </li>
                                @endif
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                                <li><a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Déconnexion
                                    </a></li>
                            </ul>
                        </li>
                    @else
                        <li class="list-group-item nav-li-textsp">
                            <a class="fw-bold link-underline-dark nav-ul-a btn btn-sm p-2" href="{{ route('login') }}">
                                Connexion / Inscription
                            </a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </section>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item nav-li-textsp">
                        <a class="navbar-brand nav-ul-a p-1" href="#">
                            <img src="{{ asset('img/spaziaeco logo.webp') }}" alt="Logo" height="60"
                                width="auto" class="rounded-circle">
                            SpaziaEco
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-li-textsp">
                        <a class="nav-link text-uppercase  nav-ul-a p-2" aria-current="page" href="{{ route('home') }}">
                            <h6 class="m-0">Accueil</h6>
                        </a>
                    </li>
                    <li class="nav-li-textsp">
                        <a class="nav-link text-uppercase nav-ul-a p-2" href="{{ route('notation_classement') }}">
                            <h6 class="m-0">Notations</h6>
                        </a>
                    </li>
                    <li class="nav-li-textsp">
                        <a class="nav-link text-uppercase  nav-ul-a p-2" href="{{ route('actualites') }}">
                            <h6 class="m-0">Actualités</h6>
                        </a>
                    </li>
                    <li class="nav-li-textsp">
                        <a class="nav-link text-uppercase nav-ul-a p-2" href="{{ route('admin_wiki') }}">
                            <h6 class="m-0">Wiki</h6>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>