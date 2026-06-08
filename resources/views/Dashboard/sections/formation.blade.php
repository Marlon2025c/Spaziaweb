<div id="dashboard-content">

<style>
    .formation-card {
        background: rgba(255,255,255,.025);
        border: 1px solid rgba(255,255,255,.07);
        border-radius: 18px;
        overflow: hidden;
        transition: border-color .3s, transform .3s;
    }
    .formation-card:hover { border-color: rgba(249,115,22,.3); transform: translateY(-3px); }
    .formation-card-header {
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid rgba(255,255,255,.06);
        display: flex;
        align-items: flex-start;
        gap: 1rem;
    }
    .formation-icon {
        width: 48px; height: 48px; min-width: 48px;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.3rem;
        flex-shrink: 0;
    }
    .formation-card-body { padding: 1.25rem 1.5rem; }
    .formation-tag {
        display: inline-block;
        font-size: .68rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase;
        padding: .2rem .7rem; border-radius: 999px; margin-bottom: .5rem;
    }
    .formation-progress-bar {
        height: 5px; border-radius: 3px;
        background: rgba(255,255,255,.07);
        overflow: hidden; margin-top: .75rem;
    }
    .formation-progress-fill { height: 100%; border-radius: 3px; transition: width 1s ease; }
    .btn-formation {
        display: inline-flex; align-items: center; gap: .5rem;
        padding: .55rem 1.2rem; border-radius: 10px; border: none;
        font-size: .84rem; font-weight: 700; cursor: pointer;
        transition: transform .2s, box-shadow .2s;
        text-decoration: none;
    }
    .btn-formation-primary {
        background: linear-gradient(135deg, #f97316, #ea580c);
        color: #fff;
        box-shadow: 0 0 15px rgba(249,115,22,.25);
    }
    .btn-formation-primary:hover { transform: translateY(-2px); box-shadow: 0 0 25px rgba(249,115,22,.45); color:#fff; }
    .btn-formation-ghost {
        background: rgba(255,255,255,.05);
        border: 1px solid rgba(255,255,255,.1);
        color: rgba(255,255,255,.65);
    }
    .btn-formation-ghost:hover { background: rgba(255,255,255,.09); color:#fff; transform: translateY(-1px); }

    .formation-step {
        display: flex; gap: 1rem; align-items: flex-start;
        padding: .75rem 0;
        border-bottom: 1px solid rgba(255,255,255,.05);
    }
    .formation-step:last-child { border-bottom: none; }
    .step-num {
        width: 28px; height: 28px; min-width: 28px;
        border-radius: 50%; border: 2px solid rgba(249,115,22,.3);
        display: flex; align-items: center; justify-content: center;
        font-size: .75rem; font-weight: 800; color: #fb923c;
    }
    .step-num.done { background: rgba(34,197,94,.15); border-color: rgba(34,197,94,.4); color: #4ade80; }
    .step-title { font-size: .88rem; font-weight: 600; color: rgba(255,255,255,.85); }
    .step-desc  { font-size: .8rem; color: rgba(255,255,255,.4); margin-top: .15rem; }
</style>

<div class="mb-4">
    <p style="font-size:.72rem;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.35);margin:0;">Staff</p>
    <h2 style="font-size:1.6rem;font-weight:800;color:#fff;margin:0;">Formation Staff</h2>
</div>

<div class="row g-4">

    {{-- ── Accueil nouveaux membres ── --}}
    <div class="col-12 col-lg-6">
        <div class="formation-card h-100">
            <div class="formation-card-header">
                <div class="formation-icon" style="background:rgba(249,115,22,.12);color:#fb923c;">🎓</div>
                <div>
                    <span class="formation-tag" style="background:rgba(249,115,22,.12);color:#fb923c;">Obligatoire</span>
                    <h3 style="font-size:1rem;font-weight:800;color:#fff;margin:0;">Formation initiale</h3>
                    <p style="font-size:.82rem;color:rgba(255,255,255,.4);margin:.2rem 0 0;">À compléter avant votre première session</p>
                </div>
            </div>
            <div class="formation-card-body">
                <div class="formation-step">
                    <div class="step-num done">✓</div>
                    <div>
                        <p class="step-title">Introduction au serveur</p>
                        <p class="step-desc">Règles générales, valeurs et objectifs de SpaziaEco</p>
                    </div>
                </div>
                <div class="formation-step">
                    <div class="step-num done">✓</div>
                    <div>
                        <p class="step-title">Outils de modération</p>
                        <p class="step-desc">Commandes de base, gestion des joueurs</p>
                    </div>
                </div>
                <div class="formation-step">
                    <div class="step-num">3</div>
                    <div>
                        <p class="step-title">Gestion des conflits</p>
                        <p class="step-desc">Comment traiter les reports et les litiges</p>
                    </div>
                </div>
                <div class="formation-step">
                    <div class="step-num">4</div>
                    <div>
                        <p class="step-title">Charte & valeurs de l'équipe</p>
                        <p class="step-desc">Code de conduite du staff</p>
                    </div>
                </div>
                <div class="formation-progress-bar mt-3">
                    <div class="formation-progress-fill" style="width:50%;background:linear-gradient(90deg,#f97316,#fb923c);"></div>
                </div>
                <p style="font-size:.75rem;color:rgba(255,255,255,.35);margin:.4rem 0 1rem;">2 / 4 étapes complétées</p>
                <button class="btn-formation btn-formation-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                    </svg>
                    Continuer
                </button>
            </div>
        </div>
    </div>

    {{-- ── Commandes avancées ── --}}
    <div class="col-12 col-lg-6">
        <div class="formation-card h-100">
            <div class="formation-card-header">
                <div class="formation-icon" style="background:rgba(34,197,94,.12);color:#4ade80;">⚙️</div>
                <div>
                    <span class="formation-tag" style="background:rgba(34,197,94,.12);color:#4ade80;">Avancé</span>
                    <h3 style="font-size:1rem;font-weight:800;color:#fff;margin:0;">Commandes avancées</h3>
                    <p style="font-size:.82rem;color:rgba(255,255,255,.4);margin:.2rem 0 0;">Console, plugins & gestion serveur</p>
                </div>
            </div>
            <div class="formation-card-body">
                <div class="formation-step">
                    <div class="step-num">1</div>
                    <div>
                        <p class="step-title">Commandes console</p>
                        <p class="step-desc">/op, /ban, /kick, /mute et leurs variantes</p>
                    </div>
                </div>
                <div class="formation-step">
                    <div class="step-num">2</div>
                    <div>
                        <p class="step-title">Gestion des plugins</p>
                        <p class="step-desc">EcoGnome, LuckPerms, CoreProtect</p>
                    </div>
                </div>
                <div class="formation-step">
                    <div class="step-num">3</div>
                    <div>
                        <p class="step-title">Sauvegardes & rollback</p>
                        <p class="step-desc">Comment restaurer un grief ou un incident</p>
                    </div>
                </div>
                <div class="formation-progress-bar mt-3">
                    <div class="formation-progress-fill" style="width:0%;background:linear-gradient(90deg,#22c55e,#4ade80);"></div>
                </div>
                <p style="font-size:.75rem;color:rgba(255,255,255,.35);margin:.4rem 0 1rem;">Non commencé</p>
                <button class="btn-formation btn-formation-ghost">
                    Commencer
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- ── Gestion d'events ── --}}
    <div class="col-12 col-lg-6">
        <div class="formation-card h-100">
            <div class="formation-card-header">
                <div class="formation-icon" style="background:rgba(168,85,247,.12);color:#c084fc;">🎮</div>
                <div>
                    <span class="formation-tag" style="background:rgba(168,85,247,.12);color:#c084fc;">Animation</span>
                    <h3 style="font-size:1rem;font-weight:800;color:#fff;margin:0;">Organisation d'events</h3>
                    <p style="font-size:.82rem;color:rgba(255,255,255,.4);margin:.2rem 0 0;">Pour les animateurs et responsables</p>
                </div>
            </div>
            <div class="formation-card-body">
                <div class="formation-step">
                    <div class="step-num">1</div>
                    <div>
                        <p class="step-title">Planification</p>
                        <p class="step-desc">Calendrier, annonces et coordination Discord</p>
                    </div>
                </div>
                <div class="formation-step">
                    <div class="step-num">2</div>
                    <div>
                        <p class="step-title">Déroulement en jeu</p>
                        <p class="step-desc">Commandes event, gestion des participants</p>
                    </div>
                </div>
                <div class="formation-step">
                    <div class="step-num">3</div>
                    <div>
                        <p class="step-title">Bilan & rapport</p>
                        <p class="step-desc">Écrire le compte-rendu de l'event</p>
                    </div>
                </div>
                <div class="formation-progress-bar mt-3">
                    <div class="formation-progress-fill" style="width:0%;background:linear-gradient(90deg,#a855f7,#c084fc);"></div>
                </div>
                <p style="font-size:.75rem;color:rgba(255,255,255,.35);margin:.4rem 0 1rem;">Non commencé</p>
                <button class="btn-formation btn-formation-ghost">Commencer</button>
            </div>
        </div>
    </div>

    {{-- ── Journalisme ── --}}
    <div class="col-12 col-lg-6">
        <div class="formation-card h-100">
            <div class="formation-card-header">
                <div class="formation-icon" style="background:rgba(236,72,153,.12);color:#f472b6;">✍️</div>
                <div>
                    <span class="formation-tag" style="background:rgba(236,72,153,.12);color:#f472b6;">Journalisme</span>
                    <h3 style="font-size:1rem;font-weight:800;color:#fff;margin:0;">Rédaction d'articles</h3>
                    <p style="font-size:.82rem;color:rgba(255,255,255,.4);margin:.2rem 0 0;">Pour les journalistes du serveur</p>
                </div>
            </div>
            <div class="formation-card-body">
                <div class="formation-step">
                    <div class="step-num">1</div>
                    <div>
                        <p class="step-title">Ligne éditoriale</p>
                        <p class="step-desc">Ton, style et sujets prioritaires</p>
                    </div>
                </div>
                <div class="formation-step">
                    <div class="step-num">2</div>
                    <div>
                        <p class="step-title">Rédaction & publication</p>
                        <p class="step-desc">Utilisation du dashboard pour poster</p>
                    </div>
                </div>
                <div class="formation-progress-bar mt-3">
                    <div class="formation-progress-fill" style="width:0%;background:linear-gradient(90deg,#ec4899,#f472b6);"></div>
                </div>
                <p style="font-size:.75rem;color:rgba(255,255,255,.35);margin:.4rem 0 1rem;">Non commencé</p>
                <button class="btn-formation btn-formation-ghost">Commencer</button>
            </div>
        </div>
    </div>

</div>

</div>
