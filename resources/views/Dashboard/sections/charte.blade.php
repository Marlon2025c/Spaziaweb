<div id="dashboard-content">

<style>
    /* ─── Tabs roles ────────────────────────────────── */
    .crole-tabs {
        display: flex;
        flex-wrap: wrap;
        gap: .5rem;
        margin-bottom: 1.75rem;
    }
    .crole-tab {
        display: flex; align-items: center; gap: .5rem;
        padding: .55rem 1.1rem;
        border-radius: 10px;
        border: 1px solid rgba(255,255,255,.08);
        background: rgba(255,255,255,.03);
        color: rgba(255,255,255,.5);
        font-size: .84rem; font-weight: 700;
        cursor: pointer; user-select: none;
        transition: all .2s;
    }
    .crole-tab:hover { color: rgba(255,255,255,.8); background: rgba(255,255,255,.06); }
    .crole-tab.active {
        border-color: var(--tab-color);
        color: #fff;
        background: color-mix(in srgb, var(--tab-color) 12%, transparent);
        box-shadow: 0 0 0 1px color-mix(in srgb, var(--tab-color) 30%, transparent);
    }

    /* ─── Panel charte ──────────────────────────────── */
    .cpanel { display: none; }
    .cpanel.active { display: block; }

    .cpanel-header {
        display: flex; align-items: center; justify-content: space-between;
        margin-bottom: 1.5rem; flex-wrap: wrap; gap: .75rem;
    }
    .cpanel-title { display: flex; align-items: center; gap: .75rem; }
    .cpanel-icon {
        width: 48px; height: 48px;
        border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.4rem;
    }

    /* ─── Section card ──────────────────────────────── */
    .csection {
        background: rgba(255,255,255,.025);
        border: 1px solid rgba(255,255,255,.07);
        border-radius: 14px;
        margin-bottom: 1rem;
        overflow: hidden;
    }
    .csection-header {
        display: flex; align-items: center; gap: .75rem;
        padding: .9rem 1.25rem;
        border-bottom: 1px solid rgba(255,255,255,.06);
    }
    .csection-icon {
        width: 30px; height: 30px; border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        font-size: .95rem; flex-shrink: 0;
    }
    .csection-label {
        font-size: .72rem; font-weight: 700; letter-spacing: .12em;
        text-transform: uppercase; color: rgba(255,255,255,.35);
    }
    .csection-body {
        padding: 1rem 1.25rem;
        font-size: .88rem; color: rgba(255,255,255,.65);
        line-height: 1.7; white-space: pre-wrap; min-height: 3rem;
    }
    .csection-empty { color: rgba(255,255,255,.2); font-style: italic; font-size: .83rem; }

    /* ─── Formulaire d'édition ──────────────────────── */
    .cedit-panel {
        background: rgba(255,255,255,.02);
        border: 1px solid rgba(255,255,255,.07);
        border-radius: 16px; padding: 1.5rem;
        margin-top: 1.5rem; display: none;
    }
    .cedit-panel.open { display: block; }
    .cedit-label {
        font-size: .7rem; font-weight: 700; letter-spacing: .12em;
        text-transform: uppercase; color: rgba(255,255,255,.4);
        margin-bottom: .35rem; display: block;
    }
    .cedit-textarea {
        width: 100%;
        background: rgba(255,255,255,.05);
        border: 1px solid rgba(255,255,255,.1);
        border-radius: 9px; color: #fff;
        padding: .65rem .9rem; font-size: .86rem;
        outline: none; font-family: inherit;
        min-height: 110px; resize: vertical;
        transition: border-color .2s;
    }
    .cedit-textarea:focus { border-color: rgba(249,115,22,.4); }
    .cedit-textarea::placeholder { color: rgba(255,255,255,.2); }
    .cedit-input {
        width: 100%;
        background: rgba(255,255,255,.05);
        border: 1px solid rgba(255,255,255,.1);
        border-radius: 9px; color: #fff;
        padding: .6rem .9rem; font-size: .86rem;
        outline: none; font-family: inherit;
        transition: border-color .2s;
    }
    .cedit-input:focus { border-color: rgba(249,115,22,.4); }

    .ccolor-picker { display: flex; gap: .45rem; flex-wrap: wrap; }
    .ccolor-dot {
        width: 26px; height: 26px; border-radius: 50%;
        border: 2px solid transparent; cursor: pointer;
        transition: transform .2s, border-color .2s;
    }
    .ccolor-dot:hover { transform: scale(1.15); }
    .ccolor-dot.selected { border-color: #fff; transform: scale(1.15); }

    .btn-cedit-save {
        display: inline-flex; align-items: center; gap: .5rem;
        padding: .6rem 1.6rem; border-radius: 10px; border: none;
        font-size: .86rem; font-weight: 700; cursor: pointer;
        background: linear-gradient(135deg,#f97316,#ea580c); color: #fff;
        box-shadow: 0 0 16px rgba(249,115,22,.2);
        transition: transform .2s, box-shadow .2s;
    }
    .btn-cedit-save:hover { transform: translateY(-2px); box-shadow: 0 0 26px rgba(249,115,22,.4); }

    .btn-cedit-toggle {
        display: inline-flex; align-items: center; gap: .5rem;
        padding: .5rem 1.1rem; border-radius: 9px;
        border: 1px solid rgba(255,255,255,.12);
        background: rgba(255,255,255,.05);
        color: rgba(255,255,255,.65);
        font-size: .83rem; font-weight: 700; cursor: pointer;
        transition: all .2s;
    }
    .btn-cedit-toggle:hover { background: rgba(255,255,255,.09); color: #fff; }

    .btn-delete-charte {
        display: inline-flex; align-items: center; gap: .4rem;
        padding: .45rem .9rem; border-radius: 8px;
        border: 1px solid rgba(239,68,68,.2);
        background: rgba(239,68,68,.06);
        color: rgba(239,68,68,.6);
        font-size: .8rem; font-weight: 700; cursor: pointer;
        transition: all .2s;
    }
    .btn-delete-charte:hover { background: rgba(239,68,68,.12); color: #f87171; border-color: rgba(239,68,68,.4); }

    .cedit-msg { font-size: .8rem; margin-top: .6rem; display: none; }
    .cedit-msg.ok  { color: #4ade80; }
    .cedit-msg.err { color: #f87171; }

    @keyframes spin { to { transform: rotate(360deg); } }
</style>

@php
    $canManage = auth()->check() && auth()->user()->hasRole([7, 8]);

    $roles = [
        ['slug' => 'Fondateur',       'emoji' => '👑', 'couleur' => '#facc15'],
        ['slug' => 'Responsable',      'emoji' => '🛡️', 'couleur' => '#f97316'],
        ['slug' => 'Modérateur',       'emoji' => '⚖️',  'couleur' => '#38bdf8'],
        ['slug' => 'Modérateur test',  'emoji' => '🔍', 'couleur' => '#94a3b8'],
        ['slug' => 'Helpeur',          'emoji' => '🤝', 'couleur' => '#22c55e'],
        ['slug' => 'Journaliste',      'emoji' => '✍️',  'couleur' => '#ec4899'],
        ['slug' => 'Builder',          'emoji' => '🏗️', 'couleur' => '#a855f7'],
        ['slug' => 'Animateur',        'emoji' => '🎮', 'couleur' => '#6366f1'],
    ];

    $sectionsDef = [
        'section_role'            => ['label' => 'Description du rôle',  'icon' => '🎯', 'placeholder' => 'À quoi sert ce rôle sur le serveur ?'],
        'section_responsabilites' => ['label' => 'Responsabilités',       'icon' => '📋', 'placeholder' => 'Quelles sont les missions principales de ce rôle ?'],
        'section_attentes'        => ['label' => "Ce qu'on attend",       'icon' => '✅', 'placeholder' => 'Comportement, disponibilité, qualités attendues...'],
        'section_interdictions'   => ['label' => 'Interdictions',         'icon' => '🚫', 'placeholder' => 'Ce qui est strictement interdit pour ce rôle...'],
    ];

    $colors = [
        '#facc15' => 'or', '#f97316' => 'orange', '#38bdf8' => 'bleu',
        '#22c55e' => 'vert', '#6366f1' => 'indigo', '#a855f7' => 'violet',
        '#ec4899' => 'rose', '#f87171' => 'rouge', '#94a3b8' => 'gris',
    ];
@endphp

{{-- ── Header ──────────────────────────────────────── --}}
<div class="mb-4">
    <p style="font-size:.72rem;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.35);margin:0 0 .1rem;">Staff</p>
    <h2 style="font-size:1.6rem;font-weight:800;color:#fff;margin:0;">Charte de l'équipe</h2>
    <p style="font-size:.87rem;color:rgba(255,255,255,.35);margin:.3rem 0 0;">Règles et attentes par rôle — tout le staff doit les connaître</p>
</div>

{{-- ── Onglets rôles ───────────────────────────────── --}}
<div class="crole-tabs">
    @foreach($roles as $i => $role)
        @php $charte = $chartes->get($role['slug']); @endphp
        <button class="crole-tab {{ $i === 0 ? 'active' : '' }}"
                style="--tab-color: {{ $charte?->couleur ?? $role['couleur'] }};"
                onclick="switchCharteTab('{{ Str::slug($role['slug']) }}', this)">
            {{ $role['emoji'] }} {{ $role['slug'] }}
        </button>
    @endforeach
</div>

{{-- ── Panels ──────────────────────────────────────── --}}
@foreach($roles as $i => $role)
    @php
        $charte  = $chartes->get($role['slug']);
        $slug    = Str::slug($role['slug']);
        $couleur = $charte?->couleur ?? $role['couleur'];
        $emoji   = $charte?->emoji   ?? $role['emoji'];
        $hex     = ltrim($couleur, '#');
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));
    @endphp

    <div class="cpanel {{ $i === 0 ? 'active' : '' }}" id="cpanel-{{ $slug }}">

        <div class="cpanel-header">
            <div class="cpanel-title">
                <div class="cpanel-icon" style="background:rgba({{ $r }},{{ $g }},{{ $b }},.12);">{{ $emoji }}</div>
                <div>
                    <p style="font-size:.7rem;letter-spacing:.12em;text-transform:uppercase;color:rgba(255,255,255,.3);margin:0;">Charte</p>
                    <h3 style="font-size:1.15rem;font-weight:800;color:#fff;margin:0;">{{ $role['slug'] }}</h3>
                </div>
            </div>
            @if($canManage)
            <div class="d-flex gap-2 flex-wrap">
                @if($charte)
                <button class="btn-delete-charte" onclick="deleteCharte({{ $charte->id }}, this)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                    </svg>
                    Supprimer
                </button>
                @endif
                <button class="btn-cedit-toggle" onclick="toggleCharteEdit('{{ $slug }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125"/>
                    </svg>
                    {{ $charte ? 'Modifier' : 'Rédiger' }}
                </button>
            </div>
            @endif
        </div>

        {{-- Sections lecture --}}
        @foreach($sectionsDef as $field => $sec)
        <div class="csection">
            <div class="csection-header">
                <div class="csection-icon" style="background:rgba({{ $r }},{{ $g }},{{ $b }},.1);">{{ $sec['icon'] }}</div>
                <span class="csection-label">{{ $sec['label'] }}</span>
            </div>
            <div class="csection-body">
                @if($charte && !empty($charte->$field))
                    {{ $charte->$field }}
                @else
                    <span class="csection-empty">Non renseigné</span>
                @endif
            </div>
        </div>
        @endforeach

        {{-- Formulaire édition — rôles 7/8 uniquement --}}
        @if($canManage)
        <div class="cedit-panel" id="cedit-{{ $slug }}">
            <p style="font-size:.78rem;font-weight:700;color:rgba(255,255,255,.4);margin:0 0 1.25rem;text-transform:uppercase;letter-spacing:.1em;">
                ✏️ {{ $charte ? 'Modifier' : 'Rédiger' }} — {{ $role['slug'] }}
            </p>
            <form id="ceditForm-{{ $slug }}">
                @csrf
                <input type="hidden" name="nom_role" value="{{ $role['slug'] }}">
                <input type="hidden" name="emoji"   id="ceditEmoji-{{ $slug }}"   value="{{ $emoji }}">
                <input type="hidden" name="couleur" id="ceditCouleur-{{ $slug }}" value="{{ $couleur }}">

                <div class="row g-3 mb-3">
                    <div class="col-6 col-md-3">
                        <label class="cedit-label">Emoji</label>
                        <input class="cedit-input" type="text" maxlength="5"
                               style="font-size:1.3rem;text-align:center;"
                               value="{{ $emoji }}"
                               oninput="document.getElementById('ceditEmoji-{{ $slug }}').value = this.value || '{{ $role['emoji'] }}'">
                    </div>
                    <div class="col-12 col-md-9">
                        <label class="cedit-label">Couleur thème</label>
                        <div class="ccolor-picker" style="padding-top:.35rem;">
                            @foreach($colors as $colorHex => $colorName)
                                <div class="ccolor-dot {{ $colorHex === $couleur ? 'selected' : '' }}"
                                     style="background:{{ $colorHex }};"
                                     title="{{ $colorName }}"
                                     onclick="selectCharteColor(this, '{{ $colorHex }}', '{{ $slug }}')"></div>
                            @endforeach
                        </div>
                    </div>
                </div>

                @foreach($sectionsDef as $field => $sec)
                <div class="mb-3">
                    <label class="cedit-label">{{ $sec['icon'] }} {{ $sec['label'] }}</label>
                    <textarea class="cedit-textarea" name="{{ $field }}"
                              placeholder="{{ $sec['placeholder'] }}">{{ $charte?->$field ?? '' }}</textarea>
                </div>
                @endforeach

                <div id="ceditMsg-{{ $slug }}" class="cedit-msg"></div>
                <button type="button" class="btn-cedit-save" onclick="saveCharte('{{ $slug }}', this)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    Enregistrer la charte
                </button>
            </form>
        </div>
        @endif

    </div>
@endforeach

<script>
function switchCharteTab(slug, btn) {
    document.querySelectorAll('.crole-tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.cpanel').forEach(p => p.classList.remove('active'));
    btn.classList.add('active');
    document.getElementById('cpanel-' + slug)?.classList.add('active');
}

function toggleCharteEdit(slug) {
    document.getElementById('cedit-' + slug)?.classList.toggle('open');
}

function selectCharteColor(dot, hex, slug) {
    dot.closest('.ccolor-picker').querySelectorAll('.ccolor-dot').forEach(d => d.classList.remove('selected'));
    dot.classList.add('selected');
    document.getElementById('ceditCouleur-' + slug).value = hex;
}

function saveCharte(slug, btn) {
    const form = document.getElementById('ceditForm-' + slug);
    const msg  = document.getElementById('ceditMsg-' + slug);
    msg.style.display = 'none';
    const orig = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="animation:spin .8s linear infinite"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"/></svg> Envoi...';

    fetch("{{ url('/dashboardv2/charte/store') }}", {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')?.content || '' },
        body: new FormData(form)
    })
    .then(async r => {
        const data = await r.json();
        if (!r.ok) {
            msg.className = 'cedit-msg err';
            msg.textContent = data.errors ? Object.values(data.errors).flat().join(' — ') : (data.error || 'Erreur.');
            msg.style.display = 'block';
        } else {
            msg.className = 'cedit-msg ok';
            msg.textContent = '✓ Charte enregistrée !';
            msg.style.display = 'block';
            window._charteActiveTab = slug;
            setTimeout(() => loadSection('charte'), 900);
        }
    })
    .catch(() => {
        msg.className = 'cedit-msg err';
        msg.textContent = 'Impossible de contacter le serveur.';
        msg.style.display = 'block';
    })
    .finally(() => { btn.disabled = false; btn.innerHTML = orig; });
}

function deleteCharte(charteId, btn) {
    if (!confirm('Supprimer toute la charte de ce rôle ?')) return;
    btn.disabled = true;
    fetch(`{{ url('/dashboardv2/charte') }}/${charteId}`, {
        method: 'DELETE',
        headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')?.content || '' }
    })
    .then(r => { if (r.ok) loadSection('charte'); else btn.disabled = false; })
    .catch(() => { btn.disabled = false; });
}

// Restaure l'onglet actif après rechargement AJAX
(function () {
    const last = window._charteActiveTab;
    if (last) {
        const btn = [...document.querySelectorAll('.crole-tab')].find(b =>
            b.getAttribute('onclick')?.includes("'" + last + "'")
        );
        if (btn) { switchCharteTab(last, btn); window._charteActiveTab = null; }
    }
})();
</script>

</div>
