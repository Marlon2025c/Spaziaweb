@extends('layouts.app')
@section('title', 'Spazia - Notation - ' . $ville->nom_villes)

@section('content')
<style>
    .not-shell {
        position: relative;
        background: #0a0a10;
        padding: 100px 5% 6rem;
    }
    .not-shell-gradient {
        position: absolute; inset: 0; z-index: 0;
        background:
            radial-gradient(ellipse 70% 50% at 12% 8%, rgba(249,115,22,.16) 0%, transparent 55%),
            radial-gradient(ellipse 55% 45% at 88% 25%, rgba(34,197,94,.12) 0%, transparent 55%),
            radial-gradient(ellipse 90% 70% at 50% 100%, rgba(16,185,129,.08) 0%, transparent 50%),
            #0a0a10;
    }
    .not-shell-grid {
        position: absolute; inset: 0; z-index: 0;
        background-image: radial-gradient(circle, rgba(255,255,255,.05) 1px, transparent 1px);
        background-size: 40px 40px;
        mask-image: radial-gradient(ellipse 90% 60% at 50% 0%, black 40%, transparent 100%);
        -webkit-mask-image: radial-gradient(ellipse 90% 60% at 50% 0%, black 40%, transparent 100%);
    }
    .not-inner { position: relative; z-index: 1; max-width: 1100px; margin: 0 auto; }

    .not-back {
        display: inline-flex; align-items: center; gap: .4rem;
        color: rgba(255,255,255,.5); text-decoration: none;
        font-size: .85rem; font-weight: 600; margin-bottom: 1.2rem;
        transition: color .2s;
    }
    .not-back:hover { color: #fb923c; }

    .section-label { font-size: .8rem; letter-spacing: .15em; color: #fb923c; text-transform: uppercase; font-weight: 700; }
    .section-heading { font-size: 2.1rem; font-weight: 800; color: #fff; margin: .3rem 0 1.6rem; }

    .not-card {
        background: rgba(255,255,255,.03);
        border: 1px solid rgba(255,255,255,.07);
        border-radius: 18px;
        padding: 1.4rem;
    }

    .not-table { width: 100%; border-collapse: collapse; }
    .not-table thead th {
        text-transform: uppercase; letter-spacing: .07em; font-size: .7rem; font-weight: 700;
        color: rgba(255,255,255,.4);
        padding: .8rem 1rem; border-bottom: 1px solid rgba(255,255,255,.08);
        text-align: left; white-space: nowrap;
    }
    .not-table tbody td {
        padding: .85rem 1rem; border-bottom: 1px solid rgba(255,255,255,.05);
        color: rgba(255,255,255,.75); font-size: .88rem;
    }
    .not-table tbody tr:hover { background: rgba(249,115,22,.05); }
    .not-table tbody tr:last-child td { border-bottom: none; }
    .not-empty { text-align: center; padding: 3rem 1rem; color: rgba(255,255,255,.3); }

    @media (max-width: 900px) {
        .not-table { min-width: 800px; }
    }
</style>

<div class="not-shell">
    <div class="not-shell-gradient"></div>
    <div class="not-shell-grid"></div>

    <div class="not-inner">
        <a href="{{ route('notation_classement') }}" class="not-back">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
            </svg>
            Retour au classement
        </a>

        <p class="section-label">Historique de notation</p>
        <h1 class="section-heading">{{ $ville->nom_villes }}</h1>

        <div class="not-card">
            <div class="table-responsive">
                <table class="not-table">
                    <thead>
                        <tr>
                            <th>Date de la semaine</th>
                            <th>Ville</th>
                            <th>Activité</th>
                            <th>Culture</th>
                            <th>Gestion</th>
                            <th>Métier</th>
                            <th>Unesco</th>
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
                                <td colspan="10" class="not-empty">Aucune notation trouvée.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
