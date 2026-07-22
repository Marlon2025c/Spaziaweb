<div id="dashboard-content">
@php
    $typeLabels = [
        'conflit'     => ['label' => 'Conflit',      'color' => '#f87171', 'bg' => 'rgba(248,113,113,.12)'],
        'grief'       => ['label' => 'Grief',         'color' => '#fb923c', 'bg' => 'rgba(251,146,60,.12)'],
        'harcelement' => ['label' => 'Harcèlement',   'color' => '#f472b6', 'bg' => 'rgba(244,114,182,.12)'],
        'rumeur'      => ['label' => 'Rumeur',         'color' => '#facc15', 'bg' => 'rgba(250,204,21,.12)'],
        'arnaque'     => ['label' => 'Arnaque',        'color' => '#4ade80', 'bg' => 'rgba(74,222,128,.12)'],
        'spam'        => ['label' => 'Spam',           'color' => '#38bdf8', 'bg' => 'rgba(56,189,248,.12)'],
        'exploit_bug' => ['label' => 'Exploit bug',   'color' => '#a78bfa', 'bg' => 'rgba(167,139,250,.12)'],
        'autre'       => ['label' => 'Autre',          'color' => 'rgba(255,255,255,.4)', 'bg' => 'rgba(255,255,255,.06)'],
    ];
@endphp

