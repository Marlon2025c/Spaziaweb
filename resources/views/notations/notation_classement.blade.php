@extends('layouts.app')
@section('title', 'Spazia - Notation')
@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h1>Classement des Villes</h1>
    <style>
        .tooltip-inner {
            text-align: left !important;
        }
    </style>
    <!-- Tableau avec des classes Bootstrap -->
    <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#</th> <!-- Colonne pour le classement -->
                <th>Nom</th>
                <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true"
                    title="Économie : <br>Note générée en fonction de l'argent en banque et de l'augmentation/perte par rapport à la semaine précente ainsi que sur le PIB de votre ville et aussi sur le livre en fabrication">
                    Économie</th>
                <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true"
                    title="Gestion : <br> Note généree en function de votre nombre de membres, de vos recrutements et de vos lois">
                    Gestion</th>
                <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true"
                    title="Métier: <br> Note généree en function des niveaux de métier de vos citoyens">
                    Métier</th>
                <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="Unseco">Unseco</th>
                <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true" title="Architecture">
                    Architecture</th>
                <th data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-html="true"
                    title="Pollution : <br> Note généree en function de la pollution de votre ville">
                    Pollution</th>
                <th>Total des Points</th> <!-- Ajout de la colonne pour le total -->
            </tr>
        </thead>
        <tbody>
            @foreach ($villes as $ville)
                <tr>
                    <td>{{ $ville->classement }}</td> <!-- Affichage du classement basé sur les points -->
                    <td>{{ $ville->nom }}</td>
                    <td>{{ $ville->economie }}</td>
                    <td>{{ $ville->gestion }}</td>
                    <td>{{ $ville->metier }}</td>
                    <td>{{ $ville->unseco }}</td>
                    <td>{{ $ville->architecture }}</td>
                    <td>{{ $ville->pollution }}</td>
                    <td>{{ $ville->total_points }}</td> <!-- Affichage du total des points -->
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Paramètres du Classement</h2>

    @if ($parametres)
        <div class="card">
            <div class="card-body">
                <p><strong>Montant donné:</strong> {{ $parametres->montant_donne }}</p>
                <p><strong>Date de la semaine:</strong> {{ $parametres->date_semaine }}</p>
                <p><strong>Argent par joueur:</strong> {{ $parametres->argent_par_joueur }}</p>
                <p><strong>Nombre maximum de membres:</strong> {{ $parametres->membre_max }}</p>
                <p><strong>Nombre maximum de lois:</strong> {{ $parametres->lois_max }}</p>
            </div>
        </div>
    @else
        <p>Aucun paramètre trouvé.</p>
    @endif
    <div class="container mt-5">
        <h1>Exemple de Tooltip</h1>

        <!-- Bouton avec tooltip en dessous -->
        <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom"
            title="Tooltip en dessous">
            Bouton avec tooltip
        </button>
    </div>

    <!-- Lien vers jQuery et Bootstrap 5 (pas besoin de Popper.js séparé) -->

    <script>
        // Initialiser le tooltip
        $(document).ready(function() {
            // Appliquer le tooltip à tous les élém ts avec l'attribut data-bs-toggle="tooltip"
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
