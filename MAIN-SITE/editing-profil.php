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
  <title>SignUp</title>
  <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <div align="center">
      <h2>Edition de mon profil</h2>
      <div align="left">
          <form action="" method="POST">
              <label for="">New Robot ID:</label>
              <input type="text" name="newidrobot" placeholder="New Robot ID" value="<?php echo $robot["idrobot"]; ?>"><br><br>
              <label for="">IP ESP</label>
              <input type="text" name="newipesp" placeholder="New IP ESP" value="<?php echo $robot['ipesp'];?>"><br><br>
              <label for="">New password: </label>
              <input type="password" name="newpassword" placeholder="Password"><br><br>
              <label for="">Confirm new password: </label>
              <input type="password" name="newpassword2" placeholder="Confirm password"><br><br>
              <input type="submit" value="Update Robot profil">
          </form>
          <?php if(isset($msg)) { echo $msg; } ?>
      </div>
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
