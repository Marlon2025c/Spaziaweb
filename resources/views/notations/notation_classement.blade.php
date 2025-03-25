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
                        <th scope="col">Activite</th>
                        <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="Économie : <br>Note générée en fonction de l'argent en banque et de l'augmentation/perte par rapport à la semaine précente ainsi que sur le PIB de votre ville et aussi sur le livre en fabrication" scope="col">Économie</th>
                        <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="Gestion : <br> Note généree en function de votre nombre de membres, de vos recrutements et de vos lois" scope="col">Gestion</th>
                        <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="Métier: <br> Note généree en function des niveaux de métier de vos citoyens" scope="col">Métier</th>
                        <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="Unseco"  scope="col">Unesco</th>
                        <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="Pollution : <br> Note généree en function de la pollution de votre ville" scope="col">Pollution</th>
                        <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="Architecture" scope="col">Architecture</th>
                        <th scope="col">Total des Points</th>
                        <th scope="col">Montant Donner</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($villes as $ville)
                        <tr>
                            <th scope="row">{{ $ville->classement }}</th>
                            <td><strong>{{ $ville->nom_villes }}</strong></td>
                            <td>{{ $ville->notation->sum('activite') ?? 0 }}</td>
                            <td>{{ $ville->notation->sum('economie') ?? 0 }}</td>
                            <td>{{ $ville->notation->sum('gestion') ?? 0 }}</td>
                            <td>{{ $ville->notation->sum('metier') ?? 0 }}</td>
                            <td>{{ $ville->notation->sum('unseco') ?? 0 }}</td>
                            <td>{{ $ville->notation->sum('pollution') ?? 0 }}</td>
                            <td>{{ array_sum(array_map(function($architecture) { return array_sum(array_filter($architecture, 'is_numeric')); }, $ville->architectures->toArray())) }}</td>
                            <td class="fw-bold text-primary">{{ $ville->total_points ?? 0 }}</td>
                            <td>{{ $ville->montant_ville ?? '0.00' }}</td>
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
@endsection
