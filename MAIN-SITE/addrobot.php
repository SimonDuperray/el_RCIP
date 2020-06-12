<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=interfacing_controller", "root", "");
if(isset($_POST['addRobot']))
{
  $admin = "Kartodix";
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $idrobot = htmlspecialchars($_POST['idrobot']);
  $idrobot2 = htmlspecialchars($_POST['idrobot2']);
  $ip = htmlspecialchars($_POST['ip']);
  $ip2 = htmlspecialchars($_POST['ip2']);
  $password = htmlspecialchars($_POST['password']);
  $password2 = htmlspecialchars($_POST['password2']);
  if(!empty($_POST['pseudo']) AND !empty($_POST['idrobot']) AND !empty($_POST['idrobot2']) AND !empty($_POST['ip']) AND !empty($_POST['ip2']) AND !empty($_POST['password']) AND !empty($_POST['password2']))
  {
    if($pseudo == $admin)
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <!-- DEBUT CSS -->
  <title>AddRobot</title>
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
      margin-left: 400px!important;
      margin-right: 400px!important;
      margin-top: 75px;
      width: auto!important;
      height: 470px;
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
    <!-- ---------- -->
    <!-- MAIN TITLE -->
    <!-- ---------- -->
    <div class="main-title">
      <h1>RCI - Project => Ajout d'un robot</h1>
    </div>
    <!-- -------------- -->
    <!-- END MAIN TITLE -->
    <!-- -------------- -->
    <form action="" method="POST">
      <div class="row">
        <div id="ask-admin" class="col">
          <label for="pseudo">Administrator</label>
          <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Administrator" value="<?php if(isset($pseudo)){echo $pseudo;}?>">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="idrobot">Robot ID</label>
          <input type="text" class="form-control" id="idrobot" name="idrobot" placeholder="Robot ID" value="<?php if(isset($idrobot)){echo $idrobot;}?>">
        </div>
        <div class="col">
          <label for="idrobot2">Confirm Robot ID</label>
          <input type="text" class="form-control" id="idrobot2" name="idrobot2" placeholder="Confirm Robot ID" value="<?php if(isset($idrobot2)){echo $idrobot2;}?>">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="ip">IP ESP</label>
          <input type="text" class="form-control" id="ip" name="ip" placeholder="IP ESP" value="<?php if(isset($ip)){echo $ip;}?>">
        </div>
        <div class="col">
          <label for="ip2">Confirm IP ESP</label>
          <input type="text" class="form-control" id="ip2" name="ip2" placeholder="Confirm IP ESP" value="<?php if(isset($ip2)){echo $ip2;}?>">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="ip">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php if(isset($password)){echo $password;}?>">
        </div>
        <div class="col">
          <label for="password2">Confirm Password</label>
          <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password" value="<?php if(isset($password2)){echo $password2;}?>">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col">
          <label for="">Ajouter robot</label>
          <input id="submit" type="submit" name="addRobot" value="Add New Robot">
        </div>
      </div>
      <br>
      <div id="error">
      <div class="line">
        <?php
          if(isset($erreur))
          {
            echo '<font color="#3498DB">' . $erreur . '</font>';
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