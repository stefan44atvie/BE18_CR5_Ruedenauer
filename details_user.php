<?php


    require_once "components/db_connect.php";
    $id=$_GET["id"];    
    // var_dump($id);
    // die();
    $sql="select * from `users` where user_id = $id";

    $result = mysqli_query($connect, $sql);
    $row=mysqli_fetch_assoc($result);

    $body = "";
    $body.="
    <div class=''card' style='width: 18rem;'>
    <img class='card-img-top ' src='pictures/" .$row['picture']."' width='100' alt='Card image cap'
    <div class='card-body'>
      <h5 class='card-title'>{$row["firstname"]} {$row["lastname"]}</h5>
      <p class='card-text'>
            <p>email: {$row['email']}</p>
            <p>Address: {$row["address"]}</p>
            <p>Phone: {$row["phone"]}</p>
      
      </p>
      <a href='listusers.php' class='btn btn-success' tabindex='-1' role='button' >Back to list</a>
      <a href='update_user.php?id={$row["user_id"]}' class='btn btn-success' tabindex='-1' role='button' >Update</a>
      <a href='delete_user.php?userid={$row["user_id"]}' class='btn btn-danger'>Delete</a>    </div>
  </div>
        ";



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
        <a class="nav-link active" aria-current="page" href="home.php">available animals</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="displayanimals.php?age=2" id="senior">Senior animals</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="displayanimals.php?age=4" id="senior">Junior animals</a>
    </li>
     <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
    </li>
</ul>
<!-- Menu End -->
<div class="container">
        <a href='createanimal.php' class='btn btn-warning'>Create animal</a>
        <a href='listanimals.php' class='btn btn-warning'>List all animals</a>
        <a href='listusers.php' class='btn btn-warning'>List all users</a>
        <a href='logout.php?logout' class='btn btn-warning'>Logout</a>
        
</div>
 
<?php
    echo $body;
?>
  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="./scripts.js"></script>
</body>
</html>