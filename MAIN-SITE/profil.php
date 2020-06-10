<?php
session_start();
$bdd = new PDO("mysql:host=127.0.0.1;dbname=interfacing_controller", "root", "");
if(isset($_GET['id']) AND $_GET['id'] > 0)
{
  $getid = intval($_GET['id']);
  $reqrobot = $bdd->prepare("SELECT * FROM test_robots WHERE id = ?");
  $reqrobot->execute(array($_GET['id']));
  $robotinfo = $reqrobot->fetch();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>Robot Profil</title>
</head>
<body>
  <div>
    <h2>Robot <?php echo $robotinfo['idrobot'];?></h2>
    <br><br>
    ID Robot: <?php echo $robotinfo['idrobot'];?>
    <br>
    Password Robot: <?php echo $robotinfo['password'];?>
    <br>
    Corresponding IP ESP: <?php echo $robotinfo['ipesp'];?>
    <br>
    <?php
    if(isset($_SESSION['id']) AND $robotinfo['id'] == $_SESSION['id'])
    {
    ?>
    <br>
    <a href="<?php echo "http://". $robotinfo['ipesp']."/"?>">Control Robot</a>
    <br>
    <a href="editing-profil.php">Change caracteristics</a>
    <br>
    <a href="deconnexion.php">Disconnect</a>
    <?php
    }
    ?>
  </div>
</body>
</html>
<?php
}
?>
