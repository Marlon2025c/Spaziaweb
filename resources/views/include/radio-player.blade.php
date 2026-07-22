{{-- ══════════════════════════════════════════════════════════
     RADIO PLAYER — fixe bas droite, présent sur toutes les pages
     La lecture reprend automatiquement au changement de page si
     elle était activée (état sauvegardé dans localStorage).
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
(function () {
    const STREAM     = "https://spazia.fr/radio-proxy";
    const LS_PLAYING = 'spaziaRadioPlaying';
    const LS_VOLUME  = 'spaziaRadioVolume';

    const audio     = document.getElementById('radio-audio');
    const btnPlay   = document.getElementById('btn-play');
    const btnPause  = document.getElementById('btn-pause');
    const bars      = document.querySelectorAll('.rc-bar-line');
    const volSlider = document.getElementById('vol-slider');
    let rcElapsed = 0, rcDuration = 1, rcTicker = null;
    let lastVol = 0.2;

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
        localStorage.setItem(LS_PLAYING, playing ? '1' : '0');
        // le ticker tourne toujours — la radio continue même si l'audio est coupé côté client
    }

    function startPlayback() {
        audio.src = STREAM;
        audio.volume = volSlider.value / 100;
        return audio.play()
            .then(() => setPlaying(true))
            .catch(e => { console.error('Lecture impossible :', e); setPlaying(false); });
    }

    btnPlay.addEventListener('click', startPlayback);
    btnPause.addEventListener('click', () => {
        audio.pause(); audio.src = '';
        setPlaying(false);
    });

    async function fetchNowPlaying() {
        try {
            const data = await fetch('https://spazia.fr/api/nowplaying-local').then(r => r.json());
            const np   = data.now_playing;
            const song = np?.song;

            document.getElementById('radio-artist').textContent = song?.title || song?.artist || 'SpaziaRadio';

            rcElapsed  = np?.elapsed  || 0;
            rcDuration = np?.duration || 1;
            updateProgress();
            startTicker();

            const pfp  = document.getElementById('rc-pfp');
            const barsHtml = `<div class="rc-bars"><div class="rc-bar-line"></div><div class="rc-bar-line"></div><div class="rc-bar-line"></div><div class="rc-bar-line"></div><div class="rc-bar-line"></div></div>`;
            // Vraie pochette = URL avec hash-timestamp (ex: d274b1c6-1751886962.jpg)
            const hasRealArt = song?.art && /\/art\/[a-f0-9]+-\d+\.(jpg|png|webp)/i.test(song.art);
            if (hasRealArt) {
                const img   = new Image();
                img.onload  = () => { pfp.innerHTML = `<img src="${song.art}" alt="cover">`; };
                img.onerror = () => { pfp.innerHTML = barsHtml; };
                img.src = song.art;
            } else {
                pfp.innerHTML = barsHtml;
            }

            const remaining = Math.max(10, rcDuration - rcElapsed);
            setTimeout(fetchNowPlaying, remaining * 1000);
        } catch(e) {
            setTimeout(fetchNowPlaying, 30000);
        }
    }
    fetchNowPlaying();

    function setVolColor(val) {
        volSlider.style.background = `linear-gradient(to right,#1db954 ${val}%,#3a3a3a ${val}%)`;
    }
    volSlider.addEventListener('input', () => {
        const v = volSlider.value / 100;
        audio.volume = v;
        if (v > 0) lastVol = v;
        setVolColor(volSlider.value);
        updateVolIcon(v);
        localStorage.setItem(LS_VOLUME, volSlider.value);
    });

    document.getElementById('btn-mute').addEventListener('click', () => {
        if (audio.volume > 0) {
            lastVol = audio.volume;
            audio.volume = 0; volSlider.value = 0;
        } else {
            audio.volume = lastVol; volSlider.value = Math.round(lastVol * 100);
        }
        setVolColor(volSlider.value);
        updateVolIcon(audio.volume);
        localStorage.setItem(LS_VOLUME, volSlider.value);
    });

    function updateVolIcon(v) {
        document.getElementById('icon-vol').innerHTML = v === 0
            ? `<path clip-rule="evenodd" d="M13.5 4.06c0-1.336-1.616-2.005-2.56-1.06l-4.5 4.5H4.508c-1.141 0-2.318.664-2.66 1.905A9.76 9.76 0 0 0 1.5 12c0 .898.121 1.768.35 2.595.341 1.241 1.518 1.905 2.659 1.905h1.93l4.5 4.5c.945.945 2.561.276 2.561-1.06V4.06ZM17.78 9.22a.75.75 0 1 0-1.06 1.06L18.44 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06l1.72-1.72 1.72 1.72a.75.75 0 1 0 1.06-1.06L20.56 12l1.72-1.72a.75.75 0 1 0-1.06-1.06l-1.72 1.72-1.72-1.72Z" fill-rule="evenodd"/>`
            : v < 0.5
            ? `<path clip-rule="evenodd" d="M11.26 3.691A1.2 1.2 0 0 1 12 4.8v14.4a1.199 1.199 0 0 1-2.048.848L5.503 15.6H2.4a1.2 1.2 0 0 1-1.2-1.2V9.6a1.2 1.2 0 0 1 1.2-1.2h3.103l4.449-4.448a1.2 1.2 0 0 1 1.308-.26Zm3.934 3.217a1.2 1.2 0 0 1 1.698 0A4.78 4.78 0 0 1 18.3 12a4.782 4.782 0 0 1-1.408 3.394 1.2 1.2 0 1 1-1.698-1.698A2.385 2.385 0 0 0 15.9 12a2.384 2.384 0 0 0-.706-1.694 1.2 1.2 0 0 1 0-1.698Z" fill-rule="evenodd"/>`
            : `<path clip-rule="evenodd" d="M11.26 3.691A1.2 1.2 0 0 1 12 4.8v14.4a1.199 1.199 0 0 1-2.048.848L5.503 15.6H2.4a1.2 1.2 0 0 1-1.2-1.2V9.6a1.2 1.2 0 0 1 1.2-1.2h3.103l4.449-4.448a1.2 1.2 0 0 1 1.308-.26Zm6.328-.176a1.2 1.2 0 0 1 1.697 0A11.967 11.967 0 0 1 22.8 12a11.966 11.966 0 0 1-3.515 8.485 1.2 1.2 0 0 1-1.697-1.697A9.563 9.563 0 0 0 20.4 12a9.565 9.565 0 0 0-2.812-6.788 1.2 1.2 0 0 1 0-1.697Zm-3.394 3.393a1.2 1.2 0 0 1 1.698 0A7.178 7.178 0 0 1 18 12a7.18 7.18 0 0 1-2.108 5.092 1.2 1.2 0 1 1-1.698-1.698A4.782 4.782 0 0 0 15.6 12a4.78 4.78 0 0 0-1.406-3.394 1.2 1.2 0 0 1 0-1.698Z" fill-rule="evenodd"/>`;
    }

    // ── Reprise de l'état entre les pages ──────────────────────
    const savedVolume = localStorage.getItem(LS_VOLUME);
    if (savedVolume !== null) {
        volSlider.value = savedVolume;
        lastVol = Math.max(0.01, savedVolume / 100);
    }
    setVolColor(volSlider.value);
    updateVolIcon(volSlider.value / 100);

    if (localStorage.getItem(LS_PLAYING) === '1') {
        startPlayback();
    }
})();
</script>