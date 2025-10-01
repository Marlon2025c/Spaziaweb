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
        <br>
        <br>
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
                                <span class="text-secondary text-small">{{ Auth::user()->id_role }}</span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    @if (Auth()->user()->hasRole([8]))
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
                        <div class="collapse" id="forms">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalForm1">Formulaire 1</button>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#forms8" aria-expanded="false"
                            aria-controls="forms8">
                            <span class="menu-title">Article</span>
                            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        </a>
                        <div class="collapse" id="forms8">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="#forms8" onclick="showContent('article')">
                                        <span class="menu-title">Article Journall</span>
                                        <i class="mdi mdi-home menu-icon"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#forms8" onclick="showContent('articlewiki')">
                                        <span class="menu-title">Article Wiki</span>
                                        <i class="mdi mdi-home menu-icon"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- partial -->
            @if (Auth()->user()->hasRole([8]))
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
                            @foreach ($adminCommandsAdmin as $command)
                                <div class="col-md-6 col-lg-4">
                                    <div class="card command-card shadow-sm border-info">
                                        <div class="card-header bg-info text-white">
                                            <h5 class="card-title cart_p_white"><i
                                                    class="bi bi-hammer me-2 cart_p_white"></i>
                                                <b>{{ $command->command_titre }}</b>
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">{{ $command->command_description }}</p>
                                            <p class="card-text">
                                                <i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>
                                                <strong>Utilisation :</strong> {{ $command->command_utilisation }}
                                            </p>
                                            <p class="card-text">
                                                <i class="bi bi-code me-2"></i>
                                                <pre class="bg-light border rounded p-2"><code>{{ $command->command_jeux }}</code></pre>
                                            </p>
                                            <!-- Ajoute ici le reste si besoin -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <div class="main-panels content-section hidden" id="staff_utiles">
                <div class="container mt-5">
                    <div class="row g-4">
                        @foreach ($adminCommandsAdmin as $command)
                            <div class="col-md-6 col-lg-4">
                                <div class="card command-card shadow-sm border-info">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="card-title cart_p_white"><i class="bi bi-hammer me-2 cart_p_white"></i>
                                            <b>{{ $command->command_titre }}</b>
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">{{ $command->command_description }}</p>
                                        <p class="card-text">
                                            <i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>
                                            <strong>Utilisation :</strong> {{ $command->command_utilisation }}
                                        </p>
                                        <p class="card-text">
                                            <i class="bi bi-code me-2"></i>
                                            <pre class="bg-light border rounded p-2"><code>{{ $command->command_jeux }}</code></pre>
                                        </p>
                                        <!-- Ajoute ici le reste si besoin -->
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
            <div class="main-panels content-section hidden" id="articlewiki">
                <<style>
                    .note-editor .note-editable {
                    background-color: white !important;
                    color: black !important;
                    }
                    </style>
                    <div class="container">
                        <h1>Créer un article</h1>

                        <form action="{{ route('wiki.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Titre de l'article</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Contenu</label>
                                <textarea name="summernote" id="summernote" style="background-color:white"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
            </div>
            <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>


            <script>
                $('#summernote').summernote({
                    tabsize: 2,
                    height: 120,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['codeview', 'help']]
                    ]
                });
            </script>
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
    <!-- Modal Formulaire 1 -->
    <div class="modal fade" id="modalForm1" tabindex="-1" aria-labelledby="modalForm1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter une ville</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('join-villes') }}" method="POST" id="formVille">
                        @csrf
                        <div class="mb-3">
                            <label for="nom_ville" class="form-label">Nom de la ville</label>
                            <input type="text" class="form-control" id="nom_ville" name="nom_ville" required>

                            <label for="nombre_joueur" class="form-label mt-2">Nombre de joueurs</label>
                            <input type="number" class="form-control" id="nombre_joueur" name="nombre_joueur" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Ajouter la ville</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                data-bs-toggle="modal" data-bs-target="#modalForm2">
                                Passer au Formulaire 2
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Formulaire 2 -->
    <div class="modal fade" id="modalForm2" tabindex="-1" aria-labelledby="modalForm2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajoute Bâtiment de Métier </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('join-metier') }}" method="POST" id="formVilles">
                        @csrf
                        <label for="ville_id" class="form-label">Ville</label>
                        <select name="ville_id" id="ville_id" class="form-select" required>
                            @foreach ($villes as $ville)
                                <option value="{{ $ville->id_villes }}">{{ $ville->nom_villes }}</option>
                            @endforeach
                        </select>

                        <label for="date_valide">Date Valide</label>
                        <input type="date" class="form-control" id="date_valide" name="date_valide" required>

                        <label for="pseudo">Pseudo</label>
                        <input class="form-control" id="pseudo" name="pseudo" required>

                        <label for="steam_id">Steam ID</label>
                        <input class="form-control" id="steam_id" name="steam_id" required>

                        <label for="batiment">Bâtiment</label>
                        <input class="form-control" id="batiment" name="batiment" required>

                        <label for="coordonnes">Coordonnées</label>
                        <input class="form-control" id="coordonnes" name="coordonnes" required>

                        <label for="coop">Coop</label>
                        <input class="form-control" id="coop" name="coop">

                        <button type="submit" class="btn btn-success mt-2">Ajouter la ville</button>
                    </form>
                    <button class="btn btn-link" data-bs-dismiss="modal" data-bs-toggle="modal"
                        data-bs-target="#modalForm1">Retour au Formulaire 1</button>
                </div>
            </div>
        </div>
    </div>
@endsection
