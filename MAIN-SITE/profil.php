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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <title>Robot Profil</title>
  <style>
    /* GENERAL */
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
    /*    NAVBAR   */
    .main-navbar
    {
        background-color: #292f49;
        position: fixed;
        width: 300px;
        height: 100vh;
    }
    .main-navbar #title-navbar h2
    {
        color: #c8d0f2;
        margin: 50px 60px 10px 20px;
        width: auto;
        text-align: center;
    }
    .main-navbar #title-navbar h2:hover
    {
        cursor: pointer;
    }
    .main-navbar .nav
    {
        margin: 50px 30px 0 30px;
        width: auto;
    }
    .main-navbar li a 
    {
        color: #c8d0f2;
        padding: 20px;
        border-bottom: 1px solid #3498DB;
    }
    .main-navbar li a:hover
    {
        color: #3498DB;
        border-bottom: 1px solid #4b5686;
    }
    /* FIN NAVBAR */
    /* ---------- */
    /*    PRES    */
    #rcip-title
    {
        margin-left: 350px;
        margin-right: 50px;
        width: auto;
        color: #c8d0f2;
        font-size: 45px;
        text-align: center;
        padding-top: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid;
        border-image-source: linear-gradient(45deg, #3498DB, #DC7633);
        border-image-slice: 1;
    }
    .main-pres
    {
        margin-left: 400px;
        margin-right: 100px;
        width: auto;
        /* color: #4b5686; */
        color: white;
        border: 2px solid;
        border-image-source: linear-gradient(45deg, #3498DB, #DC7633);
        border-image-slice: 1;
        margin-top: 150px;
    }
    .main-pres h2
    {
      color: #c8d0f2;
      text-align: center;
      padding-top: 10px;
    }
    .main-pres ul 
    {
      list-style: none;
    }
    .main-pres ul li 
    {
      padding-top: 10px;
      padding-bottom: 10px;
      font-size: 17px;
    }
    /* FIN PRES */
    /* -------- */
  </style>
</head>
<body>
  <!-- NAVBAR -->
  <div class="main-navbar">
    <div id="title-navbar">
      <h2>RCI-Project</h2>
    </div>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="<?php echo "http://". $robotinfo['ipesp']."/"?>">Contrôler le robot</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="editing-profil.php">Changer les caractéristiques</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="deconnexion.php">Deconnexion</a>
      </li>
    </ul>
  </div>
  <!-- FIN NAVBAR -->
  <!-- ---------- -->
  <!-- PRESENTATION --> 
  <h5 id="rcip-title">RCI - Project => Robot <?php echo $robotinfo['idrobot'];?></h5>
  <div class="main-pres">
    <h2>Caractéristiques Actuelles</h2>
    <br>
    <ul class="current-car">
      <li>
        ID Robot: <?php echo $robotinfo['idrobot'];?>
      </li>
      <li>
        Password: <?php echo $robotinfo['password'];?>
      </li>
      <li>
        ESP IP: <?php echo $robotinfo['ipesp'];?>
      </li>
    </ul>
    <?php
    if(isset($_SESSION['id']) AND $robotinfo['id'] == $_SESSION['id'])
    {
    ?>
    <?php
    }
    ?>
  </div>
  <!-- FIN PRESENTATION -->
</body>
</html>
<?php
}
?>