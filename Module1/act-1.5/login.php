<?php include('utils.php') ?>
<?php
    if(isset($_SESSION['logged_user'])){
      header('Location:'.$rootUrl.'index.php');
  }
    if (isset($_POST['email']) && isset($_POST['password'])) {
      login($_POST['email'],$_POST['password']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>login</title>
</head>
<body>
<?php include('header.php') ?>

<form class="container" action="" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Email address</label>
    <input type="email" name="email" value="<?php echo $_COOKIE['email']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" value="<?php echo $_COOKIE['password']?>" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-check">
    <input type="checkbox" name="ident"  class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Retenir mon identifiant</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button><br>
  <a href="register.php">Créer un compte ?</a>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>


