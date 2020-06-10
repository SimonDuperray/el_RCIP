<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=interfacing_controller", "root", "");
if(isset($_POST['deleteRobot']))
{
  
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>DeleteRobot</title>
</head>
<body>
  <div class="container-fluid main-div">
      <form action="" method="POST">
        <h2>Delete a Robot from de the DataBase</h2>
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
              <label for="ip">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php if(isset($password)){echo $password;}?>">
          </div>
          <input type="submit" name="deleteRobot" value="Add New Robot">
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
