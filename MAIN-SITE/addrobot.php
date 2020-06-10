<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=interfacing_controller", "root", "");
if(isset($_POST['addRobot']))
{
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $idrobot = htmlspecialchars($_POST['idrobot']);
  $idrobot2 = htmlspecialchars($_POST['idrobot2']);
  $ip = htmlspecialchars($_POST['ip']);
  $ip2 = htmlspecialchars($_POST['ip2']);
  $password = htmlspecialchars($_POST['password']);
  $password2 = htmlspecialchars($_POST['password2']);
  if(!empty($_POST['pseudo']) AND !empty($_POST['idrobot']) AND !empty($_POST['idrobot2']) AND !empty($_POST['ip']) AND !empty($_POST['ip2']) AND !empty($_POST['password']) AND !empty($_POST['password2']))
  {
    if($pseudo == "Kartodix")
    {
      if(strlen($idrobot) < 256)
      {
        if($idrobot == $idrobot2)
        {
          $reqid = $bdd->prepare("SELECT * FROM test_robots WHERE idrobot = ?");
          $reqid->execute(array($idrobot));
          $idexist = $reqid->rowCount();
          if($idexist == 0)
          {
            if($ip == $ip2)
            {
              $reqipesp = $bdd->prepare("SELECT * FROM test_robots WHERE ipesp = ?");
              $reqipesp->execute(array($ip));
              $ipespexist = $reqipesp->rowCount();
              if($ipespexist == 0)
              {
                if($password == $password2)
                {
                  $insertrobot = $bdd->prepare("INSERT INTO test_robots (idrobot, ipesp, password) VALUES (?, ?, ?)");
                  $insertrobot->execute(array($idrobot, $ip, $password));
                  $erreur = "Le robot a bien été ajouté à la base de données ! <a href=\"connectToRobot.php\">Se connecter</a>";
                }
                else
                {
                  $erreur = "Les password ne correspondent pas !";
                }
              }
              else
              {
                $erreur = "L'ip est déjà enregistrée !";
              }
            }
            else
            {
              $erreur = "Les ip ne correspondent pas !";
            }
          }
          else
          {
            $erreur = "Le robot est déjà enregistré !";
          }
        }
        else
        {
          $erreur = "Les id ne correspondent pas !";
        }
      }
      else
      {
        $erreur = "L'id du robot est trop long !";
      }
    }
    else
    {
      $erreur = "Vous n'avez pas la permission d'ajouter un robot !";
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
  <title>Add A Robot</title>
  <style media="screen">
    .main-div{width:600px;margin-left:auto;margin-right:auto;border:1px solid black;border-radius:5px;margin-top:15px;padding:15px;}
    .center{text-align: center;margin-bottom:10px;}
    h2{text-align:center;}
  </style>
</head>
<body>
  <div class="container-fluid main-div">
      <form action="" method="POST">
        <h2>Add New Robot in the DataBase</h2>
        <hr>
          <div class="form-group">
              <label for="pseudo">Administrator</label>
              <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Administrator" value="<?php if(isset($pseudo)){echo $pseudo;}?>">
          </div>
          <div class="form-group">
              <label for="idrobot">Robot ID</label>
              <input type="text" class="form-control" id="idrobot" name="idrobot" placeholder="Robot ID" value="<?php if(isset($idrobot)){echo $idrobot;}?>">
          </div>
          <div class="form-group">
              <label for="idrobot2">Confirm Robot ID</label>
              <input type="text" class="form-control" id="idrobot2" name="idrobot2" placeholder="Robot ID" value="<?php if(isset($idrobot2)){echo $idrobot2;}?>">
          </div>
          <div class="form-group">
              <label for="ip">IP ESP</label>
              <input type="text" class="form-control" id="ip" name="ip" placeholder="IP ESP" value="<?php if(isset($ip)){echo $ip;}?>">
          </div>
          <div class="form-group">
              <label for="ip2">Confirm IP ESP</label>
              <input type="text" class="form-control" id="ip2" name="ip2" placeholder="Confirm IP ESP" value="<?php if(isset($ip2)){echo $ip2;}?>">
          </div>
          <div class="form-group">
              <label for="ip">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php if(isset($password)){echo $password;}?>">
          </div>
          <div class="form-group">
              <label for="password2">Confirm Password</label>
              <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password" value="<?php if(isset($password2)){echo $password2;}?>">
          </div>
          <input type="submit" name="addRobot" value="Add New Robot">
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
