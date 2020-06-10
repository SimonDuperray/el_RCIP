<?php
session_start();
$bdd = new PDO("mysql:host=127.0.0.1;dbname=interfacing_controller", "root", "");
if(isset($_POST['connectToRobot']))
{
  $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
  $idrobotconnect = htmlspecialchars($_POST['idrobotconnect']);
  $passwordconnect = htmlspecialchars($_POST['passwordconnect']);
  if(!empty($pseudoconnect) AND !empty($idrobotconnect) AND !empty($passwordconnect))
  {
    if($pseudoconnect == "Kartodix")
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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>Connect to a robot</title>
  <style media="screen">
    .main-div{width:600px;margin-left:auto;margin-right:auto;border:1px solid black;border-radius:5px;margin-top:15px;padding:15px;}
    .center{text-align: center;margin-bottom:10px;}
    h2{text-align:center;}
  </style>
</head>
<body>
  <div class="container-fluid main-div">
      <form action="" method="POST">
        <h2>Connect to a Robot</h2>
        <hr>
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
          <input type="submit" name="connectToRobot" value="Connection">
          <br>
          <?php
          if(isset($erreur))
          {
            echo '<font color="red">' . $erreur . '</font>';
          }
          ?>
      </form>
      <div class="center">
        <a href="main.php">Go To Menu</a>
      </div>
  </div>
</body>
</html>
