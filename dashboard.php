<?php
    session_start();

    // if(isset($_SESSION["user"])){
    //   header("Location: userhome.php");
    // }
    if(isset($_SESSION["admin"])){
      header("Location: dashboard.php");
    }




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta Tags -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSS Files Links -->
  <link rel="stylesheet" href="css/bootstrap.css">

  <!-- Title -->
  <title>Simple Page</title>
</head>
<body>
  
<!-- Menu Part -->
  <ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
    </li>
</ul>
<!-- Menu End -->

 <div class="container">
        <button type="button" class="btn btn-primary">Edit Animals</button>
        <button type="button" class="btn btn-primary">See users</button>
        <button type="button" class="btn btn-primary"><a href="seeanimals.php">see animals</a></button>
        <button type="button" class="btn btn-primary">Edit users</button>
</div>




  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="./scripts.js"></script>
</body>
</html>