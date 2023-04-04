<?php 
    session_start();
    require_once "components/db_connect.php";

  //   var_dump($_SESSION);
  // die();
  if (isset($_SESSION["admin"])) {
    header("Location: dashboard.php");
  }
  //  elseif (!isset($_SESSION["user"])) {
  //   header("Location: login.php");
  // }
?>
<?php
require "components/db_connect.php";

$sql = "SELECT * FROM `users` WHERE user_id=" . $_SESSION["user"];
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
$id = $_SESSION["user"];

$body = "";
$body .= "
  <div class='container opacity_dark50 box_top5'>
    <div class='card w-100' style='width: 18rem;'>
        <div class='card-header'>
            <h1 class='titletext'>Hier ist dein Userprofil</h1>
            <a class='profiltext'>Hallo {$row["firstname"]}</a>
        </div>
        <img class='card-img-top ' src='pictures/" . $row['picture'] . "' width='150' alt='Card image cap'>
        <div class='card-body'>
        <h5 class='card-title'> </h5>
        <p class='card-text'> <br>
        <table class='table table-info table-striped w-75'>
            <tbody>
                <tr>
                    <td>Name: </td>
                    <td>{$row["firstname"]} {$row["lastname"]}</td>
                </tr>
                <tr>
                    <td>email: </td>
                    <td> {$row["email"]}</td>
                </tr>
                <tr>
                <td>Adress: </td>
                <td>{$row["address"]} </td>
                </tr>
                <tr>
                    <td>Phone: </td>
                    <td> {$row["phone"]}</td>
                </tr>
            

            </tbody>
        </table>
        
        <a href='logout.php?logout' class='btn btn-warning'>Logout</a>

        </div>
    </div>
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
  <title>animal Farm Pets</title>
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
        <a class="nav-link" href="displayanimals.php" id="senior">test</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
    </li>
</ul>
<!-- Menu End -->

  <div class="container">
    <?php
    echo $body;
    ?>
</div>



  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="./scripts.js"></script>
</body>
</html>