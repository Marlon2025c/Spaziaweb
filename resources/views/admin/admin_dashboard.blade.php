@extends('layouts.app')
@section('title', 'Spazia - Accueil')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"
        integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="container-scroller">
        <br>
        <br>
        <br>
        <br>
        <style>
            .content-section {
                display: none;
            }

            .content-section.hidden {
                display: none;
            }

            .content-section:not(.hidden) {
                display: block;
            }

            .card-darkmode {
                background-color: #14141b;
            }

            .card-darkmode-p {
                color: rgb(0, 0, 0)
            }

            .cart_p_white {
                color: rgb(0, 0, 0);
            }
        </style>
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-image">
                                <img src="{{ Auth::user()->avatar }}" alt="profile" />
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                                <span class="text-secondary text-small">Admin</span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    @if (Auth::user()->name === 'Marlon Cross')
                        <li class="nav-item">
                            <a class="nav-link" href="#forms" onclick="showContent('main_panel')">
                                <span class="menu-title">Dashboard</span>
                                <i class="mdi mdi-home menu-icon"></i>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#forms5" aria-expanded="false"
                            aria-controls="forms5">
                            <span class="menu-title">Commandes</span>
                            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        </a>
                        <div class="collapse" id="forms5">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" onclick="showContent('staff_utiles')">Staff
                                        Utiles</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" onclick="showContent('toutes')">Toutes</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false"
                            aria-controls="forms">
                            <span class="menu-title">Notation</span>
                            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        </a>
                        <div class="collapse" id="forms">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" onclick="showContent('wiki_notation')">Wiki Admin</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#forms" onclick="showContent('article')">
                            <span class="menu-title">Article</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- partial -->
            @if (Auth::user()->name === 'Marlon Cross')
                <div class="main-panel content-section" id="main_panel">
                    <div class="content-wrapper">
                        <div class="page-header">
                            <h3 class="page-title">
                                <span class="page-title-icon bg-gradient-primary text-white me-2">
                                    <i class="mdi mdi-home"></i>
                                </span> Dashboard
                            </h3>
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <span></span>Overview <i
                                            class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="row">
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="card bg-gradient-danger card-img-holder text-white">
                                    <div class="card-body">
                                        <img src="{{ asset('img/dashboard/circle.svg') }}" class="card-img-absolute"
                                            alt="circle-image" />
                                        <h4 class="font-weight-normal mb-3">Weekly Sales <i
                                                class="mdi mdi-chart-line mdi-24px float-end"></i>
                                        </h4>
                                        <h2 class="mb-5">$ 15,0000</h2>
                                        <h6 class="card-text">Increased by 60%</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="card bg-gradient-info card-img-holder text-white">
                                    <div class="card-body">
                                        <img src="{{ asset('img/dashboard/circle.svg') }}" class="card-img-absolute"
                                            alt="circle-image" />
                                        <h4 class="font-weight-normal mb-3">Weekly Orders <i
                                                class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
                                        </h4>
                                        <h2 class="mb-5">45,6334</h2>
                                        <h6 class="card-text">Decreased by 10%</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 stretch-card grid-margin">
                                <div class="card bg-gradient-success card-img-holder text-white">
                                    <div class="card-body">
                                        <img src="{{ asset('img/dashboard/circle.svg') }}" class="card-img-absolute"
                                            alt="circle-image" />
                                        <h4 class="font-weight-normal mb-3">Visitors Online <i
                                                class="mdi mdi-diamond mdi-24px float-end"></i>
                                        </h4>
                                        <h2 class="mb-5">95,5741</h2>
                                        <h6 class="card-text">Increased by 5%</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <h4 class="card-title float-start">Visit And Sales Statistics</h4>
                                            <div id="visit-sale-chart-legend"
                                                class="rounded-legend legend-horizontal legend-top-right float-end"></div>
                                        </div>
                                        <canvas id="visit-sale-chart" class="mt-4"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Traffic Sources</h4>
                                        <div class="doughnutjs-wrapper d-flex justify-content-center">
                                            <canvas id="traffic-chart"></canvas>
                                        </div>
                                        <div id="traffic-chart-legend"
                                            class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Recent Tickets</h4>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th> Assignee </th>
                                                        <th> Subject </th>
                                                        <th> Status </th>
                                                        <th> Last Update </th>
                                                        <th> Tracking ID </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/images/faces/face1.jpg" class="me-2"
                                                                alt="image"> David Grey
                                                        </td>
                                                        <td> Fund is not recieved </td>
                                                        <td>
                                                            <label class="badge badge-gradient-success">DONE</label>
                                                        </td>
                                                        <td> Dec 5, 2017 </td>
                                                        <td> WD-12345 </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/images/faces/face2.jpg" class="me-2"
                                                                alt="image"> Stella Johnson
                                                        </td>
                                                        <td> High loading time </td>
                                                        <td>
                                                            <label class="badge badge-gradient-warning">PROGRESS</label>
                                                        </td>
                                                        <td> Dec 12, 2017 </td>
                                                        <td> WD-12346 </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/images/faces/face3.jpg" class="me-2"
                                                                alt="image"> Marina Michel
                                                        </td>
                                                        <td> Website down for one week </td>
                                                        <td>
                                                            <label class="badge badge-gradient-info">ON HOLD</label>
                                                        </td>
                                                        <td> Dec 16, 2017 </td>
                                                        <td> WD-12347 </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/images/faces/face4.jpg" class="me-2"
                                                                alt="image"> John Doe
                                                        </td>
                                                        <td> Loosing control on server </td>
                                                        <td>
                                                            <label class="badge badge-gradient-danger">REJECTED</label>
                                                        </td>
                                                        <td> Dec 3, 2017 </td>
                                                        <td> WD-12348 </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @else
                <div class="main-panels content-section hidden" id="staff_utiles">
                    <div class="container mt-5">
                        <div class="row g-4">

                            <div class="col-md-6 col-lg-4">
                                <div class="card command-card shadow-sm border-info">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="card-title cart_p_white" style="font-size: "><i
                                                class="bi bi-hammer me-2 cart_p_white"></i> <b> /ban &lt;pseudo&gt;
                                                &lt;raison&gt; </b></h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Bannit un joueur du serveur de façon permanente.</p>
                                        <p class="card-text"><i
                                                class="bi bi-exclamation-triangle-fill text-danger me-2"></i>
                                            <strong>Utilisation :</strong> En cas de triche ou comportement inacceptable.
                                        </p>
                                        <p class="card-text"><i class="bi bi-code me-2"></i>
                                            <pre class="bg-light border rounded p-2"><code>/ban MarlonGrief Grief de la mairie</code></pre>
                                        </p>
                                        <div class="command-info mt-3">
                                            <p><i class="bi bi-shield-slash-fill text-danger me-2"></i> <strong>Impact
                                                    :</strong> Suppression définitive de l'accès au serveur.</p>
                                            <p><i class="bi bi-person-x-fill text-danger me-2"></i> <strong>Niveau
                                                    d'autorisation :</strong> Super Admin ou plus.</p>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        Utilisé en cas de violation grave des règles.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="card command-card shadow-sm border-info">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="card-title cart_p_white"><i class="bi bi-award-fill me-2"></i> <b>
                                                /skills give &lt;métier&gt; &lt;pseudo&gt; </b></h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Attribue un métier spécifique à un joueur.</p>
                                        <p class="card-text"><i class="bi bi-check-circle-fill text-success me-2"></i>
                                            <strong>Utilisation :</strong> Après validation de la construction requise.
                                        </p>
                                        <p class="card-text"><i class="bi bi-code me-2"></i>
                                            <pre class="bg-light border rounded p-2"><code>/skills give NomJoueur, engrais</code></pre>
                                        </p>
                                        <div class="command-info mt-3">
                                            <p><i class="bi bi-gear-fill text-warning me-2"></i> <strong>Fonction
                                                    :</strong> Débloque des compétences et des accès spécifiques.</p>
                                            <p><i class="bi bi-person-plus-fill text-success me-2"></i> <strong>Niveau
                                                    d'autorisation :</strong> Modérateur.</p>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        Permet de gérer la progression et les rôles des joueurs.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="card command-card shadow-sm border-info">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="card-title cart_p_white"><i
                                                class="bi bi-box-seam-fill me-2 cart_p_white"></i> <b> /give &lt;item&gt;
                                                &lt;quantité&gt;</b></h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Donne des objets à votre personnage.</p>
                                        <p class="card-text"><i class="bi bi-question-circle-fill text-info me-2"></i>
                                            <strong>Utilisation :</strong> Pour tester, aider un joueur (avec modération).
                                        </p>
                                        <p class="card-text"><i class="bi bi-code me-2"></i>
                                            <pre class="bg-light border rounded p-2"><code>/give wood, 10</code></pre>
                                        </p>
                                        <div class="command-info mt-3">
                                            <p><i class="bi bi-archive-fill text-primary me-2"></i> <strong>Type :</strong>
                                                Manipulation d'inventaire personnel.</p>
                                            <p><i class="bi bi-person-fill text-primary me-2"></i> <strong>Niveau
                                                    d'autorisation :</strong> Modérateur.</p>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        À utiliser avec discernement.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="card command-card shadow-sm border-info">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="card-title cart_p_white"><i class="bi bi-infinity me-2"></i><b> /fgive
                                                &lt;item&gt; &lt;quantité&gt;</b></h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Donne des objets sans limite de points (si applicable).</p>
                                        <p class="card-text"><i
                                                class="bi bi-exclamation-circle-fill text-warning me-2"></i>
                                            <strong>Utilisation :</strong> Pour les besoins spécifiques du staff ou
                                            événements.
                                        </p>
                                        <p class="card-text"><i class="bi bi-code me-2"></i>
                                            <pre class="bg-light border rounded p-2"><code>/fgive wood, 999</code></pre>
                                        </p>
                                        <div class="command-info mt-3">
                                            <p><i class="bi bi-archive-fill text-primary me-2"></i> <strong>Type :</strong>
                                                Manipulation d'inventaire personnel (sans limite).</p>
                                            <p><i class="bi bi-key-fill text-warning me-2"></i> <strong>Niveau
                                                    d'autorisation :</strong> Modérateur.</p>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        Commande à utiliser avec grande précaution.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="card command-card shadow-sm border-info">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="card-title cart_p_white"><i class="bi bi-geo-alt-fill me-2"></i><b>
                                                /claim</b></h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Permet de revendiquer une zone sans utiliser sa propre
                                            propriété.</p>
                                        <p class="card-text"><i class="bi bi-map-fill text-success me-2"></i>
                                            <strong>Utilisation :</strong> Pour créer des zones protégées pour des
                                            événements ou des constructions staff.
                                        </p>
                                        <p class="card-text"><i class="bi bi-code me-2"></i>
                                            <pre class="bg-light border rounded p-2"><code>/claim</code></pre>
                                        </p>
                                        <div class="command-info mt-3">
                                            <p><i class="bi bi-flag-fill text-success me-2"></i> <strong>Fonction
                                                    :</strong> Création de zones protégées temporaires ou permanentes.</p>
                                            <p><i class="bi bi-ruler-fill text-success me-2"></i> <strong>Niveau
                                                    d'autorisation :</strong> Modérateur.</p>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        Utile pour l'organisation et la protection de zones spécifiques.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="card command-card shadow-sm border-info">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="card-title cart_p_white"><i class="bi bi-fuel-pump-fill me-2"></i><b>
                                                /fuel </b></h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Remplit le réservoir de carburant d'un véhicule.</p>
                                        <p class="card-text"><i class="bi bi-droplet-fill text-warning me-2"></i>
                                            <strong>Utilisation :</strong> Pour la maintenance des véhicules staff ou pour
                                            aider les joueurs.
                                        </p>
                                        <p class="card-text"><i class="bi bi-code me-2"></i>
                                            <pre class="bg-light border rounded p-2"><code>/fuel</code></pre>
                                        </p>
                                        <div class="command-info mt-3">
                                            <p><i class="bi bi-car-front-fill text-secondary me-2"></i> <strong>Type
                                                    :</strong> Gestion des véhicules.</p>
                                            <p><i class="bi bi-wrench-adjustable-circle-fill text-secondary me-2"></i>
                                                <strong>Niveau d'autorisation :</strong> Modérateur.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        Essentiel pour la logistique et le déplacement.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="card command-card shadow-sm border-info">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="card-title cart_p_white"><i class="bi bi-heart-fill me-2"></i> <b>/eat
                                                &lt;calories&gt;</b></h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Restaure vos calories (peut donner un avantage).</p>
                                        <p class="card-text"><i class="bi bi-star-fill text-warning me-2"></i>
                                            <strong>Utilisation :</strong> Pour tester les mécaniques de faim ou donner un
                                            boost temporaire (avec modération).
                                        </p>
                                        <p class="card-text"><i class="bi bi-code me-2"></i>
                                            <pre class="bg-light border rounded p-2"><code>/eat</code></pre>
                                        </p>
                                        <div class="command-info mt-3">
                                            <p><i class="bi bi-battery-full-fill text-success me-2"></i> <strong>Fonction
                                                    :</strong> Augmentation des statistiques du joueur.</p>
                                            <p><i class="bi bi-person-fill text-success me-2"></i> <strong>Niveau
                                                    d'autorisation :</strong> Modérateur.</p>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        Peut influencer l'équilibre du jeu, à utiliser avec prudence.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="card command-card shadow-sm border-info">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="card-title cart_p_white"><i class="bi bi-trash-fill me-2"></i>
                                            <b>/clear-rubble</b>
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Supprime tous les débris de pierre de la carte.</p>
                                        <p class="card-text"><i class="bi bi-broom-fill text-primary me-2"></i>
                                            <strong>Utilisation :</strong> Pour améliorer la visibilité et la performance du
                                            serveur.
                                        </p>
                                        <p class="card-text"><i class="bi bi-code me-2"></i>
                                            <pre class="bg-light border rounded p-2"><code>/clear-rubble</code></pre>
                                        </p>
                                        <div class="command-info mt-3">
                                            <p><i class="bi bi-globe-americas-fill text-primary me-2"></i> <strong>Impact
                                                    :</strong> Modification de l'environnement global.</p>
                                            <p><i class="bi bi-server-fill text-primary me-2"></i> <strong>Niveau
                                                    d'autorisation :</strong> Modérateur.</p>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        Utile pour la maintenance de l'environnement du jeu.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="card command-card shadow-sm border-info">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="card-title cart_p_white"><i class="bi bi-trash-fill me-2"></i><b>
                                                /clear-treedebris</b></h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Supprime les débris d'arbres (branches tombées).</p>
                                        <p class="card-text"><i class="bi bi-leaf-fill text-success me-2"></i>
                                            <strong>Utilisation :</strong> Pour nettoyer les zones forestières et améliorer
                                            l'esthétique.
                                        </p>
                                        <p class="card-text"><i class="bi bi-code me-2"></i>
                                            <pre class="bg-light border rounded p-2"><code>/clear-treedebris</code></pre>
                                        </p>
                                        <div class="command-info mt-3">
                                            <p><i class="bi bi-tree-fill text-success me-2"></i> <strong>Impact :</strong>
                                                Modification de l'environnement local.</p>
                                            <p><i class="bi bi-server-fill text-primary me-2"></i> <strong>Niveau
                                                    d'autorisation :</strong> Modérateur.</p>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        Contribue à un environnement de jeu plus propre.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="card command-card shadow-sm border-info">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="card-title cart_p_white"><i class="bi bi-eye-slash-fill me-2"></i><b>
                                                /util invisible</b></h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Rend votre personnage invisible sur la carte.</p>
                                        <p class="card-text"><i class="bi bi-incognito-fill text-secondary me-2"></i>
                                            <strong>Utilisation :</strong> Pour l'observation discrète des joueurs ou des
                                            zones.
                                        </p>
                                        <p class="card-text"><i class="bi bi-code me-2"></i>
                                            <pre class="bg-light border rounded p-2"><code>/util invisible</code></pre>
                                        </p>
                                        <div class="command-info mt-3">
                                            <p><i class="bi bi-person-bounding-box text-secondary me-2"></i>
                                                <strong>Fonction :</strong> Mode furtif pour le staff.
                                            </p>
                                            <p><i class="bi bi-eye-fill text-secondary me-2"></i> <strong>Niveau
                                                    d'autorisation :</strong> Modérateur.</p>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted">
                                        Outil précieux pour la surveillance sans être détecté.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="card command-card shadow-sm border-info">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="card-title cart_p_white"><i class="bi bi-door-open-fill me-2"></i><b>
                                                /kick &lt;pseudo&gt; &lt;raison&gt;</b></h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Expulse temporairement un joueur du serveur.</p>
                                        <p class="card-text"><i class="bi bi-x-octagon-fill text-warning me-2"></i>
                                            <strong>Utilisation :</strong> Pour les infractions mineures ou pour avertir un
                                            joueur.
                                        </p>
                                        <p class="card-text"><i class="bi bi-code me-2"></i>
                                            <pre class="bg-light border rounded p-2"><code>/kick BadPlayer, Comportement inapproprié</code></pre>
                                        </p>
                                        <div class="command-info mt-3">
                                            <p><i class="bi bi-hourglass-split text-warning me-2"></i> <strong>Durée
                                                    :</strong> Temporaire, le joueur peut se reconnecter.</p>
                                            <p><i class="bi bi-person-dash-fill text-warning me-2"></i> <strong>Niveau
                                                    d'autorisation :</strong> Modérateur.</p>
                                        </div>
                                        <div class="card-footer text-muted">
                                            À utiliser pour les avertissements ou les problèmes mineurs.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="main-panels content-section hidden" id="staff_utiles">
                <div class="container mt-5">
                    <div class="row g-4">

                        <div class="col-md-6 col-lg-4">
                            <div class="card command-card shadow-sm border-info">
                                <div class="card-header bg-info text-white">
                                    <h5 class="card-title cart_p_white" style="font-size: "><i
                                            class="bi bi-hammer me-2 cart_p_white"></i> <b> /ban &lt;pseudo&gt;
                                            &lt;raison&gt; </b></h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Bannit un joueur du serveur de façon permanente.</p>
                                    <p class="card-text"><i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>
                                        <strong>Utilisation :</strong> En cas de triche ou comportement inacceptable.
                                    </p>
                                    <p class="card-text"><i class="bi bi-code me-2"></i>
                                        <pre class="bg-light border rounded p-2"><code>/ban MarlonGrief Grief de la mairie</code></pre>
                                    </p>
                                    <div class="command-info mt-3">
                                        <p><i class="bi bi-shield-slash-fill text-danger me-2"></i> <strong>Impact
                                                :</strong> Suppression définitive de l'accès au serveur.</p>
                                        <p><i class="bi bi-person-x-fill text-danger me-2"></i> <strong>Niveau
                                                d'autorisation :</strong> Super Admin ou plus.</p>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    Utilisé en cas de violation grave des règles.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card command-card shadow-sm border-info">
                                <div class="card-header bg-info text-white">
                                    <h5 class="card-title cart_p_white"><i class="bi bi-award-fill me-2"></i> <b> /skills
                                            give &lt;métier&gt; &lt;pseudo&gt; </b></h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Attribue un métier spécifique à un joueur.</p>
                                    <p class="card-text"><i class="bi bi-check-circle-fill text-success me-2"></i>
                                        <strong>Utilisation :</strong> Après validation de la construction requise.
                                    </p>
                                    <p class="card-text"><i class="bi bi-code me-2"></i>
                                        <pre class="bg-light border rounded p-2"><code>/skills give NomJoueur, engrais</code></pre>
                                    </p>
                                    <div class="command-info mt-3">
                                        <p><i class="bi bi-gear-fill text-warning me-2"></i> <strong>Fonction :</strong>
                                            Débloque des compétences et des accès spécifiques.</p>
                                        <p><i class="bi bi-person-plus-fill text-success me-2"></i> <strong>Niveau
                                                d'autorisation :</strong> Modérateur.</p>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    Permet de gérer la progression et les rôles des joueurs.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card command-card shadow-sm border-info">
                                <div class="card-header bg-info text-white">
                                    <h5 class="card-title cart_p_white"><i
                                            class="bi bi-box-seam-fill me-2 cart_p_white"></i> <b> /give &lt;item&gt;
                                            &lt;quantité&gt;</b></h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Donne des objets à votre personnage.</p>
                                    <p class="card-text"><i class="bi bi-question-circle-fill text-info me-2"></i>
                                        <strong>Utilisation :</strong> Pour tester, aider un joueur (avec modération).
                                    </p>
                                    <p class="card-text"><i class="bi bi-code me-2"></i>
                                        <pre class="bg-light border rounded p-2"><code>/give wood, 10</code></pre>
                                    </p>
                                    <div class="command-info mt-3">
                                        <p><i class="bi bi-archive-fill text-primary me-2"></i> <strong>Type :</strong>
                                            Manipulation d'inventaire personnel.</p>
                                        <p><i class="bi bi-person-fill text-primary me-2"></i> <strong>Niveau
                                                d'autorisation :</strong> Modérateur.</p>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    À utiliser avec discernement.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card command-card shadow-sm border-info">
                                <div class="card-header bg-info text-white">
                                    <h5 class="card-title cart_p_white"><i class="bi bi-infinity me-2"></i><b> /fgive
                                            &lt;item&gt; &lt;quantité&gt;</b></h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Donne des objets sans limite de points (si applicable).</p>
                                    <p class="card-text"><i class="bi bi-exclamation-circle-fill text-warning me-2"></i>
                                        <strong>Utilisation :</strong> Pour les besoins spécifiques du staff ou événements.
                                    </p>
                                    <p class="card-text"><i class="bi bi-code me-2"></i>
                                        <pre class="bg-light border rounded p-2"><code>/fgive wood, 999</code></pre>
                                    </p>
                                    <div class="command-info mt-3">
                                        <p><i class="bi bi-archive-fill text-primary me-2"></i> <strong>Type :</strong>
                                            Manipulation d'inventaire personnel (sans limite).</p>
                                        <p><i class="bi bi-key-fill text-warning me-2"></i> <strong>Niveau d'autorisation
                                                :</strong> Modérateur.</p>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    Commande à utiliser avec grande précaution.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card command-card shadow-sm border-info">
                                <div class="card-header bg-info text-white">
                                    <h5 class="card-title cart_p_white"><i class="bi bi-geo-alt-fill me-2"></i><b>
                                            /claim</b></h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Permet de revendiquer une zone sans utiliser sa propre propriété.
                                    </p>
                                    <p class="card-text"><i class="bi bi-map-fill text-success me-2"></i>
                                        <strong>Utilisation :</strong> Pour créer des zones protégées pour des événements ou
                                        des constructions staff.
                                    </p>
                                    <p class="card-text"><i class="bi bi-code me-2"></i>
                                        <pre class="bg-light border rounded p-2"><code>/claim</code></pre>
                                    </p>
                                    <div class="command-info mt-3">
                                        <p><i class="bi bi-flag-fill text-success me-2"></i> <strong>Fonction :</strong>
                                            Création de zones protégées temporaires ou permanentes.</p>
                                        <p><i class="bi bi-ruler-fill text-success me-2"></i> <strong>Niveau d'autorisation
                                                :</strong> Modérateur.</p>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    Utile pour l'organisation et la protection de zones spécifiques.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card command-card shadow-sm border-info">
                                <div class="card-header bg-info text-white">
                                    <h5 class="card-title cart_p_white"><i class="bi bi-fuel-pump-fill me-2"></i><b> /fuel
                                        </b></h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Remplit le réservoir de carburant d'un véhicule.</p>
                                    <p class="card-text"><i class="bi bi-droplet-fill text-warning me-2"></i>
                                        <strong>Utilisation :</strong> Pour la maintenance des véhicules staff ou pour aider
                                        les joueurs.
                                    </p>
                                    <p class="card-text"><i class="bi bi-code me-2"></i>
                                        <pre class="bg-light border rounded p-2"><code>/fuel</code></pre>
                                    </p>
                                    <div class="command-info mt-3">
                                        <p><i class="bi bi-car-front-fill text-secondary me-2"></i> <strong>Type :</strong>
                                            Gestion des véhicules.</p>
                                        <p><i class="bi bi-wrench-adjustable-circle-fill text-secondary me-2"></i>
                                            <strong>Niveau d'autorisation :</strong> Modérateur.
                                        </p>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    Essentiel pour la logistique et le déplacement.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card command-card shadow-sm border-info">
                                <div class="card-header bg-info text-white">
                                    <h5 class="card-title cart_p_white"><i class="bi bi-heart-fill me-2"></i> <b>/eat
                                            &lt;calories&gt;</b></h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Restaure vos calories (peut donner un avantage).</p>
                                    <p class="card-text"><i class="bi bi-star-fill text-warning me-2"></i>
                                        <strong>Utilisation :</strong> Pour tester les mécaniques de faim ou donner un boost
                                        temporaire (avec modération).
                                    </p>
                                    <p class="card-text"><i class="bi bi-code me-2"></i>
                                        <pre class="bg-light border rounded p-2"><code>/eat</code></pre>
                                    </p>
                                    <div class="command-info mt-3">
                                        <p><i class="bi bi-battery-full-fill text-success me-2"></i> <strong>Fonction
                                                :</strong> Augmentation des statistiques du joueur.</p>
                                        <p><i class="bi bi-person-fill text-success me-2"></i> <strong>Niveau
                                                d'autorisation :</strong> Modérateur.</p>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    Peut influencer l'équilibre du jeu, à utiliser avec prudence.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card command-card shadow-sm border-info">
                                <div class="card-header bg-info text-white">
                                    <h5 class="card-title cart_p_white"><i class="bi bi-trash-fill me-2"></i>
                                        <b>/clear-rubble</b>
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Supprime tous les débris de pierre de la carte.</p>
                                    <p class="card-text"><i class="bi bi-broom-fill text-primary me-2"></i>
                                        <strong>Utilisation :</strong> Pour améliorer la visibilité et la performance du
                                        serveur.
                                    </p>
                                    <p class="card-text"><i class="bi bi-code me-2"></i>
                                        <pre class="bg-light border rounded p-2"><code>/clear-rubble</code></pre>
                                    </p>
                                    <div class="command-info mt-3">
                                        <p><i class="bi bi-globe-americas-fill text-primary me-2"></i> <strong>Impact
                                                :</strong> Modification de l'environnement global.</p>
                                        <p><i class="bi bi-server-fill text-primary me-2"></i> <strong>Niveau
                                                d'autorisation :</strong> Modérateur.</p>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    Utile pour la maintenance de l'environnement du jeu.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card command-card shadow-sm border-info">
                                <div class="card-header bg-info text-white">
                                    <h5 class="card-title cart_p_white"><i class="bi bi-trash-fill me-2"></i><b>
                                            /clear-treedebris</b></h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Supprime les débris d'arbres (branches tombées).</p>
                                    <p class="card-text"><i class="bi bi-leaf-fill text-success me-2"></i>
                                        <strong>Utilisation :</strong> Pour nettoyer les zones forestières et améliorer
                                        l'esthétique.
                                    </p>
                                    <p class="card-text"><i class="bi bi-code me-2"></i>
                                        <pre class="bg-light border rounded p-2"><code>/clear-treedebris</code></pre>
                                    </p>
                                    <div class="command-info mt-3">
                                        <p><i class="bi bi-tree-fill text-success me-2"></i> <strong>Impact :</strong>
                                            Modification de l'environnement local.</p>
                                        <p><i class="bi bi-server-fill text-primary me-2"></i> <strong>Niveau
                                                d'autorisation :</strong> Modérateur.</p>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    Contribue à un environnement de jeu plus propre.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card command-card shadow-sm border-info">
                                <div class="card-header bg-info text-white">
                                    <h5 class="card-title cart_p_white"><i class="bi bi-eye-slash-fill me-2"></i><b> /util
                                            invisible</b></h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Rend votre personnage invisible sur la carte.</p>
                                    <p class="card-text"><i class="bi bi-incognito-fill text-secondary me-2"></i>
                                        <strong>Utilisation :</strong> Pour l'observation discrète des joueurs ou des zones.
                                    </p>
                                    <p class="card-text"><i class="bi bi-code me-2"></i>
                                        <pre class="bg-light border rounded p-2"><code>/util invisible</code></pre>
                                    </p>
                                    <div class="command-info mt-3">
                                        <p><i class="bi bi-person-bounding-box text-secondary me-2"></i> <strong>Fonction
                                                :</strong> Mode furtif pour le staff.</p>
                                        <p><i class="bi bi-eye-fill text-secondary me-2"></i> <strong>Niveau d'autorisation
                                                :</strong> Modérateur.</p>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    Outil précieux pour la surveillance sans être détecté.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="card command-card shadow-sm border-info">
                                <div class="card-header bg-info text-white">
                                    <h5 class="card-title cart_p_white"><i class="bi bi-door-open-fill me-2"></i><b> /kick
                                            &lt;pseudo&gt; &lt;raison&gt;</b></h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Expulse temporairement un joueur du serveur.</p>
                                    <p class="card-text"><i class="bi bi-x-octagon-fill text-warning me-2"></i>
                                        <strong>Utilisation :</strong> Pour les infractions mineures ou pour avertir un
                                        joueur.
                                    </p>
                                    <p class="card-text"><i class="bi bi-code me-2"></i>
                                        <pre class="bg-light border rounded p-2"><code>/kick BadPlayer, Comportement inapproprié</code></pre>
                                    </p>
                                    <div class="command-info mt-3">
                                        <p><i class="bi bi-hourglass-split text-warning me-2"></i> <strong>Durée :</strong>
                                            Temporaire, le joueur peut se reconnecter.</p>
                                        <p><i class="bi bi-person-dash-fill text-warning me-2"></i> <strong>Niveau
                                                d'autorisation :</strong> Modérateur.</p>
                                    </div>
                                    <div class="card-footer text-muted">
                                        À utiliser pour les avertissements ou les problèmes mineurs.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-panels content-section hidden" id="toutes">
                <style>
                    .custom-table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-top: 20px;
                        background-color: #e9ecef;
                        /* Fond gris clair */
                        color: #495057;
                        /* Texte sombre */
                        border: 1px solid #ced4da;
                    }

                    .custom-table th,
                    .custom-table td {
                        padding: 10px;
                        border: 1px solid #ced4da;
                        text-align: left;
                    }

                    .custom-table thead th {
                        background-color: #007bff;
                        /* En-tête bleu */
                        color: white;
                        font-weight: bold;
                    }

                    .custom-table tbody tr:nth-child(even) {
                        background-color: #f8f9fa;
                        /* Lignes paires légèrement plus claires */
                    }

                    .custom-table tbody tr:hover {
                        background-color: #cce5ff;
                        /* Couleur au survol */
                    }
                </style>
                <table class="custom-table">
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
            <div class="main-panel content-section hidden" id="wiki_notation">
                <style>
                    body {
                        font-family: sans-serif;
                        background-color: #f8f9fa;
                        padding-top: 50px;
                    }

                    .wiki-container {
                        max-width: 960px;
                        margin: 0 auto;
                        padding: 20px;
                        background-color: #fff;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }

                    h1,
                    h2 {
                        color: #333;
                    }

                    h2 {
                        margin-top: 20px;
                    }

                    .notation-criteria {
                        margin-bottom: 15px;
                        padding: 10px;
                        border: 1px solid #ddd;
                        border-radius: 4px;
                        background-color: #f9f9f9;
                    }

                    .criterion-title {
                        font-weight: bold;
                        margin-bottom: 5px;
                        color: #555;
                    }

                    .criterion-details {
                        margin-left: 15px;
                        color: #777;
                    }

                    .criterion-details ul {
                        padding-left: 20px;
                        margin-bottom: 0;
                    }

                    .architecture-details {
                        margin-top: 10px;
                        padding: 10px;
                        border: 1px solid #eee;
                        border-radius: 4px;
                        background-color: #fefefe;
                    }

                    .architecture-details p {
                        position: relative;
                        padding-right: 50px;
                        margin-bottom: 5px;
                    }

                    .architecture-details span:last-child {
                        position: absolute;
                        right: 0;
                        top: 0;
                        color: #999;
                    }

                    .important {
                        font-weight: bold;
                        color: #dc3545;
                    }
                </style>
                <div class="wiki-container">
                    <h1>Wiki Admin - Système de Notation des Villes</h1>
                    <p class="lead">Ce wiki explique en détail le système de notation utilisé pour évaluer les villes sur
                        le serveur.</p>

                    <h2>Critères de Notation des Villes</h2>

                    <div class="notation-criteria">
                        <h3 class="criterion-title">Activité</h3>
                        <p class="criterion-details">La note d'activité dépend de l'engagement des membres de la ville. Si
                            plus de la moitié des membres sont inactifs, la ville commence à perdre des points.</p>
                    </div>

                    <div class="notation-criteria">
                        <h3 class="criterion-title">Économie</h3>
                        <p class="criterion-details">La note économique est basée sur plusieurs facteurs :</p>
                        <ul class="criterion-details">
                            <li>L'argent total en banque de la ville.</li>
                            <li>L'augmentation ou la perte d'argent par rapport à la semaine précédente.</li>
                            <li>Le Produit Intérieur Brut (PIB) de la ville.</li>
                            <li>Le nombre de livres découverts ou craftés par les membres de la ville.</li>
                        </ul>
                    </div>

                    <div class="notation-criteria">
                        <h3 class="criterion-title">Gestion</h3>
                        <p class="criterion-details">La note de gestion prend en compte la structure et l'organisation de
                            la ville :</p>
                        <ul class="criterion-details">
                            <li><strong>Recrutement :</strong> Une ville obtient 5 points si elle compte un minimum de <span
                                    class="important">20 membres</span>.</li>
                            <li><strong>Lois Actives :</strong> Une ville gagne 5 points supplémentaires si elle a plus de
                                <span class="important">5 lois actives</span> et fonctionnelles.
                            </li>
                        </ul>
                    </div>

                    <div class="notation-criteria">
                        <h3 class="criterion-title">Métier</h3>
                        <p class="criterion-details">Cette note augmente en fonction du niveau des métiers des citoyens de
                            la ville, avec un maximum de <span class="important">7 points</span>.</p>
                    </div>

                    <div class="notation-criteria">
                        <h3 class="criterion-title">UNSCO</h3>
                        <p class="criterion-details">La note UNSCO est sur un total de <span class="important">12
                                points</span> :</p>
                        <ul class="criterion-details">
                            <li><span class="important">2 points</span> pour le bâtiment de sauvegarde de la ville.</li>
                            <li><span class="important">10 points</span> pour la merveille de la ville.</li>
                        </ul>
                        <p class="criterion-details">Pour plus d'informations, veuillez consulter le guide dans le salon
                            Discord <span class="important">#guide-info</span>.</p>
                    </div>

                    <div class="notation-criteria">
                        <h3 class="criterion-title">Pollution</h3>
                        <p class="criterion-details">La pollution a un impact négatif sur la note de la ville :</p>
                        <ul class="criterion-details">
                            <li>Débris au sol : <span class="important">-5 points</span></li>
                            <li>Pollution de l'air : <span class="important">-10 points</span></li>
                            <li>Pollution du sol : <span class="important">-10 points</span></li>
                        </ul>
                    </div>

                    <div class="notation-criteria">
                        <h3 class="criterion-title">Architecture</h3>
                        <p class="criterion-details">La note d'architecture est basée sur plusieurs critères détaillés
                            ci-dessous :</p>
                        <div class="architecture-details">
                            <p><span>Terraforming</span><span>{{ $ville->architectures[0]->terraforming ?? 0 }}/2</span>
                            </p>
                            <p><span>Cohérence du
                                    style</span><span>{{ $ville->architectures[0]->coherence_du_style ?? 0 }}/2</span></p>
                            <p><span>Bâtiment
                                    métier</span><span>{{ $ville->architectures[0]->batiment_metier ?? 0 }}/29</span></p>
                            <p><span>Présence de
                                    lumières</span><span>{{ $ville->architectures[0]->presence_lumieres ?? 0 }}/2</span>
                            </p>
                            <p><span>Route pavée</span><span>{{ $ville->architectures[0]->route_paver ?? 0 }}/1</span></p>
                            <p><span>Route en
                                    asphalte</span><span>{{ $ville->architectures[0]->route_en_asphalte ?? 0 }}/1</span>
                            </p>
                            <p><span>Activité
                                    récente</span><span>{{ $ville->architectures[0]->activite_recente ?? 0 }}/4</span></p>
                            <p><span>Blocs
                                    utilisés</span><span>{{ $ville->architectures[0]->blocs_utilises ?? 0 }}/2</span></p>
                            <p><span>Habitabilité des
                                    maisons</span><span>{{ $ville->architectures[0]->habitabilite_des_maisons ?? 0 }}/2</span>
                            </p>
                            <p><span>Bâtiments
                                    abandonnés</span><span>{{ $ville->architectures[0]->batiments_abandonnes ?? 0 }}/-2</span>
                            </p>
                            <p><span>Terraforming
                                    réaliste</span><span>{{ $ville->architectures[0]->terraforming_realiste ?? 0 }}/1</span>
                            </p>
                            <p><span>Cohérence du
                                    biome</span><span>{{ $ville->architectures[0]->coherence_du_biome ?? 0 }}/2</span></p>
                            <p><span>Roleplay de la
                                    ville</span><span>{{ $ville->architectures[0]->roleplay_de_la_ville ?? 0 }}/4</span>
                            </p>
                            <p><span>Présence
                                    d'organiques</span><span>{{ $ville->architectures[0]->presence_dorganiques ?? 0 }}/1</span>
                            </p>
                            <p><span>Signalisation
                                    routière</span><span>{{ $ville->architectures[0]->signalisation_routiere ?? 0 }}/1</span>
                            </p>
                            <p><span>Présence de
                                    mobilier</span><span>{{ $ville->architectures[0]->presence_de_mobilier ?? 0 }}/2</span>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="main-panel content-section hidden" id="article">
                <div class="container mt-5">
                    <div class="card shadow-lg p-4">
                        <h2 class="mb-4">Créer un nouvel article</h2>

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- Logo --}}
                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo de l'article</label>
                                <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                    name="logo" id="logo" required>
                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tag --}}
                            <div class="mb-3">
                                <label for="tag" class="form-label">Catégorie (tag)</label>
                                <select class="form-select @error('tag') is-invalid @enderror" name="tag"
                                    id="tag" required>
                                    <option value="">-- Choisir un tag --</option>
                                    <option value="DEV">DEV</option>
                                    <option value="JOurnal">JOurnal</option>
                                    <option value="UPdate">UPdate</option>
                                    <option value="MINECRAFT">MINECRAFT</option>
                                    <option value="ECO">ECO</option>
                                </select>
                                @error('tag')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Title --}}
                            <div class="mb-3">
                                <label for="title" class="form-label">Titre de l'article</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" id="title" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Lien pubhtml5 --}}
                            <div class="mb-3">
                                <label for="lien_pubhtml5" class="form-label">Lien PUB HTML5</label>
                                <input type="url" class="form-control @error('lien_pubhtml5') is-invalid @enderror"
                                    name="lien_pubhtml5" id="lien_pubhtml5" required>
                                @error('lien_pubhtml5')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Publier l'article</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        function showContent(sectionId) {
            // Hide all content sections
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.add('hidden');
            });

            // Show the selected content section
            document.getElementById(sectionId).classList.remove('hidden');
        }
    </script>
    <script>
        (function($) {
            'use strict';
            if ($("#visit-sale-chart").length) {
                const ctx = document.getElementById('visit-sale-chart');

                var graphGradient1 = document.getElementById('visit-sale-chart').getContext("2d");
                var graphGradient2 = document.getElementById('visit-sale-chart').getContext("2d");
                var graphGradient3 = document.getElementById('visit-sale-chart').getContext("2d");

                var gradientStrokeViolet = graphGradient1.createLinearGradient(0, 0, 0, 181);
                gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
                gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');
                var gradientLegendViolet = 'linear-gradient(to right, rgba(218, 140, 255, 1), rgba(154, 85, 255, 1))';

                var gradientStrokeBlue = graphGradient2.createLinearGradient(0, 0, 0, 360);
                gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
                gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
                var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

                var gradientStrokeRed = graphGradient3.createLinearGradient(0, 0, 0, 300);
                gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
                gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
                var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';
                const bgColor1 = ["rgba(218, 140, 255, 1)"];
                const bgColor2 = ["rgba(54, 215, 232, 1"];
                const bgColor3 = ["rgba(255, 191, 150, 1)"];

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG'],
                        datasets: [{
                                label: "CHN",
                                borderColor: gradientStrokeViolet,
                                backgroundColor: gradientStrokeViolet,
                                fillColor: bgColor1,
                                hoverBackgroundColor: gradientStrokeViolet,
                                pointRadius: 0,
                                fill: false,
                                borderWidth: 1,
                                fill: 'origin',
                                data: [20, 40, 15, 35, 25, 50, 30, 20],
                                barPercentage: 0.5,
                                categoryPercentage: 0.5,
                            },
                            {
                                label: "USA",
                                borderColor: gradientStrokeRed,
                                backgroundColor: gradientStrokeRed,
                                hoverBackgroundColor: gradientStrokeRed,
                                fillColor: bgColor2,
                                pointRadius: 0,
                                fill: false,
                                borderWidth: 1,
                                fill: 'origin',
                                data: [40, 30, 20, 10, 50, 15, 35, 40],
                                barPercentage: 0.5,
                                categoryPercentage: 0.5,
                            },
                            {
                                label: "UK",
                                borderColor: gradientStrokeBlue,
                                backgroundColor: gradientStrokeBlue,
                                hoverBackgroundColor: gradientStrokeBlue,
                                fillColor: bgColor3,
                                pointRadius: 0,
                                fill: false,
                                borderWidth: 1,
                                fill: 'origin',
                                data: [70, 10, 30, 40, 25, 50, 15, 30],
                                barPercentage: 0.5,
                                categoryPercentage: 0.5,
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        elements: {
                            line: {
                                tension: 0.4,
                            },
                        },
                        scales: {
                            y: {
                                display: false,
                                grid: {
                                    display: true,
                                    drawOnChartArea: true,
                                    drawTicks: false,
                                },
                            },
                            x: {
                                display: true,
                                grid: {
                                    display: false,
                                },
                            }
                        },
                        plugins: {
                            legend: {
                                display: false,
                            }
                        }
                    },
                    plugins: [{
                        afterDatasetUpdate: function(chart, args, options) {
                            const chartId = chart.canvas.id;
                            var i;
                            const legendId = `${chartId}-legend`;
                            const ul = document.createElement('ul');
                            for (i = 0; i < chart.data.datasets.length; i++) {
                                ul.innerHTML += `
              <li>
                <span style="background-color: ${chart.data.datasets[i].fillColor}"></span>
                ${chart.data.datasets[i].label}
              </li>
            `;
                            }
                            // alert(chart.data.datasets[0].backgroundColor);
                            return document.getElementById(legendId).appendChild(ul);
                        }
                    }]
                });
            }

            if ($("#traffic-chart").length) {
                const ctx = document.getElementById('traffic-chart');

                var graphGradient1 = document.getElementById("traffic-chart").getContext('2d');
                var graphGradient2 = document.getElementById("traffic-chart").getContext('2d');
                var graphGradient3 = document.getElementById("traffic-chart").getContext('2d');

                var gradientStrokeBlue = graphGradient1.createLinearGradient(0, 0, 0, 181);
                gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
                gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
                var gradientLegendBlue = 'rgba(54, 215, 232, 1)';

                var gradientStrokeRed = graphGradient2.createLinearGradient(0, 0, 0, 50);
                gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
                gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
                var gradientLegendRed = 'rgba(254, 112, 150, 1)';

                var gradientStrokeGreen = graphGradient3.createLinearGradient(0, 0, 0, 300);
                gradientStrokeGreen.addColorStop(0, 'rgba(6, 185, 157, 1)');
                gradientStrokeGreen.addColorStop(1, 'rgba(132, 217, 210, 1)');
                var gradientLegendGreen = 'rgba(6, 185, 157, 1)';

                // const bgColor1 = ["rgba(54, 215, 232, 1)"];
                // const bgColor2 = ["rgba(255, 191, 150, 1"];
                // const bgColor3 = ["rgba(6, 185, 157, 1)"];

                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Search Engines 30%', 'Direct Click 30%', 'Bookmarks Click 40%'],
                        datasets: [{
                            data: [30, 30, 40],
                            backgroundColor: [gradientStrokeBlue, gradientStrokeGreen,
                                gradientStrokeRed
                            ],
                            hoverBackgroundColor: [
                                gradientStrokeBlue,
                                gradientStrokeGreen,
                                gradientStrokeRed
                            ],
                            borderColor: [
                                gradientStrokeBlue,
                                gradientStrokeGreen,
                                gradientStrokeRed
                            ],
                            legendColor: [
                                gradientLegendBlue,
                                gradientLegendGreen,
                                gradientLegendRed
                            ]
                        }]
                    },
                    options: {
                        cutout: 50,
                        animationEasing: "easeOutBounce",
                        animateRotate: true,
                        animateScale: false,
                        responsive: true,
                        maintainAspectRatio: true,
                        showScale: true,
                        legend: false,
                        plugins: {
                            legend: {
                                display: false,
                            }
                        }
                    },
                    plugins: [{
                        afterDatasetUpdate: function(chart, args, options) {
                            const chartId = chart.canvas.id;
                            var i;
                            const legendId = `${chartId}-legend`;
                            const ul = document.createElement('ul');
                            for (i = 0; i < chart.data.datasets[0].data.length; i++) {
                                ul.innerHTML += `
                <li>
                  <span style="background-color: ${chart.data.datasets[0].legendColor[i]}"></span>
                  ${chart.data.labels[i]}
                </li>
              `;
                            }
                            return document.getElementById(legendId).appendChild(ul);
                        }
                    }]
                });
            }



            if ($("#inline-datepicker").length) {
                $('#inline-datepicker').datepicker({
                    enableOnReadonly: false,
                    todayHighlight: false,
                });
            }
            if ($.cookie('purple-pro-banner') != "true") {
                document.querySelector('#proBanner').classList.add('d-flex');
                document.querySelector('.navbar').classList.remove('fixed-top');
            } else {
                document.querySelector('#proBanner').classList.add('d-none');
                document.querySelector('.navbar').classList.add('fixed-top');
            }

            if ($(".navbar").hasClass("fixed-top")) {
                document.querySelector('.page-body-wrapper').classList.remove('pt-0');
                document.querySelector('.navbar').classList.remove('pt-5');
            } else {
                document.querySelector('.page-body-wrapper').classList.add('pt-0');
                document.querySelector('.navbar').classList.add('pt-5');
                document.querySelector('.navbar').classList.add('mt-3');

            }
            document.querySelector('#bannerClose').addEventListener('click', function() {
                document.querySelector('#proBanner').classList.add('d-none');
                document.querySelector('#proBanner').classList.remove('d-flex');
                document.querySelector('.navbar').classList.remove('pt-5');
                document.querySelector('.navbar').classList.add('fixed-top');
                document.querySelector('.page-body-wrapper').classList.add('proBanner-padding-top');
                document.querySelector('.navbar').classList.remove('mt-3');
                var date = new Date();
                date.setTime(date.getTime() + 24 * 60 * 60 * 1000);
                $.cookie('purple-pro-banner', "true", {
                    expires: date
                });
            });
        })(jQuery);
    </script>
    <br>
@endsection
