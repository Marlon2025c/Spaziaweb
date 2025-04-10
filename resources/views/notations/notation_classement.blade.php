@extends('layouts.app')
@section('title', 'Spazia - Notation')

@section('content')
    <div class="container mt-5">
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1 class="mb-4 d-flex justify-content-center">🏆 Classement des Villes 🏆</h1>
        <h2>
            <li class="list-group-item"><strong>Date de la semaine :</strong>
                {{ \Carbon\Carbon::parse($parametres->date_semaine)->isoFormat('D MMMM Y') }}

            </li>
        </h2>
        <div class="table-responsive">
            <table class="table table-hover align-middle" id="classementTable">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Activité</th>
                        <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true"
                            title="Économie : <br>Note basée sur l'argent en banque, l'augmentation/perte par rapport à la semaine précédente, le PIB et les livres en fabrication."
                            scope="col">
                            Économie
                        </th>
                        <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true"
                            title="Gestion : <br>Basée sur le nombre de membres, recrutements et lois." scope="col">
                            Gestion
                        </th>
                        <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true"
                            title="Métier : <br>Basée sur les niveaux de métier des citoyens." scope="col">
                            Métier
                        </th>
                        <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="Unesco"
                            scope="col">
                            Unesco
                        </th>
                        <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true"
                            title="Pollution : <br>Basée sur le niveau de pollution de la ville." scope="col">
                            Pollution
                        </th>
                        <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="Architecture"
                            scope="col">
                            Architecture
                        </th>
                        <th scope="col">Total des Points</th>
                        <th scope="col">Montant Donné </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($villes as $ville)
                        <tr>

                            <th scope="row">{{ $ville->classement }}</th>
                            <td>
                                <a href="{{ route('show', ['id' => $ville->id_villes]) }}">
                                    <strong>{{ $ville->nom_villes }}</strong>
                                </a>
                            </td>

                            <td>{{ $ville->notation->sum('activite') }}</td>
                            <td>{{ $ville->notation->sum('economie') }}</td>
                            <td>{{ $ville->notation->sum('gestion') }}</td>
                            <td>{{ $ville->notation->sum('metier') }}</td>
                            <td>{{ $ville->notation->sum('unseco') }}</td>
                            <td>-{{ $ville->notation->sum('pollution') }}</td>
                            <td class="text-start tooltip-left-align large-tooltip-trigger" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" data-bs-html="true"
                                title="<div class='tooltip-inner-custom'>
                                            <p><b>Note détaillée</b></p>
                                            <p style='position: relative;'><span>terraforming</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->terraforming ?? 0 }}/2</span></p>
                                            <p style='position: relative;'><span>cohérence du style</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->coherence_du_style ?? 0 }}/2</span></p>
                                            <p style='position: relative;'><span>bâtiment métier</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->batiment_metier ?? 0 }}/29</span></p>
                                            <p style='position: relative;'><span>presence lumieres</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->presence_lumieres ?? 0 }}/2</span></p>
                                            <p style='position: relative; padding-left: 10px;'><span>route paver</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->route_paver ?? 0 }}/1</span></p>
                                            <p style='position: relative; padding-left: 10px;'><span>route en asphalte</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->route_en_asphalte ?? 0 }}/1</span></p>
                                            <p style='position: relative;'><span>activité recente</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->activite_recente ?? 0 }}/4</span></p>
                                            <p style='position: relative;'><span>blocs utilises</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->blocs_utilises ?? 0 }}/2</span></p>
                                            <p style='position: relative;'><span>habitabilité des maisons</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->habitabilite_des_maisons ?? 0 }}/2</span></p>
                                            <p style='position: relative;'><span>batiments abandonnes</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->batiments_abandonnes ?? 0 }}/-2</span></p>
                                            <p style='position: relative;'><span>terraforming realiste</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->terraforming_realiste ?? 0 }}/1</span></p>
                                            <p style='position: relative;'><span>coherence du biome</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->coherence_du_biome ?? 0 }}/2</span></p>
                                            <p style='position: relative;'><span>roleplay de la ville</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->roleplay_de_la_ville ?? 0 }}/4</span></p>
                                            <p style='position: relative;'><span>presence d'organiques</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->presence_dorganiques ?? 0 }}/1</span></p>
                                            <p style='position: relative;'><span>signalisation routiere</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->signalisation_routiere ?? 0 }}/1</span></p>
                                            <p style='position: relative;'><span>presence de mobilier</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->presence_de_mobilier ?? 0 }}/2</span></p>
                                        </div>">
                                {{ $ville->calculerSommeArchitectures() }}
                            </td>
                            <td class="fw-bold text-primary">{{ $ville->total_points }}</td>
                            <td>{{ $ville->montant_ville }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- <h2 class="mt-5">⚙️ Paramètres du Classement</h2>
        @if ($parametres)
            <div class="card">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Montant donné :</strong> {{ $parametres->montant_donne }}</li>
                        <li class="list-group-item"><strong>Date de la semaine :</strong> {{ $parametres->date_semaine }}</li>
                        <li class="list-group-item"><strong>Argent par joueur :</strong> {{ $parametres->argent_par_joueur }}</li>
                        <li class="list-group-item"><strong>Nombre maximum de membres :</strong> {{ $parametres->membre_max }}</li>
                        <li class="list-group-item"><strong>Nombre maximum de lois :</strong> {{ $parametres->lois_max }}</li>
                    </ul>
                </div>
            </div>
        @else
            <p class="text-muted">Aucun paramètre trouvé.</p>
        @endif --}}
    </div>

    <script>
        $(document).ready(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.forEach(function(tooltipTriggerEl) {
                const tooltip = new bootstrap.Tooltip(tooltipTriggerEl);

                if (tooltipTriggerEl.classList.contains('tooltip-left-align')) {
                    tooltip._config.customClass = 'tooltip-align-left';
                }
            });
        });
    </script>

    <style>
        .large-tooltip-trigger[aria-describedby]+.tooltip {
            --bs-tooltip-max-width: 800px;
            /* Définissez la largeur souhaitée pour ce tooltip spécifique */
        }

        .tooltip-align-left .tooltip-inner {
            text-align: left;
        }

        .tooltip-inner-custom p {
            margin: 2px 0;
            font-size: 12px;
            position: relative;
            /* Important pour le positionnement absolu des enfants */
            padding-right: 40px;
            /* Espace pour le chiffre (ajuster si nécessaire) */
        }

        .tooltip-inner-custom p.indent {
            padding-left: 10px;
        }

        .tooltip-inner-custom p span:first-child {
            display: inline-block;
            width: calc(100% - 10px);
            /* Prend toute la largeur moins l'espace pour le chiffre */
            text-align: left;
        }

        .tooltip-inner-custom p span:last-child {
            position: absolute;
            right: 0;
            top: 0;
            /* Aligne le haut avec le texte */
            text-align: right;
            width: 30px;
            /* Largeur approximative pour les chiffres (ajuster) */
        }
    </style>

@endsection
