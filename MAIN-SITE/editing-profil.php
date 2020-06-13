<?php
session_start();
$bdd = new PDO("mysql:host=127.0.0.1;dbname=interfacing_controller", "root", "");
if(isset($_SESSION['id']))
{
  $reqrobot = $bdd->prepare("SELECT * FROM test_robots WHERE id = ?");
  $reqrobot->execute(array($_SESSION['id']));
  $robot = $reqrobot->fetch();
  if(isset($_POST['newidrobot']) AND !empty($_POST['newidrobot']) AND $_POST['newidrobot'] != $robot['idrobot'])
  {
    $newidrobot = htmlspecialchars($_POST['newidrobot']);
    $insertidrobot = $bdd->prepare("UPDATE test_robots SET idrobot = ? WHERE id = ?");
    $insertidrobot->execute(array($newidrobot, $_SESSION['id']));
    header("Location: profil.php?id=".$_SESSION['id']);
  }
  if(isset($_POST['newipesp']) AND !empty($_POST['newipesp']) AND $_POST['newipesp'] != $robot['ipesp'])
  {
    $newipesp = htmlspecialchars($_POST['newipesp']);
    $insertipesp = $bdd->prepare("UPDATE test_robots SET ipesp = ? WHERE id = ?");
    $insertipesp->execute(array($newipesp, $_SESSION['id']));
    header("Location: profil.php?id=".$_SESSION['id']);
  }
  if(isset($_POST['newpassword']) AND !empty($_POST['newpassword']) AND isset($_POST['newpassword2']) AND !empty($_POST['newpassword2']))
  {
    $password = htmlspecialchars($_POST['newpassword']);
    $password2 = htmlspecialchars($_POST['newpassword2']);
    if($password == $password2)
    {
      $insertpassword = $bdd->prepare("UPDATE test_robots SET password = ? WHERE id = ?");
      $insertpassword->execute(array($password, $_SESSION['id']));
      header("Location: profil.php?id=".$_SESSION['id']);
    }
    else
    {
      $msg = "Vos deux mots de passe ne correspondent pas !";
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
  <title>EditionProfil</title>
  <style>
    body 
    {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #1c2238;
      font-family: "Poppins", sans-serif;
      color: white;
    }
    .main-title 
    {
      color: #c8d0f2;
      text-align: center;
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
      height: 400px;
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
      margin-left: 170px!important;
      margin-right: 130px!important;
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
      margin-left: 130px;
      margin-right: 130px;
      width: auto;
      text-align: center;
      padding-bottom: 20px;
      color: #DC7633;
      padding-bottom: 0;
    }
  </style>
</head>
<body>
  <div class="container-fluid main-div">
    <div class="main-title">
      <h1>RCI - Project => Edition du profil</h1>
    </div>
    <form action="" method="POST">
      <div class="row">
        <div class="col">
          <label style="color: #c8d0f2;padding-top: 25px;margin-left: 15px;" for="">New Robot ID:</label>
          <input class="form-control" type="text" name="newidrobot" placeholder="New Robot ID" value="<?php echo $robot["idrobot"]; ?>"><br><br>
        </div>
        <div class="col">
          <label style="color: #c8d0f2;padding-top: 25px;margin-left: 15px;" for="">New IP ESP</label>
          <input class="form-control" type="text" name="newipesp" placeholder="New IP ESP" value="<?php echo $robot['ipesp'];?>"><br><br>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="">New password: </label>
          <input class="form-control" type="password" name="newpassword" placeholder="Password"><br><br>
        </div>
        <div class="col">
          <label for="">Confirm new password: </label>
          <input class="form-control" type="password" name="newpassword2" placeholder="Confirm password"><br><br>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="">Changer</label>
          <input id="submit" type="submit" value="Update Robot profil">
        </div>
      </div>
      <br>
      <div id="error">
        <div class="line">
        </div>
      </div>
      <div id="error">
        <?php if(isset($msg)) { echo $msg; } ?>
      </div>
    </form>
  </div>
</body>
</html>
<?php
}
else
{
    header("Location: connectToRobot.php");
}
?>
