@extends('layouts.app')
@section('title', 'Spazia - Notation')

@section('content')
<style>
    /* ─── Fond général (même dégradé que le wiki / la home) ──────── */
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
    .not-inner { position: relative; z-index: 1; max-width: 1320px; margin: 0 auto; }

    /* ─── En-tête ──────────────────────────────────────────────── */
    .not-header { text-align: center; margin-bottom: 2.2rem; }
    .section-label { font-size: .8rem; letter-spacing: .15em; color: #fb923c; text-transform: uppercase; font-weight: 700; }
    .section-heading { font-size: 2.25rem; font-weight: 800; color: #fff; margin: .3rem 0 0; }
    .not-week { color: rgba(255,255,255,.45); font-size: .9rem; margin-top: .6rem; }

    /* ─── Carte tableau ────────────────────────────────────────── */
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
        color: rgba(255,255,255,.75); font-size: .88rem; vertical-align: middle;
    }
    .not-table tbody tr { transition: background .2s; }
    .not-table tbody tr:hover { background: rgba(249,115,22,.05); }
    .not-table tbody tr:last-child td { border-bottom: none; }

    .not-rank {
        display: inline-flex; align-items: center; justify-content: center;
        width: 30px; height: 30px; border-radius: 50%;
        font-weight: 800; font-size: .85rem;
        background: rgba(255,255,255,.06); color: rgba(255,255,255,.6);
    }
    .not-rank.gold   { background: linear-gradient(135deg,#facc15,#eab308); color: #1a1a10; box-shadow: 0 0 14px rgba(250,204,21,.35); }
    .not-rank.silver { background: linear-gradient(135deg,#e5e7eb,#9ca3af); color: #1a1a10; box-shadow: 0 0 14px rgba(229,231,235,.25); }
    .not-rank.bronze { background: linear-gradient(135deg,#f0b27a,#c07a3e); color: #1a1a10; box-shadow: 0 0 14px rgba(240,178,122,.3); }

    .not-ville-link { color: #fb923c; font-weight: 700; text-decoration: none; }
    .not-ville-link:hover { color: #f97316; text-decoration: underline; }

    .not-total { color: #fb923c; font-weight: 800; }

    .not-empty { text-align: center; padding: 3rem 1rem; color: rgba(255,255,255,.3); }

    /* ─── Tooltips Bootstrap en thème sombre ──────────────────────*/
    .tooltip { --bs-tooltip-bg: #16161f; --bs-tooltip-color: rgba(255,255,255,.9); }
    .tooltip-inner-custom p { color: rgba(255,255,255,.8); margin: 2px 0; font-size: 12px; position: relative; padding-right: 40px; }
    .tooltip-inner-custom p.indent { padding-left: 10px; }
    .tooltip-inner-custom p span:first-child { display: inline-block; width: calc(100% - 10px); text-align: left; }
    .tooltip-inner-custom p span:last-child { position: absolute; right: 0; top: 0; text-align: right; width: 50px; }
    .large-tooltip-trigger[aria-describedby]+.tooltip { --bs-tooltip-max-width: 800px; }
    .tooltip-align-left .tooltip-inner { text-align: left; }
    .tooltip-xxl { --bs-tooltip-max-width: 50px; }
    .tooltip-xxl .tooltip-inner {
        width: 12vw; max-width: none !important; overflow-y: auto;
        white-space: normal; font-size: 14px; text-align: left;
    }

    @media (max-width: 900px) {
        .not-table { min-width: 900px; }
    }
</style>

<div class="not-shell">
    <div class="not-shell-gradient"></div>
    <div class="not-shell-grid"></div>

    <div class="not-inner">
        <div class="not-header">
            <p class="section-label">Classement hebdomadaire</p>
            <h1 class="section-heading">🏆 Classement des Villes</h1>
            @if($parametres)
                <p class="not-week">Semaine du {{ \Carbon\Carbon::parse($parametres->date_semaine)->isoFormat('D MMMM Y') }}</p>
            @endif
        </div>

        <div class="not-card">
            <div class="table-responsive">
                <table class="not-table" id="classementTable">
                    <thead>
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
                            <th scope="col">Montant Donné</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($villes as $ville)
                            <tr>
                                <td>
                                    <span class="not-rank {{ $ville->classement === 1 ? 'gold' : ($ville->classement === 2 ? 'silver' : ($ville->classement === 3 ? 'bronze' : '')) }}">
                                        {{ $ville->classement }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('show', ['id' => $ville->id_villes]) }}" class="not-ville-link">
                                        {{ $ville->nom_villes }}
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
                                <td class="not-total">{{ $ville->total_points }}</td>
                                <td>{{ $ville->montant_ville }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="not-empty">Aucune ville classée pour l'instant.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function(el) {
            const tooltip = new bootstrap.Tooltip(el, { container: 'body' });
            if (el.classList.contains('tooltip-left-align')) {
                tooltip._config.customClass = 'tooltip-align-left';
            }
        });
    });
</script>
@endsection
