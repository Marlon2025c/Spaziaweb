<div class="col-md-9" id="dashboard-content">
  <div class="dashboard-home">
        <div class="row">
            <div class="col-md-3 m-1" style="background-color: red">
                <canvas id="myChart"></canvas>
            </div>
            <div class="col-md-3 m-1" style="background-color: green">
                <canvas id="myChart1"></canvas>
            </div>
            <div class="col-md-3 m-1" style="background-color: orange">
                <canvas id="myChart2"></canvas>
            </div>
        </div>
        <h2>Bienvenue sur le Dashboard Admin Spazia</h2>
        <p>Voici votre espace d'administration personnalisé.</p>
        <div class="card" style="background-color:#111; color:#0f0; border:1px solid #333;">
        <div class="card-header text-white bg-dark">
            🖥️ Terminal – Logs Serveur
        </div>
  </div>
  <div id="terminal-card">
      <div class="card-body" 
          id="terminal-output"
          style="height: 400px; overflow-y: auto; background:#000; font-family: monospace; font-size:14px;">

          <span class="text-secondary">Chargement des logs...</span>

      </div>

      <div class="card-footer bg-dark">
          <form id="terminal-form" onsubmit="sendCommand(event)">
              <div class="input-group">
                  <span class="input-group-text bg-black text-success">$</span>
                  <input type="text" id="terminal-input" class="form-control bg-black text-success border-secondary"
                        placeholder="Entrez une commande..." autocomplete="off">
                  <button class="btn btn-success">Envoyer</button>
              </div>
          </form>
      </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');
  const ctx1 = document.getElementById('myChart1');
  const ctx2 = document.getElementById('myChart2');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

    new Chart(ctx1, {
    type: 'line',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

    new Chart(ctx2, {
    type: 'line',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>