@extends('layouts.app')
@section('title', 'Spazia - Accueil')
@section('content')

<style>
    /* ─── Reset & base ─────────────────────────────────── */
    .nav-ul-a { color: white; }
    .navbar { background-color: #0e0e0e45; transition: background-color .3s; }
    .navbar-scrolled { background-color: #101015; }

    /* ─── Hero — uniquement ce que Bootstrap ne couvre pas ── */
    .hero { min-height: 92vh; background: #0a0a10; }
    .hero-gradient {
        position: absolute; inset: 0;
        background:
            radial-gradient(ellipse 80% 60% at 15% 40%, rgba(249,115,22,.20) 0%, transparent 55%),
            radial-gradient(ellipse 60% 50% at 80% 60%, rgba(34,197,94,.15) 0%, transparent 55%),
            radial-gradient(ellipse 100% 80% at 50% 100%, rgba(16,185,129,.10) 0%, transparent 50%),
            #0a0a10;
        animation: gradientShift 8s ease-in-out infinite alternate;
    }
    @keyframes gradientShift {
        0%   { filter: hue-rotate(0deg) brightness(1); }
        100% { filter: hue-rotate(20deg) brightness(1.1); }
    }
    .hero-grid {
        position: absolute; inset: 0;
        background-image: radial-gradient(circle, rgba(255,255,255,.06) 1px, transparent 1px);
        background-size: 40px 40px;
        mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 40%, transparent 100%);
    }
    .orb { position: absolute; border-radius: 50%; filter: blur(60px); opacity: .35; animation: orbFloat linear infinite; }
    .orb-1 { width: 400px; height: 400px; background: radial-gradient(circle, #f97316, transparent 70%); top: -10%; left: -5%; animation-duration: 20s; }
    .orb-2 { width: 300px; height: 300px; background: radial-gradient(circle, #22c55e, transparent 70%); bottom: 0; right: 5%; animation-duration: 25s; animation-delay: -10s; }
    .orb-3 { width: 200px; height: 200px; background: radial-gradient(circle, #ea580c, transparent 70%); top: 40%; left: 55%; animation-duration: 18s; animation-delay: -5s; }
    @keyframes orbFloat {
        0%, 100% { transform: translateY(0) scale(1); }
        33%       { transform: translateY(-30px) scale(1.05); }
        66%       { transform: translateY(20px) scale(.95); }
    }
    .hero-badge { background: rgba(249,115,22,.15); border: 1px solid rgba(249,115,22,.4); color: #fb923c; font-size: .8rem; letter-spacing: .12em; padding: .4rem 1.2rem; }
    .hero-title { font-size: clamp(2.8rem, 8vw, 6rem); font-weight: 800; line-height: 1.1; letter-spacing: -.02em; }
    .hero-title span { background: linear-gradient(135deg, #f97316 0%, #fb923c 40%, #22c55e 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
    .hero-sub { font-size: 1.15rem; color: rgba(255,255,255,.6); max-width: 540px; line-height: 1.7; }
    .btn-hero-primary { background: linear-gradient(135deg, #f97316, #ea580c); padding: .85rem 2rem; border-radius: 12px; transition: transform .2s, box-shadow .2s; box-shadow: 0 0 30px rgba(249,115,22,.35); }
    .btn-hero-primary:hover { transform: translateY(-2px); box-shadow: 0 0 50px rgba(249,115,22,.55); color: #fff; }
    .btn-hero-secondary { background: rgba(255,255,255,.07); color: rgba(255,255,255,.85); padding: .85rem 2rem; border-radius: 12px; border: 1px solid rgba(255,255,255,.12); transition: background .2s, border-color .2s; }
    .btn-hero-secondary:hover { background: rgba(255,255,255,.12); border-color: rgba(255,255,255,.25); color: #fff; }
    .hero-ip { background: rgba(255,255,255,.05); border: 1px solid rgba(255,255,255,.1); border-radius: 12px; padding: .7rem 1.4rem; transition: background .2s, border-color .2s; }
    .hero-ip:hover { background: rgba(255,255,255,.09); border-color: rgba(249,115,22,.4); }
    .hero-ip-label { font-size: .7rem; letter-spacing: .1em; color: rgba(255,255,255,.4); }
    .hero-ip-value { color: #fff; letter-spacing: .05em; }
    .hero-ip-copy { font-size: .7rem; color: #fb923c; letter-spacing: .05em; }
    .status-dot { width: 8px; height: 8px; background: #fb923c; box-shadow: 0 0 0 3px rgba(249,115,22,.25); animation: pulse-dot 2s infinite; }
    @keyframes pulse-dot {
        0%, 100% { box-shadow: 0 0 0 3px rgba(249,115,22,.25); }
        50%       { box-shadow: 0 0 0 6px rgba(249,115,22,.1); }
    }
    .scroll-hint { bottom: 2rem; opacity: .4; animation: bounce 2s infinite; }
    .scroll-hint span { font-size: .7rem; letter-spacing: .1em; }
    @keyframes bounce {
        0%, 100% { transform: translateX(-50%) translateY(0); }
        50%       { transform: translateX(-50%) translateY(8px); }
    }

    /* ─── Features ──────────────────────────────────────── */
    .features-section { background: #0d0d14; padding: 5rem 0 4rem; }
    .feature-card { background: rgba(255,255,255,.03); border: 1px solid rgba(255,255,255,.07); border-radius: 16px; transition: border-color .3s, background .3s, transform .3s; }
    .feature-card:hover { border-color: rgba(249,115,22,.35); background: rgba(249,115,22,.04); transform: translateY(-4px); }
    .feature-icon { width: 56px; height: 56px; background: rgba(249,115,22,.12); border-radius: 14px; color: #fb923c; }
    .feature-icon.green { background: rgba(34,197,94,.12); color: #4ade80; }
    .feature-icon svg { width: 28px; height: 28px; }
    .feature-desc { font-size: .85rem; color: rgba(255,255,255,.45); line-height: 1.6; }

    /* ─── Présentation ──────────────────────────────────── */
    .about-section { background: #0a0a10; padding: 6rem 0; }
    .about-label { font-size: .8rem; letter-spacing: .15em; color: #fb923c; }
    .about-title { font-size: 2.5rem; font-weight: 800; color: #fff; line-height: 1.15; }
    .about-text { color: rgba(255,255,255,.55); line-height: 1.8; }
    .video-wrapper { border-radius: 16px; border: 1px solid rgba(255,255,255,.08); box-shadow: 0 40px 80px rgba(0,0,0,.6); }
    .video-wrapper iframe { display: block; width: 100%; aspect-ratio: 16/9; height: auto; }

    /* ─── Actualités ────────────────────────────────────── */
    .news-section { background: #0d0d14; padding: 5rem 0 6rem; }
    .section-label { font-size: .8rem; letter-spacing: .15em; color: #fb923c; }
    .section-heading { font-size: 2.25rem; font-weight: 800; }
    .article-card { background: rgba(255,255,255,.03); border: 1px solid rgba(255,255,255,.07); border-radius: 16px; transition: border-color .3s, transform .3s, box-shadow .3s; }
    .article-card:hover { border-color: rgba(34,197,94,.3); transform: translateY(-4px); box-shadow: 0 20px 60px rgba(0,0,0,.4); }
    .article-img-wrapper { aspect-ratio: 16/9; }
    .article-img-wrapper img { transition: transform .5s ease; }
    .article-card:hover .article-img-wrapper img { transform: scale(1.05); }
    .article-tag { background: rgba(249,115,22,.15); color: #fb923c; font-size: .7rem; letter-spacing: .1em; }
    .article-title { color: #fff; letter-spacing: .03em; }
    .article-date { font-size: .8rem; color: rgba(255,255,255,.35); }
    .article-link { gap: .35rem; color: #fb923c; transition: gap .2s; }
    .article-link:hover { gap: .6rem; color: #f97316; }
</style>

{{-- ══════════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════════ --}}
<section class="hero position-relative d-flex align-items-center justify-content-center overflow-hidden">
    <div class="hero-gradient"></div>
    <div class="hero-grid"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <div class="hero-content position-relative text-center p-4" style="z-index:2">
        <div class="hero-badge d-inline-block fw-semibold text-uppercase rounded-pill mb-4">
            <span class="status-dot d-inline-block rounded-circle"></span>
            &nbsp;Saison 7 — En préparation
        </div>
        <h1 class="hero-title text-white mb-3">
            Le serveur<br><span>SpaziaEco</span>
        </h1>
        <p class="hero-sub mx-auto mb-4">
            Un serveur <strong style="color:#fff;">survie économique</strong> où tu bâtis ta ville,
            choisis ton métier et forges ta propre économie.<br>
            La saison 7 arrive bientôt — prépare-toi.
        </p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="/actualites" class="btn-hero-primary d-inline-flex align-items-center gap-2 text-white fw-bold text-decoration-none border-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z"/>
                </svg>
                Voir les actualités
            </a>
            <a href="/qui_sommes_nous" class="btn-hero-secondary d-inline-flex align-items-center gap-2 fw-semibold text-decoration-none">
                En savoir plus
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                </svg>
            </a>
        </div>
        {{-- Statut serveur --}}
        <div class="hero-ip d-inline-flex align-items-center gap-3 mt-4" style="cursor:default;">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="#fb923c" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
            <div>
                <div class="hero-ip-label fw-bold text-uppercase">Statut actuel</div>
                <div class="hero-ip-value fw-bold font-monospace" style="font-family:inherit; font-size:.95rem;">Serveur en pause · Saison 7 bêta en cours</div>
            </div>
        </div>
    </div>

    <div class="scroll-hint position-absolute start-50 translate-middle-x d-flex flex-column align-items-center text-white text-uppercase" style="z-index:2">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7"/>
        </svg>
        <span>Scroll</span>
    </div>
</section>

{{-- ══════════════════════════════════════════════════════════
     FEATURES
══════════════════════════════════════════════════════════ --}}
<section class="features-section">
    <div class="container">
        <div class="row g-4">

            <div class="col-6 col-lg">
                <div class="feature-card text-center h-100 p-4">
                    <div class="feature-icon d-flex align-items-center justify-content-center mx-auto mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                        </svg>
                    </div>
                    <p class="feature-title fw-bold fs-6 text-white mb-2">Haute Collab</p>
                    <p class="feature-desc mb-0">Travaille avec la communauté pour bâtir plus grand.</p>
                </div>
            </div>

            <div class="col-6 col-lg">
                <div class="feature-card text-center h-100 p-4">
                    <div class="feature-icon green d-flex align-items-center justify-content-center mx-auto mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/>
                        </svg>
                    </div>
                    <p class="feature-title fw-bold fs-6 text-white mb-2">Staff actif</p>
                    <p class="feature-desc mb-0">Une équipe disponible pour assurer le bon jeu.</p>
                </div>
            </div>

            <div class="col-6 col-lg">
                <div class="feature-card text-center h-100 p-4">
                    <div class="feature-icon d-flex align-items-center justify-content-center mx-auto mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                        </svg>
                    </div>
                    <p class="feature-title fw-bold fs-6 text-white mb-2">Mods</p>
                    <p class="feature-desc mb-0">Des modifications soigneusement sélectionnées.</p>
                </div>
            </div>

            <div class="col-6 col-lg">
                <div class="feature-card text-center h-100 p-4">
                    <div class="feature-icon green d-flex align-items-center justify-content-center mx-auto mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0"/>
                        </svg>
                    </div>
                    <p class="feature-title fw-bold fs-6 text-white mb-2">Events</p>
                    <p class="feature-desc mb-0">Des événements réguliers pour animer le serveur.</p>
                </div>
            </div>

            <div class="col-6 col-lg">
                <div class="feature-card text-center h-100 p-4">
                    <div class="feature-icon d-flex align-items-center justify-content-center mx-auto mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                    </div>
                    <p class="feature-title fw-bold fs-6 text-white mb-2">Monnaie Unique</p>
                    <p class="feature-desc mb-0">Un système économique cohérent et équilibré.</p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════════════════
     PRÉSENTATION + VIDÉO
══════════════════════════════════════════════════════════ --}}
<section class="about-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <p class="about-label fw-bold text-uppercase mb-2">Le serveur</p>
                <h2 class="about-title mb-3">Découvre<br>SpaziaEco</h2>
                <p class="about-text">
                    Rejoins un monde où chaque décision compte. Bâtis ta ville, choisis ton métier
                    et développe ton économie tout en respectant l'écosystème. Un système de notation
                    récompense les meilleures villes, et l'histoire de SpaziaEco continue d'évoluer
                    depuis la saison 5.
                </p>
                <p class="about-text mt-3">
                    Prépare-toi à une expérience de jeu sans limites. Ta légende débute ici.
                </p>
                <a href="/launcher_spaziacraft" class="btn-hero-primary d-inline-flex align-items-center gap-2 text-white fw-bold text-decoration-none border-0 mt-4">
                    Rejoindre l'aventure
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                    </svg>
                </a>
            </div>
            <div class="col-lg-7">
                <div class="video-wrapper overflow-hidden">
                    <iframe
                        src="https://www.youtube.com/embed/DwSnV7qzh7Y?si=vmOp16UxABWP3bvj"
                        title="SpaziaEco — Présentation"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin"
                        allowfullscreen
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════════════════
     ACTUALITÉS
══════════════════════════════════════════════════════════ --}}
<section class="news-section">
    <div class="container">
        <p class="section-label fw-bold text-uppercase text-center mb-2">Dernières nouvelles</p>
        <h2 class="section-heading text-white text-center mb-5">Actualités</h2>

        <div class="row g-4 justify-content-center">
            @foreach ($articles as $article)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="article-card overflow-hidden h-100 d-flex flex-column">
                    <div class="article-img-wrapper w-100 overflow-hidden position-relative">
                        <img
                            class="w-100 h-100 object-fit-cover"
                            src="{{ asset('storage/' . $article->logo) }}"
                            alt="{{ $article->title }}"
                            loading="lazy">
                    </div>
                    <div class="p-4 flex-grow-1 d-flex flex-column">
                        <span class="article-tag d-inline-block fw-bold text-uppercase px-3 py-1 rounded-pill mb-3">{{ $article->tag }}</span>
                        <p class="article-title fw-bold fs-6 text-white text-uppercase mb-2">{{ $article->title }}</p>
                        <p class="article-date mb-auto">
                            {{ \Carbon\Carbon::parse($article->date)->translatedFormat('d F Y') }}
                        </p>
                        <a href="{{ $article->lien_pubhtml5 }}" target="_blank" rel="noopener" class="article-link d-inline-flex align-items-center mt-3 fw-semibold text-decoration-none">
                            Voir l'article
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════════════════
     RADIO PLAYER — fixe bas droite
══════════════════════════════════════════════════════════ --}}
<style>
    /* ── Radio card — uniquement ce que Bootstrap ne couvre pas ── */
    .radio-card {
        position: fixed; bottom: 20px; right: 20px; z-index: 9999;
        width: 280px; background: #1a1a1a;
        border: 1px solid rgba(255,255,255,.07);
        gap: 12px;
    }
    .rc-pfp { width: 46px; height: 46px; min-width: 46px; background: #2e2e2e; }
    .rc-pfp img { width: 100%; height: 100%; object-fit: cover; }
    .rc-title  { font-size: 13px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .rc-artist { font-size: 11px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .rc-time   { font-size: 10px; min-width: 30px; font-variant-numeric: tabular-nums; }
    .rc-bar    { height: 4px; background: #3a3a3a; }
    .rc-fill   { height: 100%; width: 0%; background: #1db954; transition: width 1s linear; }
    .rc-btn    { background: none; border: none; padding: 0; cursor: pointer; color: rgba(255,255,255,.6); line-height: 0; transition: color .15s; display: flex; align-items: center; }
    .rc-btn:hover { color: #fff; }
    .rc-btn.green { color: #1db954; }
    .rc-btn.green:hover { color: #1ed760; }
    .rc-vol-slider {
        -webkit-appearance: none; appearance: none;
        width: 60px; height: 3px; border-radius: 2px; outline: none; cursor: pointer;
        background: linear-gradient(to right, #1db954 20%, #3a3a3a 20%);
    }
    .rc-vol-slider::-webkit-slider-thumb { -webkit-appearance: none; width: 11px; height: 11px; border-radius: 50%; background: #fff; cursor: pointer; }
    .rc-vol-slider::-moz-range-thumb    { width: 11px; height: 11px; border-radius: 50%; background: #fff; border: none; cursor: pointer; }
    /* Barres égaliseur */
    .rc-bars { display: flex; align-items: flex-end; gap: 2px; height: 22px; padding: 2px; }
    .rc-bar-line { width: 3px; background: #1db954; border-radius: 2px; }
    .rc-bar-line:nth-child(1) { animation: rcplay 1s ease-in-out infinite .2s; }
    .rc-bar-line:nth-child(2) { animation: rcplay 1s ease-in-out infinite .5s; }
    .rc-bar-line:nth-child(3) { animation: rcplay 1s ease-in-out infinite .6s; }
    .rc-bar-line:nth-child(4) { animation: rcplay 1s ease-in-out infinite 0s;  }
    .rc-bar-line:nth-child(5) { animation: rcplay 1s ease-in-out infinite .4s; }
    .rc-bar-line.paused { animation-play-state: paused !important; height: 3px !important; }
    @keyframes rcplay { 0%,100% { height: 3px; } 33% { height: 10px; } 66% { height: 18px; } }
</style>

<div class="radio-card d-flex flex-column p-3 rounded-3 shadow-lg">
    <audio id="radio-audio" preload="none">
        <source src="https://spazia.fr/radio-proxy" type="audio/mpeg">
    </audio>

    {{-- Ligne 1 : pochette + titre --}}
    <div class="d-flex align-items-center gap-3">
        <div class="rc-pfp rounded-2 d-flex align-items-center justify-content-center overflow-hidden flex-shrink-0" id="rc-pfp">
            <div class="rc-bars">
                <div class="rc-bar-line"></div>
                <div class="rc-bar-line"></div>
                <div class="rc-bar-line"></div>
                <div class="rc-bar-line"></div>
                <div class="rc-bar-line"></div>
            </div>
        </div>
        <div class="overflow-hidden flex-grow-1">
            <p class="rc-title text-white fw-bold mb-1">SpaziaRadio</p>
            <p class="rc-artist text-white-50 mb-0" id="radio-artist">Chargement...</p>
        </div>
    </div>

    {{-- Ligne 2 : progression --}}
    <div class="d-flex align-items-center gap-2">
        <span class="rc-time text-white-50" id="rc-now">0:00</span>
        <div class="rc-bar rounded-2 overflow-hidden flex-grow-1"><div class="rc-fill rounded-2" id="rc-fill"></div></div>
        <span class="rc-time text-white-50 text-end" id="rc-total">0:00</span>
    </div>

    {{-- Ligne 3 : contrôles --}}
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-2 flex-grow-1">
            <button class="rc-btn" id="btn-mute">
                <svg id="icon-vol" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="16" height="16">
                    <path clip-rule="evenodd" d="M11.26 3.691A1.2 1.2 0 0 1 12 4.8v14.4a1.199 1.199 0 0 1-2.048.848L5.503 15.6H2.4a1.2 1.2 0 0 1-1.2-1.2V9.6a1.2 1.2 0 0 1 1.2-1.2h3.103l4.449-4.448a1.2 1.2 0 0 1 1.308-.26Zm6.328-.176a1.2 1.2 0 0 1 1.697 0A11.967 11.967 0 0 1 22.8 12a11.966 11.966 0 0 1-3.515 8.485 1.2 1.2 0 0 1-1.697-1.697A9.563 9.563 0 0 0 20.4 12a9.565 9.565 0 0 0-2.812-6.788 1.2 1.2 0 0 1 0-1.697Zm-3.394 3.393a1.2 1.2 0 0 1 1.698 0A7.178 7.178 0 0 1 18 12a7.18 7.18 0 0 1-2.108 5.092 1.2 1.2 0 1 1-1.698-1.698A4.782 4.782 0 0 0 15.6 12a4.78 4.78 0 0 0-1.406-3.394 1.2 1.2 0 0 1 0-1.698Z" fill-rule="evenodd"/>
                </svg>
            </button>
            <input type="range" id="vol-slider" class="rc-vol-slider" min="0" max="100" value="20">
        </div>

        <button class="rc-btn green" id="btn-play">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="32" height="32">
                <path clip-rule="evenodd" d="M21.6 12a9.6 9.6 0 1 1-19.2 0 9.6 9.6 0 0 1 19.2 0ZM9.6 8.4a1.2 1.2 0 0 1 1.848-1.012l5.4 3.6a1.2 1.2 0 0 1 0 2.024l-5.4 3.6A1.2 1.2 0 0 1 9.6 15.6V8.4Z" fill-rule="evenodd"/>
            </svg>
        </button>
        <button class="rc-btn green" id="btn-pause" style="display:none;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="32" height="32">
                <path clip-rule="evenodd" d="M21.6 12a9.6 9.6 0 1 1-19.2 0 9.6 9.6 0 0 1 19.2 0ZM8.4 9.6a1.2 1.2 0 1 1 2.4 0v4.8a1.2 1.2 0 1 1-2.4 0V9.6Zm6-1.2a1.2 1.2 0 0 0-1.2 1.2v4.8a1.2 1.2 0 1 0 2.4 0V9.6a1.2 1.2 0 0 0-1.2-1.2Z" fill-rule="evenodd"/>
            </svg>
        </button>

        <button class="rc-btn flex-grow-1 justify-content-end">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" width="16" height="16">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.343 7.778a4.5 4.5 0 0 1 7.339-1.46L12 7.636l1.318-1.318a4.5 4.5 0 1 1 6.364 6.364L12 20.364l-7.682-7.682a4.501 4.501 0 0 1-.975-4.904Z"/>
            </svg>
        </button>
    </div>
</div>

<script>
    window.addEventListener('scroll', () => {
        document.querySelector('.navbar')?.classList.toggle('navbar-scrolled', window.scrollY > 50);
    });

    const audio    = document.getElementById('radio-audio');
    const btnPlay  = document.getElementById('btn-play');
    const btnPause = document.getElementById('btn-pause');
    const bars     = document.querySelectorAll('.rc-bar-line');
    const STREAM   = "https://spazia.fr/radio-proxy";
    let rcElapsed = 0, rcDuration = 1, rcTicker = null;

    function fmt(s) {
        s = Math.max(0, Math.floor(s));
        return Math.floor(s / 60) + ':' + String(s % 60).padStart(2, '0');
    }

    function updateProgress() {
        const pct = Math.min(100, (rcElapsed / rcDuration) * 100);
        document.getElementById('rc-fill').style.width  = pct + '%';
        document.getElementById('rc-now').textContent   = fmt(rcElapsed);
        document.getElementById('rc-total').textContent = fmt(rcDuration);
    }

    function startTicker() {
        clearInterval(rcTicker);
        rcTicker = setInterval(() => {
            rcElapsed = Math.min(rcElapsed + 1, rcDuration);
            updateProgress();
        }, 1000);
    }

    function setPlaying(playing) {
        btnPlay.style.display  = playing ? 'none' : 'flex';
        btnPause.style.display = playing ? 'flex' : 'none';
        bars.forEach(b => b.classList.toggle('paused', !playing));
        // le ticker tourne toujours — la radio continue même si l'audio est coupé côté client
    }

    btnPlay.addEventListener('click', () => {
        audio.src = STREAM;
        audio.volume = document.getElementById('vol-slider').value / 100;
        audio.play()
            .then(() => setPlaying(true))
            .catch(e => console.error('Lecture impossible :', e));
    });
    btnPause.addEventListener('click', () => {
        audio.pause(); audio.src = '';
        setPlaying(false);
    });

    async function fetchNowPlaying() {
        try {
            const data = await fetch('{{ route("nowplaying.local") }}').then(r => r.json());
            const np   = data.now_playing;
            const song = np?.song;

            document.getElementById('radio-artist').textContent = song?.title || song?.artist || 'SpaziaRadio';

            rcElapsed  = np?.elapsed  || 0;
            rcDuration = np?.duration || 1;
            updateProgress();
            startTicker();

            const pfp  = document.getElementById('rc-pfp');
            const bars = `<div class="rc-bars"><div class="rc-bar-line"></div><div class="rc-bar-line"></div><div class="rc-bar-line"></div><div class="rc-bar-line"></div><div class="rc-bar-line"></div></div>`;
            // Vraie pochette = URL avec hash-timestamp (ex: d274b1c6-1751886962.jpg)
            const hasRealArt = song?.art && /\/art\/[a-f0-9]+-\d+\.(jpg|png|webp)/i.test(song.art);
            if (hasRealArt) {
                const img   = new Image();
                img.onload  = () => { pfp.innerHTML = `<img src="${song.art}" alt="cover">`; };
                img.onerror = () => { pfp.innerHTML = bars; };
                img.src = song.art;
            } else {
                pfp.innerHTML = bars;
            }

            const remaining = Math.max(10, rcDuration - rcElapsed);
            setTimeout(fetchNowPlaying, remaining * 1000);
        } catch(e) {
            setTimeout(fetchNowPlaying, 30000);
        }
    }
    fetchNowPlaying();

    const volSlider = document.getElementById('vol-slider');
    let lastVol = 0.2;

    function setVolColor(val) {
        volSlider.style.background = `linear-gradient(to right,#1db954 ${val}%,#3a3a3a ${val}%)`;
    }
    volSlider.addEventListener('input', () => {
        const v = volSlider.value / 100;
        audio.volume = v;
        if (v > 0) lastVol = v;
        setVolColor(volSlider.value);
        updateVolIcon(v);
    });
    setVolColor(20);

    document.getElementById('btn-mute').addEventListener('click', () => {
        if (audio.volume > 0) {
            lastVol = audio.volume;
            audio.volume = 0; volSlider.value = 0;
        } else {
            audio.volume = lastVol; volSlider.value = Math.round(lastVol * 100);
        }
        setVolColor(volSlider.value);
        updateVolIcon(audio.volume);
    });

    function updateVolIcon(v) {
        document.getElementById('icon-vol').innerHTML = v === 0
            ? `<path clip-rule="evenodd" d="M13.5 4.06c0-1.336-1.616-2.005-2.56-1.06l-4.5 4.5H4.508c-1.141 0-2.318.664-2.66 1.905A9.76 9.76 0 0 0 1.5 12c0 .898.121 1.768.35 2.595.341 1.241 1.518 1.905 2.659 1.905h1.93l4.5 4.5c.945.945 2.561.276 2.561-1.06V4.06ZM17.78 9.22a.75.75 0 1 0-1.06 1.06L18.44 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06l1.72-1.72 1.72 1.72a.75.75 0 1 0 1.06-1.06L20.56 12l1.72-1.72a.75.75 0 1 0-1.06-1.06l-1.72 1.72-1.72-1.72Z" fill-rule="evenodd"/>`
            : v < 0.5
            ? `<path clip-rule="evenodd" d="M11.26 3.691A1.2 1.2 0 0 1 12 4.8v14.4a1.199 1.199 0 0 1-2.048.848L5.503 15.6H2.4a1.2 1.2 0 0 1-1.2-1.2V9.6a1.2 1.2 0 0 1 1.2-1.2h3.103l4.449-4.448a1.2 1.2 0 0 1 1.308-.26Zm3.934 3.217a1.2 1.2 0 0 1 1.698 0A4.78 4.78 0 0 1 18.3 12a4.782 4.782 0 0 1-1.408 3.394 1.2 1.2 0 1 1-1.698-1.698A2.385 2.385 0 0 0 15.9 12a2.384 2.384 0 0 0-.706-1.694 1.2 1.2 0 0 1 0-1.698Z" fill-rule="evenodd"/>`
            : `<path clip-rule="evenodd" d="M11.26 3.691A1.2 1.2 0 0 1 12 4.8v14.4a1.199 1.199 0 0 1-2.048.848L5.503 15.6H2.4a1.2 1.2 0 0 1-1.2-1.2V9.6a1.2 1.2 0 0 1 1.2-1.2h3.103l4.449-4.448a1.2 1.2 0 0 1 1.308-.26Zm6.328-.176a1.2 1.2 0 0 1 1.697 0A11.967 11.967 0 0 1 22.8 12a11.966 11.966 0 0 1-3.515 8.485 1.2 1.2 0 0 1-1.697-1.697A9.563 9.563 0 0 0 20.4 12a9.565 9.565 0 0 0-2.812-6.788 1.2 1.2 0 0 1 0-1.697Zm-3.394 3.393a1.2 1.2 0 0 1 1.698 0A7.178 7.178 0 0 1 18 12a7.18 7.18 0 0 1-2.108 5.092 1.2 1.2 0 1 1-1.698-1.698A4.782 4.782 0 0 0 15.6 12a4.78 4.78 0 0 0-1.406-3.394 1.2 1.2 0 0 1 0-1.698Z" fill-rule="evenodd"/>`;
    }
</script>

@endsection
