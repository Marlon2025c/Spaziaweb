<div id="dashboard-content">

<style>
    .charte-section {
        background: rgba(255,255,255,.025);
        border: 1px solid rgba(255,255,255,.07);
        border-radius: 18px;
        padding: 1.75rem 2rem;
        margin-bottom: 1.25rem;
        transition: border-color .3s;
    }
    .charte-section:hover { border-color: rgba(249,115,22,.2); }
    .charte-section-title {
        display: flex; align-items: center; gap: .75rem;
        font-size: 1rem; font-weight: 800; color: #fff;
        margin-bottom: 1rem; padding-bottom: .75rem;
        border-bottom: 1px solid rgba(255,255,255,.07);
    }
    .charte-section-icon {
        width: 38px; height: 38px; border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1rem; flex-shrink: 0;
    }
    .charte-rule {
        display: flex; gap: .8rem; align-items: flex-start;
        padding: .55rem 0;
        border-bottom: 1px solid rgba(255,255,255,.04);
    }
    .charte-rule:last-child { border-bottom: none; }
    .charte-rule-num {
        min-width: 24px; height: 24px;
        background: rgba(249,115,22,.1);
        border: 1px solid rgba(249,115,22,.2);
        border-radius: 6px;
        display: flex; align-items: center; justify-content: center;
        font-size: .72rem; font-weight: 800; color: #fb923c;
        flex-shrink: 0; margin-top: 1px;
    }
    .charte-rule-text {
        font-size: .88rem; color: rgba(255,255,255,.7); line-height: 1.65;
    }
    .charte-rule-text strong { color: #fff; font-weight: 700; }

    .charte-badge {
        display: inline-flex; align-items: center; gap: .4rem;
        font-size: .7rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase;
        padding: .25rem .75rem; border-radius: 999px; margin-left: .75rem;
    }
    .charte-highlight {
        background: rgba(249,115,22,.06);
        border: 1px solid rgba(249,115,22,.15);
        border-radius: 12px;
        padding: 1rem 1.25rem;
        margin-top: 1.25rem;
        color: rgba(255,255,255,.6);
        font-size: .86rem;
        line-height: 1.7;
    }
    .charte-highlight strong { color: #fb923c; }
</style>

<div class="mb-4">
    <p style="font-size:.72rem;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.35);margin:0;">Staff</p>
    <h2 style="font-size:1.6rem;font-weight:800;color:#fff;margin:0;">Charte de l'équipe</h2>
    <p style="color:rgba(255,255,255,.4);font-size:.88rem;margin:.4rem 0 0;">Valeurs et engagements du staff SpaziaEco — à lire et respecter par tous les membres.</p>
</div>

{{-- Valeurs fondamentales --}}
<div class="charte-section">
    <div class="charte-section-title">
        <div class="charte-section-icon" style="background:rgba(249,115,22,.12);color:#fb923c;">⚡</div>
        Valeurs fondamentales
    </div>
    <div class="charte-rule">
        <div class="charte-rule-num">1</div>
        <div class="charte-rule-text"><strong>Respect mutuel</strong> — Chaque membre du staff traite les joueurs et ses collègues avec respect, sans exception. La hiérarchie n'autorise pas l'irrespect.</div>
    </div>
    <div class="charte-rule">
        <div class="charte-rule-num">2</div>
        <div class="charte-rule-text"><strong>Impartialité</strong> — Les décisions de modération sont prises de façon équitable, sans favoritisme pour les amis, alliés ou villes partenaires.</div>
    </div>
    <div class="charte-rule">
        <div class="charte-rule-num">3</div>
        <div class="charte-rule-text"><strong>Transparence</strong> — Les actions de staff notables (bans, mutes, rollbacks) sont consignées et communiquées aux membres concernés.</div>
    </div>
    <div class="charte-rule">
        <div class="charte-rule-num">4</div>
        <div class="charte-rule-text"><strong>Engagement</strong> — Rejoindre le staff est un engagement, pas un titre. L'inactivité prolongée sans prévenir peut entraîner un retrait de grade.</div>
    </div>
</div>

{{-- Modération --}}
<div class="charte-section">
    <div class="charte-section-title">
        <div class="charte-section-icon" style="background:rgba(239,68,68,.12);color:#f87171;">🛡️</div>
        Règles de modération
    </div>
    <div class="charte-rule">
        <div class="charte-rule-num">1</div>
        <div class="charte-rule-text"><strong>Prévenir avant de sanctionner</strong> — Sauf cas grave (triche, grief massif), toujours avertir le joueur avant toute sanction.</div>
    </div>
    <div class="charte-rule">
        <div class="charte-rule-num">2</div>
        <div class="charte-rule-text"><strong>Proportionnalité</strong> — La sanction doit être proportionnée à la faute. Un spam verbal ne mérite pas un ban définitif.</div>
    </div>
    <div class="charte-rule">
        <div class="charte-rule-num">3</div>
        <div class="charte-rule-text"><strong>Ne pas abuser des pouvoirs</strong> — Les commandes admin (TP, give, vanish…) sont réservées à l'exercice du rôle, jamais à un usage personnel en jeu.</div>
    </div>
    <div class="charte-rule">
        <div class="charte-rule-num">4</div>
        <div class="charte-rule-text"><strong>Reports obligatoires</strong> — Tout incident significatif doit être reporté dans le dashboard, même si géré directement.</div>
    </div>
</div>

{{-- Communication --}}
<div class="charte-section">
    <div class="charte-section-title">
        <div class="charte-section-icon" style="background:rgba(99,102,241,.12);color:#818cf8;">💬</div>
        Communication interne
    </div>
    <div class="charte-rule">
        <div class="charte-rule-num">1</div>
        <div class="charte-rule-text"><strong>Confidentialité</strong> — Les discussions internes du staff (Discord staff, dashboard) sont strictement confidentielles. Rien ne doit filtrer vers les joueurs.</div>
    </div>
    <div class="charte-rule">
        <div class="charte-rule-num">2</div>
        <div class="charte-rule-text"><strong>Décisions collégiales</strong> — Les décisions importantes (nouveau grade, exclusion, changement de règle) se discutent en équipe avant d'être annoncées.</div>
    </div>
    <div class="charte-rule">
        <div class="charte-rule-num">3</div>
        <div class="charte-rule-text"><strong>Prévenir en cas d'absence</strong> — Tout membre sachant qu'il sera absent doit le signaler dans le canal prévu, avec une durée estimée.</div>
    </div>
</div>

{{-- Signature morale --}}
<div class="charte-highlight">
    <strong>En acceptant votre rôle dans le staff SpaziaEco</strong>, vous vous engagez à respecter cette charte dans son intégralité. Toute violation grave ou répétée peut entraîner la révocation du grade sans préavis, à la discrétion des fondateurs.
    <br><br>
    <span style="color:rgba(255,255,255,.35);font-size:.8rem;">Dernière mise à jour : Saison 8 · SpaziaEco Staff</span>
</div>

</div>