<style>
    .rl-stats-row {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
        gap: .75rem;
        margin-bottom: 1.5rem;
    }
    .rl-stat {
        background: rgba(255,255,255,.025);
        border: 1px solid rgba(255,255,255,.07);
        border-radius: 14px;
        padding: .9rem 1.1rem;
    }
    .rl-stat-label { font-size:.68rem; font-weight:700; letter-spacing:.12em; text-transform:uppercase; color:rgba(255,255,255,.3); }
    .rl-stat-value { font-size:1.8rem; font-weight:800; color:#fff; line-height:1.1; margin:.15rem 0 0; }
    .rl-stat-sub   { font-size:.72rem; color:rgba(255,255,255,.35); margin-top:.15rem; }

    .rl-toolbar {
        display: flex; align-items: center; flex-wrap: wrap; gap: .5rem;
        margin-bottom: 1.25rem;
    }
    .rl-chip {
        font-size:.75rem; font-weight:700; letter-spacing:.06em;
        padding:.35rem 1rem; border-radius:999px;
        border:1px solid rgba(255,255,255,.1);
        background:rgba(255,255,255,.04);
        color:rgba(255,255,255,.5);
        cursor:pointer; user-select:none; transition:all .2s;
    }
    .rl-chip:hover { border-color:rgba(249,115,22,.4); color:#fb923c; }
    .rl-chip.active { background:rgba(249,115,22,.12); border-color:#fb923c; color:#fb923c; }
    .rl-search {
        margin-left:auto;
        background:rgba(255,255,255,.05); border:1px solid rgba(255,255,255,.1);
        border-radius:9px; color:#fff; padding:.4rem .85rem;
        font-size:.84rem; outline:none; width:210px; font-family:inherit;
        transition:border-color .2s;
    }
    .rl-search:focus { border-color:rgba(249,115,22,.5); }
    .rl-search::placeholder { color:rgba(255,255,255,.22); }

    .rl-table-wrap {
        background:rgba(255,255,255,.025);
        border:1px solid rgba(255,255,255,.07);
        border-radius:18px; overflow:hidden;
    }
    .rl-table { width:100%; border-collapse:collapse; }
    .rl-table thead th {
        padding:.7rem 1.1rem;
        font-size:.68rem; font-weight:700; letter-spacing:.12em; text-transform:uppercase;
        color:rgba(255,255,255,.3);
        border-bottom:1px solid rgba(255,255,255,.06);
        background:rgba(255,255,255,.02);
        white-space:nowrap;
    }
    .rl-table tbody tr { border-bottom:1px solid rgba(255,255,255,.04); transition:background .15s; cursor:pointer; }
    .rl-table tbody tr:last-child { border-bottom:none; }
    .rl-table tbody tr:hover { background:rgba(255,255,255,.03); }
    .rl-table td { padding:.85rem 1.1rem; font-size:.86rem; color:rgba(255,255,255,.65); vertical-align:middle; }

    .rl-mode-badge {
        display:inline-flex; align-items:center; gap:.35rem;
        font-size:.7rem; font-weight:700; letter-spacing:.07em; text-transform:uppercase;
        padding:.25rem .75rem; border-radius:999px;
    }
    .rl-mode-quot   { background:rgba(249,115,22,.1); color:#fb923c; }
    .rl-mode-joueur { background:rgba(99,102,241,.1); color:#818cf8; }

    .rl-type-wrap { display:flex; flex-wrap:wrap; gap:.3rem; }
    .rl-type-badge { font-size:.68rem; font-weight:700; letter-spacing:.06em; padding:.2rem .6rem; border-radius:999px; }

    .rl-empty { padding:3.5rem; text-align:center; }
    .rl-empty-icon { font-size:2.5rem; margin-bottom:.75rem; opacity:.4; }
    .rl-empty-text { color:rgba(255,255,255,.3); font-size:.9rem; }

    .rl-footer {
        padding:.75rem 1.1rem;
        border-top:1px solid rgba(255,255,255,.06);
        font-size:.75rem; color:rgba(255,255,255,.25);
        display:flex; align-items:center; justify-content:space-between;
    }

    /* ─── Modal ──────────────────────────────── */
    .rl-modal-overlay {
        display:none; position:fixed; inset:0; z-index:9999;
        background:rgba(0,0,0,.7); backdrop-filter:blur(4px);
        align-items:center; justify-content:center; padding:1.5rem;
    }
    .rl-modal-overlay.open { display:flex; }
    .rl-modal {
        background:#12121c;
        border:1px solid rgba(255,255,255,.1);
        border-radius:20px; padding:2rem;
        width:100%; max-width:600px;
        max-height:85vh; overflow-y:auto;
        position:relative;
    }
    .rl-modal-close {
        position:absolute; top:1rem; right:1rem;
        background:rgba(255,255,255,.07); border:1px solid rgba(255,255,255,.1);
        border-radius:8px; color:rgba(255,255,255,.5);
        width:32px; height:32px; cursor:pointer;
        display:flex; align-items:center; justify-content:center; transition:all .2s;
    }
    .rl-modal-close:hover { background:rgba(239,68,68,.1); border-color:rgba(239,68,68,.3); color:#f87171; }
    .rl-mf-label { font-size:.68rem; font-weight:700; letter-spacing:.12em; text-transform:uppercase; color:rgba(255,255,255,.3); margin-bottom:.35rem; }
    .rl-mf-value { color:rgba(255,255,255,.8); font-size:.9rem; line-height:1.75; }
    .rl-modal-sep { height:1px; background:rgba(255,255,255,.06); margin:1.1rem 0; }
</style>

{{-- Header --}}
<div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;margin-bottom:1.5rem;">
    <div>
        <p style="font-size:.72rem;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.35);margin:0 0 .15rem;">Staff · Report</p>
        <h2 style="font-size:1.6rem;font-weight:800;color:#fff;margin:0;">Liste des reports</h2>
    </div>
    <button style="background:linear-gradient(135deg,#f97316,#ea580c);border:none;color:#fff;font-weight:700;font-size:.85rem;padding:.6rem 1.25rem;border-radius:10px;cursor:pointer;" onclick="loadSection('report_form')">
        + Nouveau report
    </button>
</div>

{{-- Stats --}}
@php
    $total     = $reports->count();
    $quotidien = $reports->where('mode','quotidien')->count();
    $joueurs   = $reports->where('mode','joueur')->count();
@endphp
<div class="rl-stats-row">
    <div class="rl-stat">
        <p class="rl-stat-label">Total</p>
        <p class="rl-stat-value">{{ $total }}</p>
        <p class="rl-stat-sub">Reports enregistrés</p>
    </div>
    <div class="rl-stat">
        <p class="rl-stat-label" style="color:rgba(249,115,22,.6);">Quotidiens</p>
        <p class="rl-stat-value" style="color:#fb923c;">{{ $quotidien }}</p>
        <p class="rl-stat-sub">Rapports de journée</p>
    </div>
    <div class="rl-stat">
        <p class="rl-stat-label" style="color:rgba(99,102,241,.6);">Joueurs</p>
        <p class="rl-stat-value" style="color:#818cf8;">{{ $joueurs }}</p>
        <p class="rl-stat-sub">Reports de joueur</p>
    </div>
</div>

{{-- Toolbar --}}
<div class="rl-toolbar">
    <span class="rl-chip active" data-filter="tous"      onclick="setFilter(this)">Tous</span>
    <span class="rl-chip"        data-filter="quotidien" onclick="setFilter(this)">📅 Quotidien</span>
    <span class="rl-chip"        data-filter="joueur"    onclick="setFilter(this)">👤 Joueur</span>
    <input class="rl-search" type="text" id="rlSearch" placeholder="Rechercher…" oninput="filterTable()">
</div>

{{-- Tableau --}}
<div class="rl-table-wrap">
    @if($reports->isEmpty())
        <div class="rl-empty">
            <div class="rl-empty-icon">📋</div>
            <p class="rl-empty-text">Aucun report pour le moment.</p>
        </div>
    @else
        <table class="rl-table" id="rlTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Type</th>
                    <th>Sujet / Joueur</th>
                    <th>Infraction(s)</th>
                    <th>Par</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $r)
                @php
                    $isJoueur = $r->mode === 'joueur';
                    $subject  = $isJoueur
                        ? ($r->pseudo ?? '—')
                        : 'Journée du '.\Carbon\Carbon::parse($r->date)->translatedFormat('d M Y');
                    $by = $isJoueur ? ($r->moderateur ?? '—') : ($r->auteur ?? '—');
                @endphp
                <tr data-mode="{{ $r->mode }}"
                    data-search="{{ strtolower($subject . ' ' . $by) }}"
                    onclick="openModal({{ $r->id }})">
                    <td style="color:rgba(255,255,255,.25);font-size:.78rem;">#{{ $r->id }}</td>
                    <td>
                        <span class="rl-mode-badge {{ $isJoueur ? 'rl-mode-joueur' : 'rl-mode-quot' }}">
                            {{ $isJoueur ? '👤 Joueur' : '📅 Quotidien' }}
                        </span>
                    </td>
                    <td style="color:#fff;font-weight:600;max-width:200px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                        {{ $subject }}
                    </td>
                    <td>
                        @if($isJoueur && $r->types)
                            <div class="rl-type-wrap">
                                @foreach(explode(',', $r->types) as $t)
                                    @php $ti = $typeLabels[trim($t)] ?? null; @endphp
                                    @if($ti)
                                        <span class="rl-type-badge" style="background:{{ $ti['bg'] }};color:{{ $ti['color'] }};">{{ $ti['label'] }}</span>
                                    @endif
                                @endforeach
                            </div>
                        @else
                            <span style="color:rgba(255,255,255,.2);font-size:.8rem;">—</span>
                        @endif
                    </td>
                    <td>{{ $by }}</td>
                    <td style="color:rgba(255,255,255,.4);font-size:.8rem;white-space:nowrap;">
                        {{ $r->created_at->translatedFormat('d M Y') }}
                    </td>
                    <td style="color:rgba(255,255,255,.3);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="rl-footer">
            <span id="rlCount">{{ $total }} report(s)</span>
        </div>
    @endif
</div>

{{-- Modals --}}
@foreach($reports as $r)
@php $isJoueur = $r->mode === 'joueur'; @endphp
<div class="rl-modal-overlay" id="modal-{{ $r->id }}" onclick="if(event.target===this)closeModal({{ $r->id }})">
    <div class="rl-modal">
        <button class="rl-modal-close" onclick="closeModal({{ $r->id }})">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
            </svg>
        </button>

        <span class="rl-mode-badge {{ $isJoueur ? 'rl-mode-joueur' : 'rl-mode-quot' }}" style="display:inline-flex;margin-bottom:.75rem;">
            {{ $isJoueur ? '👤 Report joueur' : '📅 Report quotidien' }}
        </span>

        @if($isJoueur)
            <h3 style="font-size:1.25rem;font-weight:800;color:#fff;margin:0 0 .25rem;">{{ $r->pseudo ?? '—' }}</h3>
            @if($r->steam_id)
                <p style="font-size:.78rem;color:rgba(255,255,255,.3);margin:0 0 1rem;font-family:monospace;">Steam : {{ $r->steam_id }}</p>
            @endif
        @else
            <h3 style="font-size:1.25rem;font-weight:800;color:#fff;margin:0 0 1rem;">
                Journée du {{ \Carbon\Carbon::parse($r->date)->translatedFormat('l d F Y') }}
            </h3>
        @endif

        <div class="rl-modal-sep"></div>

        @if($isJoueur)
            <div style="margin-bottom:1rem;">
                <p class="rl-mf-label">Type(s) d'infraction</p>
                <div class="rl-type-wrap">
                    @foreach(explode(',', $r->types ?? '') as $t)
                        @php $ti = $typeLabels[trim($t)] ?? null; @endphp
                        @if($ti)
                            <span class="rl-type-badge" style="background:{{ $ti['bg'] }};color:{{ $ti['color'] }};font-size:.8rem;padding:.3rem .85rem;">{{ $ti['label'] }}</span>
                        @endif
                    @endforeach
                </div>
            </div>
            <div style="margin-bottom:1rem;">
                <p class="rl-mf-label">Rapport</p>
                <p class="rl-mf-value" style="white-space:pre-wrap;">{{ $r->description }}</p>
            </div>
            <div>
                <p class="rl-mf-label">Modérateur</p>
                <p class="rl-mf-value">{{ $r->moderateur }}</p>
            </div>
        @else
            <div style="margin-bottom:1rem;">
                <p class="rl-mf-label">Résumé de la journée</p>
                <p class="rl-mf-value" style="white-space:pre-wrap;">{{ $r->resume }}</p>
            </div>
            <div>
                <p class="rl-mf-label">Auteur</p>
                <p class="rl-mf-value">{{ $r->auteur }}</p>
            </div>
        @endif

        <div class="rl-modal-sep"></div>
        <p style="font-size:.75rem;color:rgba(255,255,255,.25);">Soumis le {{ $r->created_at->translatedFormat('d M Y à H:i') }}</p>
    </div>
</div>
@endforeach

<script>
let activeFilter = 'tous';

function setFilter(el) {
    document.querySelectorAll('.rl-chip').forEach(c => c.classList.remove('active'));
    el.classList.add('active');
    activeFilter = el.dataset.filter;
    filterTable();
}

function filterTable() {
    const q = document.getElementById('rlSearch').value.toLowerCase();
    let visible = 0;
    document.querySelectorAll('#rlTable tbody tr').forEach(row => {
        const show = (activeFilter === 'tous' || row.dataset.mode === activeFilter)
                  && (!q || row.dataset.search.includes(q));
        row.style.display = show ? '' : 'none';
        if (show) visible++;
    });
    const el = document.getElementById('rlCount');
    if (el) el.textContent = visible + ' report(s)';
}

function openModal(id)  { document.getElementById('modal-' + id)?.classList.add('open'); }
function closeModal(id) { document.getElementById('modal-' + id)?.classList.remove('open'); }
</script>

</div>
