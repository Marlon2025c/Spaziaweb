<div id="dashboard-content">

<style>
    /* ─── Formation cards ──────────────────────────── */
    .fcard {
        background: rgba(255,255,255,.025);
        border: 1px solid rgba(255,255,255,.07);
        border-radius: 18px;
        overflow: hidden;
        transition: border-color .3s, transform .2s;
    }
    .fcard:hover { transform: translateY(-2px); }
    .fcard-header {
        padding: 1.2rem 1.5rem;
        border-bottom: 1px solid rgba(255,255,255,.06);
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 1rem;
    }
    .fcard-header-left { display: flex; align-items: flex-start; gap: .9rem; }
    .fcard-icon {
        width: 46px; height: 46px; min-width: 46px;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.3rem;
        flex-shrink: 0;
    }
    .fcard-tag {
        display: inline-block;
        font-size: .68rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase;
        padding: .2rem .65rem; border-radius: 999px; margin-bottom: .4rem;
    }
    .fcard-body { padding: 1.2rem 1.5rem; }
    .fcard-desc { font-size: .87rem; color: rgba(255,255,255,.5); margin-bottom: 1rem; line-height: 1.55; }

    /* ─── PDF links ────────────────────────────────── */
    .btn-pdf {
        display: inline-flex; align-items: center; gap: .5rem;
        padding: .5rem 1.1rem; border-radius: 9px; border: none;
        font-size: .83rem; font-weight: 700; cursor: pointer;
        transition: transform .2s, box-shadow .2s;
        text-decoration: none;
    }
    .btn-pdf-primary {
        background: linear-gradient(135deg, #f97316, #ea580c);
        color: #fff;
        box-shadow: 0 0 14px rgba(249,115,22,.2);
    }
    .btn-pdf-primary:hover { transform: translateY(-2px); box-shadow: 0 0 22px rgba(249,115,22,.4); color:#fff; }
    .btn-pdf-ghost {
        background: rgba(255,255,255,.05);
        border: 1px solid rgba(255,255,255,.1);
        color: rgba(255,255,255,.65);
    }
    .btn-pdf-ghost:hover { background: rgba(255,255,255,.09); color:#fff; }

    /* ─── Completions ──────────────────────────────── */
    .fcompletion-sep { height:1px; background:rgba(255,255,255,.06); margin: 1rem 0; }
    .fcompletion-label {
        font-size: .68rem; font-weight: 700; letter-spacing: .12em; text-transform: uppercase;
        color: rgba(255,255,255,.25); margin-bottom: .6rem;
    }
    .fcompletion-list { display: flex; flex-direction: column; gap: .4rem; margin-bottom: .9rem; }
    .fcompletion-item {
        display: flex; align-items: center; justify-content: space-between;
        background: rgba(34,197,94,.05);
        border: 1px solid rgba(34,197,94,.12);
        border-radius: 8px;
        padding: .45rem .8rem;
        font-size: .83rem;
    }
    .fcompletion-item-name { color: #4ade80; font-weight: 700; }
    .fcompletion-item-meta { font-size: .73rem; color: rgba(255,255,255,.35); margin-left: .5rem; }
    .fcompletion-delete {
        background: none; border: none; cursor: pointer;
        color: rgba(239,68,68,.5); font-size: .8rem;
        padding: 0 .3rem;
        transition: color .2s;
    }
    .fcompletion-delete:hover { color: #f87171; }

    /* ─── Validate form inline ─────────────────────── */
    .fvalidate-form {
        display: flex; gap: .5rem; flex-wrap: wrap; align-items: center;
    }
    .fvalidate-input {
        flex: 1; min-width: 130px;
        background: rgba(255,255,255,.05);
        border: 1px solid rgba(255,255,255,.1);
        border-radius: 8px;
        color: #fff;
        padding: .45rem .8rem;
        font-size: .83rem;
        outline: none;
        font-family: inherit;
    }
    .fvalidate-input:focus { border-color: rgba(34,197,94,.4); }
    .fvalidate-input::placeholder { color: rgba(255,255,255,.22); }
    .btn-validate {
        display: inline-flex; align-items: center; gap: .4rem;
        padding: .45rem 1rem; border-radius: 8px; border: none;
        font-size: .83rem; font-weight: 700; cursor: pointer;
        background: linear-gradient(135deg,#22c55e,#16a34a);
        color: #fff;
        white-space: nowrap;
        transition: transform .2s, box-shadow .2s;
    }
    .btn-validate:hover { transform: translateY(-1px); box-shadow: 0 0 16px rgba(34,197,94,.3); }
    .fvalidate-msg { font-size: .78rem; margin-top: .35rem; display: none; }
    .fvalidate-msg.ok  { color: #4ade80; }
    .fvalidate-msg.err { color: #f87171; }

    /* ─── Panel ajout formation ────────────────────── */
    .fadd-panel {
        background: rgba(255,255,255,.025);
        border: 1px solid rgba(255,255,255,.08);
        border-radius: 18px;
        overflow: hidden;
        margin-bottom: 2rem;
    }
    .fadd-toggle {
        display: flex; align-items: center; justify-content: space-between;
        padding: 1rem 1.5rem;
        cursor: pointer; user-select: none;
        font-size: .9rem; font-weight: 700; color: rgba(255,255,255,.7);
        background: none; border: none; width: 100%; text-align: left;
        transition: color .2s;
    }
    .fadd-toggle:hover { color: #fff; }
    .fadd-toggle-chevron { transition: transform .3s; font-size: .8rem; }
    .fadd-toggle-chevron.open { transform: rotate(180deg); }
    .fadd-body {
        padding: 0 1.5rem 1.5rem;
        display: none;
        border-top: 1px solid rgba(255,255,255,.06);
        padding-top: 1.3rem;
    }
    .fadd-body.open { display: block; }

    .fadd-label {
        font-size: .7rem; font-weight: 700; letter-spacing: .12em; text-transform: uppercase;
        color: rgba(255,255,255,.4); margin-bottom: .35rem; display: block;
    }
    .fadd-input, .fadd-select, .fadd-textarea {
        width: 100%;
        background: rgba(255,255,255,.05);
        border: 1px solid rgba(255,255,255,.1);
        border-radius: 9px; color: #fff;
        padding: .6rem .9rem; font-size: .87rem;
        outline: none; font-family: inherit;
        transition: border-color .2s;
    }
    .fadd-input:focus, .fadd-select:focus, .fadd-textarea:focus { border-color: rgba(249,115,22,.4); }
    .fadd-input::placeholder, .fadd-textarea::placeholder { color: rgba(255,255,255,.22); }
    .fadd-select option { background: #1a1a2e; color: #fff; }
    .fadd-textarea { min-height: 80px; resize: vertical; }

    /* Radio PDF type */
    .fpdf-tabs { display: flex; gap: .5rem; margin-bottom: .8rem; }
    .fpdf-tab {
        padding: .4rem 1rem; border-radius: 8px; border: 1px solid rgba(255,255,255,.1);
        font-size: .8rem; font-weight: 700; cursor: pointer; color: rgba(255,255,255,.5);
        background: rgba(255,255,255,.04); transition: all .2s;
    }
    .fpdf-tab.active { background: rgba(249,115,22,.15); border-color: rgba(249,115,22,.4); color: #fb923c; }

    /* Couleurs prédéfinies */
    .fcolor-picker { display: flex; gap: .5rem; flex-wrap: wrap; }
    .fcolor-dot {
        width: 28px; height: 28px; border-radius: 50%;
        border: 2px solid transparent;
        cursor: pointer; transition: transform .2s, border-color .2s;
    }
    .fcolor-dot:hover { transform: scale(1.15); }
    .fcolor-dot.selected { border-color: #fff; transform: scale(1.15); }

    .btn-fadd-submit {
        display: inline-flex; align-items: center; gap: .5rem;
        padding: .65rem 1.8rem; border-radius: 10px; border: none;
        font-size: .87rem; font-weight: 700; cursor: pointer;
        background: linear-gradient(135deg,#f97316,#ea580c);
        color: #fff;
        box-shadow: 0 0 18px rgba(249,115,22,.25);
        transition: transform .2s, box-shadow .2s;
    }
    .btn-fadd-submit:hover { transform: translateY(-2px); box-shadow: 0 0 28px rgba(249,115,22,.4); }

    /* ─── Empty state ──────────────────────────────── */
    .fempty {
        text-align: center; padding: 3rem 1rem;
        color: rgba(255,255,255,.3); font-size: .9rem;
    }
    .fempty-icon { font-size: 2.5rem; margin-bottom: .75rem; opacity: .4; }

    /* ─── Supprimer formation ──────────────────────── */
    .btn-delete-formation {
        background: none; border: none; cursor: pointer;
        color: rgba(239,68,68,.4); padding: .3rem;
        border-radius: 6px; transition: color .2s, background .2s;
        display: flex; align-items: center;
    }
    .btn-delete-formation:hover { color: #f87171; background: rgba(239,68,68,.08); }

    @keyframes spin { to { transform: rotate(360deg); } }
</style>

{{-- ── Header ───────────────────────────────────────── --}}
<div class="mb-4">
    <p style="font-size:.72rem;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.35);margin:0 0 .1rem;">Staff</p>
    <h2 style="font-size:1.6rem;font-weight:800;color:#fff;margin:0;">Formation Staff</h2>
    <p style="font-size:.87rem;color:rgba(255,255,255,.35);margin:.3rem 0 0;">Fiches de formation et suivi des validations</p>
</div>

@php $canManage = auth()->check() && auth()->user()->hasRole([7, 8]); @endphp

@if($canManage)
<datalist id="formationMembersList">
    @foreach($members ?? [] as $member)
        <option value="{{ $member['name'] }} ({{ $member['role'] }})">
    @endforeach
</datalist>
@endif

{{-- ── Panel ajout ─────────────────────────────────── --}}
@if($canManage)
<div class="fadd-panel">
    <button class="fadd-toggle" onclick="toggleAddPanel(this)">
        <span style="display:flex;align-items:center;gap:.6rem;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
            </svg>
            Ajouter une formation
        </span>
        <span class="fadd-toggle-chevron">▾</span>
    </button>
    <div class="fadd-body" id="faddBody">
        <form id="faddForm" enctype="multipart/form-data">
            @csrf
            <div class="row g-3 mb-3">
                <div class="col-12 col-md-6">
                    <label class="fadd-label">Titre de la formation *</label>
                    <input class="fadd-input" type="text" name="titre" placeholder="Ex : Formation modération" required>
                </div>
                <div class="col-12 col-md-3">
                    <label class="fadd-label">Catégorie *</label>
                    <select class="fadd-select" name="categorie" required>
                        <option value="obligatoire">Obligatoire</option>
                        <option value="optionnelle">Optionnelle</option>
                        <option value="avancé">Avancé</option>
                        <option value="animation">Animation</option>
                        <option value="journalisme">Journalisme</option>
                    </select>
                </div>
                <div class="col-12 col-md-3">
                    <label class="fadd-label">Emoji</label>
                    <input class="fadd-input" type="text" name="emoji" placeholder="📚" maxlength="5" style="font-size:1.2rem;text-align:center;">
                </div>
            </div>

            <div class="mb-3">
                <label class="fadd-label">Description</label>
                <textarea class="fadd-textarea" name="description" placeholder="À quoi sert cette formation ? Qui est concerné ?"></textarea>
            </div>

            <div class="mb-3">
                <label class="fadd-label">Couleur thème</label>
                <input type="hidden" name="couleur" id="fSelectedColor" value="#f97316">
                <div class="fcolor-picker">
                    @foreach([
                        '#f97316' => 'orange',
                        '#22c55e' => 'vert',
                        '#6366f1' => 'indigo',
                        '#a855f7' => 'violet',
                        '#ec4899' => 'rose',
                        '#38bdf8' => 'bleu',
                        '#facc15' => 'jaune',
                        '#f87171' => 'rouge',
                    ] as $hex => $name)
                        <div class="fcolor-dot {{ $hex === '#f97316' ? 'selected' : '' }}"
                             style="background:{{ $hex }};"
                             title="{{ $name }}"
                             onclick="selectColor(this, '{{ $hex }}')"></div>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label class="fadd-label">Document PDF</label>
                <div class="fpdf-tabs">
                    <button type="button" class="fpdf-tab active" onclick="setPdfTab('upload', this)">⬆ Upload PDF</button>
                    <button type="button" class="fpdf-tab" onclick="setPdfTab('url', this)">🔗 Lien externe</button>
                    <button type="button" class="fpdf-tab" onclick="setPdfTab('none', this)">— Aucun PDF</button>
                </div>
                <div id="fpdfUpload">
                    <input class="fadd-input" type="file" name="pdf_file" accept=".pdf" style="padding:.45rem;">
                </div>
                <div id="fpdfUrl" style="display:none;">
                    <input class="fadd-input" type="url" name="pdf_url" placeholder="https://drive.google.com/...">
                </div>
            </div>

            <div id="faddMsg" class="fvalidate-msg" style="margin-bottom:.7rem;font-size:.85rem;"></div>

            <button type="button" class="btn-fadd-submit" onclick="submitFormation()">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                Créer la formation
            </button>
        </form>
    </div>
</div>
@endif

{{-- ── Grille des formations ────────────────────────── --}}
@if($formations->isEmpty())
    <div class="fempty">
        <div class="fempty-icon">🎓</div>
        <p>Aucune formation pour l'instant.<br>Utilise le panneau ci-dessus pour en ajouter une.</p>
    </div>
@else
    <div class="row g-4" id="formationsGrid">
    @foreach($formations as $formation)
    @php
        $color = $formation->couleur ?: '#f97316';
        $colorRgb = ltrim($color, '#');
        $r = hexdec(substr($colorRgb,0,2));
        $g = hexdec(substr($colorRgb,2,2));
        $b = hexdec(substr($colorRgb,4,2));
        $catLabels = [
            'obligatoire' => 'Obligatoire',
            'optionnelle' => 'Optionnelle',
            'avancé'      => 'Avancé',
            'animation'   => 'Animation',
            'journalisme' => 'Journalisme',
        ];
        $isValidated = $canManage || $formation->completions->contains('staff_name', auth()->user()?->name);
    @endphp
    <div class="col-12 col-lg-6">
        <div class="fcard h-100" style="border-color:rgba({{ $r }},{{ $g }},{{ $b }},.15);">
            <div class="fcard-header">
                <div class="fcard-header-left">
                    <div class="fcard-icon" style="background:rgba({{ $r }},{{ $g }},{{ $b }},.12);font-size:1.3rem;">
                        {{ $formation->emoji ?: '📚' }}
                    </div>
                    <div>
                        <span class="fcard-tag" style="background:rgba({{ $r }},{{ $g }},{{ $b }},.12);color:{{ $color }};">
                            {{ $catLabels[$formation->categorie] ?? $formation->categorie }}
                        </span>
                        <h3 style="font-size:1rem;font-weight:800;color:#fff;margin:0;">{{ $formation->titre }}</h3>
                    </div>
                </div>
                @if($canManage)
                <button class="btn-delete-formation" onclick="deleteFormation({{ $formation->id }}, this)" title="Supprimer cette formation">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                    </svg>
                </button>
                @endif
            </div>

            <div class="fcard-body">
                @if($formation->description)
                    <p class="fcard-desc">{{ $formation->description }}</p>
                @endif

                {{-- PDF links --}}
                @if($formation->pdf_path || $formation->pdf_url)
                    @if($isValidated)
                        <div class="d-flex gap-2 flex-wrap mb-3">
                            @if($formation->pdf_path)
                                <a href="{{ asset('storage/' . $formation->pdf_path) }}"
                                   target="_blank" class="btn-pdf btn-pdf-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                                    </svg>
                                    Fiche PDF
                                </a>
                            @endif
                            @if($formation->pdf_url)
                                <a href="{{ $formation->pdf_url }}" target="_blank" class="btn-pdf btn-pdf-ghost">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244"/>
                                    </svg>
                                    Lien externe
                                </a>
                            @endif
                        </div>
                    @else
                        <p style="font-size:.78rem;color:rgba(255,255,255,.35);margin-bottom:1rem;display:flex;align-items:center;gap:.4rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/>
                            </svg>
                            Formation disponible — le document sera accessible une fois ta validation faite par un Responsable/Fondateur.
                        </p>
                    @endif
                @else
                    <p style="font-size:.78rem;color:rgba(255,255,255,.25);margin-bottom:1rem;font-style:italic;">Aucun document attaché</p>
                @endif

                <div class="fcompletion-sep"></div>

                {{-- Liste des complétions --}}
                <p class="fcompletion-label">
                    Membres ayant validé
                    <span style="color:rgba(255,255,255,.45);font-weight:400;margin-left:.4rem;">
                        ({{ $formation->completions->count() }})
                    </span>
                </p>

                @if($formation->completions->isNotEmpty())
                    <div class="fcompletion-list" id="compList{{ $formation->id }}">
                        @foreach($formation->completions as $comp)
                            <div class="fcompletion-item" id="comp{{ $comp->id }}">
                                <div>
                                    <span class="fcompletion-item-name">{{ $comp->staff_name }}</span>
                                    <span class="fcompletion-item-meta">
                                        — validé par {{ $comp->validated_by }}
                                        · {{ $comp->created_at->format('d/m/Y') }}
                                        @if($comp->notes)
                                            · <em>{{ $comp->notes }}</em>
                                        @endif
                                    </span>
                                </div>
                                @if($canManage)
                                <button class="fcompletion-delete" onclick="deleteCompletion({{ $comp->id }}, this)" title="Supprimer">✕</button>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <p style="font-size:.8rem;color:rgba(255,255,255,.25);margin-bottom:.75rem;">Personne encore — sois le premier !</p>
                @endif

                {{-- Formulaire validation — Fondateur & Responsable uniquement --}}
                @if($canManage)
                <div>
                    <p class="fcompletion-label" style="margin-bottom:.5rem;">Valider pour un membre</p>
                    <div class="fvalidate-form" id="valForm{{ $formation->id }}">
                        <input class="fvalidate-input" type="text" placeholder="Pseudo du membre"
                               id="valName{{ $formation->id }}" list="formationMembersList" autocomplete="off">
                        <input class="fvalidate-input" type="text" placeholder="Validé par (ton pseudo)"
                               id="valBy{{ $formation->id }}"
                               value="{{ auth()->user()?->name ?? '' }}">
                        <button class="btn-validate" onclick="validateCompletion({{ $formation->id }}, this)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            Valider
                        </button>
                    </div>
                    <div class="fvalidate-msg" id="valMsg{{ $formation->id }}"></div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endforeach
    </div>
@endif

<script>
// ── Toggle panel ajout ────────────────────────
function toggleAddPanel(btn) {
    const body = document.getElementById('faddBody');
    const chevron = btn.querySelector('.fadd-toggle-chevron');
    const isOpen = body.classList.toggle('open');
    chevron.classList.toggle('open', isOpen);
}

// ── Couleur ───────────────────────────────────
function selectColor(dot, hex) {
    document.querySelectorAll('.fcolor-dot').forEach(d => d.classList.remove('selected'));
    dot.classList.add('selected');
    document.getElementById('fSelectedColor').value = hex;
}

// ── PDF tab ───────────────────────────────────
function setPdfTab(mode, btn) {
    document.querySelectorAll('.fpdf-tab').forEach(t => t.classList.remove('active'));
    btn.classList.add('active');
    document.getElementById('fpdfUpload').style.display = mode === 'upload' ? '' : 'none';
    document.getElementById('fpdfUrl').style.display    = mode === 'url'    ? '' : 'none';
    // Vide les champs inactifs
    if (mode !== 'upload') document.querySelector('[name=pdf_file]').value = '';
    if (mode !== 'url')    document.querySelector('[name=pdf_url]').value  = '';
}

// ── Soumettre nouvelle formation ─────────────
function submitFormation() {
    const form = document.getElementById('faddForm');
    const msg  = document.getElementById('faddMsg');
    const btn  = form.querySelector('.btn-fadd-submit');
    msg.style.display = 'none';

    btn.disabled = true;
    const orig = btn.innerHTML;
    btn.innerHTML = '⏳ Envoi...';

    fetch("{{ url('/dashboardv2/formation/store') }}", {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')?.content || '' },
        body: new FormData(form)
    })
    .then(async r => {
        const data = await r.json();
        if (!r.ok) {
            msg.className = 'fvalidate-msg err';
            msg.textContent = data.errors ? Object.values(data.errors).flat().join(' — ') : (data.error || 'Erreur');
            msg.style.display = 'block';
        } else {
            form.reset();
            document.querySelectorAll('.fcolor-dot').forEach((d,i) => d.classList.toggle('selected', i===0));
            document.getElementById('fSelectedColor').value = '#f97316';
            msg.className = 'fvalidate-msg ok';
            msg.textContent = '✓ Formation créée ! Rechargement...';
            msg.style.display = 'block';
            setTimeout(() => loadSection('formation'), 900);
        }
    })
    .catch(() => {
        msg.className = 'fvalidate-msg err';
        msg.textContent = 'Impossible de contacter le serveur.';
        msg.style.display = 'block';
    })
    .finally(() => { btn.disabled = false; btn.innerHTML = orig; });
}

// ── Valider un membre ─────────────────────────
function validateCompletion(formationId, btn) {
    const staffName  = document.getElementById('valName' + formationId).value.trim().replace(/\s*\([^)]*\)\s*$/, '');
    const validatedBy = document.getElementById('valBy'  + formationId).value.trim();
    const msg        = document.getElementById('valMsg'  + formationId);
    msg.style.display = 'none';

    if (!staffName || !validatedBy) {
        msg.className = 'fvalidate-msg err';
        msg.textContent = 'Remplis les deux champs.';
        msg.style.display = 'block';
        return;
    }

    const orig = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = '⏳';

    fetch(`{{ url('/dashboardv2/formation') }}/${formationId}/validate`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')?.content || ''
        },
        body: JSON.stringify({ staff_name: staffName, validated_by: validatedBy })
    })
    .then(async r => {
        const data = await r.json();
        if (!r.ok) {
            msg.className = 'fvalidate-msg err';
            msg.textContent = data.error || 'Erreur.';
            msg.style.display = 'block';
        } else {
            msg.className = 'fvalidate-msg ok';
            msg.textContent = '✓ Validé ! Rechargement...';
            msg.style.display = 'block';
            setTimeout(() => loadSection('formation'), 900);
        }
    })
    .catch(() => {
        msg.className = 'fvalidate-msg err';
        msg.textContent = 'Impossible de contacter le serveur.';
        msg.style.display = 'block';
    })
    .finally(() => { btn.disabled = false; btn.innerHTML = orig; });
}

// ── Supprimer une complétion ──────────────────
function deleteCompletion(completionId, btn) {
    if (!confirm('Supprimer cette validation ?')) return;
    btn.disabled = true;

    fetch(`{{ url('/dashboardv2/formation/completion') }}/${completionId}`, {
        method: 'DELETE',
        headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')?.content || '' }
    })
    .then(r => r.ok ? document.getElementById('comp' + completionId)?.remove() : null)
    .catch(() => { btn.disabled = false; });
}

// ── Supprimer une formation ───────────────────
function deleteFormation(formationId, btn) {
    if (!confirm('Supprimer cette formation et toutes ses validations ?')) return;
    btn.disabled = true;

    fetch(`{{ url('/dashboardv2/formation') }}/${formationId}`, {
        method: 'DELETE',
        headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')?.content || '' }
    })
    .then(r => { if (r.ok) loadSection('formation'); else btn.disabled = false; })
    .catch(() => { btn.disabled = false; });
}
</script>

</div>
