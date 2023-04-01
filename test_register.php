<?php 
      require_once "components/db_connect.php";
      require_once "components/userpicupload.php";


        // wenn user oder adm bereits angemeldet sind, werden diese auf Unterseiten umgeleitet
      session_start();
     
    //   if(isset($_SESSION["user"])){
    //     header("Location: userhome.php");
    //   }
    //   if(isset($_SESSION["adm"])){
    //     header("Location: dashboard.php");
    //   }
    if(isset($_POST["register"])){
        $firstname = ($_POST["firstname"]);
        $lastname = $_POST["lastname"];
        $password = $_POST["password"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        
        
        $picture = file_upload($_FILES["picture"]);


          $sql = "INSERT INTO `users`(`firstname`, `lastname`, `address`,`phone`,`password`, `email`, `picture`) 
          VALUES ('$firstname','$lastname', '$address','$phone','$password','$email','$picture->fileName') ";
          $res = mysqli_query($connect, $sql);
          if($res){
            // $errType = "success";
            // $errMsg = "Erfolgreich registriert!! Sie können sich nun einloggen";
            $username = "";
            $email = "";
            // $uploadError = ($picture >$error != 0 ) ? $picture->ErrorMessage : "";
          }else{
            $errType = "danger";
          // $errMsg = "something went wrong, try again later!!";
          // $uploadError = ($picture >$error != 0 ) ? $picture->ErrorMessage : ""; 
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
  <link rel="stylesheet" href="css/beisl23.css">
  <link rel="stylesheet" href="css/bootstrap.css">

  <!-- Title -->
</head>
<body>

 <!-- Hauptmenü oben  -->
 <nav class="nav nav-pills flex-column flex-sm-row opacity_dark50">
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="speisekarte.php">Speisekarte</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="wochenkarte.php">Wochenkarte</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="kontakt.php">Kontakt&Öffnungszeiten</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="dashboard.php" tabindex="-1" aria-disabled="true">Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true">Login</a>
  </li>
</ul>
</nav>
<!-- Ende Hauptmenü  -->
 
<!-- Hier die Box für die Registrierung -->
<div class="loginbox opacity_dark50 box_top5 w-50">
            <h1 class="title_hours">Registrieren Sie Ihren Zugang</h1>
           
            
                <form class="w-50" method="POST" action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME'])?>" enctype="multipart/form-data">
                      <input type="text" placeholder="Bitte den gewünschten vorname einfügen" class="form-control" name="firstname" value="">
                      <input type="text" placeholder="Bitte den gewünschten nachname einfügen" class="form-control" name="lastname" value="">

                      <input type="email" placeholder="Bitte Ihre email-Adresse einfügen" class="form-control" name="email" value="">
                      <input type="file" placeholder="Bitte Bild einfügen" class="form-control" name= "picture">
                      <input type="password" placeholder="Bitte Passwort einfügen" class="form-control" name= "password">
                      <input type="submit" class="form-control" name="register" value="Register">
                      <input type="text" placeholder="Bitte den adresse einfügen" class="form-control" name="address" value="">
                      <input type="text" placeholder="Bitte den gewünschten telefon einfügen" class="form-control" name="phone" value="">


                </form>
</div> 
<!-- Menü unten im Footer-Bereich -->
<div class="nav nav-pills flex-column  d-flex opacity_dark50 fixed-bottom">
        <ul class="nav nav-pills justify-content-end d-flex">
          <li class="nav-item">
            <a class="nav-link" aria-current="datenschutz.php" href="datenschutz.php">DatenXXschutz</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Impressum.php">Impressum</a>
          </li>
      </ul>
</div>
<!-- Ende Footer-Menü -->


  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="./scripts.js"></script>
</body>
</html>