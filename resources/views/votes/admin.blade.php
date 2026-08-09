@extends('layouts.app')
@section('title', 'Spazia - Gestion des sondages')
@section('content')

<style>
    body { background: #0a0a10; }
    .adm-bg { min-height: 90vh; position: relative; padding: 6rem 0 4rem; }
    .adm-bg-gradient {
        position: fixed; inset: 0; pointer-events: none; z-index: 0;
        background:
            radial-gradient(ellipse 70% 50% at 10% 20%, rgba(249,115,22,.10) 0%, transparent 55%),
            radial-gradient(ellipse 50% 40% at 85% 70%, rgba(34,197,94,.08) 0%, transparent 55%),
            #0a0a10;
    }
    .adm-card {
        position: relative; z-index: 1;
        background: rgba(255,255,255,.025);
        border: 1px solid rgba(255,255,255,.07);
        border-radius: 20px;
        padding: 2rem 2.5rem;
        backdrop-filter: blur(8px);
        margin-bottom: 2rem;
    }
    .adm-title { font-size: 1.4rem; font-weight: 800; color: #fff; }
    .adm-label { font-size: .8rem; letter-spacing: .1em; color: #fb923c; text-transform: uppercase; }
    .adm-input, .adm-textarea {
        background: rgba(255,255,255,.04); border: 1px solid rgba(255,255,255,.1);
        color: #fff; border-radius: 10px; padding: .6rem .9rem; width: 100%;
    }
    .adm-input:focus, .adm-textarea:focus { outline: none; border-color: #fb923c; background: rgba(255,255,255,.06); }
    .adm-input::placeholder, .adm-textarea::placeholder { color: rgba(255,255,255,.35); }
    .adm-btn {
        background: linear-gradient(135deg, #f97316, #ea580c); color: #fff; border: none;
        padding: .6rem 1.5rem; border-radius: 10px; font-weight: 700;
    }
    .adm-btn:hover { opacity: .9; color: #fff; }
    .adm-btn-danger { background: rgba(239,68,68,.15); color: #f87171; border: 1px solid rgba(239,68,68,.3); padding: .4rem 1rem; border-radius: 8px; font-size: .85rem; }
    .adm-btn-secondary { background: rgba(255,255,255,.07); color: #fff; border: 1px solid rgba(255,255,255,.12); padding: .4rem 1rem; border-radius: 8px; font-size: .85rem; }
    .opt-row { display: flex; gap: .5rem; margin-bottom: .5rem; }
    .opt-remove { background: rgba(239,68,68,.15); color: #f87171; border: none; border-radius: 8px; width: 38px; }
    .result-bar { background: rgba(255,255,255,.05); border-radius: 10px; overflow: hidden; position: relative; padding: .6rem 1rem; margin-bottom: .5rem; }
    .result-bar-fill { position: absolute; inset: 0; z-index: 0; background: rgba(249,115,22,.15); width: 0%; transition: width .4s ease; }
    .result-bar-content { position: relative; z-index: 1; display: flex; justify-content: space-between; color: #fff; font-weight: 600; }
    .voter-row { display: flex; align-items: center; gap: .6rem; padding: .4rem 0; border-bottom: 1px solid rgba(255,255,255,.05); }
    .voter-row img { width: 26px; height: 26px; border-radius: 50%; }
    .voter-name { color: #fff; font-size: .85rem; }
    .voter-choix { color: #fb923c; font-size: .85rem; margin-left: auto; font-weight: 600; }
    .status-dot-live { width: 8px; height: 8px; background: #4ade80; border-radius: 50%; box-shadow: 0 0 0 3px rgba(34,197,94,.25); animation: pulse-dot 2s infinite; display: inline-block; }
    @keyframes pulse-dot {
        0%, 100% { box-shadow: 0 0 0 3px rgba(34,197,94,.25); }
        50%       { box-shadow: 0 0 0 6px rgba(34,197,94,.1); }
    }
    .hist-item { background: rgba(255,255,255,.02); border: 1px solid rgba(255,255,255,.06); border-radius: 12px; padding: 1rem 1.25rem; margin-bottom: .75rem; }
</style>

<div class="adm-bg">
    <div class="adm-bg-gradient"></div>

    <div class="container" style="max-width: 900px;">
        <div class="d-flex align-items-center justify-content-between mb-4" style="position:relative;z-index:1;">
            <h1 class="adm-title mb-0">Gestion des sondages</h1>
            <a href="{{ route('votes.index') }}" class="adm-btn-secondary text-decoration-none">← Vue vote staff</a>
        </div>

        @if ($sondageOuvert)
            {{-- Sondage en cours --}}
            <div class="adm-card">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <span style="color:#4ade80;font-size:.8rem;font-weight:700;text-transform:uppercase;letter-spacing:.08em;">
                        <span class="status-dot-live"></span>&nbsp;Sondage en cours
                    </span>
                    <div class="d-flex gap-2">
                        <button class="adm-btn-danger" onclick="fermerSondage({{ $sondageOuvert->id }})">Fermer le sondage</button>
                    </div>
                </div>
                <h2 class="text-white fs-4 fw-bold mb-1">{{ $sondageOuvert->titre }}</h2>
                @if ($sondageOuvert->description)
                    <p style="color:rgba(255,255,255,.5)">{{ $sondageOuvert->description }}</p>
                @endif

                <div id="resultats-container" data-sondage-id="{{ $sondageOuvert->id }}" class="mt-3">
                    <div id="resultats-bars"></div>
                    <p class="adm-label mt-4 mb-2">Qui a voté quoi</p>
                    <div id="voters-list" style="max-height:280px; overflow-y:auto;"></div>
                </div>
            </div>
        @endif

        {{-- Brouillons préparés à l'avance --}}
        @if ($brouillons->count())
            <div class="adm-card">
                <h2 class="text-white fs-5 fw-bold mb-3">Sondages préparés ({{ $brouillons->count() }})</h2>
                @foreach ($brouillons as $b)
                    <div class="hist-item d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-white fw-semibold mb-0">{{ $b->titre }}</p>
                            @if ($b->description)
                                <p style="color:rgba(255,255,255,.4);font-size:.75rem;" class="mb-0">{{ $b->description }}</p>
                            @endif
                        </div>
                        <div class="d-flex gap-2">
                            <button class="adm-btn" style="padding:.4rem 1rem;font-size:.85rem;" {{ $sondageOuvert ? 'disabled title="Ferme le sondage en cours avant d\'en activer un autre"' : '' }} onclick="activerSondage({{ $b->id }})">Activer</button>
                            <button class="adm-btn-danger" onclick="supprimerSondage({{ $b->id }})">Supprimer</button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Création d'un nouveau sondage (brouillon) --}}
        <div class="adm-card">
            <h2 class="text-white fs-5 fw-bold mb-3">Préparer un sondage</h2>
            <form id="form-sondage">
                <div class="mb-3">
                    <label class="adm-label d-block mb-1">Titre</label>
                    <input type="text" name="titre" class="adm-input" placeholder="Ex : Date de sortie de la Saison 8" required>
                </div>
                <div class="mb-3">
                    <label class="adm-label d-block mb-1">Description (optionnel)</label>
                    <textarea name="description" class="adm-textarea" rows="2" placeholder="Contexte du vote..."></textarea>
                </div>
                <div class="mb-3">
                    <label class="adm-label d-block mb-1">Choix proposés</label>
                    <div id="options-list">
                        <div class="opt-row">
                            <input type="text" name="options[]" class="adm-input" placeholder="Choix 1" required>
                        </div>
                        <div class="opt-row">
                            <input type="text" name="options[]" class="adm-input" placeholder="Choix 2" required>
                        </div>
                    </div>
                    <button type="button" class="adm-btn-secondary mt-1" onclick="ajouterOption()">+ Ajouter un choix</button>
                </div>
                <button type="submit" class="adm-btn">Enregistrer en brouillon</button>
                <p id="form-error" class="text-danger mt-2 mb-0" style="display:none;"></p>
            </form>
        </div>

        {{-- Historique --}}
        @if ($historique->count())
            <div class="adm-card">
                <h2 class="text-white fs-5 fw-bold mb-3">Historique des sondages</h2>
                @foreach ($historique as $h)
                    <div class="hist-item d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-white fw-semibold mb-0">{{ $h->titre }}</p>
                            <p style="color:rgba(255,255,255,.4);font-size:.75rem;" class="mb-0">{{ $h->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="adm-btn-secondary" onclick="voirDetail({{ $h->id }})">Voir résultats</button>
                            <button class="adm-btn-danger" onclick="supprimerSondage({{ $h->id }})">Supprimer</button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<script>
    const csrf = document.querySelector('meta[name="csrf-token"]').content;

    function escapeHtml(str) {
        const div = document.createElement('div');
        div.textContent = str ?? '';
        return div.innerHTML;
    }

    function ajouterOption() {
        const list = document.getElementById('options-list');
        const row = document.createElement('div');
        row.className = 'opt-row';
        row.innerHTML = `<input type="text" name="options[]" class="adm-input" placeholder="Choix" required>
            <button type="button" class="opt-remove" onclick="this.parentElement.remove()">✕</button>`;
        list.appendChild(row);
    }

    const formSondage = document.getElementById('form-sondage');
    if (formSondage) {
        formSondage.addEventListener('submit', (e) => {
            e.preventDefault();
            const formData = new FormData(formSondage);
            const options = formData.getAll('options[]').filter(o => o.trim() !== '');

            fetch("{{ route('votes.store') }}", {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf },
                body: JSON.stringify({
                    titre: formData.get('titre'),
                    description: formData.get('description'),
                    options: options,
                }),
            })
            .then(r => r.json().then(data => ({ status: r.status, data })))
            .then(({ status, data }) => {
                if (status !== 200 || data.error) {
                    const err = document.getElementById('form-error');
                    err.textContent = data.error || 'Erreur inconnue';
                    err.style.display = 'block';
                    return;
                }
                location.reload();
            });
        });
    }

    function activerSondage(id) {
        fetch(`/votes/admin/${id}/activer`, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': csrf },
        })
        .then(r => r.json().then(data => ({ status: r.status, data })))
        .then(({ status, data }) => {
            if (status !== 200 || data.error) {
                alert(data.error || 'Erreur inconnue');
                return;
            }
            location.reload();
        });
    }

    function fermerSondage(id) {
        if (!confirm('Fermer ce sondage ? Les résultats seront figés.')) return;
        fetch(`/votes/admin/${id}/close`, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': csrf },
        }).then(() => location.reload());
    }

    function supprimerSondage(id) {
        if (!confirm('Supprimer définitivement ce sondage ?')) return;
        fetch(`/votes/admin/${id}`, {
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': csrf },
        }).then(() => location.reload());
    }

    function voirDetail(id) {
        fetch(`/votes/admin/${id}/resultats-detail`)
            .then(r => r.json())
            .then(data => {
                let html = `<h4 style="color:#fff;">Résultats</h4>`;
                data.options.forEach(o => {
                    html += `<div class="result-bar"><div class="result-bar-fill" style="width:${o.pct}%"></div><div class="result-bar-content"><span>${escapeHtml(o.label)}</span><span>${o.pct}% (${o.count})</span></div></div>`;
                });
                html += `<h5 style="color:#fff;margin-top:1rem;">Votants</h5>`;
                data.votants.forEach(v => {
                    html += `<div class="voter-row"><span class="voter-name">${escapeHtml(v.nom)}</span><span class="voter-choix">${escapeHtml(v.choix)}</span></div>`;
                });
                const w = window.open('', '_blank', 'width=500,height=600');
                w.document.write(`<body style="background:#0a0a10;font-family:sans-serif;padding:1.5rem;">${html}</body>`);
            });
    }

    // Live results pour le sondage en cours
    const resultatsContainer = document.getElementById('resultats-container');
    if (resultatsContainer) {
        const sondageId = resultatsContainer.dataset.sondageId;

        function refreshDetail() {
            fetch(`/votes/admin/${sondageId}/resultats-detail`)
                .then(r => r.json())
                .then(data => {
                    let bars = '';
                    data.options.forEach(o => {
                        bars += `<div class="result-bar"><div class="result-bar-fill" style="width:${o.pct}%"></div><div class="result-bar-content"><span>${escapeHtml(o.label)}</span><span>${o.pct}% (${o.count})</span></div></div>`;
                    });
                    document.getElementById('resultats-bars').innerHTML = bars;

                    let voters = '';
                    if (data.votants.length === 0) {
                        voters = '<p style="color:rgba(255,255,255,.35);font-size:.85rem;">Aucun vote pour l\'instant.</p>';
                    } else {
                        data.votants.forEach(v => {
                            voters += `<div class="voter-row">${v.avatar ? `<img src="${escapeHtml(v.avatar)}">` : ''}<span class="voter-name">${escapeHtml(v.nom)}</span><span class="voter-choix">${escapeHtml(v.choix)}</span></div>`;
                        });
                    }
                    document.getElementById('voters-list').innerHTML = voters;
                })
                .catch(() => {});
        }

        refreshDetail();
        setInterval(refreshDetail, 3000);
    }
</script>

@endsection
