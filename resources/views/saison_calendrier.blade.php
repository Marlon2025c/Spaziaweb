@extends('layouts.app')
@section('title', 'Spazia — Arrivées Saison 7.5')
@section('content')

<style>
    .nav-ul-a { color: white; }
    .navbar { background-color: #0e0e0e45; transition: background-color .3s; }
    .navbar-scrolled { background-color: #101015; }

    /* ══════════════════════════════════════════
       HERO
    ══════════════════════════════════════════ */
    .s75-hero {
        min-height: 100vh;
        background: #0a0a10;
        position: relative;
        display: flex; align-items: center; justify-content: center;
        overflow: hidden;
    }

    /* Fond — même dégradé radial que la home */
    .s75-hero-bg {
        position: absolute; inset: 0;
        background:
            radial-gradient(ellipse 80% 60% at 15% 40%, rgba(249,115,22,.20) 0%, transparent 55%),
            radial-gradient(ellipse 60% 50% at 80% 60%, rgba(34,197,94,.15)  0%, transparent 55%),
            radial-gradient(ellipse 100% 80% at 50% 100%, rgba(16,185,129,.10) 0%, transparent 50%),
            #0a0a10;
        animation: gradientShift 8s ease-in-out infinite alternate;
    }
    @keyframes gradientShift {
        0%   { filter: hue-rotate(0deg) brightness(1); }
        100% { filter: hue-rotate(20deg) brightness(1.1); }
    }

    /* Grille de points — même que la home */
    .s75-grid {
        position: absolute; inset: 0;
        background-image: radial-gradient(circle, rgba(255,255,255,.06) 1px, transparent 1px);
        background-size: 40px 40px;
        mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 40%, transparent 100%);
    }

    /* Orbes — mêmes couleurs que la home */
    .s75-orb {
        position: absolute; border-radius: 50%; filter: blur(60px); opacity: .35;
        animation: orbFloat linear infinite;
    }
    .s75-orb-1 { width:400px;height:400px; background:radial-gradient(circle,#f97316,transparent 70%); top:-10%;left:-5%;  animation-duration:20s; }
    .s75-orb-2 { width:300px;height:300px; background:radial-gradient(circle,#22c55e,transparent 70%); bottom:0;right:5%;    animation-duration:25s; animation-delay:-10s; }
    .s75-orb-3 { width:200px;height:200px; background:radial-gradient(circle,#ea580c,transparent 70%); top:40%;left:55%;    animation-duration:18s; animation-delay:-5s; }
    @keyframes orbFloat {
        0%,100% { transform: translateY(0) scale(1); }
        33%      { transform: translateY(-30px) scale(1.05); }
        66%      { transform: translateY(20px) scale(.95); }
    }

    /* Contenu hero */
    .s75-hero-content { position:relative; z-index:2; text-align:center; padding: 2rem; max-width: 780px; }

    .s75-eyebrow {
        display: inline-flex; align-items: center; gap: .5rem;
        background: rgba(249,115,22,.12);
        border: 1px solid rgba(249,115,22,.35);
        color: #fb923c; font-size: .72rem; font-weight: 700;
        letter-spacing: .15em; text-transform: uppercase;
        padding: .4rem 1.1rem; border-radius: 999px; margin-bottom: 1.75rem;
    }
    .s75-eyebrow-dot {
        width: 6px; height: 6px; border-radius: 50%; background: #f97316;
        animation: eyeDot 1.8s ease-in-out infinite;
    }
    @keyframes eyeDot { 0%,100%{opacity:1;} 50%{opacity:.2;} }

    .s75-title {
        font-size: clamp(3rem, 8vw, 6.5rem);
        font-weight: 900; line-height: .95;
        letter-spacing: -.04em; color: #fff;
        margin-bottom: 1.5rem;
    }
    .s75-title .line-accent {
        background: linear-gradient(135deg, #f97316 0%, #fb923c 40%, #22c55e 100%);
        -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
    }

    .s75-sub {
        font-size: 1.05rem; color: rgba(255,255,255,.5);
        line-height: 1.75; max-width: 480px; margin: 0 auto 2.5rem;
    }

    /* Stats hero */
    .s75-stats {
        display: inline-flex; gap: 2.5rem;
        background: rgba(255,255,255,.04);
        border: 1px solid rgba(255,255,255,.08);
        border-radius: 16px; padding: 1.1rem 2.5rem;
        margin-bottom: 2.5rem;
    }
    .s75-stat-item { text-align: center; }
    .s75-stat-val { font-size: 1.6rem; font-weight: 900; color: #fff; line-height:1; }
    .s75-stat-val span { color: #fb923c; }
    .s75-stat-lbl { font-size: .65rem; font-weight: 700; letter-spacing: .12em;
        text-transform: uppercase; color: rgba(255,255,255,.35); margin-top: .25rem; }

    /* Scroll hint */
    .s75-scroll {
        position: absolute; bottom: 2rem; left: 50%; transform: translateX(-50%);
        display: flex; flex-direction: column; align-items: center; gap: .4rem;
        color: rgba(255,255,255,.25); font-size: .65rem; letter-spacing: .12em;
        text-transform: uppercase; z-index: 2; animation: scrollBounce 2.5s ease-in-out infinite;
    }
    @keyframes scrollBounce { 0%,100%{transform:translateX(-50%) translateY(0)} 50%{transform:translateX(-50%) translateY(8px)} }

    /* ══════════════════════════════════════════
       SECTION GRILLE
    ══════════════════════════════════════════ */
    .s75-section {
        background: #0d0d14; padding: 6rem 0 7rem; position: relative;
    }
    .s75-section::before {
        content: '';
        position: absolute; top: 0; left: 0; right: 0; height: 1px;
        background: linear-gradient(90deg, transparent, rgba(249,115,22,.4), rgba(168,85,247,.4), transparent);
    }

    .s75-label { font-size: .75rem; letter-spacing: .18em; color: #fb923c; font-weight: 700; }
    .s75-heading {
        font-size: clamp(1.6rem, 4vw, 2.5rem); font-weight: 900;
        color: #fff; letter-spacing: -.02em;
    }
    .s75-heading em { font-style: normal; color: rgba(255,255,255,.3); font-weight: 400; }

    /* ── Grille portfolio ── */
    .reveal-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }
    @media (max-width: 991px) { .reveal-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 575px)  { .reveal-grid { grid-template-columns: 1fr; } }

    /* ── Carte ── */
    .rv-card {
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        transition: transform .35s cubic-bezier(.34,1.2,.64,1), box-shadow .35s;
    }

    /* Disponible */
    .rv-card.available {
        cursor: pointer;
        background: linear-gradient(145deg, rgba(249,115,22,.08), rgba(168,85,247,.06));
        border: 1px solid rgba(249,115,22,.25);
        animation: cardPulse 3s ease-in-out infinite;
        min-height: 280px;
        display: flex; flex-direction: column; align-items: center; justify-content: center;
    }
    .rv-card.available:hover {
        transform: translateY(-6px) scale(1.01);
        box-shadow: 0 30px 70px rgba(249,115,22,.2), 0 0 0 1px rgba(249,115,22,.4);
        animation: none;
    }
    @keyframes cardPulse {
        0%,100% { box-shadow: 0 0 20px rgba(249,115,22,.1); border-color: rgba(249,115,22,.25); }
        50%      { box-shadow: 0 0 40px rgba(249,115,22,.25); border-color: rgba(249,115,22,.5); }
    }

    /* Ouvert */
    .rv-card.opened {
        background: rgba(255,255,255,.03);
        border: 1px solid rgba(255,255,255,.09);
    }
    .rv-card.opened:hover {
        transform: translateY(-5px);
        box-shadow: 0 24px 55px rgba(0,0,0,.5);
        border-color: rgba(34,197,94,.3);
    }

    /* Verrouillé */
    .rv-card.locked {
        background: rgba(255,255,255,.02);
        border: 1px solid rgba(255,255,255,.05);
        min-height: 200px;
        display: flex; flex-direction: column; align-items: center; justify-content: center;
        opacity: .5;
    }

    /* ── Zone mystère ── */
    .rv-mystery {
        display: flex; flex-direction: column; align-items: center;
        text-align: center; padding: 2.5rem 1.75rem; gap: 1rem; width: 100%;
    }
    .rv-mystery-num {
        font-size: .68rem; font-weight: 800; letter-spacing: .14em;
        text-transform: uppercase; color: rgba(255,255,255,.3);
    }
    .rv-mystery-icon {
        width: 72px; height: 72px; border-radius: 18px;
        background: rgba(249,115,22,.1);
        border: 1px solid rgba(249,115,22,.25);
        display: flex; align-items: center; justify-content: center;
        animation: iconHover 3s ease-in-out infinite;
        position: relative;
    }
    .rv-mystery-icon::after {
        content: ''; position: absolute; inset: -6px;
        border-radius: 22px;
        border: 1px solid rgba(249,115,22,.15);
        animation: iconRing 3s ease-in-out infinite;
    }
    @keyframes iconHover { 0%,100%{transform:translateY(0) scale(1)} 50%{transform:translateY(-5px) scale(1.05)} }
    @keyframes iconRing  { 0%,100%{transform:scale(1);opacity:.6} 50%{transform:scale(1.1);opacity:0} }

    .rv-mystery-title {
        font-size: 1rem; font-weight: 800; color: rgba(255,255,255,.8);
        line-height: 1.3;
    }
    .rv-mystery-hint {
        font-size: .78rem; color: rgba(255,255,255,.3); line-height: 1.6;
    }
    .rv-btn {
        display: inline-flex; align-items: center; gap: .45rem;
        background: linear-gradient(135deg, #f97316, #ea580c);
        color: #fff; border: none; border-radius: 12px;
        padding: .65rem 1.5rem; font-size: .85rem; font-weight: 800;
        cursor: pointer; letter-spacing: .03em;
        transition: transform .2s, box-shadow .2s;
        box-shadow: 0 4px 20px rgba(249,115,22,.4);
        margin-top: .25rem;
    }
    .rv-btn:hover { transform: scale(1.05); box-shadow: 0 6px 30px rgba(249,115,22,.6); }

    /* ── Contenu ouvert ── */
    .rv-content { display: none; }
    .rv-content.show { display: block; }

    .rv-img-wrap { position: relative; aspect-ratio: 16/9; overflow: hidden; cursor: zoom-in; }
    .rv-img-wrap img { width:100%; height:100%; object-fit:cover; display:block; transition: transform .4s ease; }
    .rv-img-wrap:hover img { transform: scale(1.04); }
    .rv-img-overlay {
        position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(8,8,15,.9) 0%, transparent 50%);
        transition: opacity .3s;
    }
    .rv-img-wrap:hover .rv-img-overlay { opacity: .6; }

    /* ── Lightbox ── */
    .lb-backdrop {
        position: fixed; inset: 0; z-index: 10000;
        background: rgba(0,0,0,.92);
        display: flex; align-items: center; justify-content: center;
        padding: 1.5rem;
        opacity: 0; animation: lbIn .25s ease forwards;
        backdrop-filter: blur(6px);
    }
    @keyframes lbIn { to { opacity: 1; } }
    .lb-inner {
        max-width: 900px; width: 100%;
        background: #0f0f18;
        border: 1px solid rgba(255,255,255,.1);
        border-radius: 20px; overflow: hidden;
        transform: scale(.93); animation: lbScale .28s cubic-bezier(.34,1.4,.64,1) forwards;
    }
    @keyframes lbScale { to { transform: scale(1); } }
    .lb-img { width: 100%; display: block; max-height: 60vh; object-fit: contain; background: #000; }
    .lb-info { padding: 1.25rem 1.6rem 1.5rem; }
    .lb-week  { font-size: .68rem; font-weight: 800; letter-spacing: .14em; text-transform: uppercase; color: #4ade80; margin-bottom: .4rem; }
    .lb-title { font-size: 1.1rem; font-weight: 800; color: #fff; margin-bottom: .4rem; }
    .lb-desc  { font-size: .85rem; color: rgba(255,255,255,.45); line-height: 1.65; }
    .lb-text  { font-size: .88rem; color: rgba(255,255,255,.6); line-height: 1.8; white-space: pre-wrap; margin-top: .75rem; }
    .lb-close {
        position: absolute; top: 1rem; right: 1rem;
        background: rgba(255,255,255,.1); border: none; border-radius: 50%;
        width: 36px; height: 36px; cursor: pointer; color: #fff;
        display: flex; align-items: center; justify-content: center;
        transition: background .2s; z-index: 10001;
    }
    .lb-close:hover { background: rgba(255,255,255,.2); }
    .rv-video-wrap { aspect-ratio: 16/9; }
    .rv-video-wrap iframe { width:100%; height:100%; border:none; display:block; }

    .rv-body { padding: 1.4rem 1.6rem 1.75rem; }
    .rv-week-num {
        font-size: .68rem; font-weight: 800; letter-spacing: .14em;
        text-transform: uppercase; color: #4ade80; margin-bottom: .5rem;
    }
    .rv-title { font-size: 1.1rem; font-weight: 800; color: #fff; margin-bottom: .5rem; }
    .rv-desc  { font-size: .83rem; color: rgba(255,255,255,.4); line-height: 1.65; margin-bottom: 1rem; }
    /* Texte tronqué dans la carte */
    .rv-text {
        font-size: .88rem; color: rgba(255,255,255,.6); line-height: 1.8; white-space: pre-wrap;
        display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;
    }
    .rv-text.full { display: block; -webkit-line-clamp: unset; }

    /* Bouton Voir plus */
    .rv-voir-plus {
        display: inline-flex; align-items: center; gap: .4rem; margin-top: .75rem;
        background: none; border: 1px solid rgba(255,255,255,.12);
        color: rgba(255,255,255,.5); border-radius: 8px;
        padding: .4rem .9rem; font-size: .78rem; font-weight: 700;
        cursor: pointer; transition: border-color .2s, color .2s;
    }
    .rv-voir-plus:hover { border-color: rgba(249,115,22,.4); color: #fb923c; }

    /* ── Modal Voir plus ── */
    .vm-backdrop {
        position: fixed; inset: 0; z-index: 10000;
        background: rgba(0,0,0,.88);
        display: flex; align-items: center; justify-content: center;
        padding: 1.5rem; backdrop-filter: blur(8px);
        opacity: 0; animation: vmIn .2s ease forwards;
    }
    @keyframes vmIn { to { opacity: 1; } }
    .vm-card {
        max-width: 680px; width: 100%; max-height: 90vh; overflow-y: auto;
        background: #12121e;
        border: 1px solid rgba(255,255,255,.1);
        border-radius: 22px; overflow: hidden;
        transform: scale(.93) translateY(20px);
        animation: vmScale .3s cubic-bezier(.34,1.4,.64,1) forwards;
        scrollbar-width: none;
    }
    .vm-card::-webkit-scrollbar { display: none; }
    @keyframes vmScale { to { transform: scale(1) translateY(0); } }
    .vm-media { width: 100%; display: block; max-height: 380px; object-fit: cover; }
    .vm-video-wrap { aspect-ratio: 16/9; }
    .vm-video-wrap iframe { width: 100%; height: 100%; border: none; display: block; }
    .vm-body { padding: 1.75rem 2rem 2rem; }
    .vm-week { font-size: .68rem; font-weight: 800; letter-spacing: .14em; text-transform: uppercase; color: #4ade80; margin-bottom: .5rem; }
    .vm-title { font-size: 1.35rem; font-weight: 900; color: #fff; margin-bottom: .5rem; line-height: 1.25; }
    .vm-desc  { font-size: .85rem; color: rgba(255,255,255,.4); line-height: 1.7; margin-bottom: 1.1rem; }
    .vm-text  { font-size: .9rem; color: rgba(255,255,255,.65); line-height: 1.85; white-space: pre-wrap; }
    .vm-link  {
        display: inline-flex; align-items: center; gap: .4rem;
        background: rgba(249,115,22,.1); border: 1px solid rgba(249,115,22,.3);
        color: #fb923c; padding: .65rem 1.3rem; border-radius: 10px;
        text-decoration: none; font-size: .9rem; font-weight: 700;
        transition: background .2s, gap .2s; margin-top: .5rem;
    }
    .vm-link:hover { background: rgba(249,115,22,.2); gap: .65rem; color: #f97316; }
    .vm-close {
        position: absolute; top: 1rem; right: 1rem;
        background: rgba(255,255,255,.08); border: none; border-radius: 50%;
        width: 38px; height: 38px; cursor: pointer; color: #fff;
        display: flex; align-items: center; justify-content: center;
        transition: background .2s; z-index: 10001;
    }
    .vm-close:hover { background: rgba(255,255,255,.18); }
    .vm-sep { height: 1px; background: rgba(255,255,255,.07); margin: 1.1rem 0; }

    .rv-link {
        display: inline-flex; align-items: center; gap: .4rem;
        background: rgba(249,115,22,.1); border: 1px solid rgba(249,115,22,.3);
        color: #fb923c; padding: .6rem 1.2rem; border-radius: 10px;
        text-decoration: none; font-size: .85rem; font-weight: 700;
        transition: background .2s, gap .2s;
    }
    .rv-link:hover { background: rgba(249,115,22,.2); gap: .65rem; color: #f97316; }

    /* ── Verrouillé body ── */
    .rv-locked-body {
        display: flex; flex-direction: column; align-items: center;
        gap: .6rem; padding: 2rem; text-align: center;
    }
    .rv-locked-num { font-size: .65rem; font-weight: 800; letter-spacing: .14em; text-transform: uppercase; color: rgba(255,255,255,.2); }
    .rv-locked-date { font-size: .8rem; color: rgba(255,255,255,.25); }
    .rv-countdown   { font-size: .75rem; font-weight: 700; color: rgba(249,115,22,.45); font-variant-numeric: tabular-nums; }

    /* ── Animation ouverture ── */
    @keyframes revealIn {
        0%   { opacity:0; transform:scale(.9) translateY(16px); }
        65%  { transform:scale(1.015) translateY(-2px); }
        100% { opacity:1; transform:scale(1) translateY(0); }
    }
    .rv-content.show { animation: revealIn .55s cubic-bezier(.34,1.4,.64,1) forwards; }

    /* ── Confettis ── */
    @keyframes cfly { 0%{transform:translateY(0) rotate(0) scale(1);opacity:1} 100%{transform:translateY(-80px) rotate(720deg) scale(0);opacity:0} }
    .c-burst { position:fixed; pointer-events:none; z-index:9999; }
    .c-burst span {
        position:absolute; width:7px; height:7px; border-radius:2px;
        animation: cfly .8s ease-out forwards;
    }

    /* ── Empty ── */
    .s75-empty { text-align:center; padding:5rem 1rem; color:rgba(255,255,255,.25); }
</style>

{{-- ════════════════════ HERO ════════════════════ --}}
<section class="s75-hero">
    <div class="s75-hero-bg"></div>
    <div class="s75-grid"></div>
    <div class="s75-orb s75-orb-1"></div>
    <div class="s75-orb s75-orb-2"></div>
    <div class="s75-orb s75-orb-3"></div>

    <div class="s75-hero-content">
        <div class="s75-eyebrow">
            <span class="s75-eyebrow-dot"></span>
            SpaziaEco — Saison 7.5
        </div>

        <h1 class="s75-title">
            Ce qui<br>
            <span class="line-accent">arrive</span>
        </h1>

        <p class="s75-sub">
            Les grandes nouveautés de la saison 7.5 se dévoilent semaine après semaine.
            Cliquez sur chaque carte pour révéler la surprise.
        </p>

        @php
            $total    = $semaines->count();
            $reveles  = $semaines->filter(fn($s) => $s->isRevele())->count();
            $restants = $total - $reveles;
        @endphp

        <div class="s75-stats">
            <div class="s75-stat-item">
                <div class="s75-stat-val">{{ $total }}</div>
                <div class="s75-stat-lbl">Révélations</div>
            </div>
            <div class="s75-stat-item" style="border-left:1px solid rgba(255,255,255,.08); padding-left:2.5rem;">
                <div class="s75-stat-val"><span>{{ $reveles }}</span></div>
                <div class="s75-stat-lbl">Disponibles</div>
            </div>
            <div class="s75-stat-item" style="border-left:1px solid rgba(255,255,255,.08); padding-left:2.5rem;">
                <div class="s75-stat-val">{{ $restants }}</div>
                <div class="s75-stat-lbl">À venir</div>
            </div>
        </div>

        <a href="#revelations" class="s75-btn-discover text-decoration-none d-inline-flex align-items-center gap-2"
           style="background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.12);color:rgba(255,255,255,.7);padding:.8rem 1.8rem;border-radius:12px;font-weight:700;font-size:.9rem;transition:background .2s;">
            Voir les révélations
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7"/>
            </svg>
        </a>
    </div>

    <div class="s75-scroll">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7"/>
        </svg>
        <span>Scroll</span>
    </div>
</section>

{{-- ════════════════════ GRILLE ════════════════════ --}}
<section class="s75-section" id="revelations">
    <div class="container">
        <div class="text-center mb-5">
            <p class="s75-label text-uppercase mb-2">Dévoilements</p>
            <h2 class="s75-heading">
                Les révélations <em>· Saison 7.5</em>
            </h2>
        </div>

        @if($semaines->isEmpty())
            <div class="s75-empty">
                <p class="fw-semibold" style="font-size:1.1rem;">Les révélations arrivent bientôt...</p>
            </div>
        @else
            <div class="reveal-grid">
                @foreach($semaines as $s)
                    @php $revele = $s->isRevele(); @endphp

                    <div class="rv-card {{ $revele ? 'available' : 'locked' }}"
                         id="card-{{ $s->id }}"
                         @if($revele) onclick="openWeek({{ $s->id }}, event)" @endif>

                        @if($revele)
                            {{-- ── Mystère ── --}}
                            <div class="rv-mystery" id="mystery-{{ $s->id }}">
                                <span class="rv-mystery-num">Semaine {{ $s->numero_semaine }}</span>
                                <div class="rv-mystery-icon">
                                    @if($s->type_contenu === 'photo')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="#fb923c" stroke-width="1.7">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"/>
                                        </svg>
                                    @elseif($s->type_contenu === 'video')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="#fb923c" stroke-width="1.7">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z"/>
                                        </svg>
                                    @elseif($s->type_contenu === 'lien')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="#fb923c" stroke-width="1.7">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="#fb923c" stroke-width="1.7">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z"/>
                                        </svg>
                                    @endif
                                </div>
                                <p class="rv-mystery-title">{{ $s->titre }}</p>
                                <p class="rv-mystery-hint">
                                    @if($s->type_contenu === 'photo') Une image vous attend...
                                    @elseif($s->type_contenu === 'video') Une vidéo vous attend...
                                    @elseif($s->type_contenu === 'lien') Un lien à découvrir...
                                    @else Une annonce vous attend...
                                    @endif
                                </p>
                                <button class="rv-btn" onclick="event.stopPropagation(); openWeek({{ $s->id }}, event)">
                                    Révéler
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                                    </svg>
                                </button>
                            </div>

                            {{-- ── Contenu ── --}}
                            @php
                                // Préparer les données pour le modal "Voir plus"
                                $imgSrc   = null;
                                $videoUrl = null;
                                if ($s->type_contenu === 'photo' && ($s->contenu_image || $s->contenu_url)) {
                                    $imgSrc = $s->contenu_image
                                        ? asset('storage/' . $s->contenu_image)
                                        : (str_starts_with($s->contenu_url, 'http') ? $s->contenu_url : asset($s->contenu_url));
                                }
                                if ($s->type_contenu === 'video' && $s->contenu_url) {
                                    $videoUrl = $s->contenu_url;
                                    if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&\s]+)/', $videoUrl, $m)) {
                                        $videoUrl = 'https://www.youtube.com/embed/' . $m[1];
                                    }
                                }
                                $vmData = json_encode([
                                    'week'     => 'Semaine ' . $s->numero_semaine . ' · ' . $s->date_revelation->translatedFormat('d F Y'),
                                    'titre'    => $s->titre,
                                    'desc'     => $s->description,
                                    'texte'    => $s->contenu_texte,
                                    'type'     => $s->type_contenu,
                                    'img'      => $imgSrc,
                                    'video'    => $videoUrl,
                                    'lienUrl'  => $s->contenu_url,
                                    'lienLabel'=> $s->contenu_texte ?: 'Voir le contenu',
                                ]);
                            @endphp

                            <div class="rv-content" id="content-{{ $s->id }}">

                                @if($imgSrc)
                                    <div class="rv-img-wrap" onclick="event.stopPropagation(); openVoirPlus(this.closest('.rv-content'))">
                                        <img src="{{ $imgSrc }}" alt="{{ $s->titre }}" loading="lazy">
                                        <div class="rv-img-overlay"></div>
                                    </div>
                                @elseif($videoUrl)
                                    <div class="rv-video-wrap">
                                        <iframe src="{{ $videoUrl }}" title="{{ $s->titre }}"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen loading="lazy"></iframe>
                                    </div>
                                @endif

                                <div class="rv-body" data-vm='{{ $vmData }}'>
                                    <p class="rv-week-num">Semaine {{ $s->numero_semaine }} · {{ $s->date_revelation->translatedFormat('d F Y') }}</p>
                                    <p class="rv-title">{{ $s->titre }}</p>

                                    @if($s->description)
                                        <p class="rv-desc">{{ $s->description }}</p>
                                    @endif

                                    @if(in_array($s->type_contenu, ['texte','photo','video']) && $s->contenu_texte)
                                        <p class="rv-text">{{ $s->contenu_texte }}</p>
                                        <button class="rv-voir-plus" onclick="event.stopPropagation(); openVoirPlus(this.closest('.rv-content'))">
                                            Voir plus
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                                            </svg>
                                        </button>
                                    @elseif($s->type_contenu === 'lien' && $s->contenu_url)
                                        <a href="{{ $s->contenu_url }}" target="_blank" rel="noopener" class="rv-link">
                                            {{ $s->contenu_texte ?: 'Voir le contenu' }}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                                            </svg>
                                        </a>
                                    @elseif($imgSrc || $videoUrl)
                                        <button class="rv-voir-plus" onclick="event.stopPropagation(); openVoirPlus(this.closest('.rv-content'))">
                                            Voir plus
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </div>

                        @else
                            {{-- ── Verrouillé ── --}}
                            <div class="rv-locked-body">
                                <span class="rv-locked-num">Semaine {{ $s->numero_semaine }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="rgba(255,255,255,.2)" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/>
                                </svg>
                                <span class="rv-locked-date">{{ $s->date_revelation->translatedFormat('d F Y') }}</span>
                                <span class="rv-countdown" data-target="{{ $s->date_revelation->format('Y-m-d') }}T00:00:00">Calcul...</span>
                            </div>
                        @endif

                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<script>
    window.addEventListener('scroll', () => {
        document.querySelector('.navbar')?.classList.toggle('navbar-scrolled', window.scrollY > 50);
    });

    // ── Modal Voir plus ───────────────────────────────────────────────────
    function openVoirPlus(contentEl) {
        const body = contentEl.querySelector('[data-vm]');
        if (!body) return;
        const d = JSON.parse(body.dataset.vm);

        let mediaHtml = '';
        if (d.img) {
            mediaHtml = `<img class="vm-media" src="${d.img}" alt="${d.titre}">`;
        } else if (d.video) {
            mediaHtml = `<div class="vm-video-wrap"><iframe src="${d.video}" title="${d.titre}"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe></div>`;
        }

        let contentHtml = '';
        if (d.type === 'lien' && d.lienUrl) {
            contentHtml = `<a href="${d.lienUrl}" target="_blank" rel="noopener" class="vm-link">
                ${d.lienLabel}
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                </svg></a>`;
        } else if (d.texte) {
            contentHtml = `<p class="vm-text">${d.texte.replace(/\n/g, '<br>')}</p>`;
        }

        const vm = document.createElement('div');
        vm.className = 'vm-backdrop';
        vm.innerHTML = `
            <button class="vm-close" onclick="this.closest('.vm-backdrop').remove()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                </svg>
            </button>
            <div class="vm-card">
                ${mediaHtml}
                <div class="vm-body">
                    <p class="vm-week">${d.week}</p>
                    <p class="vm-title">${d.titre}</p>
                    ${d.desc ? `<div class="vm-sep"></div><p class="vm-desc">${d.desc}</p>` : ''}
                    ${contentHtml}
                </div>
            </div>`;
        vm.addEventListener('click', e => { if (e.target === vm) vm.remove(); });
        document.addEventListener('keydown', function esc(e) {
            if (e.key === 'Escape') { vm.remove(); document.removeEventListener('keydown', esc); }
        });
        document.body.appendChild(vm);
    }

    // ── Lightbox ──────────────────────────────────────────────────────────
    function openLightbox(src, week, title, desc, text) {
        const lb = document.createElement('div');
        lb.className = 'lb-backdrop';
        lb.innerHTML = `
            <button class="lb-close" onclick="this.closest('.lb-backdrop').remove()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                </svg>
            </button>
            <div class="lb-inner">
                <img class="lb-img" src="${src}" alt="${title}">
                <div class="lb-info">
                    <p class="lb-week">${week}</p>
                    <p class="lb-title">${title}</p>
                    ${desc  ? `<p class="lb-desc">${desc}</p>` : ''}
                    ${text  ? `<p class="lb-text">${text}</p>` : ''}
                </div>
            </div>`;
        lb.addEventListener('click', e => { if (e.target === lb) lb.remove(); });
        document.addEventListener('keydown', function esc(e) { if (e.key === 'Escape') { lb.remove(); document.removeEventListener('keydown', esc); } });
        document.body.appendChild(lb);
    }

    const STORAGE_KEY = 'spazia_cal_75_v4_opened';
    function getOpened() { try { return JSON.parse(localStorage.getItem(STORAGE_KEY)) || []; } catch { return []; } }
    function saveOpened(list) { localStorage.setItem(STORAGE_KEY, JSON.stringify(list)); }

    const COLORS = ['#f97316','#fb923c','#22c55e','#4ade80','#facc15','#a78bfa','#f472b6','#38bdf8'];

    function burst(x, y) {
        const wrap = document.createElement('div');
        wrap.className = 'c-burst';
        wrap.style.cssText = `left:${x}px;top:${y}px;`;
        for (let i = 0; i < 18; i++) {
            const s   = document.createElement('span');
            const ang = (i / 18) * 360;
            const r   = 35 + Math.random() * 55;
            s.style.cssText = `
                background:${COLORS[i % COLORS.length]};
                left:${Math.cos(ang * Math.PI/180) * r}px;
                top:${Math.sin(ang * Math.PI/180) * r}px;
                animation-delay:${(Math.random() * .2).toFixed(2)}s;
                width:${5 + Math.random()*5}px;
                height:${5 + Math.random()*5}px;
            `;
            wrap.appendChild(s);
        }
        document.body.appendChild(wrap);
        setTimeout(() => wrap.remove(), 1000);
    }

    function openWeek(id, evt) {
        const card    = document.getElementById('card-' + id);
        const mystery = document.getElementById('mystery-' + id);
        const content = document.getElementById('content-' + id);
        if (!mystery || mystery.style.display === 'none') return;

        // Sauvegarder
        const opened = getOpened();
        if (!opened.includes(id)) { opened.push(id); saveOpened(opened); }

        // Changer l'état visuel
        card.classList.remove('available');
        card.classList.add('opened');
        card.onclick = null;
        card.style.minHeight = '';

        // Masquer mystère, révéler contenu
        mystery.style.display = 'none';
        content.classList.add('show');

        // Confettis au centre du clic
        const rect = card.getBoundingClientRect();
        burst(rect.left + rect.width / 2, rect.top + window.scrollY + rect.height / 2);
    }

    // Restaurer l'état au chargement (sans animation)
    getOpened().forEach(id => {
        const card    = document.getElementById('card-' + id);
        const mystery = document.getElementById('mystery-' + id);
        const content = document.getElementById('content-' + id);
        if (!mystery || !content) return;
        mystery.style.display = 'none';
        content.style.display = 'block'; // pas d'animation au chargement
        if (card) { card.classList.remove('available'); card.classList.add('opened'); card.onclick = null; card.style.minHeight = ''; }
    });

    // Comptes à rebours
    function updateCountdowns() {
        document.querySelectorAll('.rv-countdown[data-target]').forEach(el => {
            const diff = new Date(el.dataset.target) - Date.now();
            if (diff <= 0) { el.textContent = 'Bientôt !'; return; }
            const j = Math.floor(diff / 86400000);
            const h = Math.floor((diff % 86400000) / 3600000);
            const m = Math.floor((diff % 3600000) / 60000);
            const s = Math.floor((diff % 60000) / 1000);
            const ss = String(s).padStart(2, '0');
            el.textContent = j > 0
                ? `Dans ${j}j ${h}h ${m}m ${ss}s`
                : `Dans ${h}h ${m}m ${ss}s`;
        });
    }
    updateCountdowns();
    setInterval(updateCountdowns, 1000);
</script>

@endsection
