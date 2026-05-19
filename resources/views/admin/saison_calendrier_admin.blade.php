@extends('layouts.app')
@section('title', 'Admin — Calendrier Saison 7.5')
@section('content')

<style>
    .nav-ul-a { color: white; }
    .navbar { background-color: #0e0e0e45; transition: background-color .3s; }
    .navbar-scrolled { background-color: #101015; }
    body, .admin-page { background: #0a0a10; min-height: 100vh; }

    .admin-header { padding: 7rem 0 2rem; }
    .admin-title { font-size: 1.8rem; font-weight: 800; color: #fff; }
    .admin-label { font-size: .75rem; letter-spacing: .15em; color: #fb923c; }

    /* Form card */
    .form-card {
        background: rgba(255,255,255,.03);
        border: 1px solid rgba(255,255,255,.07);
        border-radius: 16px; padding: 1.75rem;
    }
    .form-card label { color: rgba(255,255,255,.65); font-size: .85rem; font-weight: 600; }
    .form-control, .form-select {
        background: rgba(255,255,255,.05) !important;
        border: 1px solid rgba(255,255,255,.1) !important;
        color: #fff !important;
        border-radius: 10px;
    }
    .form-control:focus, .form-select:focus {
        border-color: rgba(249,115,22,.5) !important;
        box-shadow: 0 0 0 3px rgba(249,115,22,.12) !important;
    }
    .form-control::placeholder { color: rgba(255,255,255,.25) !important; }
    .form-select option { background: #1a1a2e; color: #fff; }
    .form-check-input { background-color: rgba(255,255,255,.1); border-color: rgba(255,255,255,.2); }
    .form-check-input:checked { background-color: #f97316; border-color: #f97316; }

    /* Boutons */
    .btn-spazia {
        background: linear-gradient(135deg, #f97316, #ea580c);
        color: #fff; border: none; border-radius: 10px;
        padding: .65rem 1.4rem; font-weight: 700; font-size: .9rem;
        transition: transform .2s, box-shadow .2s;
    }
    .btn-spazia:hover { transform: translateY(-1px); box-shadow: 0 0 25px rgba(249,115,22,.4); color: #fff; }
    .btn-ghost {
        background: rgba(255,255,255,.06);
        color: rgba(255,255,255,.7); border: 1px solid rgba(255,255,255,.1);
        border-radius: 10px; padding: .55rem 1.1rem;
        font-size: .85rem; font-weight: 600; transition: background .2s;
    }
    .btn-ghost:hover { background: rgba(255,255,255,.1); color: #fff; }
    .btn-danger-soft {
        background: rgba(239,68,68,.1); color: #f87171;
        border: 1px solid rgba(239,68,68,.2); border-radius: 8px;
        padding: .45rem .9rem; font-size: .8rem; font-weight: 600;
        transition: background .2s;
    }
    .btn-danger-soft:hover { background: rgba(239,68,68,.2); color: #fca5a5; }

    /* Tableau */
    .week-table { width: 100%; border-collapse: separate; border-spacing: 0 .5rem; }
    .week-table thead th { color: rgba(255,255,255,.35); font-size: .75rem; font-weight: 700;
        letter-spacing: .08em; text-transform: uppercase; padding: .5rem 1rem; }
    .week-row td {
        background: rgba(255,255,255,.03); border-top: 1px solid rgba(255,255,255,.06);
        border-bottom: 1px solid rgba(255,255,255,.06);
        padding: .9rem 1rem; color: rgba(255,255,255,.75); font-size: .875rem;
        vertical-align: middle;
    }
    .week-row td:first-child { border-left: 1px solid rgba(255,255,255,.06); border-radius: 12px 0 0 12px; }
    .week-row td:last-child  { border-right: 1px solid rgba(255,255,255,.06); border-radius: 0 12px 12px 0; }
    .week-row:hover td { background: rgba(249,115,22,.04); }

    .badge-type { font-size: .7rem; font-weight: 700; letter-spacing: .08em;
        text-transform: uppercase; padding: .2rem .6rem; border-radius: 6px; }
    .type-texte { background: rgba(99,102,241,.15); color: #818cf8; }
    .type-photo { background: rgba(34,197,94,.15); color: #4ade80; }
    .type-video { background: rgba(249,115,22,.15); color: #fb923c; }
    .type-lien  { background: rgba(20,184,166,.15); color: #2dd4bf; }

    .dot-status { width: 8px; height: 8px; border-radius: 50%; display: inline-block; }
    .dot-on  { background: #4ade80; box-shadow: 0 0 6px rgba(74,222,128,.6); }
    .dot-off { background: rgba(255,255,255,.2); }

    /* Modal edit */
    .modal-content { background: #12121e; border: 1px solid rgba(255,255,255,.1); border-radius: 16px; }
    .modal-header { border-bottom: 1px solid rgba(255,255,255,.07); padding: 1.25rem 1.5rem; }
    .modal-title { color: #fff; font-weight: 700; }
    .btn-close { filter: invert(1) opacity(.5); }
    .modal-footer { border-top: 1px solid rgba(255,255,255,.07); }

    /* Alert */
    .alert-spazia {
        background: rgba(34,197,94,.1); border: 1px solid rgba(34,197,94,.2);
        color: #4ade80; border-radius: 12px; padding: .9rem 1.2rem;
    }
    .alert-danger-sp {
        background: rgba(239,68,68,.1); border: 1px solid rgba(239,68,68,.2);
        color: #f87171; border-radius: 12px; padding: .9rem 1.2rem;
    }
</style>

<div class="admin-page">
    <div class="container">

        {{-- En-tête --}}
        <div class="admin-header">
            <p class="admin-label fw-bold text-uppercase mb-1">Gestion</p>
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                <h1 class="admin-title mb-0">Calendrier Saison 7.5</h1>
                <a href="{{ route('saison75') }}" target="_blank" class="btn-ghost">
                    Voir la page publique ↗
                </a>
            </div>
        </div>

        {{-- Flash --}}
        @if(session('success'))
            <div class="alert-spazia mb-4">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert-danger-sp mb-4">
                @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
            </div>
        @endif

        <div class="row g-4">

            {{-- ── Formulaire ajout ── --}}
            <div class="col-lg-4">
                <div class="form-card">
                    <p class="fw-bold text-white mb-3" style="font-size:1rem;">Ajouter une semaine</p>
                    <form action="{{ route('admin.calendrier.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">N° semaine</label>
                            <input type="number" name="numero_semaine" class="form-control" min="1"
                                   value="{{ old('numero_semaine', ($semaines->max('numero_semaine') ?? 0) + 1) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Titre de la révélation</label>
                            <input type="text" name="titre" class="form-control"
                                   placeholder="Ex: Nouveau système de commerce" value="{{ old('titre') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description courte <span class="text-white-50">(optionnel)</span></label>
                            <textarea name="description" class="form-control" rows="2"
                                      placeholder="Quelques mots d'intro...">{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date de révélation</label>
                            <input type="date" name="date_revelation" class="form-control"
                                   value="{{ old('date_revelation') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Type de contenu</label>
                            <select name="type_contenu" class="form-select" id="add_type" onchange="toggleFields('add')">
                                <option value="texte"  {{ old('type_contenu') == 'texte'  ? 'selected' : '' }}>Texte</option>
                                <option value="photo"  {{ old('type_contenu') == 'photo'  ? 'selected' : '' }}>Photo</option>
                                <option value="video"  {{ old('type_contenu') == 'video'  ? 'selected' : '' }}>Vidéo (YouTube)</option>
                                <option value="lien"   {{ old('type_contenu') == 'lien'   ? 'selected' : '' }}>Lien externe</option>
                            </select>
                        </div>
                        <div id="add_texte" class="mb-3">
                            <label class="form-label">Contenu texte</label>
                            <textarea name="contenu_texte" class="form-control" rows="4"
                                      placeholder="Le texte à afficher…">{{ old('contenu_texte') }}</textarea>
                        </div>
                        <div id="add_url" class="mb-3 d-none">
                            <label class="form-label">URL <span class="text-white-50">(vidéo ou lien)</span></label>
                            <input type="url" name="contenu_url" class="form-control"
                                   placeholder="https://..." value="{{ old('contenu_url') }}">
                        </div>
                        <div id="add_img" class="mb-3 d-none">
                            <label class="form-label">Image</label>
                            <input type="file" name="contenu_image" class="form-control" accept="image/*">
                        </div>
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="actif" id="add_actif" checked>
                                <label class="form-check-label" for="add_actif" style="color:rgba(255,255,255,.55);">
                                    Actif (visible si date passée)
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn-spazia w-100">Ajouter la semaine</button>
                    </form>
                </div>
            </div>

            {{-- ── Liste des semaines ── --}}
            <div class="col-lg-8">
                @if($semaines->isEmpty())
                    <div class="text-center py-5" style="color:rgba(255,255,255,.3);">
                        <p>Aucune semaine configurée.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="week-table">
                            <thead>
                                <tr>
                                    <th>Sem.</th>
                                    <th>Titre</th>
                                    <th>Révélation</th>
                                    <th>Type</th>
                                    <th>Statut</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($semaines as $s)
                                    <tr class="week-row">
                                        <td class="fw-bold text-white">#{{ $s->numero_semaine }}</td>
                                        <td>{{ Str::limit($s->titre, 35) }}</td>
                                        <td>{{ $s->date_revelation->format('d/m/Y') }}</td>
                                        <td><span class="badge-type type-{{ $s->type_contenu }}">{{ $s->type_contenu }}</span></td>
                                        <td>
                                            <span class="dot-status {{ $s->isRevele() ? 'dot-on' : 'dot-off' }}" title="{{ $s->isRevele() ? 'Révélé' : 'Verrouillé' }}"></span>
                                            <span style="font-size:.75rem; margin-left:.4rem; color:rgba(255,255,255,.4);">
                                                {{ $s->isRevele() ? 'Révélé' : 'Verrouillé' }}
                                            </span>
                                        </td>
                                        <td class="text-end d-flex gap-2 justify-content-end">
                                            <button class="btn-ghost" style="padding:.4rem .8rem; font-size:.8rem;"
                                                onclick='openEdit({{ json_encode($s) }})'>
                                                Éditer
                                            </button>
                                            <form action="{{ route('admin.calendrier.destroy', $s) }}" method="POST"
                                                  onsubmit="return confirm('Supprimer la semaine {{ $s->numero_semaine }} ?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn-danger-soft">Suppr.</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>

{{-- ── Modal édition ── --}}
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier la semaine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-2">
                            <label class="form-label">N° semaine</label>
                            <input type="number" name="numero_semaine" id="edit_num" class="form-control" min="1" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Titre</label>
                            <input type="text" name="titre" id="edit_titre" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Date de révélation</label>
                            <input type="date" name="date_revelation" id="edit_date" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description courte</label>
                            <textarea name="description" id="edit_desc" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Type de contenu</label>
                            <select name="type_contenu" id="edit_type" class="form-select" onchange="toggleFields('edit')">
                                <option value="texte">Texte</option>
                                <option value="photo">Photo</option>
                                <option value="video">Vidéo (YouTube)</option>
                                <option value="lien">Lien externe</option>
                            </select>
                        </div>
                        <div class="col-12" id="edit_texte_wrap">
                            <label class="form-label">Contenu texte</label>
                            <textarea name="contenu_texte" id="edit_texte" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="col-12 d-none" id="edit_url_wrap">
                            <label class="form-label">URL</label>
                            <input type="url" name="contenu_url" id="edit_url" class="form-control" placeholder="https://...">
                        </div>
                        <div class="col-12 d-none" id="edit_img_wrap">
                            <label class="form-label">Nouvelle image <span class="text-white-50">(laisser vide pour conserver)</span></label>
                            <input type="file" name="contenu_image" class="form-control" accept="image/*">
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="actif" id="edit_actif">
                                <label class="form-check-label" for="edit_actif" style="color:rgba(255,255,255,.55);">Actif</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer gap-2">
                    <button type="button" class="btn-ghost" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn-spazia">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    window.addEventListener('scroll', () => {
        document.querySelector('.navbar')?.classList.toggle('navbar-scrolled', window.scrollY > 50);
    });

    function toggleFields(prefix) {
        const type = document.getElementById(prefix + '_type').value;
        const show = (id, show) => document.getElementById(id)?.classList.toggle('d-none', !show);
        if (prefix === 'add') {
            show('add_texte', type === 'texte' || type === 'lien');
            show('add_url',   type === 'video' || type === 'lien');
            show('add_img',   type === 'photo');
        } else {
            show('edit_texte_wrap', type === 'texte' || type === 'lien');
            show('edit_url_wrap',   type === 'video' || type === 'lien');
            show('edit_img_wrap',   type === 'photo');
        }
    }
    toggleFields('add');

    function openEdit(s) {
        const f = document.getElementById('editForm');
        f.action = '/admin/calendrier/' + s.id;
        document.getElementById('edit_num').value   = s.numero_semaine;
        document.getElementById('edit_titre').value = s.titre;
        document.getElementById('edit_date').value  = s.date_revelation ? s.date_revelation.substring(0,10) : '';
        document.getElementById('edit_desc').value  = s.description || '';
        document.getElementById('edit_type').value  = s.type_contenu;
        document.getElementById('edit_texte').value = s.contenu_texte || '';
        document.getElementById('edit_url').value   = s.contenu_url || '';
        document.getElementById('edit_actif').checked = !!s.actif;
        toggleFields('edit');
        new bootstrap.Modal(document.getElementById('editModal')).show();
    }
</script>

@endsection