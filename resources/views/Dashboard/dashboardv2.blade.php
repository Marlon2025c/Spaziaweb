@extends('layouts.app')
@section('title', 'Spazia - DashboardV2')
@section('content')

<style>
    /* ─── Base ───────────────────────────────────────────── */
    body { background: #0a0a10; }
    .nav-ul-a { color: white; }

    /* ─── Gradient background ────────────────────────────── */
    .dash-bg {
        min-height: 100vh;
        background: #0a0a10;
        position: relative;
    }
    .dash-bg-gradient {
        position: fixed; inset: 0; pointer-events: none; z-index: 0;
        background:
            radial-gradient(ellipse 70% 50% at 10% 20%, rgba(249,115,22,.10) 0%, transparent 55%),
            radial-gradient(ellipse 50% 40% at 85% 70%, rgba(34,197,94,.08) 0%, transparent 55%),
            #0a0a10;
    }
    .dash-grid {
        position: fixed; inset: 0; pointer-events: none; z-index: 0;
        background-image: radial-gradient(circle, rgba(255,255,255,.04) 1px, transparent 1px);
        background-size: 40px 40px;
        mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 40%, transparent 100%);
    }
    .dash-orb {
        position: fixed; border-radius: 50%; filter: blur(80px); opacity: .15;
        pointer-events: none; z-index: 0; animation: orbFloat linear infinite;
    }
    .dash-orb-1 { width: 500px; height: 500px; background: radial-gradient(circle, #f97316, transparent 70%); top: -15%; left: -10%; animation-duration: 25s; }
    .dash-orb-2 { width: 350px; height: 350px; background: radial-gradient(circle, #22c55e, transparent 70%); bottom: 5%; right: 0%; animation-duration: 30s; animation-delay: -12s; }
    @keyframes orbFloat {
        0%, 100% { transform: translateY(0) scale(1); }
        33%       { transform: translateY(-25px) scale(1.04); }
        66%       { transform: translateY(18px) scale(.96); }
    }

    /* ─── Layout wrapper ─────────────────────────────────── */
    .dash-wrapper {
        position: relative; z-index: 1;
        display: flex;
        padding-top: 72px;
        min-height: 100vh;
    }

    /* ─── Sidebar ────────────────────────────────────────── */
    .dash-sidebar {
        width: 260px;
        min-width: 260px;
        height: calc(100vh - 72px);
        position: fixed;
        top: 72px;
        left: 0;
        overflow-y: auto;
        padding: 1.25rem 1rem 2rem;
        background: rgba(255,255,255,.025);
        border-right: 1px solid rgba(255,255,255,.07);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        scrollbar-width: thin;
        scrollbar-color: rgba(249,115,22,.5) transparent;
    }
    .dash-sidebar::-webkit-scrollbar { width: 4px; }
    .dash-sidebar::-webkit-scrollbar-track { background: transparent; }
    .dash-sidebar::-webkit-scrollbar-thumb { background: rgba(249,115,22,.4); border-radius: 4px; }

    /* Sidebar section label */
    .sidebar-label {
        font-size: .68rem;
        font-weight: 700;
        letter-spacing: .14em;
        text-transform: uppercase;
        color: rgba(255,255,255,.35);
        padding: .6rem .5rem .3rem;
        margin-top: .5rem;
    }

    /* Sidebar simple link */
    .sidebar-link {
        display: flex;
        align-items: center;
        gap: .55rem;
        padding: .5rem .7rem;
        border-radius: 10px;
        color: rgba(255,255,255,.7);
        font-size: .88rem;
        text-decoration: none;
        transition: background .2s, color .2s;
        cursor: pointer;
    }
    .sidebar-link:hover,
    .sidebar-link.active {
        background: rgba(249,115,22,.12);
        color: #fb923c;
    }
    .sidebar-link .sidebar-emoji { font-size: .95rem; min-width: 1.2rem; text-align: center; }

    /* Sidebar accordion — override Bootstrap */
    .dash-sidebar .accordion-item {
        border: none;
        background: transparent;
    }
    .dash-sidebar .accordion-button {
        background: transparent !important;
        color: rgba(255,255,255,.7);
        font-size: .88rem;
        padding: .5rem .7rem;
        border-radius: 10px;
        gap: .55rem;
        box-shadow: none !important;
        transition: background .2s, color .2s;
        display: flex;
        align-items: center;
    }
    .dash-sidebar .accordion-button::after {
        filter: invert(1);
        opacity: .4;
        margin-left: auto;
        transition: transform .25s ease-in-out, opacity .2s;
    }
    .dash-sidebar .accordion-button:not(.collapsed) {
        background: rgba(249,115,22,.12) !important;
        color: #fb923c;
        border-radius: 10px 10px 0 0;
    }
    .dash-sidebar .accordion-button:not(.collapsed)::after { opacity: .8; }
    .dash-sidebar .accordion-button:hover {
        background: rgba(249,115,22,.08) !important;
        color: #fb923c;
    }
    .dash-sidebar .accordion-collapse { border-radius: 0 0 10px 10px; overflow: hidden; }
    .dash-sidebar .accordion-body {
        background: rgba(249,115,22,.05);
        border: 1px solid rgba(249,115,22,.1);
        border-top: none;
        border-radius: 0 0 10px 10px;
        padding: .4rem .3rem;
    }
    .dash-sidebar .accordion-body a {
        display: flex;
        align-items: center;
        padding: .4rem .8rem;
        border-radius: 8px;
        font-size: .84rem;
        color: rgba(255,255,255,.6);
        text-decoration: none;
        transition: background .2s, color .2s;
    }
    .dash-sidebar .accordion-body a:hover,
    .dash-sidebar .accordion-body a.active {
        background: rgba(249,115,22,.1);
        color: #fb923c;
    }

    /* Sidebar divider */
    .sidebar-divider {
        height: 1px;
        background: rgba(255,255,255,.07);
        margin: .75rem .5rem;
    }

    /* ─── Main content ───────────────────────────────────── */
    .dash-main {
        margin-left: 260px;
        flex: 1;
        padding: 2rem 2.5rem 3rem;
        min-width: 0;
    }

    /* ─── Content card wrapper ───────────────────────────── */
    .dash-content-card {
        background: rgba(255,255,255,.025);
        border: 1px solid rgba(255,255,255,.07);
        border-radius: 20px;
        padding: 2rem 2.5rem;
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }

    /* ─── Wiki content typography ────────────────────────── */
    .dash-content-card h1,
    .dash-content-card h2,
    .dash-content-card h3,
    .dash-content-card h4 {
        color: #fff;
        font-weight: 700;
    }
    .dash-content-card h2 {
        font-size: 1.5rem;
        padding-bottom: .5rem;
        border-bottom: 1px solid rgba(255,255,255,.07);
        margin-bottom: 1.25rem;
    }
    .dash-content-card p,
    .dash-content-card li { color: rgba(255,255,255,.65); line-height: 1.75; }
    .dash-content-card a { color: #fb923c; text-decoration: none; }
    .dash-content-card a:hover { color: #f97316; text-decoration: underline; }
    .dash-content-card table {
        width: 100%;
        border-collapse: collapse;
        margin: 1.25rem 0;
    }
    .dash-content-card table th {
        background: rgba(249,115,22,.12);
        color: #fb923c;
        font-size: .8rem;
        font-weight: 700;
        letter-spacing: .08em;
        text-transform: uppercase;
        padding: .65rem 1rem;
        border: 1px solid rgba(249,115,22,.15);
    }
    .dash-content-card table td {
        padding: .6rem 1rem;
        border: 1px solid rgba(255,255,255,.07);
        color: rgba(255,255,255,.7);
        font-size: .88rem;
    }
    .dash-content-card table tr:hover td { background: rgba(255,255,255,.03); }

    /* ─── Scrollbar global ───────────────────────────────── */
    html::-webkit-scrollbar { width: 10px; }
    html::-webkit-scrollbar-track { background: #0a0a10; }
    html::-webkit-scrollbar-thumb { background-color: rgba(249,115,22,.5); border-radius: 10px; border: 2px solid #0a0a10; }
    html::-webkit-scrollbar-thumb:hover { background-color: #fb923c; }
    html { scrollbar-width: thin; scrollbar-color: rgba(249,115,22,.5) #0a0a10; }

    /* ─── Active nav highlight ───────────────────────────── */
    .nav-link.active,
    .accordion-body a.active {
        color: #fb923c !important;
        font-weight: 600;
    }

    /* ─── Responsive ─────────────────────────────────────── */
    @media (max-width: 768px) {
        .dash-sidebar { display: none; }
        .dash-main { margin-left: 0; padding: 1.25rem 1rem 2rem; }
    }
</style>

<div class="dash-bg">
    <div class="dash-bg-gradient"></div>
    <div class="dash-grid"></div>
    <div class="dash-orb dash-orb-1"></div>
    <div class="dash-orb dash-orb-2"></div>

    <div class="dash-wrapper">

        {{-- ══ SIDEBAR ══ --}}
        <aside class="dash-sidebar">

            {{-- Staff général --}}
            <p class="sidebar-label">Staff</p>

            <a class="sidebar-link ajax-link" href="#" onclick="loadSection('accueil')">
                <span class="sidebar-emoji">🏠</span> Accueil
            </a>

            {{-- Report --}}
            <div class="accordion" id="accordionReport" style="margin-bottom:2px;">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#sidebarReport"
                            aria-expanded="false" aria-controls="sidebarReport">
                            <span class="sidebar-emoji">🚨</span> Report
                        </button>
                    </h2>
                    <div id="sidebarReport" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <a class="ajax-link" href="#" onclick="loadSection('report_form'); return false;">
                                ✏️ Faire un report
                            </a>
                            <a class="ajax-link" href="#" onclick="loadSection('report_list'); return false;">
                                📋 Liste des reports
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <a class="sidebar-link ajax-link" href="#" onclick="loadSection('formation'); return false;">
                <span class="sidebar-emoji">🎓</span> Formation
            </a>

            <a class="sidebar-link ajax-link" href="#" onclick="loadSection('charte'); return false;">
                <span class="sidebar-emoji">📜</span> Charte de l'équipe
            </a>

        </aside>

        {{-- ══ MAIN CONTENT ══ --}}
        <main class="dash-main">
            <div class="dash-content-card">
                {!! $content !!}
            </div>
        </main>

    </div>
</div>

<script>
function loadSection(section) {
    // Active link styling
    document.querySelectorAll('.ajax-link').forEach(el => el.classList.remove('active'));
    const clicked = document.querySelector(`[onclick*="loadSection('${section}')"]`);
    if (clicked) clicked.classList.add('active');

    const content = document.getElementById('dashboard-content');
    if (content) {
        content.innerHTML = '<div style="display:flex;align-items:center;gap:.75rem;padding:2rem;color:rgba(255,255,255,.4);"><svg xmlns=\'http://www.w3.org/2000/svg\' width=\'20\' height=\'20\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'2\'><path d=\'M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83\'/></svg> Chargement...</div>';
    }

    fetch("{{ url('/dashboardv2/load') }}/" + section, {
        headers: { "X-Requested-With": "XMLHttpRequest" }
    })
    .then(res => res.text())
    .then(html => {
        if (!content) return;
        content.innerHTML = html;
        // innerHTML ne déclenche pas les <script> — on les ré-exécute manuellement
        content.querySelectorAll('script').forEach(old => {
            const s = document.createElement('script');
            s.textContent = old.textContent;
            old.replaceWith(s);
        });
    })
    .catch(() => {
        if (content) content.innerHTML = '<p style="color:rgba(255,255,255,.4);padding:2rem;">Impossible de charger cette section.</p>';
    });
}
</script>

@endsection
