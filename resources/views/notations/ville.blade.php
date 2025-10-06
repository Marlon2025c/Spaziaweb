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
<br>
<div class="container">
    <h2 class="text-center">Notations de la ville : {{ $ville->nom_villes }}</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date de la semaine</th>
                <th>Ville</th>
                <th>Activite</th>
                <th>Culture</th>
                <th>Gestion</th>
                <th>Metier</th>
                <th>Unseco</th>
                <th>Pollution</th>
                <th>Architectures</th>
                <th>Montant Donné</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ville->notation as $notation)
                <tr>
                    <td>{{ $notation->parametreClassement->date_semaine }}</td>
                    <td>{{ $ville->nom_villes }}</td>
                    <td>{{ $notation->activite }}</td>
                    <td>{{ $notation->culture }}</td>
                    <td>{{ $notation->gestion }}</td>
                    <td>{{ $notation->metier }}</td>
                    <td>{{ $notation->unseco }}</td>
                    <td>0</td>
                    <td>0</td>
                    <td>{{ $notation->parametreClassement->montant_donne ?? 'Non défini' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Aucune notation trouvée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection