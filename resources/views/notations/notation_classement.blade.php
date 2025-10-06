@extends('layouts.app')
@section('title', 'Spazia - Notation')

@section('content')
    <div class="container mt-5">
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
            width: 50px;
            /* Largeur approximative pour les chiffres (ajuster) */
        }
        /* Quand le tooltip est affiché */
        /* Tooltip XXL */
        .tooltip-xxl {
            --bs-tooltip-max-width: 50px; /* enlève la limite Bootstrap */
        }

        .tooltip-xxl .tooltip-inner {
            width: 12vw;             /* 90% de la largeur de l’écran */
            max-width: none !important;
            overflow-y: auto;        /* scroll si trop long */
            white-space: normal;     /* retour à la ligne */
            font-size: 14px;
            text-align: left;
        }

    </style>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1 class="mb-4 d-flex justify-content-center">🏆 Classement des Villes 🏆</h1>
        <h5>
            <li class="list-group-item"><strong>Semaine du  :</strong>
                {{ \Carbon\Carbon::parse($parametres->date_semaine)->isoFormat('D MMMM Y') }}

            </li>
        </h5>
        <div class="table-responsive">
            <table class="table table-hover align-middle" id="classementTable">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Activité</th>
                        <th scope="col">Event</th>
                        <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true"
                            title="Culture : <br>Cette note est fondée sur la culture de la ville et les votes sur chaque citoyen de la ville."
                            scope="col">
                            Culture
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
                            Ecologie
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
                            <td>{{ $ville->notation->sum('event') }}</td>
                            <td>{{ $ville->notation->sum('culture') }}</td>
                            <td>{{ $ville->notation->sum('gestion') }}</td>
                            <td>{{ $ville->notation->sum('metier') }}</td>
                            <td>{{ $ville->notation->sum('unseco') }}</td>
                            <td class="text-start tooltip-left-align large-tooltip-trigger" 
                                data-bs-toggle="tooltip" 
                                data-bs-placement="bottom" 
                                data-bs-html="true"
                                title="<div class='tooltip-inner-custom'>
                                            <p><b>Ecologie détaillée</b></p>
                                            @foreach($ville->ecologie_detail as $key => $value)
                                                @if($key !== 'id_ecologie' && $key !== 'nom_ecologie')
                                                    @php
                                                        $isNegative = in_array($key, ['machine_a_vapeur']); // ici tes colonnes négatives
                                                    @endphp
                                                    <p style='position: relative;'>
                                                        <span>{{ ucfirst(str_replace('_', ' ', $key)) }}</span>
                                                        <span style='position: absolute; right: 0;'>
                                                            {{ $isNegative ? '-' : '' }}{{ $value }}
                                                        </span>
                                                    </p>
                                                @endif
                                            @endforeach
                                    </div>">
                                {{ $ville->ecologie_total_negatif }}
                            </td>
                            <td class="text-start" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" data-bs-custom-class="tooltip-xxl"
                                title="<div class='tooltip-inner-custom'>
                                            <p><b>Note détaillée</b></p>
                                            <p style='position: relative;'><span>Terraforming</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->terraforming ?? 0 }}/2</span></p>
                                            <p style='position: relative;'><span>Cohérence du style</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->coherence_du_style ?? 0 }}/2</span></p>
                                            <p style='position: relative;'><span>Bâtiment métier</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->batiment_metier ?? 0 }}/16</span></p>
                                            <p style='position: relative;'><span>Aménagemnt routier</span><span style='position: absolute; right: 0;'>{{ collect([$ville->architectures[0]->route_paver,$ville->architectures[0]->route_en_asphalte,$ville->architectures[0]->signalisation_routiere,$ville->architectures[0]->presence_de_parkin,$ville->architectures[0]->presence_de_tunnel])->sum() }}/5</span></p>
                                            <p style='position: relative;'><span>Tier utiliser</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->tier_utiliser ?? 0 }}/5</span></p>
                                            <p style='position: relative;'><span>Urbanisme comunale</span><span style='position: absolute; right: 0;'>{{ collect([$ville->architectures[0]->presence_de_pont ?? 0,$ville->architectures[0]->marie ?? 0,$ville->architectures[0]->pack_public ?? 0,$ville->architectures[0]->tribunal ?? 0,$ville->architectures[0]->banque ?? 0,$ville->architectures[0]->musees ?? 0])->sum() }}/6</span></p>
                                            <br>

                                            <p style='position: relative;'><span>Presence lumieres</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->presence_lumieres ?? 0 }}/2</span></p>
                                            <p style='position: relative;'><span>Activité recente</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->activité_recente ?? 0 }}/4</span></p>
                                            <p style='position: relative;'><span>Habitabilité des maisons</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->habitabilité_des_maisons ?? 0 }}/2</span></p>
                                            <p style='position: relative;'><span>Coherence du biome</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->coherence_du_biome ?? 0 }}/2</span></p>
                                            <p style='position: relative;'><span>Presence d'organiques</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->presence_dorganiques ?? 0 }}/1</span></p>
                                            <p style='position: relative;'><span>Presence de mobilier</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->presence_de_mobilier ?? 0 }}/2</span></p>
                                            
                                            <br>
                                            <p style='position: relative;'><span>Batiments abandonnes</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->batiments_abandonnes ?? 0 }}/-2</span></p>
                                            <p style='position: relative;'><span>Nid de poule</span><span style='position: absolute; right: 0;'>{{ $ville->architectures[0]->nid_de_poule ?? 0 }}/-1</span></p>
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
        document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function(el) {
            new bootstrap.Tooltip(el, {
                container: 'body'
            });
        });
    });

    </script>


@endsection
