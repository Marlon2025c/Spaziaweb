@extends('layouts.app')
@section('title', 'Spazia - Accueil')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"
        integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="container-scroller">
        <br>
        <br>
        <br>
        <br>
        <br>
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
                                <span class="text-secondary text-small">Admin</span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <span class="menu-title">Basic UI Elements</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false"
                            aria-controls="icons">
                            <span class="menu-title">Icons</span>
                            <i class="mdi mdi-contacts menu-icon"></i>
                        </a>
                        <div class="collapse" id="icons">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/icons/font-awesome.html">Font Awesome</a>
                                </li>
                            </ul>
                        </div>
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
            <div class="main-panel">
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
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a
                                href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights
                            reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                            with <i class="mdi mdi-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- Bootstrap -->

    <!-- FontAwesome -->
    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
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
                                gradientStrokeRed],
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
                    enableOnReadonly: true,
                    todayHighlight: true,
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
