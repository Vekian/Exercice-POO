<!DOCTYPE html>
<html>
<head>
    <title>Machine à Café</title>
    <style>
  .cup {
      width: 200px;
      height: 150px;
      background-color: #dfdfdf; /* Marron */
      position: relative;
      border-radius: 10px;
      overflow: hidden;
    }
    #coffee {
      width: 180px;
      height: 100px;
      background-color: #ffffff; /* Brun foncé */
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      border-radius: 0 0 50% 50%;
    }
   
    .steam {
      position: absolute;
      top: -50px;
      left: 30%;
      width: 10px;
      height: 80px;
      border-radius: 50% 50% 0 0;
      background-color: #FFF;
      transform: rotate(-20deg);
    }
    .steam:nth-child(2) {
      left: 45%;
      transform: rotate(-25deg);
    }
    .steam:nth-child(3) {
      left: 60%;
      transform: rotate(-15deg);
    }
  </style>
</head>
<body>
    <h1>Machine à Café</h1>
    <button onclick="allumer()">Allumer</button>
    <button onclick="mettreDosette()">Mettre une dosette</button>
    <button onclick="faireCafe()">Faire du café</button>
    <button onclick="eteindre()">Éteindre</button>
    <br>
    <label for="sucreInput">Ajouter du sucre (nombre de sucres) :</label>
    <input type="number" id="sucreInput" min="0" max="10" value="0">
    <button onclick="ajouterSucre()">Ajouter</button>
    <br>
    <label for="argentInput">Payer le café (argent en euros) :</label>
    <input type="number" id="argentInput" min="0" step="0.01" value="0">
    <button onclick="payerCafe()">Payer</button>
    <div class="cup">
    <div id="coffee"></div>
    <div class="steam"></div>
    <div class="steam"></div>
    <div class="steam"></div>
  </div>
    </div>
    <div id="output"></div>
    <form action="logout.php">
        <input type="submit" value="Vider le café">
    </form>
<script>
    function allumer() {
        performAction('allumage', true);
    }

    function mettreDosette() {
        performAction('mettreDosette');
    }

    function faireCafe() {
        performAction('faireDuCafe');
    }

    function eteindre() {
        performAction('eteindreMachine');
    }

    function ajouterSucre() {
        const sucreInput = document.getElementById('sucreInput');
        const sucre = parseInt(sucreInput.value);
        performAction('mettreDuSucre', sucre);
    }

    function payerCafe() {
        const argentInput = document.getElementById('argentInput');
        const argent = parseFloat(argentInput.value);
        performAction('payerLeCafe', argent);
    }

    function performAction(action, value = null) {
        const output = document.getElementById('output');
        const url = 'process-cafe.php?action=' + action + (value !== null ? '&value=' + value : '');

        return fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                output.innerHTML += '<p>' + data + '</p>';
                if (data === "Le café est prêt !") {
                    let coffee = document.getElementById('coffee');
                    coffee.style.backgroundColor = "#704214";
                }
            })
            .catch(error => {
                console.error('Fetch error:', error);
            });
    }
</script>

</body>
</html>
