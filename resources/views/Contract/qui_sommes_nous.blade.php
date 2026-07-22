@extends('layouts.app')
@section('title', 'Spazia - Qui sommes-nous')
@section('content')

<style>
    /* ─── Reset & base ─────────────────────────────────── */
    .nav-ul-a { color: white; }
    .navbar { background-color: #0e0e0e45; transition: background-color .3s; }
    .navbar-scrolled { background-color: #101015; }

    /* ─── Hero ──────────────────────────────────────────── */
    .qs-hero { min-height: 60vh; background: #0a0a10; }
    .qs-hero-gradient {
        position: absolute; inset: 0;
        background:
            radial-gradient(ellipse 80% 60% at 15% 40%, rgba(249,115,22,.20) 0%, transparent 55%),
            radial-gradient(ellipse 60% 50% at 80% 60%, rgba(34,197,94,.15) 0%, transparent 55%),
            radial-gradient(ellipse 100% 80% at 50% 100%, rgba(16,185,129,.10) 0%, transparent 50%),
            #0a0a10;
        animation: qsGradientShift 8s ease-in-out infinite alternate;
    }
    @keyframes qsGradientShift {
        0%   { filter: hue-rotate(0deg) brightness(1); }
        100% { filter: hue-rotate(20deg) brightness(1.1); }
    }
    .qs-hero-grid {
        position: absolute; inset: 0;
        background-image: radial-gradient(circle, rgba(255,255,255,.06) 1px, transparent 1px);
        background-size: 40px 40px;
        mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 40%, transparent 100%);
    }
    .qs-orb { position: absolute; border-radius: 50%; filter: blur(60px); opacity: .35; animation: qsOrbFloat linear infinite; }
    .qs-orb-1 { width: 350px; height: 350px; background: radial-gradient(circle, #f97316, transparent 70%); top: -10%; left: -5%; animation-duration: 20s; }
    .qs-orb-2 { width: 260px; height: 260px; background: radial-gradient(circle, #22c55e, transparent 70%); bottom: -10%; right: 5%; animation-duration: 25s; animation-delay: -10s; }
    @keyframes qsOrbFloat {
        0%, 100% { transform: translateY(0) scale(1); }
        33%       { transform: translateY(-30px) scale(1.05); }
        66%       { transform: translateY(20px) scale(.95); }
    }
    .qs-hero-badge { background: rgba(249,115,22,.15); border: 1px solid rgba(249,115,22,.4); color: #fb923c; font-size: .8rem; letter-spacing: .12em; padding: .4rem 1.2rem; }
    .qs-hero-title { font-size: clamp(2.4rem, 6vw, 4.2rem); font-weight: 800; line-height: 1.15; letter-spacing: -.02em; }
    .qs-hero-title span { background: linear-gradient(135deg, #f97316 0%, #fb923c 40%, #22c55e 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
    .qs-hero-sub { font-size: 1.1rem; color: rgba(255,255,255,.6); max-width: 640px; line-height: 1.75; }

    /* ─── Intro ─────────────────────────────────────────── */
    .qs-intro-section { background: #0d0d14; padding: 5rem 0; }
    .qs-intro-text { color: rgba(255,255,255,.6); line-height: 1.85; font-size: 1.05rem; max-width: 780px; }

    /* ─── Cartes valeurs ────────────────────────────────── */
    .qs-values-section { background: #0a0a10; padding: 1rem 0 6rem; }
    .section-label { font-size: .8rem; letter-spacing: .15em; color: #fb923c; }
    .section-heading { font-size: 2.25rem; font-weight: 800; }

    .qs-card {
        background: rgba(255,255,255,.03);
        border: 1px solid rgba(255,255,255,.07);
        border-radius: 18px;
        padding: 2rem;
        height: 100%;
        transition: border-color .3s, background .3s, transform .3s, box-shadow .3s;
    }
    .qs-card:hover {
        border-color: rgba(249,115,22,.3);
        background: rgba(249,115,22,.04);
        transform: translateY(-4px);
        box-shadow: 0 20px 50px rgba(0,0,0,.4);
    }
    .qs-card.green:hover { border-color: rgba(34,197,94,.3); background: rgba(34,197,94,.04); }

    .qs-icon { width: 52px; height: 52px; background: rgba(249,115,22,.12); border-radius: 14px; color: #fb923c; flex-shrink: 0; }
    .qs-icon.green { background: rgba(34,197,94,.12); color: #4ade80; }
    .qs-icon svg { width: 26px; height: 26px; }

    .qs-card-title { color: #fff; font-weight: 800; font-size: 1.1rem; margin: 0 0 .6rem; }
    .qs-card-text { color: rgba(255,255,255,.5); font-size: .9rem; line-height: 1.7; margin: 0; }

    .qs-list { margin: .8rem 0 0; padding-left: 1.1rem; color: rgba(255,255,255,.5); font-size: .9rem; line-height: 1.9; }
    .qs-list li::marker { color: #fb923c; }

    /* ─── CTA ───────────────────────────────────────────── */
    .qs-cta-section { background: #0d0d14; padding: 5rem 0 6rem; }
    .qs-cta-box {
        background: linear-gradient(135deg, rgba(249,115,22,.12), rgba(34,197,94,.08));
        border: 1px solid rgba(249,115,22,.25);
        border-radius: 24px;
        padding: 3rem 2rem;
        text-align: center;
    }
    .qs-cta-title { font-size: 1.9rem; font-weight: 800; color: #fff; }
    .qs-cta-text { color: rgba(255,255,255,.6); max-width: 560px; margin: 0 auto; }
    .btn-hero-primary { background: linear-gradient(135deg, #f97316, #ea580c); padding: .85rem 2rem; border-radius: 12px; transition: transform .2s, box-shadow .2s; box-shadow: 0 0 30px rgba(249,115,22,.35); }
    .btn-hero-primary:hover { transform: translateY(-2px); box-shadow: 0 0 50px rgba(249,115,22,.55); color: #fff; }
    .btn-hero-secondary { background: rgba(255,255,255,.07); color: rgba(255,255,255,.85); padding: .85rem 2rem; border-radius: 12px; border: 1px solid rgba(255,255,255,.12); transition: background .2s, border-color .2s; }
    .btn-hero-secondary:hover { background: rgba(255,255,255,.12); border-color: rgba(255,255,255,.25); color: #fff; }
</style>

{{-- ══════════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════════ --}}
<section class="qs-hero position-relative d-flex align-items-center justify-content-center overflow-hidden">
    <div class="qs-hero-gradient"></div>
    <div class="qs-hero-grid"></div>
    <div class="qs-orb qs-orb-1"></div>
    <div class="qs-orb qs-orb-2"></div>

    <div class="position-relative text-center p-4" style="z-index:2">
        <div class="qs-hero-badge d-inline-block fw-semibold text-uppercase rounded-pill mb-4">
            Qui sommes-nous
        </div>
        <h1 class="qs-hero-title text-white mb-3">
            L'univers<br><span>SpaziaEco</span>
        </h1>
        <p class="qs-hero-sub mx-auto">
            Bienvenue dans l'univers de SpaziaEco, dédié à l'expérience du jeu Éco depuis maintenant un an.
            Notre communauté s'est construite autour d'un concept novateur : un système de notation rigoureux pour les villes.
        </p>
    </div>
</section>

{{-- ══════════════════════════════════════════════════════════
     INTRO
══════════════════════════════════════════════════════════ --}}
<section class="qs-intro-section">
    <div class="container">
        <p class="section-label fw-bold text-uppercase mb-2">Le concept</p>
        <h2 class="section-heading text-white mb-4">Un système de notation complet</h2>
        <p class="qs-intro-text">
            Chaque ville est évaluée selon des critères précis, reflétant la diversité et la richesse de son développement.
            Ce système encourage la compétition saine et stimule la créativité de nos joueurs.
        </p>
        <ul class="qs-list">
            <li>Activité économique</li>
            <li>Métiers</li>
            <li>Alliances et relations diplomatiques</li>
            <li>Respect de l'écosystème</li>
            <li>L'esthétique de la ville</li>
        </ul>
    </div>
</section>

{{-- ══════════════════════════════════════════════════════════
     VALEURS / PILIERS
══════════════════════════════════════════════════════════ --}}
<section class="qs-values-section">
    <div class="container">
        <p class="section-label fw-bold text-uppercase mb-2">Ce qui nous définit</p>
        <h2 class="section-heading text-white mb-5">Nos piliers</h2>

        <div class="row g-4">

            <div class="col-md-6 col-lg-4">
                <div class="qs-card">
                    <div class="qs-icon d-flex align-items-center justify-content-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25M21 7.5v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"/>
                        </svg>
                    </div>
                    <p class="qs-card-title">Des métiers immersifs</p>
                    <p class="qs-card-text">Pour renforcer l'aspect roleplay de notre serveur, nous avons intégré des bâtiments de métier. Chaque joueur doit construire le sien pour débloquer le métier correspondant, ajoutant une dimension stratégique et réaliste à l'expérience.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="qs-card green">
                    <div class="qs-icon green d-flex align-items-center justify-content-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a5.25 5.25 0 0 1 6.775-5.025.75.75 0 0 1 .313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.641l3.318-3.319a.75.75 0 0 1 1.248.313 5.25 5.25 0 0 1-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 1 1 2.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0 1 12 6.75Z"/>
                        </svg>
                    </div>
                    <p class="qs-card-title">Une histoire évolutive</p>
                    <p class="qs-card-text">SpaziaEco ne se contente pas d'offrir un gameplay classique. Nous avons développé un système d'histoire captivant, avec des événements réguliers et des quêtes à suivre, pour donner une identité unique à notre serveur.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="qs-card">
                    <div class="qs-icon d-flex align-items-center justify-content-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/>
                        </svg>
                    </div>
                    <p class="qs-card-title">Une expérience RP enrichie</p>
                    <p class="qs-card-text">Nous mettons en place un maximum de systèmes pour favoriser le roleplay. Le système de notation et les bâtiments de métiers ne sont que le début — nous ajoutons constamment de nouvelles fonctionnalités pour immerger nos joueurs dans un monde vivant.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="qs-card green">
                    <div class="qs-icon green d-flex align-items-center justify-content-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.048 8.287 8.287 0 0 0 9 9.6a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.467 5.99 5.99 0 0 0-1.925 3.546 3.75 3.75 0 0 0 1.43 3.921Z"/>
                        </svg>
                    </div>
                    <p class="qs-card-title">Des événements hebdomadaires</p>
                    <p class="qs-card-text">Chaque fin de semaine, notre équipe organise des événements variés pour rassembler la communauté et offrir des moments de divertissement uniques.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="qs-card">
                    <div class="qs-icon d-flex align-items-center justify-content-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z"/>
                        </svg>
                    </div>
                    <p class="qs-card-title">Un support réactif</p>
                    <p class="qs-card-text">Notre équipe de 8 staff est à votre disposition pour vous aider et répondre à vos questions. Nous nous engageons à traiter chaque ticket de support en moins de 24 heures.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="qs-card green">
                    <div class="qs-icon green d-flex align-items-center justify-content-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z"/>
                        </svg>
                    </div>
                    <p class="qs-card-title">Un journal hebdomadaire</p>
                    <p class="qs-card-text">Chaque semaine, notre équipe édite un journal qui relate les événements marquants, les plus belles réalisations et les dernières actualités de SpaziaEco. Restez informés et ne manquez rien de l'aventure !</p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════════════════════
     CTA
══════════════════════════════════════════════════════════ --}}
<section class="qs-cta-section">
    <div class="container">
        <div class="qs-cta-box">
            <h2 class="qs-cta-title mb-3">Prêt à rejoindre l'aventure ?</h2>
            <p class="qs-cta-text mb-4">Rejoins la communauté SpaziaEco, bâtis ta ville et fais grandir ton économie.</p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="https://discord.gg/yx3PUySCN8" target="_blank" rel="noopener" class="btn-hero-primary d-inline-flex align-items-center gap-2 text-white fw-bold text-decoration-none border-0">
                    Rejoindre le Discord
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                    </svg>
                </a>
                <a href="/actualites" class="btn-hero-secondary d-inline-flex align-items-center gap-2 fw-semibold text-decoration-none">
                    Voir les actualités
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
