<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/main.css">
  <title>Main RCI</title>
</head>
<body>
  <!-- NAVBAR -->
  <div class="main-navbar">
    <div id="title-navbar">
      <h2>RCI-Project</h2>
    </div>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="addrobot.php">Ajout d'un robot</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="connectToRobot.php">Connexion à un robot</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Historique des connexions</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">Espace Administrateur</a>
      </li>
    </ul>
  </div>
  <!-- FIN NAVBAR -->

  <!-- PRESENTATION --> 
  <h5 id="rcip-title">Robot Control Interface Project</h5>
  <div class="main-pres">
    <div class="both-pres" id="pres-1">
      <h1>Robot1</h1>
      <div class="text-pres" id="text-pres-1">
        Module GPS
        <br><br>
        Récupération longitude / latitude
        <br><br>
        Retranscription sur une carte interactive
      </div>
    </div>
    <div class="both-pres" id="pres-2">
      <h1>Robot2</h1>
      <div class="text-pres" id="text-pres-2">
        Module caméra
        <br><br>
        Retranscription du flux vidéo en direct
        <br><br>
        Possibilité de controler la caméra
      </div>
    </div>
  </div>
  <!-- FIN PRESENTATION -->
</body>
</html>
