<div id="dashboard-content">

<style>
    /* ─── Sélecteur de mode ─────────────────────────── */
    .rmode-toggle {
        display: inline-flex;
        background: rgba(255,255,255,.05);
        border: 1px solid rgba(255,255,255,.1);
        border-radius: 14px;
        padding: 4px;
        gap: 4px;
    }
    .rmode-btn {
        display: flex;
        align-items: center;
        gap: .55rem;
        padding: .65rem 1.4rem;
        border-radius: 10px;
        border: none;
        font-size: .88rem;
        font-weight: 700;
        cursor: pointer;
        transition: all .25s;
        color: rgba(255,255,255,.45);
        background: transparent;
        letter-spacing: .02em;
        white-space: nowrap;
    }
    .rmode-btn:hover { color: rgba(255,255,255,.75); background: rgba(255,255,255,.05); }
    .rmode-btn.active {
        background: linear-gradient(135deg, #f97316, #ea580c);
        color: #fff;
        box-shadow: 0 4px 18px rgba(249,115,22,.35);
    }
    .rmode-btn.active-blue {
        background: linear-gradient(135deg, #6366f1, #4f46e5);
        color: #fff;
        box-shadow: 0 4px 18px rgba(99,102,241,.35);
    }

    /* ─── Carte formulaire ──────────────────────────── */
    .rform-card {
        background: rgba(255,255,255,.025);
        border: 1px solid rgba(255,255,255,.07);
        border-radius: 20px;
        padding: 2rem;
        transition: border-color .3s;
    }
    .rform-card.mode-quotidien { border-color: rgba(249,115,22,.2); }
    .rform-card.mode-joueur    { border-color: rgba(99,102,241,.2); }

    /* ─── Champs ────────────────────────────────────── */
    .rf-label {
        font-size: .72rem;
        font-weight: 700;
        letter-spacing: .12em;
        text-transform: uppercase;
        color: rgba(255,255,255,.4);
        margin-bottom: .4rem;
        display: block;
    }
    .rf-input,
    .rf-textarea {
        width: 100%;
        background: rgba(255,255,255,.05);
        border: 1px solid rgba(255,255,255,.1);
        border-radius: 10px;
        color: #fff;
        padding: .65rem 1rem;
        font-size: .9rem;
        outline: none;
        transition: border-color .2s, background .2s;
        font-family: inherit;
    }
    .rf-input:focus, .rf-textarea:focus {
        border-color: rgba(249,115,22,.5);
        background: rgba(249,115,22,.04);
    }
    .rf-input::placeholder, .rf-textarea::placeholder { color: rgba(255,255,255,.22); }
    .rf-textarea { resize: vertical; min-height: 130px; }

    /* Input readonly (date auto) */
    .rf-input[readonly] {
        background: rgba(255,255,255,.03);
        color: rgba(255,255,255,.5);
        cursor: default;
        border-color: rgba(255,255,255,.07);
    }
    /* Input verrouillé (pseudo connecté) */
    .rf-input-locked {
        background: rgba(34,197,94,.04) !important;
        border-color: rgba(34,197,94,.2) !important;
        color: #4ade80 !important;
        cursor: not-allowed;
    }
    /* Ligne avatar + input */
    .rf-user-row {
        display: flex;
        align-items: center;
        gap: .65rem;
    }
    .rf-user-row .rf-input { flex: 1; }
    .rf-user-avatar {
        width: 36px; height: 36px; min-width: 36px;
        border-radius: 8px;
        object-fit: cover;
        border: 1px solid rgba(34,197,94,.25);
    }
    .rf-user-avatar-placeholder {
        width: 36px; height: 36px; min-width: 36px;
        border-radius: 8px;
        background: rgba(34,197,94,.12);
        border: 1px solid rgba(34,197,94,.25);
        color: #4ade80;
        font-size: .85rem;
        font-weight: 800;
        display: flex; align-items: center; justify-content: center;
    }
    /* Badge "auto" à côté du label */
    .rf-auto-badge {
        display: inline-flex; align-items: center; gap: .3rem;
        font-size: .65rem; font-weight: 600; letter-spacing: .08em;
        text-transform: uppercase;
        background: rgba(34,197,94,.1);
        border: 1px solid rgba(34,197,94,.2);
        color: #4ade80;
        padding: .15rem .55rem;
        border-radius: 999px;
        margin-left: .5rem;
        vertical-align: middle;
    }

    /* ─── Type joueur cards ─────────────────────────── */
    .rtype-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: .75rem;
    }
    .rtype-card {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: .5rem;
        padding: .9rem 1rem;
        border-radius: 14px;
        border: 1px solid rgba(255,255,255,.08);
        background: rgba(255,255,255,.03);
        cursor: pointer;
        user-select: none;
        transition: all .2s;
        position: relative;
        overflow: hidden;
    }
    .rtype-card::before {
        content: '';
        position: absolute;
        inset: 0;
        opacity: 0;
        transition: opacity .2s;
        border-radius: 14px;
    }
    .rtype-card:hover { transform: translateY(-2px); border-color: var(--card-color); }
    .rtype-card:hover::before { opacity: .06; background: var(--card-color); }
    .rtype-card.selected {
        border-color: var(--card-color);
        background: rgba(255,255,255,.04);
        box-shadow: 0 0 0 1px var(--card-color), 0 4px 16px rgba(0,0,0,.3);
    }
    .rtype-card.selected::before { opacity: .08; background: var(--card-color); }
    .rtype-card.selected .rtype-check { opacity: 1; }
    .rtype-icon {
        width: 38px; height: 38px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.1rem;
        background: rgba(255,255,255,.06);
        flex-shrink: 0;
        transition: background .2s;
    }
    .rtype-card.selected .rtype-icon { background: color-mix(in srgb, var(--card-color) 18%, transparent); }
    .rtype-name {
        font-size: .83rem;
        font-weight: 700;
        color: rgba(255,255,255,.75);
        line-height: 1.2;
    }
    .rtype-card.selected .rtype-name { color: #fff; }
    .rtype-sub {
        font-size: .72rem;
        color: rgba(255,255,255,.3);
        line-height: 1.3;
    }
    .rtype-check {
        position: absolute;
        top: .6rem; right: .6rem;
        width: 18px; height: 18px;
        border-radius: 50%;
        background: var(--card-color);
        display: flex; align-items: center; justify-content: center;
        opacity: 0;
        transition: opacity .2s;
    }
    .rtype-check svg { width: 10px; height: 10px; }

    /* ─── Séparateur de section ─────────────────────── */
    .rf-sep {
        height: 1px;
        background: rgba(255,255,255,.06);
        margin: 1.5rem 0;
    }
    .rf-section-title {
        font-size: .7rem;
        font-weight: 700;
        letter-spacing: .15em;
        text-transform: uppercase;
        color: rgba(255,255,255,.25);
        margin-bottom: 1rem;
    }

    /* ─── Bouton envoi ──────────────────────────────── */
    .btn-send {
        display: inline-flex;
        align-items: center;
        gap: .6rem;
        font-weight: 700;
        font-size: .9rem;
        padding: .75rem 2rem;
        border-radius: 12px;
        border: none;
        cursor: pointer;
        transition: transform .2s, box-shadow .2s;
    }
    .btn-send-orange {
        background: linear-gradient(135deg, #f97316, #ea580c);
        color: #fff;
        box-shadow: 0 0 20px rgba(249,115,22,.3);
    }
    .btn-send-orange:hover { transform: translateY(-2px); box-shadow: 0 0 35px rgba(249,115,22,.5); }
    .btn-send-indigo {
        background: linear-gradient(135deg, #6366f1, #4f46e5);
        color: #fff;
        box-shadow: 0 0 20px rgba(99,102,241,.3);
    }
    .btn-send-indigo:hover { transform: translateY(-2px); box-shadow: 0 0 35px rgba(99,102,241,.5); }

    /* ─── Alert succès ──────────────────────────────── */
    .rf-success {
        display: none;
        align-items: center;
        gap: .6rem;
        background: rgba(34,197,94,.08);
        border: 1px solid rgba(34,197,94,.25);
        border-radius: 12px;
        color: #4ade80;
        padding: .9rem 1.2rem;
        font-size: .88rem;
        margin-bottom: 1rem;
    }

    /* ─── Info badge date ───────────────────────────── */
    .rf-date-badge {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        background: rgba(249,115,22,.08);
        border: 1px solid rgba(249,115,22,.2);
        border-radius: 8px;
        color: #fb923c;
        font-size: .78rem;
        font-weight: 600;
        padding: .3rem .75rem;
        margin-bottom: .4rem;
    }
</style>

{{-- Titre --}}
<div class="mb-4">
    <p style="font-size:.72rem;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.35);margin:0 0 .2rem;">Staff · Report</p>
    <h2 style="font-size:1.6rem;font-weight:800;color:#fff;margin:0 0 1.25rem;">Faire un report</h2>

    {{-- Sélecteur de mode --}}
    <div class="rmode-toggle">
        <button type="button" class="rmode-btn active" id="modeQuotidienBtn" onclick="setMode('quotidien')">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
            </svg>
            Report quotidien
        </button>
        <button type="button" class="rmode-btn" id="modeJoueurBtn" onclick="setMode('joueur')">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
            </svg>
            Report joueur
        </button>
    </div>
</div>

{{-- ════════════════════════════════════════════
     FORMULAIRE — REPORT QUOTIDIEN
════════════════════════════════════════════ --}}
<div id="formQuotidien">
<div class="rform-card mode-quotidien">
    <form id="reportQuotidienForm" onsubmit="submitForm(event, 'quotidien')">
        @csrf
        <input type="hidden" name="mode" value="quotidien">

        {{-- Date auto — rendu côté serveur --}}
        <div class="mb-3">
            <label class="rf-label">Date du rapport</label>
            <div class="rf-date-badge">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
                </svg>
                {{ \Carbon\Carbon::now()->translatedFormat('l j F Y') }}
            </div>
            <input type="hidden" name="date" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
        </div>


        <div class="rf-sep"></div>

        {{-- Résumé de la journée --}}
        <div class="mb-3">
            <label class="rf-label" for="resumeJournee">Comment s'est passée la journée ?</label>
            <textarea class="rf-textarea" id="resumeJournee" name="resume"
                      placeholder="Décris ce qui s'est passé sur le serveur : ambiance générale, incidents notables, joueurs actifs, événements spontanés..." required
                      style="min-height:160px;"></textarea>
        </div>

        {{-- Auteur — auto depuis le compte connecté --}}
        <div class="mb-4">
            <label class="rf-label">
                Auteur du rapport
                <span class="rf-auto-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/>
                    </svg>
                    Rempli automatiquement
                </span>
            </label>
            <div class="rf-user-row">
                @if(auth()->user()?->avatar)
                    <img src="{{ auth()->user()->avatar }}" alt="" class="rf-user-avatar">
                @else
                    <div class="rf-user-avatar-placeholder">{{ strtoupper(substr(auth()->user()?->name ?? '?', 0, 1)) }}</div>
                @endif
                <input class="rf-input rf-input-locked" type="text" id="authorQuotidien" name="auteur"
                       value="{{ auth()->user()?->name ?? '' }}" readonly required>
            </div>
        </div>

        <div class="rf-success" id="successQuotidien">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
            Rapport quotidien envoyé avec succès !
        </div>

        <button type="submit" class="btn-send btn-send-orange">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"/>
            </svg>
            Envoyer le rapport
        </button>
    </form>
</div>
</div>

{{-- ════════════════════════════════════════════
     FORMULAIRE — REPORT JOUEUR
════════════════════════════════════════════ --}}
<div id="formJoueur" style="display:none;">
<div class="rform-card mode-joueur">
    <form id="reportJoueurForm" onsubmit="submitForm(event, 'joueur')">
        @csrf
        <input type="hidden" name="mode" value="joueur">

        {{-- Infos joueur --}}
        <p class="rf-section-title">Informations du joueur</p>

        <div class="row g-3 mb-3">
            <div class="col-12 col-md-6">
                <label class="rf-label" for="playerPseudo">Pseudo du joueur</label>
                <input class="rf-input" type="text" id="playerPseudo" name="pseudo"
                       placeholder="Pseudo exact en jeu" required>
            </div>
            <div class="col-12 col-md-6">
                <label class="rf-label" for="playerSteamId">Steam ID</label>
                <input class="rf-input" type="text" id="playerSteamId" name="steam_id"
                       placeholder="76561198XXXXXXXXX" pattern="[0-9]+" title="Chiffres uniquement">
            </div>
        </div>

        <div class="rf-sep"></div>

        {{-- Type d'infraction --}}
        <div class="mb-4">
            <p class="rf-section-title">Type d'infraction <span style="color:rgba(255,255,255,.2);font-weight:400;letter-spacing:0;text-transform:none;font-size:.75rem;">— plusieurs choix possibles</span></p>
            <div class="rtype-grid" id="rtypeGrid">

                <div class="rtype-card" data-type="conflit" style="--card-color:#f87171;" onclick="selectRtype(this)">
                    <div class="rtype-check"><svg viewBox="0 0 10 10" fill="white"><path d="M1.5 5l2.5 2.5 4.5-4.5" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round"/></svg></div>
                    <div class="rtype-icon">⚔️</div>
                    <div>
                        <p class="rtype-name">Conflit</p>
                        <p class="rtype-sub">Dispute entre joueurs</p>
                    </div>
                </div>


                <div class="rtype-card" data-type="grief" style="--card-color:#fb923c;" onclick="selectRtype(this)">
                    <div class="rtype-check"><svg viewBox="0 0 10 10" fill="white"><path d="M1.5 5l2.5 2.5 4.5-4.5" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round"/></svg></div>
                    <div class="rtype-icon">🏗️</div>
                    <div>
                        <p class="rtype-name">Grief</p>
                        <p class="rtype-sub">Destruction de builds</p>
                    </div>
                </div>

                <div class="rtype-card" data-type="harcelement" style="--card-color:#f472b6;" onclick="selectRtype(this)">
                    <div class="rtype-check"><svg viewBox="0 0 10 10" fill="white"><path d="M1.5 5l2.5 2.5 4.5-4.5" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round"/></svg></div>
                    <div class="rtype-icon">😠</div>
                    <div>
                        <p class="rtype-name">Harcèlement</p>
                        <p class="rtype-sub">Insultes, menaces</p>
                    </div>
                </div>

                <div class="rtype-card" data-type="rumeur" style="--card-color:#facc15;" onclick="selectRtype(this)">
                    <div class="rtype-check"><svg viewBox="0 0 10 10" fill="white"><path d="M1.5 5l2.5 2.5 4.5-4.5" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round"/></svg></div>
                    <div class="rtype-icon">🗣️</div>
                    <div>
                        <p class="rtype-name">Rumeur</p>
                        <p class="rtype-sub">Fausse info, diffamation</p>
                    </div>
                </div>

                <div class="rtype-card" data-type="arnaque" style="--card-color:#4ade80;" onclick="selectRtype(this)">
                    <div class="rtype-check"><svg viewBox="0 0 10 10" fill="white"><path d="M1.5 5l2.5 2.5 4.5-4.5" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round"/></svg></div>
                    <div class="rtype-icon">💰</div>
                    <div>
                        <p class="rtype-name">Arnaque</p>
                        <p class="rtype-sub">Tromperie économique</p>
                    </div>
                </div>

                <div class="rtype-card" data-type="spam" style="--card-color:#38bdf8;" onclick="selectRtype(this)">
                    <div class="rtype-check"><svg viewBox="0 0 10 10" fill="white"><path d="M1.5 5l2.5 2.5 4.5-4.5" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round"/></svg></div>
                    <div class="rtype-icon">📢</div>
                    <div>
                        <p class="rtype-name">Spam</p>
                        <p class="rtype-sub">Chat, commandes répétées</p>
                    </div>
                </div>

                <div class="rtype-card" data-type="autre" style="--card-color:rgba(255,255,255,.4);" onclick="selectRtype(this)">
                    <div class="rtype-check"><svg viewBox="0 0 10 10" fill="white"><path d="M1.5 5l2.5 2.5 4.5-4.5" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round"/></svg></div>
                    <div class="rtype-icon">❓</div>
                    <div>
                        <p class="rtype-name">Autre</p>
                        <p class="rtype-sub">Non listé ci-dessus</p>
                    </div>
                </div>

            </div>
            <input type="hidden" id="joueurType" name="type">
        </div>

        <div class="rf-sep"></div>

        {{-- Rapport --}}
        <p class="rf-section-title">Rapport de modération</p>

        <div class="mb-3">
            <label class="rf-label">
                Modérateur
                <span class="rf-auto-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/>
                    </svg>
                    Rempli automatiquement
                </span>
            </label>
            <div class="rf-user-row">
                @if(auth()->user()?->avatar)
                    <img src="{{ auth()->user()->avatar }}" alt="" class="rf-user-avatar">
                @else
                    <div class="rf-user-avatar-placeholder">{{ strtoupper(substr(auth()->user()?->name ?? '?', 0, 1)) }}</div>
                @endif
                <input class="rf-input rf-input-locked" type="text" id="modoName" name="moderateur"
                       value="{{ auth()->user()?->name ?? '' }}" readonly required>
            </div>
        </div>

        <div class="mb-4">
            <label class="rf-label" for="reportText">Rapport détaillé</label>
            <textarea class="rf-textarea" id="reportText" name="description"
                      placeholder="Décrivez les faits avec précision : heure, contexte, preuves disponibles, témoins éventuels, action prise..." required
                      style="min-height:150px;"></textarea>
        </div>

        <div class="rf-success" id="successJoueur">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
            Report joueur envoyé avec succès !
        </div>

        <button type="submit" class="btn-send btn-send-indigo">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"/>
            </svg>
            Envoyer le report
        </button>
    </form>
</div>
</div>

<script>
// ── Mode toggle ──────────────────────────────
function setMode(mode) {
    const isQuot = mode === 'quotidien';
    document.getElementById('formQuotidien').style.display = isQuot ? '' : 'none';
    document.getElementById('formJoueur').style.display    = isQuot ? 'none' : '';

    document.getElementById('modeQuotidienBtn').className = 'rmode-btn' + (isQuot ? ' active' : '');
    document.getElementById('modeJoueurBtn').className    = 'rmode-btn' + (!isQuot ? ' active-blue' : '');
}

// ── Type joueur — sélection multiple ────────
function selectRtype(el) {
    el.classList.toggle('selected');
    const selected = [...document.querySelectorAll('.rtype-card.selected')]
        .map(c => c.dataset.type);
    document.getElementById('joueurType').value = selected.join(',');
}

// ── Envoi ────────────────────────────────────
function submitForm(e, mode) {
    e.preventDefault();

    if (mode === 'joueur' && !document.getElementById('joueurType').value) {
        alert('Veuillez choisir au moins un type d\'infraction.');
        return;
    }

    const formId  = mode === 'quotidien' ? 'reportQuotidienForm' : 'reportJoueurForm';
    const succId  = mode === 'quotidien' ? 'successQuotidien'    : 'successJoueur';
    const form    = document.getElementById(formId);

    fetch("{{ url('/dashboardv2/report/store') }}", {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')?.content || '' },
        body: new FormData(form)
    })
    .then(r => r.json())
    .catch(() => {}) // pas encore de vrai backend
    .finally(() => {
        form.reset();
        document.querySelectorAll('.rtype-card').forEach(c => c.classList.remove('selected'));
        document.getElementById('joueurType').value = '';

        const s = document.getElementById(succId);
        s.style.display = 'flex';
        setTimeout(() => s.style.display = 'none', 4000);
    });
}
</script>

</div>
