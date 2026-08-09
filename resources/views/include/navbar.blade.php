<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
<style>
    .user-menu {
        min-width: 280px;
        background: #101015;
        border: 1px solid rgba(255,255,255,.08);
        border-radius: 14px;
        padding: .5rem;
        box-shadow: 0 20px 50px rgba(0,0,0,.5);
    }
    .user-menu-header {
        display: flex;
        align-items: center;
        gap: .75rem;
        padding: .6rem .75rem .8rem;
    }
    .user-menu-avatar {
        width: 44px; height: 44px;
        border-radius: 50%;
        object-fit: cover;
        flex-shrink: 0;
    }
    .user-menu-id { display: flex; flex-direction: column; min-width: 0; }
    .user-menu-name {
        color: #fff; font-weight: 700; font-size: .92rem;
        white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    }
    .user-menu-role { color: rgba(255,255,255,.4); font-size: .78rem; }
    .user-menu-divider { border-color: rgba(255,255,255,.08); margin: .35rem 0; }
    .user-menu-item {
        display: flex;
        align-items: center;
        gap: .7rem;
        padding: .55rem .75rem;
        border-radius: 9px;
        color: rgba(255,255,255,.75);
        font-size: .85rem;
        font-weight: 600;
        transition: background .15s, color .15s;
    }
    .user-menu-item svg { flex-shrink: 0; opacity: .7; }
    .user-menu-item:hover {
        background: rgba(255,255,255,.07);
        color: #fff;
    }
    .user-menu-item:hover svg { opacity: 1; }
    .user-menu-logout:hover { background: rgba(239,68,68,.12); color: #f87171; }
</style>
<div class="fixed-top">
    <section class="navbar-header p-0">
        <div class="container-fluid" style="padding-left: 5%; padding-right: 5%;">
            <div class="d-flex justify-content-between align-items-center">
                <div style="display: flex; align-items: center; ">
                    {{-- <div id="now-playing" style="display: flex; align-items: center; gap: 10px;">
                        <p>Chargement...</p>
                    </div>
                    <audio id="radioPlayer" controls style="height: 30px; width: auto; flex-grow: 1; ">
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
                    </script> --}}
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
                            <ul class="dropdown-menu user-menu">
                                <li class="user-menu-header">
                                    <img src="{{ Auth::user()->avatar }}" alt="" class="user-menu-avatar">
                                    <div class="user-menu-id">
                                        <span class="user-menu-name">{{ Auth::user()->name }}</span>
                                        <span class="user-menu-role">{{ Auth::user()->roleName() ?? 'Membre' }}</span>
                                    </div>
                                </li>

                                @if (Auth::user()->steam_id)
                                    <li>
                                        <a class="dropdown-item user-menu-item" href="https://steamcommunity.com/profiles/{{ Auth::user()->steam_id }}" target="_blank" rel="noopener">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                                            </svg>
                                            Voir mon profil Steam
                                        </a>
                                    </li>
                                @endif

                                <li><hr class="dropdown-divider user-menu-divider"></li>

                                @if (Auth::user()->isStaff())
                                    <li>
                                        <a class="dropdown-item user-menu-item" href="{{ route('dashboardv2') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/>
                                            </svg>
                                            Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item user-menu-item" href="{{ route('votes.index') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            Sondages
                                        </a>
                                    </li>
                                @endif

                                <li>
                                    <a class="dropdown-item user-menu-item" href="https://discord.gg/yx3PUySCN8" target="_blank" rel="noopener">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M13.545 2.907a13.2 13.2 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.2 12.2 0 0 0-3.658 0 8 8 0 0 0-.412-.833.05.05 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.04.04 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032q.003.022.021.037a13.3 13.3 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019q.463-.63.818-1.329a.05.05 0 0 0-.01-.059l-.018-.011a9 9 0 0 1-1.248-.595.05.05 0 0 1-.02-.066l.015-.019q.127-.095.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.05.05 0 0 1 .053.007q.121.1.248.195a.05.05 0 0 1-.004.085 8 8 0 0 1-1.249.594.05.05 0 0 0-.03.03.05.05 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.2 13.2 0 0 0 4.001-2.02.05.05 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.03.03 0 0 0-.02-.019m-8.198 7.307c-.789 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612m5.316 0c-.788 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612"/>
                                        </svg>
                                        Discord
                                    </a>
                                </li>

                                <li><hr class="dropdown-divider user-menu-divider"></li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                                <li>
                                    <a class="dropdown-item user-menu-item user-menu-logout" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75"/>
                                        </svg>
                                        Déconnexion
                                    </a>
                                </li>
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
        <div class="container-fluid" style="padding-left: 5%; padding-right: 5%;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item nav-li-textsp">
                        <a class="navbar-brand nav-ul-a p-1" href="#">
                            <img src="{{ asset('img/Spaziaeco logo halloween.png') }}" alt="Logo" height="50"
                                width="auto" class="rounded-circle">
                            <b>SpaziaEco</b>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-li-textsp">
                        <a class="nav-link text-uppercase  nav-ul-a p-2" aria-current="page"
                            href="{{ route('home') }}">
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
                        <a class="nav-link text-uppercase nav-ul-a p-2" href="{{ route('wiki') }}">
                            <h6 class="m-0">Wiki</h6>
                        </a>
                    </li>
                    <li class="nav-li-textsp">
                        <a class="nav-link text-uppercase nav-ul-a p-2" href="{{ route('saison75') }}"
                           style="position:relative;">
                            <h6 class="m-0" style="display:flex;align-items:center;gap:.35rem;">
                                Saison 7.5
                                <span style="font-size:.6rem;background:linear-gradient(135deg,#f97316,#ea580c);color:#fff;padding:.1rem .45rem;border-radius:999px;font-weight:800;letter-spacing:.05em;text-transform:uppercase;">NEW</span>
                            </h6>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
