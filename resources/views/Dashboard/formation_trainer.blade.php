@extends('layouts.app')
@section('title', 'Spazia - ' . $formation->titre)
@section('content')

<style>
    body { background: #0a0a10; }

    .ftrainerpage-bg {
        min-height: calc(100vh - var(--nav-h, 110px));
        padding: 2.5rem 1.5rem 4rem;
        padding-top: calc(var(--nav-h, 110px) + 2rem);
    }
    .ftrainerpage-wrap { max-width: 1100px; margin: 0 auto; }

    .ftrainerpage-back {
        display: inline-flex; align-items: center; gap: .4rem;
        color: rgba(255,255,255,.5); text-decoration: none;
        font-size: .85rem; font-weight: 600; margin-bottom: 1.2rem;
        transition: color .2s;
    }
    .ftrainerpage-back:hover { color: #fb923c; }

    .ftrainerpage-header {
        display: flex; align-items: center; gap: 1rem;
        margin-bottom: 1.8rem;
    }
    .ftrainerpage-icon {
        width: 54px; height: 54px; min-width: 54px; border-radius: 14px;
        background: rgba(249,115,22,.12); color: {{ $formation->couleur ?: '#f97316' }};
        display: flex; align-items: center; justify-content: center; font-size: 1.6rem;
    }
    .ftrainerpage-tag {
        display: inline-block; font-size: .68rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase;
        padding: .2rem .65rem; border-radius: 999px; margin-bottom: .35rem;
        background: rgba(249,115,22,.12); color: {{ $formation->couleur ?: '#f97316' }};
    }
    .ftrainerpage-title { font-size: 1.5rem; font-weight: 800; color: #fff; margin: 0; }

    .ftrainerpage-card {
        background: rgba(255,255,255,.025);
        border: 1px solid rgba(255,255,255,.08);
        border-radius: 20px;
        padding: 1.8rem;
    }

    .fkeypoints { list-style: none; padding: 0; margin: 0 0 1.5rem; display: flex; flex-direction: column; gap: .5rem; }
    .fkeypoints li {
        font-size: .9rem; color: rgba(255,255,255,.65);
        padding-left: 1.4rem; position: relative; line-height: 1.55;
    }
    .fkeypoints li::before { content: "✓"; position: absolute; left: 0; color: #4ade80; font-weight: 700; }

    .ftrainer-step { display: none; }
    .ftrainer-step.active { display: block; }
    .ftrainer-label {
        font-size: .75rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase;
        color: rgba(255,255,255,.4); margin-bottom: .7rem;
    }
    .ftrainer-iframe {
        width: 100%; height: 78vh; min-height: 480px;
        border: 1px solid rgba(255,255,255,.1); border-radius: 12px;
        background: #fff;
    }

    /* ─── Lecteur PDF paginé (PDF.js) ────────────────── */
    .fpdf-viewer {
        border: 1px solid rgba(255,255,255,.1); border-radius: 12px;
        overflow: hidden; background: #525659;
    }
    .fpdf-canvas-wrap {
        max-height: 72vh; min-height: 420px;
        overflow: auto; display: flex; justify-content: center; align-items: flex-start;
        padding: 1.2rem;
    }
    .fpdf-canvas-wrap canvas { box-shadow: 0 4px 18px rgba(0,0,0,.4); }
    .fpdf-loading { color: rgba(255,255,255,.5); font-size: .85rem; padding: 3rem 0; text-align: center; width: 100%; }
    .fpdf-nav {
        display: flex; align-items: center; justify-content: center; gap: 1.1rem;
        padding: .75rem; background: #1a1a24; border-top: 1px solid rgba(255,255,255,.06);
    }
    .fpdf-nav button {
        background: rgba(255,255,255,.08); border: none; color: #fff;
        width: 34px; height: 34px; border-radius: 8px; cursor: pointer;
        font-size: 1rem; line-height: 1; transition: background .2s, opacity .2s;
    }
    .fpdf-nav button:hover:not(:disabled) { background: rgba(249,115,22,.25); }
    .fpdf-nav button:disabled { opacity: .3; cursor: default; }
    .fpdf-page-info { color: rgba(255,255,255,.7); font-size: .85rem; font-weight: 700; min-width: 90px; text-align: center; }

    .btn-pdf {
        display: inline-flex; align-items: center; gap: .5rem;
        padding: .6rem 1.3rem; border-radius: 9px; border: none;
        font-size: .87rem; font-weight: 700; cursor: pointer;
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

    .btn-validate {
        display: inline-flex; align-items: center; gap: .4rem;
        padding: .5rem 1.1rem; border-radius: 8px; border: none;
        font-size: .87rem; font-weight: 700; cursor: pointer;
        background: linear-gradient(135deg,#22c55e,#16a34a);
        color: #fff;
        transition: transform .2s, box-shadow .2s;
    }
    .btn-validate:hover { transform: translateY(-1px); box-shadow: 0 0 16px rgba(34,197,94,.3); }

    .fvalidate-input {
        background: rgba(255,255,255,.05);
        border: 1px solid rgba(255,255,255,.1);
        border-radius: 8px;
        color: #fff;
        padding: .55rem .9rem;
        font-size: .87rem;
        outline: none;
        font-family: inherit;
    }
    .fvalidate-input:focus { border-color: rgba(34,197,94,.4); }

    .fquiz-question { margin-bottom: 1.2rem; }
    .fquiz-question p { font-size: .92rem; font-weight: 700; color: #fff; margin-bottom: .5rem; }
    .fquiz-option { display:flex; align-items:center; gap:.55rem; font-size:.88rem; color: rgba(255,255,255,.65); padding: .3rem .5rem; cursor: pointer; border-radius: 8px; transition: background .2s, color .2s; }
    .fquiz-option input[type=radio] { accent-color: #f97316; cursor: pointer; }
    .fquiz-option.is-correct { background: rgba(34,197,94,.12); color: #4ade80; font-weight: 700; }
    .fquiz-option.is-wrong { background: rgba(239,68,68,.12); color: #f87171; font-weight: 700; }
    .fquiz-explanation {
        display: none;
        font-size: .83rem; line-height: 1.55; color: rgba(255,255,255,.6);
        background: rgba(255,255,255,.04); border-left: 3px solid #f97316;
        border-radius: 0 8px 8px 0; padding: .55rem .8rem; margin-top: .5rem;
    }
    .fquiz-result { font-size: .88rem; font-weight: 700; margin-top: .8rem; display: none; }
    .fquiz-result.ok  { color: #4ade80; }
    .fquiz-result.err { color: #f87171; }
</style>

<script>
    (function () {
        function setNavHeight() {
            const nav = document.querySelector('.fixed-top');
            if (nav) {
                document.documentElement.style.setProperty('--nav-h', nav.offsetHeight + 'px');
            }
        }
        setNavHeight();
        window.addEventListener('load', setNavHeight);
        window.addEventListener('resize', setNavHeight);
    })();
</script>

<div class="ftrainerpage-bg">
    <div class="ftrainerpage-wrap">
        <a href="{{ route('dashboardv2', ['section' => 'formation']) }}" class="ftrainerpage-back">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
            </svg>
            Retour aux formations
        </a>

        <div class="ftrainerpage-header">
            <div class="ftrainerpage-icon">{{ $formation->emoji ?: '📚' }}</div>
            <div>
                <span class="ftrainerpage-tag">Autodidacte</span>
                <h1 class="ftrainerpage-title">{{ $formation->titre }}</h1>
            </div>
        </div>

        <div class="ftrainerpage-card">
            @if($formation->description)
                <p style="font-size:.92rem;color:rgba(255,255,255,.5);margin-bottom:1.3rem;line-height:1.6;">{{ $formation->description }}</p>
            @endif

            @php
                $pointsCles = $formation->points_cles ? (json_decode($formation->points_cles, true) ?: []) : [];
            @endphp
            @if(!empty($pointsCles))
                <ul class="fkeypoints">
                    @foreach($pointsCles as $point)
                        <li>{{ $point }}</li>
                    @endforeach
                </ul>
            @endif

            @if($isValidated)
                <p style="font-size:.9rem;color:#4ade80;font-weight:700;margin-bottom:1rem;">✓ Formation déjà validée</p>
                <div class="d-flex gap-2 flex-wrap">
                    @if($formation->pdf_path)
                        <a href="{{ asset('storage/' . $formation->pdf_path) }}" target="_blank" class="btn-pdf btn-pdf-primary">📄 Support</a>
                    @endif
                    @if($formation->pdf_url)
                        <a href="{{ $formation->pdf_url }}" target="_blank" class="btn-pdf btn-pdf-ghost">🔗 Support (lien)</a>
                    @endif
                    @if($formation->fin_pdf_path)
                        <a href="{{ asset('storage/' . $formation->fin_pdf_path) }}" target="_blank" class="btn-pdf btn-pdf-ghost">📄 Fin de formation</a>
                    @endif
                    @if($formation->fin_pdf_url)
                        <a href="{{ $formation->fin_pdf_url }}" target="_blank" class="btn-pdf btn-pdf-ghost">🔗 Fin de formation</a>
                    @endif
                </div>
            @else
                @php $step = 0; @endphp
                <div class="ftrainer" id="ftrainer{{ $formation->id }}">
                    @if($formation->pdf_path || $formation->pdf_url)
                        @php $step++; @endphp
                        <div class="ftrainer-step {{ $step === 1 ? 'active' : '' }}" data-step="{{ $step }}">
                            <p class="ftrainer-label">Support de formation</p>
                            <div class="fpdf-viewer" id="fpdfSupport{{ $formation->id }}" data-pdf-src="{{ $formation->pdf_path ? asset('storage/' . $formation->pdf_path) : $formation->pdf_url }}">
                                <div class="fpdf-canvas-wrap"><p class="fpdf-loading">Chargement du document…</p></div>
                            </div>
                            <button type="button" class="btn-pdf btn-pdf-primary" onclick="ftrainerNext({{ $formation->id }})" style="margin-top:1rem;">J'ai terminé la lecture, continuer →</button>
                        </div>
                    @endif

                    @if($formation->fin_pdf_path || $formation->fin_pdf_url)
                        @php $step++; @endphp
                        <div class="ftrainer-step {{ $step === 1 ? 'active' : '' }}" data-step="{{ $step }}">
                            <p class="ftrainer-label">Document de fin de formation</p>
                            <div class="fpdf-viewer" id="fpdfFin{{ $formation->id }}" data-pdf-src="{{ $formation->fin_pdf_path ? asset('storage/' . $formation->fin_pdf_path) : $formation->fin_pdf_url }}">
                                <div class="fpdf-canvas-wrap"><p class="fpdf-loading">Chargement du document…</p></div>
                            </div>
                            <button type="button" class="btn-pdf btn-pdf-primary" onclick="ftrainerNext({{ $formation->id }})" style="margin-top:1rem;">Continuer →</button>
                        </div>
                    @endif

                    @if($formation->questions->isNotEmpty())
                        @php $step++; @endphp
                        <div class="ftrainer-step {{ $step === 1 ? 'active' : '' }}" data-step="{{ $step }}">
                            <p class="ftrainer-label">Questionnaire — {{ $formation->questions->count() }} question{{ $formation->questions->count() > 1 ? 's' : '' }}, 50% minimum pour valider</p>
                            <input class="fvalidate-input mb-3" type="text" id="fquizName{{ $formation->id }}"
                                   placeholder="Ton pseudo"
                                   value="{{ auth()->user()?->name ?? '' }}" style="width:100%;max-width:340px;">

                            @foreach($formation->questions as $qi => $question)
                                <div class="fquiz-question" data-question-id="{{ $question->id }}">
                                    <p>{{ $qi + 1 }}. {{ $question->question }}</p>
                                    @foreach($question->options as $oi => $option)
                                        <label class="fquiz-option" data-option-index="{{ $oi }}">
                                            <input type="radio" name="fquizQ{{ $formation->id }}_{{ $question->id }}" value="{{ $oi }}">
                                            {{ $option }}
                                        </label>
                                    @endforeach
                                    <div class="fquiz-explanation"></div>
                                </div>
                            @endforeach

                            <button class="btn-validate" id="fquizSubmitBtn{{ $formation->id }}" onclick="submitQuiz({{ $formation->id }}, this)">Valider mes réponses</button>
                            <div class="fquiz-result" id="fquizResult{{ $formation->id }}"></div>
                            <div class="d-flex gap-2 mt-2" id="fquizActions{{ $formation->id }}" style="display:none;"></div>
                        </div>
                    @endif

                    @if($step === 0)
                        <p style="font-size:.85rem;color:rgba(255,255,255,.3);font-style:italic;">Aucun contenu attaché à cette formation.</p>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script>
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

// ── Lecteur PDF paginé avec flèches (repli en iframe si PDF.js échoue, ex: lien externe bloqué par CORS) ──
function initPdfViewer(containerId) {
    const container = document.getElementById(containerId);
    if (!container) return;

    const src = container.dataset.pdfSrc;
    const wrap = container.querySelector('.fpdf-canvas-wrap');

    function fallbackToIframe() {
        container.innerHTML = `<iframe class="ftrainer-iframe" style="border:none;border-radius:0;" src="${src}"></iframe>`;
    }

    pdfjsLib.getDocument(src).promise.then(pdf => {
        wrap.innerHTML = '<canvas></canvas>';
        const canvas = wrap.querySelector('canvas');
        const ctx = canvas.getContext('2d');
        let pageNum = 1;

        const nav = document.createElement('div');
        nav.className = 'fpdf-nav';
        nav.innerHTML = `
            <button type="button" class="fpdf-prev">◀</button>
            <span class="fpdf-page-info"><span class="fpdf-current">1</span> / <span class="fpdf-total">${pdf.numPages}</span></span>
            <button type="button" class="fpdf-next">▶</button>
        `;
        container.appendChild(nav);
        const prevBtn = nav.querySelector('.fpdf-prev');
        const nextBtn = nav.querySelector('.fpdf-next');
        const currentEl = nav.querySelector('.fpdf-current');

        function renderPage(num) {
            pdf.getPage(num).then(page => {
                const baseViewport = page.getViewport({ scale: 1 });
                const scale = Math.min((wrap.clientWidth - 40) / baseViewport.width, 1.8);
                const viewport = page.getViewport({ scale });
                canvas.width = viewport.width;
                canvas.height = viewport.height;
                page.render({ canvasContext: ctx, viewport });
                currentEl.textContent = num;
                prevBtn.disabled = num <= 1;
                nextBtn.disabled = num >= pdf.numPages;
            });
        }

        prevBtn.addEventListener('click', () => { if (pageNum > 1) renderPage(--pageNum); });
        nextBtn.addEventListener('click', () => { if (pageNum < pdf.numPages) renderPage(++pageNum); });

        renderPage(pageNum);
    }).catch(fallbackToIframe);
}

// Un lecteur PDF caché (display:none) a une largeur de 0 — on ne l'initialise qu'au moment
// où son étape devient visible, sinon PDF.js dessine dans un canvas de largeur négative.
function initStepViewers(stepEl) {
    if (!stepEl) return;
    stepEl.querySelectorAll('.fpdf-viewer').forEach(el => {
        if (!el.dataset.initialized) {
            el.dataset.initialized = '1';
            initPdfViewer(el.id);
        }
    });
}

function ftrainerNext(formationId) {
    const container = document.getElementById('ftrainer' + formationId);
    const current = container.querySelector('.ftrainer-step.active');
    const currentStep = parseInt(current.dataset.step, 10);
    current.classList.remove('active');
    const next = container.querySelector(`.ftrainer-step[data-step="${currentStep + 1}"]`);
    if (next) {
        next.classList.add('active');
        initStepViewers(next);
    }
}

// Échec du quiz (< 50%) : on renvoie au début du parcours pour refaire la formation.
function ftrainerReset(formationId) {
    const container = document.getElementById('ftrainer' + formationId);
    if (!container) return;
    container.querySelectorAll('input[type=radio]').forEach(r => { r.checked = false; r.disabled = false; });
    container.querySelectorAll('.fquiz-option').forEach(o => o.classList.remove('is-correct', 'is-wrong'));
    container.querySelectorAll('.fquiz-explanation').forEach(e => { e.style.display = 'none'; e.textContent = ''; });
    const result = container.querySelector('.fquiz-result');
    if (result) result.style.display = 'none';
    const actions = document.getElementById('fquizActions' + formationId);
    if (actions) { actions.style.display = 'none'; actions.innerHTML = ''; }
    const submitBtn = document.getElementById('fquizSubmitBtn' + formationId);
    if (submitBtn) submitBtn.style.display = '';
    container.querySelectorAll('.ftrainer-step').forEach(s => s.classList.remove('active'));
    const first = container.querySelector('.ftrainer-step[data-step="1"]');
    if (first) first.classList.add('active');
    container.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

// Affiche, sous chaque question, la bonne réponse (et l'erreur éventuelle) + l'explication.
function showQuizDetails(panel, details) {
    details.forEach(d => {
        const qEl = panel.querySelector(`.fquiz-question[data-question-id="${d.question_id}"]`);
        if (!qEl) return;

        qEl.querySelectorAll('input[type=radio]').forEach(r => r.disabled = true);

        qEl.querySelectorAll('.fquiz-option').forEach(opt => {
            const idx = parseInt(opt.dataset.optionIndex, 10);
            if (idx === d.correct_index) opt.classList.add('is-correct');
            if (d.given_index !== null && idx === d.given_index && !d.is_correct) opt.classList.add('is-wrong');
        });

        if (d.explanation) {
            const expl = qEl.querySelector('.fquiz-explanation');
            expl.textContent = `💡 ${d.explanation}`;
            expl.style.display = 'block';
        }
    });
}

function submitQuiz(formationId, btn) {
    const panel = document.getElementById('ftrainer' + formationId);
    const staffName = document.getElementById('fquizName' + formationId).value.trim();
    const result = document.getElementById('fquizResult' + formationId);
    result.style.display = 'none';

    if (!staffName) {
        result.className = 'fquiz-result err';
        result.textContent = 'Renseigne ton pseudo.';
        result.style.display = 'block';
        return;
    }

    const answers = {};
    panel.querySelectorAll('.fquiz-question').forEach(q => {
        const checked = q.querySelector('input[type=radio]:checked');
        if (checked) {
            const questionId = checked.name.split('_')[1];
            answers[questionId] = parseInt(checked.value, 10);
        }
    });

    const orig = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = '⏳';

    fetch(`{{ url('/dashboardv2/formation') }}/${formationId}/quiz/submit`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')?.content || ''
        },
        body: JSON.stringify({ staff_name: staffName, answers })
    })
    .then(async r => {
        const data = await r.json();
        if (!r.ok) {
            result.className = 'fquiz-result err';
            result.textContent = data.error || 'Erreur.';
            result.style.display = 'block';
            return;
        }

        if (data.details) showQuizDetails(panel, data.details);

        const actions = document.getElementById('fquizActions' + formationId);
        btn.style.display = 'none';

        if (data.passed) {
            result.className = 'fquiz-result ok';
            result.textContent = `✓ ${data.score}/${data.total} (${data.percentage}%) — Formation validée !`;
            result.style.display = 'block';
            actions.innerHTML = `<button type="button" class="btn-pdf btn-pdf-primary" onclick="window.location.href='{{ route('dashboardv2', ['section' => 'formation']) }}'">Retour au dashboard →</button>`;
            actions.style.display = 'flex';
        } else {
            result.className = 'fquiz-result err';
            result.textContent = `${data.score}/${data.total} (${data.percentage}%) — Il faut au moins 50% pour valider.`;
            result.style.display = 'block';
            actions.innerHTML = `<button type="button" class="btn-pdf btn-pdf-ghost" onclick="ftrainerReset(${formationId})">↺ Revoir les réponses et recommencer</button>`;
            actions.style.display = 'flex';
        }
    })
    .catch(() => {
        result.className = 'fquiz-result err';
        result.textContent = 'Impossible de contacter le serveur.';
        result.style.display = 'block';
    })
    .finally(() => { btn.disabled = false; btn.innerHTML = orig; });
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.ftrainer-step.active').forEach(initStepViewers);
});
</script>

@endsection
