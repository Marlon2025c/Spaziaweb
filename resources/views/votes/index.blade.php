@extends('layouts.app')
@section('title', 'Spazia - Sondages')
@section('content')

<style>
    body { background: #0a0a10; }
    .vote-bg { min-height: 90vh; position: relative; padding: 6rem 0 4rem; }
    .vote-bg-gradient {
        position: fixed; inset: 0; pointer-events: none; z-index: 0;
        background:
            radial-gradient(ellipse 70% 50% at 10% 20%, rgba(249,115,22,.10) 0%, transparent 55%),
            radial-gradient(ellipse 50% 40% at 85% 70%, rgba(34,197,94,.08) 0%, transparent 55%),
            #0a0a10;
    }
    .vote-card {
        position: relative; z-index: 1;
        background: rgba(255,255,255,.025);
        border: 1px solid rgba(255,255,255,.07);
        border-radius: 20px;
        padding: 2.5rem;
        backdrop-filter: blur(8px);
        max-width: 720px;
        margin: 0 auto;
    }
    .vote-badge { background: rgba(249,115,22,.15); border: 1px solid rgba(249,115,22,.4); color: #fb923c; font-size: .75rem; letter-spacing: .1em; padding: .35rem 1rem; }
    .vote-title { font-size: 1.9rem; font-weight: 800; color: #fff; }
    .vote-desc { color: rgba(255,255,255,.55); line-height: 1.6; }
    .vote-option {
        background: rgba(255,255,255,.03);
        border: 1px solid rgba(255,255,255,.09);
        border-radius: 14px;
        padding: 1rem 1.25rem;
        cursor: pointer;
        transition: border-color .2s, background .2s;
        position: relative;
        overflow: hidden;
    }
    .vote-option:hover { border-color: rgba(249,115,22,.4); background: rgba(249,115,22,.05); }
    .vote-option.selected { border-color: #fb923c; background: rgba(249,115,22,.1); }
    .vote-option-fill {
        position: absolute; inset: 0; z-index: 0;
        background: rgba(249,115,22,.12);
        width: 0%;
        transition: width .4s ease;
    }
    .vote-option-content { position: relative; z-index: 1; display: flex; justify-content: space-between; align-items: center; color: #fff; }
    .vote-option-label { font-weight: 600; }
    .vote-option-pct { font-weight: 700; color: #fb923c; font-variant-numeric: tabular-nums; }
    .vote-total { font-size: .8rem; color: rgba(255,255,255,.4); }
    .status-dot-live { width: 8px; height: 8px; background: #4ade80; border-radius: 50%; box-shadow: 0 0 0 3px rgba(34,197,94,.25); animation: pulse-dot 2s infinite; display: inline-block; }
    @keyframes pulse-dot {
        0%, 100% { box-shadow: 0 0 0 3px rgba(34,197,94,.25); }
        50%       { box-shadow: 0 0 0 6px rgba(34,197,94,.1); }
    }
    .vote-empty { text-align: center; color: rgba(255,255,255,.45); padding: 3rem 1rem; }
</style>

<div class="vote-bg">
    <div class="vote-bg-gradient"></div>

    <div class="container">
        @if (Auth::user()->hasRole([7, 8]))
            <div class="text-center mb-3" style="position:relative; z-index:1;">
                <a href="{{ route('votes.admin') }}" class="text-decoration-none" style="color:#fb923c; font-size:.85rem;">
                    ⚙️ Gérer les sondages (créer / résultats détaillés)
                </a>
            </div>
        @endif

        <div class="vote-card">
            @if (!$sondage)
                <div class="vote-empty">
                    <p class="mb-0">Aucun sondage en cours pour le moment.</p>
                    <p class="mb-0">Le fondateur peut en lancer un depuis la gestion des sondages.</p>
                </div>
            @else
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <span class="vote-badge d-inline-block fw-semibold text-uppercase rounded-pill">
                        <span class="status-dot-live"></span>&nbsp;Vote en direct
                    </span>
                    <span class="vote-total" id="vote-total">{{ $sondage->options->sum('votes_count') }} vote(s)</span>
                </div>

                <h1 class="vote-title mb-2">{{ $sondage->titre }}</h1>
                @if ($sondage->description)
                    <p class="vote-desc mb-4">{{ $sondage->description }}</p>
                @endif

                <div class="d-flex flex-column gap-3" id="vote-options" data-sondage-id="{{ $sondage->id }}">
                    @php $total = $sondage->options->sum('votes_count'); @endphp
                    @foreach ($sondage->options as $option)
                        <div class="vote-option {{ $monVote == $option->id ? 'selected' : '' }}" data-option-id="{{ $option->id }}">
                            <div class="vote-option-fill" style="width: {{ $total > 0 ? round($option->votes_count / $total * 100) : 0 }}%"></div>
                            <div class="vote-option-content">
                                <span class="vote-option-label">{{ $option->label }}</span>
                                <span class="vote-option-pct">{{ $total > 0 ? round($option->votes_count / $total * 100) : 0 }}% ({{ $option->votes_count }})</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <p class="text-center mt-4 mb-0" style="font-size:.8rem;color:rgba(255,255,255,.35);">
                    Clique sur un choix pour voter — tu peux changer d'avis tant que le sondage est ouvert.
                </p>
            @endif
        </div>
    </div>
</div>

@if ($sondage)
<script>
    const sondageId = {{ $sondage->id }};
    const container = document.getElementById('vote-options');

    container.querySelectorAll('.vote-option').forEach(el => {
        el.addEventListener('click', () => {
            const optionId = el.dataset.optionId;
            fetch(`/votes/${sondageId}/vote`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ option_id: optionId }),
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    container.querySelectorAll('.vote-option').forEach(o => o.classList.remove('selected'));
                    el.classList.add('selected');
                    refreshResultats();
                }
            });
        });
    });

    function refreshResultats() {
        fetch(`/votes/${sondageId}/resultats`)
            .then(r => r.json())
            .then(data => {
                document.getElementById('vote-total').textContent = data.total + ' vote(s)';
                data.options.forEach(opt => {
                    const el = container.querySelector(`[data-option-id="${opt.id}"]`);
                    if (!el) return;
                    el.querySelector('.vote-option-fill').style.width = opt.pct + '%';
                    el.querySelector('.vote-option-pct').textContent = opt.pct + '% (' + opt.count + ')';
                });
                if (data.statut === 'ferme') {
                    clearInterval(ticker);
                }
            })
            .catch(() => {});
    }

    const ticker = setInterval(refreshResultats, 3000);
</script>
@endif

@endsection
