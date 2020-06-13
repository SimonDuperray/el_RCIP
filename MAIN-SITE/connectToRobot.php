<?php
session_start();
$bdd = new PDO("mysql:host=127.0.0.1;dbname=interfacing_controller", "root", "");
if(isset($_POST['connectToRobot']))
{
  $admin = "Kartodix";
  $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
  $idrobotconnect = htmlspecialchars($_POST['idrobotconnect']);
  $passwordconnect = htmlspecialchars($_POST['passwordconnect']);
  if(!empty($pseudoconnect) AND !empty($idrobotconnect) AND !empty($passwordconnect))
  {
    if($pseudoconnect == $admin)
    {
      $reqrobot = $bdd->prepare("SELECT * FROM test_robots WHERE idrobot = ? AND password = ?");
      $reqrobot->execute(array($idrobotconnect, $passwordconnect));
      $robotexist = $reqrobot->rowCount();
      if($robotexist == 1)
      {
        $robotinfo = $reqrobot->fetch();
        $_SESSION['id'] = $robotinfo['id'];
        $_SESSION['idrobot'] = $robotinfo['idrobot'];
        header("Location: profil.php?id=".$_SESSION['id']);
      }
      else
      {
        $erreur = "Mauvais ID ou mot de passe !";
      }
    }
    else
    {
      $erreur = "Vous n'avez pas la permission de vous connecter à ce robot !";
    }
  }
  else
  {
    $erreur = "Tous les champs doivent être completés !";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <title>Connect to a robot</title>
  <!-- DEBUT CSS -->
  <style type="text/css">
    /* ------- */
    /* GENERAL */
    /* ------- */
    body
    {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #1c2238;
      font-family: "Poppins", sans-serif;
    }
    /* FIN GENERAL */
    /* ----------- */
    /*  FORM GROUP */
    .main-title 
    {
      color: #c8d0f2;
      text-align: center;
      /* border-bottom: 3px solid #3498DB; */
      border-bottom: 2px solid;
      border-image-source: linear-gradient(45deg, #3498DB, #DC7633);
      border-image-slice: 1;
      margin-left: 50px;
      margin-right: 50px;
      width: auto;
      padding-bottom: 10px;
      padding-top: 15px;
      letter-spacing: 2px;
    }
    form
    {
      margin-left: 500px!important;
      margin-right: 500px!important;
      margin-top: 75px;
      width: auto!important;
      height: 460px;
      border: 2px solid;
      border-image-source: linear-gradient(45deg, #3498DB, #DC7633);
      border-image-slice: 1;
      border-radius: 10px;
      padding-left: 25px;
      padding-right: 25px;
    }
    .form-control
    {
      height: 50px;
      border: 1px solid #292f49;
      border-radius: 10px;
      background-color: #292f49;
      text-indent: 25px;
      color: white; 
    }
    .form-control:focus 
    {
      background-color: #292f49;
      color: #c8d0f2;
      border: 2px solid #DC7633;
      box-shadow: none;
    }
    #ask-admin
    {
      margin-left: 150px!important;
      margin-right: 150px!important;
      width: auto!important;
    }
    input
    {
      margin-right: 0!important;
    }
    #submit
    {
      color: white!important;
      background-color: #3498DB!important;
      border: 1px solid #3498DB!important;
      border-radius: 10px!important;
      height: 50px!important;
      font-weight: 700!important;
      letter-spacing: 1px;
      font-size: 13px!important;
      margin-left: 150px!important;
      margin-right: 150px!important;
      width: auto!important;
      padding-left: 25px;
      padding-right: 25px;
      letter-spacing: 2px;
    }
    #submit:hover 
    {
      background-color: #2E86C1!important;
    }
    label
    {
      color: #1c2238;
    }
    #error 
    {
      margin-left: 100px;
      margin-right: 100px;
      width: auto;
      text-align: center;
      padding-bottom: 20px;
    }
    /* FIN FORM GROUP */
    /* -------------- */
    /*    BACK MENU   */
    .back-menu  
    {
      margin-left: 150px!important;
      margin-right: 150px!important;
      width: auto!important;
      text-align: center!important;
      padding-top: 20px;
    }
    .back-menu a 
    {
      text-decoration: none;
      color: #3498DB;
      font-weight: bold; 
      font-size: 20px;
    }
    .back-menu a:hover 
    {
      text-decoration: underline;
    }
    /* ------------- */
    /* FIN BACK MENU */
    /* ------------- */
  </style>
  <!-- FIN CSS -->

</head>
<body>
  <div class="container-fluid main-div">
    <div class="main-title">
      <h1>RCI - Project => Connexion à un robot</h1>
    </div>
      <form action="" method="POST">
          <div class="form-group">
              <label for="pseudoconnect">Administrator</label>
              <input type="text" class="form-control" id="pseudoconnect" name="pseudoconnect" placeholder="Administrator">
          </div>
          <div class="form-group">
              <label for="idrobotconnect">Robot ID</label>
              <input type="text" class="form-control" id="idrobotconnect" name="idrobotconnect" placeholder="Robot ID">
          </div>
          <div class="form-group">
              <label for="passwordconnect">Password</label>
              <input type="password" class="form-control" id="passwordconnect" name="passwordconnect" placeholder="Password">
          </div>
          <div class="row">
            <div class="col">
              <label for="">Ajouter robot</label>
              <input id="submit" type="submit" name="connectToRobot" value="Connection">
            </div>
          </div>
          <br>
          <div id="error">
            <div class="line">
              <?php
                if(isset($erreur))
                {
                  echo '<font color="#DC7633">' . $erreur . '</font>';
                }
              ?>
            </div>
          </div>
      </form>
      <div class="back-menu">
        <a href="main.php"><i class="fas fa-home"></i> Go To Menu</a>
      </div>
  </div>
</body>
</html>
