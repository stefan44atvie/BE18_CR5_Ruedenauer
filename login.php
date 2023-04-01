<?php
    session_start();

    if(isset($_SESSION["user"])){
      header("Location: userhome.php");
    }
    if(isset($_SESSION["adm"])){
      header("Location: dashboard.php");
    }

require_once "components/db_connect.php";

    function cleanInput($param){
        $clean = trim($param);
        $clean = strip_tags($param);
        $clean = htmlspecialchars($param);

        return $clean;
      }

    if(isset($_POST["login"])){
        $error = false;

        $email = cleanInput($_POST["email"]);
        $password = cleanInput($_POST["password"]);
        
         // Validation of email
         if(empty($email)){
            $error = true;
            $emailError = "Plase enter email!";
         }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = true;
            $emailError = "Enter valid email";
         }
         if(empty($password)){
            $error = true;
            $passError = "Please enter password";
         }

         if(!$error){
            //$password = hash("sha256", $password);

            $sql = "Select * from users where email = '$email' and password ='$password'";
            $result = mysqli_query($connect, $sql);
            var_dump($result);
            die();
            $count = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);
            if($count == 1){
                if($row["status"] =="adm"){
                  $_SESSION["adm"] = $row["id"];
                  header ("Location: dashboard.php"); 
                }else{
                  $_SESSION["user"] =$row["id"];
                  header ("Location: userhome.php");
                }

            }
         }
  
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
 
  <!-- Meta Tags -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Fonts Links (Roboto 400, 500 and 700 included) -->
 
  <!-- CSS Files Links -->
  <link rel="stylesheet" href="css/bootstrap.css">

  <!-- Title -->
</head>
<body>

 <!-- Hauptmenü oben  -->
 <nav class="nav nav-pills flex-column flex-sm-row opacity_dark50">
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="index.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="speisekarte.php">Speisekarte</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="wochenkarte.php">Wochenkarte</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="kontakt.php">Kontakt&Öffnungszeiten</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="dashboard.php" tabindex="-1" aria-disabled="true">Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="login.php" tabindex="-1" aria-disabled="true">Login</a>
  </li>
</ul>
</nav>
<!-- Ende Hauptmenü  -->
 
<div class="loginbox opacity_dark50 box_top5">

<form class="w-50" method="POST" action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME'])?>" enctype="multipart/form-data">

                <h1 class="title_hours">LOGIN</h1>
                  <span class="text-danger"><?= $usernameError ?></span class="text-danger">
                  <input type="email" placeholder="Bitte Ihre email-Adresse einfügen" class="form-control" name="email" value="<?= $email ?>">
                  <span class="text-danger"><?= $emailError ?></span class="text-danger">
                  <input type="password" placeholder="Bitte Passwort einfügen" class="form-control" name= "password">
                  <span class="text-danger"><?= $passError ?></span class="text-danger">
                  <input type="submit" class="form-control" name="login" value="Einloggen">


                </form>
    
</div> 
<!-- Menü unten im Footer-Bereich -->

<!-- Ende Footer-Menü -->



  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="./scripts.js"></script>
</body>
</html>