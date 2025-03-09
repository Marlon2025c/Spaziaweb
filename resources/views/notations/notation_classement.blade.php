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

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Économie</th>
                <th>Gestion</th>
                <th>Métier</th>
                <th>Unseco</th>
                <th>Architecture</th>
                <th>Pollution</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($villes as $ville)
                <tr>
                    <td>{{ $ville->nom }}</td>
                    <td>{{ $ville->economie }}</td>
                    <td>{{ $ville->gestion }}</td>
                    <td>{{ $ville->metier }}</td>
                    <td>{{ $ville->unseco }}</td>
                    <td>{{ $ville->architecture }}</td>
                    <td>{{ $ville->pollution }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Paramètres du Classement</h2>

    @if ($parametres)
        <p>Montant donné: {{ $parametres->montant_donne }}</p>
        <p>Date de la semaine: {{ $parametres->date_semaine }}</p>
        <p>Argent par joueur: {{ $parametres->argent_par_joueur }}</p>
        <p>Nombre maximum de membres: {{ $parametres->membre_max }}</p>
        <p>Nombre maximum de lois: {{ $parametres->lois_max }}</p>
    @else
        <p>Aucun paramètre trouvé.</p>
    @endif

@endsection
