<div id="dashboard-content">

<style>
    /* ─── Terminal ────────────────────────────── */
    .terminal-wrap {
        background: #060a06;
        border: 1px solid rgba(34,197,94,.2);
        border-radius: 14px;
        overflow: hidden;
    }
    .terminal-header {
        background: rgba(34,197,94,.07);
        border-bottom: 1px solid rgba(34,197,94,.15);
        padding: .6rem 1rem;
        display: flex;
        align-items: center;
        gap: .5rem;
    }
    .terminal-dot { width:10px; height:10px; border-radius:50%; }
    .terminal-title { font-size:.78rem; color:rgba(255,255,255,.4); letter-spacing:.08em; margin-left:.5rem; }
    #terminal-output {
        height: 320px;
        overflow-y: auto;
        padding: 1rem 1.25rem;
        font-family: 'Courier New', monospace;
        font-size: .84rem;
        line-height: 1.6;
        color: #4ade80;
        scrollbar-width: thin;
        scrollbar-color: rgba(34,197,94,.3) transparent;
    }
    #terminal-output::-webkit-scrollbar { width: 4px; }
    #terminal-output::-webkit-scrollbar-thumb { background: rgba(34,197,94,.3); border-radius:4px; }
    .terminal-input-row {
        display: flex;
        align-items: center;
        gap: .5rem;
        padding: .6rem 1rem;
        border-top: 1px solid rgba(34,197,94,.12);
        background: rgba(34,197,94,.03);
    }
    .terminal-prompt { color: #4ade80; font-family: monospace; font-size:.9rem; font-weight:700; }
    #terminal-input {
        flex: 1;
        background: transparent;
        border: none;
        outline: none;
        color: #4ade80;
        font-family: 'Courier New', monospace;
        font-size: .84rem;
        caret-color: #4ade80;
    }
    #terminal-input::placeholder { color: rgba(74,222,128,.3); }
    .btn-terminal {
        background: rgba(34,197,94,.15);
        border: 1px solid rgba(34,197,94,.3);
        color: #4ade80;
        font-size: .8rem;
        font-weight: 600;
        padding: .35rem .9rem;
        border-radius: 8px;
        cursor: pointer;
        transition: background .2s, border-color .2s;
    }
    .btn-terminal:hover { background: rgba(34,197,94,.25); border-color: rgba(34,197,94,.5); }

    /* ─── Server buttons ──────────────────────── */
    .server-btn {
        display: inline-flex;
        align-items: center;
        gap: .55rem;
        padding: .7rem 1.5rem;
        border-radius: 12px;
        font-size: .88rem;
        font-weight: 700;
        border: none;
        cursor: pointer;
        transition: transform .2s, box-shadow .2s, opacity .2s;
    }
    .server-btn:active { transform: scale(.97); }
    .btn-start {
        background: linear-gradient(135deg, #22c55e, #16a34a);
        color: #fff;
        box-shadow: 0 0 20px rgba(34,197,94,.3);
    }
    .btn-start:hover { box-shadow: 0 0 35px rgba(34,197,94,.5); transform: translateY(-2px); }
    .btn-stop {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: #fff;
        box-shadow: 0 0 20px rgba(239,68,68,.3);
    }
    .btn-stop:hover { box-shadow: 0 0 35px rgba(239,68,68,.5); transform: translateY(-2px); }
    .btn-restart {
        background: linear-gradient(135deg, #f97316, #ea580c);
        color: #fff;
        box-shadow: 0 0 20px rgba(249,115,22,.3);
    }
    .btn-restart:hover { box-shadow: 0 0 35px rgba(249,115,22,.5); transform: translateY(-2px); }
    .btn-reload {
        background: rgba(255,255,255,.07);
        border: 1px solid rgba(255,255,255,.12);
        color: rgba(255,255,255,.75);
    }
    .btn-reload:hover { background: rgba(255,255,255,.12); transform: translateY(-2px); }

    /* ─── Status badge ────────────────────────── */
    .server-status-badge {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        background: rgba(34,197,94,.1);
        border: 1px solid rgba(34,197,94,.25);
        color: #4ade80;
        font-size: .78rem;
        font-weight: 700;
        letter-spacing: .08em;
        padding: .3rem .9rem;
        border-radius: 999px;
    }
    .status-pulse { width:7px; height:7px; border-radius:50%; background:#4ade80; animation: pulse-g 2s infinite; }
    @keyframes pulse-g {
        0%,100% { box-shadow: 0 0 0 2px rgba(34,197,94,.2); }
        50%      { box-shadow: 0 0 0 5px rgba(34,197,94,.08); }
    }

    /* ─── Stat mini-cards ─────────────────────── */
    .stat-mini {
        background: rgba(255,255,255,.03);
        border: 1px solid rgba(255,255,255,.07);
        border-radius: 14px;
        padding: 1rem 1.25rem;
        transition: border-color .3s;
    }
    .stat-mini:hover { border-color: rgba(249,115,22,.25); }
    .stat-mini-label { font-size: .7rem; letter-spacing: .1em; color: rgba(255,255,255,.35); text-transform:uppercase; }
    .stat-mini-value { font-size: 1.5rem; font-weight: 800; color: #fff; line-height: 1.1; }
    .stat-mini-sub   { font-size: .75rem; color: rgba(255,255,255,.4); margin-top:.2rem; }
</style>

@if(!($canManageServer ?? false))
    {{-- Accueil simplifié — staff sans accès à la console serveur --}}
    <div class="mb-4">
        <p style="font-size:.72rem;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.35);margin:0;">Staff</p>
        <h2 style="font-size:1.6rem;font-weight:800;color:#fff;margin:0;">Bienvenue, {{ auth()->user()->name }}</h2>
        <p style="font-size:.87rem;color:rgba(255,255,255,.35);margin:.3rem 0 0;">
            La console serveur est réservée aux Responsables et Fondateurs. Utilise le menu à gauche pour accéder aux autres sections.
        </p>
    </div>
@else
{{-- Titre --}}
<div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
    <div>
        <p style="font-size:.72rem;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.35);margin:0;">Staff</p>
        <h2 style="font-size:1.6rem;font-weight:800;color:#fff;margin:0;">Console & Serveur</h2>
    </div>
    <span class="server-status-badge">
        <span class="status-pulse"></span>
        Serveur en ligne
    </span>
</div>

{{-- Boutons serveur --}}
<div class="d-flex flex-wrap gap-2 mb-4">
    <button class="server-btn btn-start" onclick="serverAction('start')">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M11.596 8.697 6.5 11.197V4.803l5.096 2.5a.25.25 0 0 1 0 .394z"/>
            <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-4.95 11.95l9.9-9.9A6.985 6.985 0 0 0 8 1zm-4.242 12.657 9.9-9.9a7 7 0 0 1-9.9 9.9z"/>
        </svg>
        Démarrer
    </button>
    <button class="server-btn btn-stop" onclick="serverAction('stop')">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M5 3.5h6A1.5 1.5 0 0 1 12.5 5v6a1.5 1.5 0 0 1-1.5 1.5H5A1.5 1.5 0 0 1 3.5 11V5A1.5 1.5 0 0 1 5 3.5z"/>
        </svg>
        Arrêter
    </button>
    <button class="server-btn btn-restart" onclick="serverAction('restart')">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"/>
        </svg>
        Redémarrer
    </button>
    <button class="server-btn btn-reload" onclick="refreshLogs()">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-4.142-3.358-7.5-7.5-7.5S4.5 7.858 4.5 12s3.358 7.5 7.5 7.5a7.48 7.48 0 0 0 4.5-1.5"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 3v5h-5"/>
        </svg>
        Rafraîchir les logs
    </button>
</div>

{{-- Mini stats --}}
<div class="row g-3 mb-4">
    <div class="col-6 col-xl-3">
        <div class="stat-mini">
            <p class="stat-mini-label">Joueurs</p>
            <p class="stat-mini-value" id="stat-players">—</p>
            <p class="stat-mini-sub">En ligne</p>
        </div>
    </div>
    <div class="col-6 col-xl-3">
        <div class="stat-mini">
            <p class="stat-mini-label">RAM</p>
            <p class="stat-mini-value" id="stat-ram">—</p>
            <p class="stat-mini-sub">Utilisée</p>
        </div>
    </div>
    <div class="col-6 col-xl-3">
        <div class="stat-mini">
            <p class="stat-mini-label">TPS</p>
            <p class="stat-mini-value" id="stat-tps">—</p>
            <p class="stat-mini-sub">Ticks/s</p>
        </div>
    </div>
    <div class="col-6 col-xl-3">
        <div class="stat-mini">
            <p class="stat-mini-label">Uptime</p>
            <p class="stat-mini-value" id="stat-uptime">—</p>
            <p class="stat-mini-sub">Depuis démarrage</p>
        </div>
    </div>
</div>

{{-- Terminal --}}
<div class="terminal-wrap">
    <div class="terminal-header">
        <span class="terminal-dot" style="background:#ef4444;"></span>
        <span class="terminal-dot" style="background:#f59e0b;"></span>
        <span class="terminal-dot" style="background:#22c55e;"></span>
        <span class="terminal-title">TERMINAL — LOGS SERVEUR</span>
    </div>
    <div id="terminal-output">
        <span style="color:rgba(74,222,128,.4);">Connexion au serveur...</span>
    </div>
    <div class="terminal-input-row">
        <span class="terminal-prompt">$</span>
        <input type="text" id="terminal-input" placeholder="Entrez une commande Minecraft..." autocomplete="off">
        <button class="btn-terminal" onclick="sendCommand(event)">Envoyer</button>
    </div>
</div>
@endif

<script>
function serverAction(action) {
    const labels = { start:'Démarrage...', stop:'Arrêt...', restart:'Redémarrage...' };
    appendLog(`[Action] ${labels[action] || action}`, '#fb923c');
    // TODO: appeler l'API serveur ici
}

function appendLog(text, color) {
    const out = document.getElementById('terminal-output');
    if (!out) return;
    const line = document.createElement('div');
    line.style.color = color || '#4ade80';
    line.textContent = `[${new Date().toLocaleTimeString()}] ${text}`;
    out.appendChild(line);
    out.scrollTop = out.scrollHeight;
}

function refreshLogs() {
    appendLog('Rafraîchissement des logs...', 'rgba(74,222,128,.5)');
    // TODO: fetch logs depuis l'API
}

function sendCommand(e) {
    e.preventDefault();
    const input = document.getElementById('terminal-input');
    const cmd = input.value.trim();
    if (!cmd) return;
    appendLog(`> ${cmd}`, '#fff');
    input.value = '';
    // TODO: envoyer la commande à l'API serveur
}

document.getElementById('terminal-input')?.addEventListener('keydown', function(e) {
    if (e.key === 'Enter') sendCommand(e);
});
</script>

</div>
