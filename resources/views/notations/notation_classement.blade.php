@extends('layouts.app')
@section('title', 'Spazia - Notation')

@section('content')
    <div class="container mt-5">
        <br>
        <br>
        <br>
        <br>
        <br>
  <h1 class="mb-4">🏆 Classement des Villes</h1>

  <div class="table-responsive">
    <table class="table table-hover align-middle" id="classementTable">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Activité</th>
                <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" 
                    title="Économie : <br>Note basée sur l'argent en banque, l'augmentation/perte par rapport à la semaine précédente, le PIB et les livres en fabrication." scope="col">
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
                <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" 
                    title="Unesco" scope="col">
                    Unesco
                </th>
                <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" 
                    title="Pollution : <br>Basée sur le niveau de pollution de la ville." scope="col">
                    Pollution
                </th>
                <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" 
                    title="Architecture" scope="col">
                    Architecture
                </th>
                <th scope="col">Total des Points</th>
                <th scope="col">Montant Donné</th>
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
                    <td>{{ $ville->notation->sum('pollution') }}</td>
                    <td class="text-start tooltip-left-align"
                        data-bs-toggle="tooltip"
                        data-bs-placement="bottom"
                        data-bs-html="true"
                        title="<div class='tooltip-inner-custom'> 
                                <p>Note détaillée</p>
                                <p style='display: flex; justify-content: space-between;'><span>terraforming</span><span>/2</span></p>
                                <p><span>cohérence du style 
                                    /2</span></p>
                                <p><span>bâtiment métier du style /29</span></p>
                                <p><span>presence lumieres /2</span></p>
                                <p><span>presence de route :</span></p>
                                   <p><span>route paver /1</span></p>
                                   <p><span>route en asphalte /1</span></p>
                                <p><span>activité recente /4</span></p>
                                <p><span>blocs utilises /2</span></p>
                                <p><span>habitabilité des maisons /2</span></p>
                                <p><span>batiments abandonnes /-2</span></p>
                                <p><span>terraforming realiste /1</span></p>
                                <p><span>coherence du biome /2</span></p>
                                <p><span>roleplay de la ville /4</span></p>
                                <p><span>presence d'organiques /1</span></p>
                                <p><span>signalisation routiere /1</span></p>
                                <p><span>presence de mobilier /2</span></p>
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

        // Initialiser le tooltip
        
        $(document).ready(function() {
        
        // Appliquer le tooltip à tous les élém ts avec l'attribut data-bs-toggle="tooltip"
        
        $('[data-bs-toggle="tooltip"]').tooltip();
        
        });
        
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
              const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
              tooltipTriggerList.forEach(function (tooltipTriggerEl) {
                const tooltip = new bootstrap.Tooltip(tooltipTriggerEl);
          
                if (tooltipTriggerEl.classList.contains('tooltip-left-align')) {
                  tooltip._config.customClass = 'tooltip-align-left';
                }
              });
            });
          </script>
          
          <style>
          .tooltip-align-left .tooltip-inner {
            text-align: left;
          }
          </style>
          <style>
            .tooltip-inner-custom p {
              margin: 2px 0;
              font-size: 12px;
            }
            .tooltip-inner-custom p.indent {
              padding-left: 10px;
            }
            </style>
          
@endsection
