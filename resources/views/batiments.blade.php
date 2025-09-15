@foreach ($villes as $ville)
    <h2>{{ $ville->nom_villes }}</h2>

    @if ($ville->batimentMetiers->isEmpty())
        <p>Aucun bâtiment enregistré.</p>
    @else
        <ul>
            @foreach ($ville->batimentMetiers as $batiment)
                <li>
                    Bâtiment : {{ $batiment->batiment }}  
                    | Joueur : {{ $batiment->pseudo }}  
                    | Coordonnées : {{ $batiment->coordonnes }}  
                    | Date : {{ $batiment->date_valide }}
                </li>
            @endforeach
        </ul>
    @endif
@endforeach
