@extends('layouts.app')
@section('title', 'Spazia - DashboardV2')
@section('content')
<style>
    /* petites améliorations visuelles */
    .step-pane { display: none; }
    .step-pane.active { display: block; }
    .step-indicator { cursor: default; }
    .invalid-feedback { display: block; }
    .summary-list dt { font-weight: 600; }
  </style>
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-body">
            <h4 class="card-title mb-3">Inscription — formulaire multi-étapes</h4>

            <!-- Progress bar -->
            <div class="mb-4">
              <div class="d-flex justify-content-between mb-1">
                <small id="stepLabel">Étape 1 sur 4</small>
                <small id="stepTitle">Informations Ville</small>
              </div>
              <div class="progress" style="height:12px;">
                <div id="progressBar" class="progress-bar" role="progressbar" style="width:25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <form id="multiStepForm" novalidate>
              <!-- STEP 1 -->
              <div class="step-pane active" data-step="1">
                <div class="mb-3">
                  <label for="fname" class="form-label">Ville</label>
                  <select type="text" class="form-control" id="fname" name="fname" required>
                    <option value="Test">Test</option>
                    <option value="Test">Test</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="lname" class="form-label">Date de notation </label>
                  <select type="text" class="form-control" id="fname" name="fname" required>
                    <option value="10/15/2025">10/15/2025</option>
                    <option value="10/15/2025">10/15/2025</option>
                  </select>
                </div>
              </div>

              <!-- STEP 2 -->
              <div class="step-pane" data-step="2">
                                <!-- Activité du joueur -->
                <h5 class="mb-3">Activité du joueur</h5>

                <div class="row g-3">
                    <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" id="active_joueur" name="active_joueur" required>
                        <option value="6">6 points</option>
                        <option value="4">4 points</option>
                        <option value="libre">Chiffre libre</option>
                        </select>
                        <label for="active_joueur">Le joueur a-t-il été actif ?</label>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="culture" name="culture" placeholder="Culture" min="0">
                        <label for="culture">Nombre de cultures de la ville</label>
                    </div>
                    </div>
                </div>

                <hr class="my-4">

                <!-- Notation Gestion -->
                <h5 class="mb-3">Notation — Gestion</h5>

                <div class="row g-3">
                    <div class="col-md-4">
                    <div class="form-floating">
                        <select class="form-select" id="loi" name="loi" required>
                        <option value="3">3 points</option>
                        <option value="1">1 point</option>
                        <option value="libre">Chiffre libre</option>
                        </select>
                        <label for="loi">Ville des lois</label>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="form-floating">
                        <select class="form-select" id="plu" name="plu" required>
                        <option value="2">2 points</option>
                        <option value="1">1 point</option>
                        <option value="libre">Chiffre libre</option>
                        </select>
                        <label for="plu">La ville possède un PLU ?</label>
                    </div>
                    </div>

                    <div class="col-md-4">
                    <div class="form-floating">
                        <select class="form-select" id="politique" name="politique" required>
                        <option value="5">5 points</option>
                        <option value="3">3 points</option>
                        <option value="libre">Chiffre libre</option>
                        </select>
                        <label for="politique">La ville suit son régime politique ?</label>
                    </div>
                    </div>
                </div>

                <hr class="my-4">

                <!-- Notation Métier -->
                <h5 class="mb-3">Notation — Métier</h5>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="nvmetier" name="nvmetier" placeholder="Niveau du métier">
                    <label for="nvmetier">Niveau de métier de chaque joueur</label>
                </div>

                <hr class="my-4">

                <!-- Notation UNESCO -->
                <h5 class="mb-3">Notation — UNESCO</h5>

                <div class="row g-3">
                    <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" id="merville" name="merville" required>
                        <option value="10">Oui</option>
                        <option value="0">Non</option>
                        </select>
                        <label for="merville">La ville a une merveille ?</label>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" id="sauvegarde" name="sauvegarde" required>
                        <option value="2">Oui</option>
                        <option value="0">Non</option>
                        </select>
                        <label for="sauvegarde">La ville a un bâtiment de sauvegarde ?</label>
                    </div>
                    </div>
                </div>

                <hr class="my-4">

                <!-- Notation Event -->
                <h5 class="mb-3">Notation — Évènements</h5>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" id="event_participation" name="event_participation" required>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        </select>
                        <label for="event_participation">Participation aux événements</label>
                    </div>
                    </div>

                    <div class="col-md-6">
                    <div class="form-floating">
                      <select class="form-select" id="event_result" name="event_result" required>
                        <option value="2">Oui</option>
                        <option value="0">Non</option>
                      </select>
                        <label for="event_result">Décorations selon l’événement ?</label>
                    </div>
                    </div>
                </div>
              </div>

              <!-- STEP 3 -->
              <div class="step-pane" data-step="3">
                <hr class="my-4">

                <!-- ARCHITECTURE -->
                <h5 class="mb-3">Notation — Architecture</h5>

                <div class="row g-3">

                  <!-- Terraforming -->
                  <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-select" id="terraforming" name="terraforming" required>
                        <option value="2">2</option>
                        <option value="1">1</option>
                        <option value="libre">Chiffre libre</option>
                      </select>
                      <label for="terraforming">Terraforming (/2)</label>
                    </div>
                  </div>

                  <!-- Cohérence du style -->
                  <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-select" id="coherence_style" name="coherence_style" required>
                        <option value="2">2</option>
                        <option value="1">1</option>
                        <option value="libre">Chiffre libre</option>
                      </select>
                      <label for="coherence_style">Cohérence du style (/2)</label>
                    </div>
                  </div>

                  <!-- Bâtiment métier -->
                  <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-select" id="batiment_metier" name="batiment_metier" required>
                        <option value="16">16</option>
                        <option value="10">10</option>
                        <option value="5">5</option>
                        <option value="libre">Chiffre libre</option>
                      </select>
                      <label for="batiment_metier">Bâtiment métier (/16)</label>
                    </div>
                  </div>

                </div>

                <hr class="my-4">

                <!-- ENVIRONNEMENT / PRÉSENCES -->
                <h5 class="mb-3">Notation — Environnement & Présences</h5>

                <div class="row g-3">

                  <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-select" id="presence_lumieres" name="presence_lumieres" required>
                        <option value="2">2</option>
                        <option value="1">1</option>
                        <option value="libre">Chiffre libre</option>
                      </select>
                      <label for="presence_lumieres">Présence lumières (/2)</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-select" id="activite_recente" name="activite_recente" required>
                        <option value="4">4</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                        <option value="libre">Chiffre libre</option>
                      </select>
                      <label for="activite_recente">Activité récente (/4)</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-select" id="habitabilite" name="habitabilite" required>
                        <option value="2">2</option>
                        <option value="1">1</option>
                        <option value="libre">Chiffre libre</option>
                      </select>
                      <label for="habitabilite">Habitabilité des maisons (/2)</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-select" id="coherence_biome" name="coherence_biome" required>
                        <option value="2">2</option>
                        <option value="1">1</option>
                        <option value="libre">Chiffre libre</option>
                      </select>
                      <label for="coherence_biome">Cohérence du biome (/2)</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-select" id="organique" name="organique" required>
                        <option value="1">1</option>
                        <option value="0">0</option>
                        <option value="libre">Chiffre libre</option>
                      </select>
                      <label for="organique">Présence d'organique (/1)</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-select" id="mobilier" name="mobilier" required>
                        <option value="2">2</option>
                        <option value="1">1</option>
                        <option value="libre">Chiffre libre</option>
                      </select>
                      <label for="mobilier">Présence de mobilier (/2)</label>
                    </div>
                  </div>

                  <!-- Bâtiments abandonnés -->
                  <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-select" id="batiments_abandonnes" name="batiments_abandonnes" required>
                        <option value="2">2</option>
                        <option value="1">1</option>
                        <option value="0">0</option>
                      </select>
                      <label for="batiments_abandonnes">Bâtiments abandonnés (/2)</label>
                    </div>
                  </div>

                  <!-- Nid de poule -->
                  <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-select" id="nid_poule" name="nid_poule" required>
                        <option value="1">1</option>
                        <option value="0">0</option>
                      </select>
                      <label for="nid_poule">Nid de poule (/1)</label>
                    </div>
                  </div>

                </div>

                <hr class="my-4">

                <!-- AMÉNAGEMENT ROUTIER -->
                <h5 class="mb-3">Notation — Aménagement routier</h5>

                <div class="row g-3">

                  <!-- Liste OUI/NON -->
                  <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-select" id="route_pavee" name="route_pavee" required>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                      </select>
                      <label for="route_pavee">Route pavée</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-select" id="route_asphalte" name="route_asphalte" required>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                      </select>
                      <label for="route_asphalte">Route en asphalte</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-select" id="signalisation" name="signalisation" required>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                      </select>
                      <label for="signalisation">Signalisation routière</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-select" id="pont" name="pont" required>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                      </select>
                      <label for="pont">Présence de pont</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-select" id="parking" name="parking" required>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                      </select>
                      <label for="parking">Présence de parking</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-select" id="tunnel" name="tunnel" required>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                      </select>
                      <label for="tunnel">Présence de tunnel</label>
                    </div>
                  </div>

                </div>

                <hr class="my-4">

                <!-- URBANISME COMMUNAL -->
                <h5 class="mb-3">Notation — Urbanisme communal</h5>

                <div class="row g-3">

                  <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-select" id="mairie" name="mairie" required>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                      </select>
                      <label for="mairie">Mairie</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-select" id="parc_public" name="parc_public" required>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                      </select>
                      <label for="parc_public">Parc public</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-select" id="tribunal" name="tribunal" required>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                      </select>
                      <label for="tribunal">Tribunal</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-select" id="banque" name="banque" required>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                      </select>
                      <label for="banque">Banque</label>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-floating">
                      <select class="form-select" id="musees" name="musees" required>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                      </select>
                      <label for="musees">Musées</label>
                    </div>
                  </div>

                </div>
              </div>

              <!-- STEP 4 (Résumé / Confirmation) -->
              <div class="step-pane" data-step="4">
                <h5>Résumé</h5>
                <dl class="row summary-list">
                  <dt class="col-sm-4">Prénom</dt><dd class="col-sm-8" id="sum_fname"></dd>
                  <dt class="col-sm-4">Nom</dt><dd class="col-sm-8" id="sum_lname"></dd>
                  <dt class="col-sm-4">E-mail</dt><dd class="col-sm-8" id="sum_email"></dd>
                  <dt class="col-sm-4">Téléphone</dt><dd class="col-sm-8" id="sum_phone"></dd>
                </dl>
                <div class="form-check mt-3">
                  <input class="form-check-input" type="checkbox" value="" id="acceptTerms" required>
                  <label class="form-check-label" for="acceptTerms">J'accepte les conditions générales</label>
                  <div class="invalid-feedback">Vous devez accepter les conditions pour continuer.</div>
                </div>
              </div>

              <!-- Buttons -->
              <div class="d-flex justify-content-between mt-4">
                <button type="button" id="prevBtn" class="btn btn-outline-secondary" disabled>Précédent</button>
                <div>
                  <button type="button" id="nextBtn" class="btn btn-primary">Suivant</button>
                  <button type="submit" id="submitBtn" class="btn btn-success d-none">Confirmer & Envoyer</button>
                </div>
              </div>
            </form>
          </div> <!-- card-body -->
        </div> <!-- card -->
      </div> <!-- col -->
    </div> <!-- row -->
  </div> <!-- container -->

  <!-- Bootstrap JS bundle (Popper + Bootstrap) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    (function () {
      const form = document.getElementById('multiStepForm');
      const panes = Array.from(document.querySelectorAll('.step-pane'));
      const nextBtn = document.getElementById('nextBtn');
      const prevBtn = document.getElementById('prevBtn');
      const submitBtn = document.getElementById('submitBtn');
      const progressBar = document.getElementById('progressBar');
      const stepLabel = document.getElementById('stepLabel');
      const stepTitle = document.getElementById('stepTitle');

      const steps = panes.length;
      let current = 0;

      const titles = [
        'Informations personnelles',
        'Contact',
        'Sécurité',
        'Résumé'
      ];

      function showStep(n) {
        panes.forEach((p, i) => {
          p.classList.toggle('active', i === n);
        });
        prevBtn.disabled = (n === 0);
        nextBtn.classList.toggle('d-none', n === steps - 1);
        submitBtn.classList.toggle('d-none', n !== steps - 1);

        const pct = Math.round(((n + 1) / steps) * 100);
        progressBar.style.width = pct + '%';
        progressBar.setAttribute('aria-valuenow', pct);
        stepLabel.textContent = `Étape ${n + 1} sur ${steps}`;
        stepTitle.textContent = titles[n] || '';
        // update summary if last step
        if (n === steps - 1) fillSummary();
      }

      function validateStep(n) {
        const pane = panes[n];
        const inputs = Array.from(pane.querySelectorAll('input, select, textarea'));
        // special check for password match on step 3 (index 2)
        if (n === 2) {
          const pwd = document.getElementById('password');
          const pwd2 = document.getElementById('password2');
          const mismatchEl = document.getElementById('pwdMismatch');
          if (pwd.value !== pwd2.value) {
            pwd2.setCustomValidity('mismatch');
            mismatchEl.style.display = 'block';
          } else {
            pwd2.setCustomValidity('');
            mismatchEl.style.display = 'none';
          }
        }

        // run browser validation on visible inputs
        let valid = true;
        inputs.forEach(input => {
          // required attribute + pattern + type are handled by checkValidity
          if (!input.checkValidity()) {
            valid = false;
            input.classList.add('is-invalid');
          } else {
            input.classList.remove('is-invalid');
          }
        });
        return valid;
      }

      function fillSummary() {
        document.getElementById('sum_fname').textContent = document.getElementById('fname').value || '—';
        document.getElementById('sum_lname').textContent = document.getElementById('lname').value || '—';
        document.getElementById('sum_email').textContent = document.getElementById('email').value || '—';
        document.getElementById('sum_phone').textContent = document.getElementById('phone').value || '—';
      }

      nextBtn.addEventListener('click', () => {
        // validate current step before moving forward
        if (!validateStep(current)) {
          // show first invalid element in the pane
          const firstInvalid = panes[current].querySelector('.is-invalid');
          if (firstInvalid) firstInvalid.focus();
          return;
        }
        current = Math.min(current + 1, steps - 1);
        showStep(current);
      });

      prevBtn.addEventListener('click', () => {
        current = Math.max(current - 1, 0);
        showStep(current);
      });

      // On submit
      form.addEventListener('submit', (e) => {
        e.preventDefault();
        // validate last step (including terms checkbox)
        if (!validateStep(current)) return;
        // final form-wide validation (optional)
        if (!form.checkValidity()) {
          // mark invalid fields globally
          Array.from(form.querySelectorAll('input,textarea,select')).forEach(el => {
            if (!el.checkValidity()) el.classList.add('is-invalid');
            else el.classList.remove('is-invalid');
          });
          return;
        }

        // Here: form ready to be sent (AJAX / fetch or normal submit)
        // Example: send with fetch (uncomment and adapt to your endpoint)
        /*
        const data = new FormData(form);
        fetch('/submit-endpoint', { method: 'POST', body: data })
          .then(res => res.json())
          .then(resp => {
            // success handling
          })
        */
        // For demo: show a success message
        alert('Formulaire envoyé — (simulateur) ✅');
        form.reset();
        // return to first step
        current = 0;
        showStep(current);
      });

      // Clear is-invalid when user types
      form.addEventListener('input', (e) => {
        if (e.target.classList.contains('is-invalid') && e.target.checkValidity()) {
          e.target.classList.remove('is-invalid');
        }
      });

      // initialize
      showStep(current);
    })();
  </script>
@endsection