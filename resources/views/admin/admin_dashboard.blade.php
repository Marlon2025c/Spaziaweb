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
                color: white
            }

            .cart_p_white {
                color: white
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
                            <a class="nav-link" href="#" onclick="showContent('main_panel')">
                                <span class="menu-title">Dashboard</span>
                                <i class="mdi mdi-home menu-icon"></i>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showContent('command_utile')">
                            <span class="menu-title">Commande Utile</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false"
                            aria-controls="forms">
                            <span class="menu-title">Forms</span>
                            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                        </a>
                        <div class="collapse" id="forms">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/forms/basic_elements.html">Form Elements</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false"
                            aria-controls="charts">
                            <span class="menu-title">Charts</span>
                            <i class="mdi mdi-chart-bar menu-icon"></i>
                        </a>
                        <div class="collapse" id="charts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false"
                            aria-controls="tables">
                            <span class="menu-title">Tables</span>
                            <i class="mdi mdi-table-large menu-icon"></i>
                        </a>
                        <div class="collapse" id="tables">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false"
                            aria-controls="auth">
                            <span class="menu-title">User Pages</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-lock menu-icon"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/samples/login.html"> Login </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/samples/register.html"> Register </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="docs/documentation.html" target="_blank">
                            <span class="menu-title">Documentation</span>
                            <i class="mdi mdi-file-document-box menu-icon"></i>
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
                <div class="main-panels content-section" id="command_utile">
                    <h1>test</h1>

                </div>
            @endif
            <div class="main-panels content-section hidden" id="command_utile">

                <div class="container mt-5">
                    <div class="row g-4">

                        <!-- Carte /ban -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card shadow-sm border-danger darkmode">
                                <div class="card-header bg-danger text-white">
                                    <h5 class="card-title text-white">🔨 /ban &lt;pseudo&gt; &lt;raison&gt;</h5>
                                </div>
                                <div class="card-body">
                                    <p>Bannit un joueur du serveur de façon permanente.</p>
                                    <p><strong>Utilisation :</strong> En cas de triche ou comportement inacceptable.</p>
                                    <pre><code>/ban MarlonGrief Grief de la mairie</code></pre>
                                </div>
                                <div class="card-footer text-muted">
                                    Utilisé en cas de violation grave des règles.
                                </div>
                            </div>
                        </div>

                        <!-- Carte /mute -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card shadow-sm border-warning darkmode">
                                <div class="card-header bg-warning text-dark">
                                    <h5 class="card-title text-white">🛡️ /skills give &lt;pseudo&gt; &lt;durée&gt;</h5>
                                </div>
                                <div class="card-body">
                                    <p>Empêche un joueur d’écrire dans le chat pendant un temps défini.</p>
                                    <p><strong>Durée :</strong> 5m, 30m, 1h, etc.</p>
                                    <pre><code>/mute PseudoToxique 30m</code></pre>
                                </div>
                                <div class="card-footer text-muted">
                                    Utile pour les joueurs spammant le chat.
                                </div>
                            </div>
                        </div>

                        <!-- Carte /kick -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card shadow-sm border-primary">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="card-title text-white">📋 /kick &lt;pseudo&gt; &lt;raison&gt;</h5>
                                </div>
                                <div class="card-body">
                                    <p>Expulse un joueur temporairement sans bannissement.</p>
                                    <pre><code>/kick TrollMaster Spam dans le chat</code></pre>
                                </div>
                                <div class="card-footer text-muted">
                                    À utiliser pour des infractions mineures.
                                </div>
                            </div>
                        </div>

                        <!-- Carte /invsee -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card shadow-sm border-secondary">
                                <div class="card-header bg-secondary text-white">
                                    <h5 class="card-title text-white">🕵️‍♂️ /invsee &lt;pseudo&gt;</h5>
                                </div>
                                <div class="card-body">
                                    <p>Permet de voir l’inventaire d’un joueur discrètement.</p>
                                    <p>Très utile pour vérifier les objets suspects.</p>
                                </div>
                                <div class="card-footer text-muted">
                                    À utiliser pour vérifier la possession d'objets interdits.
                                </div>
                            </div>
                        </div>

                        <!-- Carte /gamemode -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card shadow-sm border-success">
                                <div class="card-header bg-success text-white">
                                    <h5 class="card-title text-white">🧱 /gamemode &lt;mode&gt; &lt;pseudo&gt;</h5>
                                </div>
                                <div class="card-body">
                                    <p>Change le mode de jeu d’un joueur.</p>
                                    <pre><code>/gamemode creative Marlon</code></pre>
                                </div>
                                <div class="card-footer text-muted">
                                    À utiliser pour accorder des privilèges temporaires.
                                </div>
                            </div>
                        </div>

                        <!-- Carte /msg -->
                        <div class="col-md-6 col-lg-4">
                            <div class="card shadow-sm border-info">
                                <div class="card-header bg-info text-white">
                                    <h5 class="card-title text-white">💬 /msg &lt;pseudo&gt; &lt;message&gt;</h5>
                                </div>
                                <div class="card-body">
                                    <p>Envoie un message privé à un joueur.</p>
                                    <pre><code>/msg Pseudo Viens vocal 2 min ?</code></pre>
                                </div>
                                <div class="card-footer text-muted">
                                    Pour discuter discrètement avec un joueur.
                                </div>
                            </div>
                        </div>

                        <!-- Carte Commandes d'urgence -->
                        <div class="col-12">
                            <div class="card shadow-sm border-dark">
                                <div class="card-header bg-dark text-white">
                                    <h5 class="card-title text-white">🚨 Commandes d'urgence</h5>
                                </div>
                                <div class="card-body">
                                    <ul>
                                        <li><code>/stop</code> : Arrête complètement le serveur (attention !)</li>
                                        <li><code>/reload</code> : Recharge les plugins (risque de bug)</li>
                                    </ul>
                                </div>
                                <div class="card-footer text-muted">
                                    À utiliser uniquement en cas d’urgence.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- Bootstrap -->

        <!-- FontAwesome -->
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

    @endsection
