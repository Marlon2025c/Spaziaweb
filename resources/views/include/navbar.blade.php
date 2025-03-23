<div class="fixed-top">
    <section class="navbar-header p-0">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
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
                        <!-- L'utilisateur est connecté, afficher le bouton de déconnexion -->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">Déconnexion</button>
                        </form>
                        <div class="container">
                            <h1>Bienvenue, {{ Auth::user()->name }}</h1>
                            <img src="{{ Auth::user()->avatar }}" alt="Avatar de {{ Auth::user()->name }}"
                                class="rounded-circle" width="100">
                        </div>
                    @else
                        <li class="list-group-item nav-li-textsp">
                            <a class="fw-bold link-underline-dark nav-ul-a btn btn-sm p-2" href="{{ route('login') }}">
                                Connexion / Inscription
                            </a>
                        </li>
                    @endif

                    <li class="list-group-item nav-li-textsp dropdown">
                        <a class="fw-bold link-underline-dark nav-ul-a btn btn-sm p-2 d-flex align-items-center justify-content-center dropdown-toggle"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false" style="position: relative;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                class="bi bi-gear-fill me-2" viewBox="0 0 16 16">
                                <path
                                    d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                            </svg>
                            <span class="dropdown-toggle-icon" style="font-size: 14px;">▼</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
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
                        <a class="nav-link text-uppercase  nav-ul-a p-2" href="#">
                            <h6 class="m-0">Journal</h6>
                        </a>
                    </li>
                    <li class="nav-li-textsp">
                        <a class="nav-link text-uppercase nav-ul-a p-2" href="{{ route('admin_wiki') }}">
                            <h6 class="m-0">Wiki</h6>
                        </a>
                    </li>
                    <li class="nav-li-textsp">
                        <a class="nav-link text-uppercase nav-ul-a p-2" href="#">
                            <h6 class="m-0">Vote</h6>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
