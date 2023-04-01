<?php 
      require_once "components/db_connect.php";
    //   require_once "components/usermedia_file_upload.php";


        // wenn user oder adm bereits angemeldet sind, werden diese auf Unterseiten umgeleitet
      session_start();
     
      if(isset($_SESSION["user"])){
        header("Location: userhome.php");
      }
      if(isset($_SESSION["adm"])){
        header("Location: dashboard.php");
      }
      function cleanInput($param){
        $clean = trim($param);
        $clean = strip_tags($param);
        $clean = htmlspecialchars($param);

        return $clean;
      }

      $firstnameError = $lastnameError = $passError = $firstname = $lastname = $addressError = $phone = $email = $password = "";
      $firstname = $lastname = $password = $address = $phone = $email = "";
      if(isset($_POST["register"])){
        $firstname = cleanInput($_POST["firstname"]);
        $lastname = cleanInput($_POST["lastname"]);
        $adress = cleanInput($_POST["address"]);
        $phone = cleanInput($_POST["phone"]);
        $password = cleanInput($_POST["password"]);
        $email = cleanInput($_POST["email"]);
        
        $error = false;

        // Validation of $firstname
        if(empty($firstname)){
          $error = true;
          $firstnameError ="Bitte firstnamen einfügen!";
        }elseif(strlen($firstname) < 3){
          $error = true;
          $firstnameError ="Der Name muss aus mindestens 3 Zeichen bestehen!";
        }elseif(!preg_match("/^[a-zA-Z]+$/", $firstname)){
          $error = true;
          $firstnameError ="Bitte nur Zeichen aus dem Alphabet eingeben!";
        }
        if(empty($lastname)){
            $error = true;
            $lastnameError ="Bitte firstnamen einfügen!";
          }elseif(strlen($lastname) < 3){
            $error = true;
            $lastnameError ="Der Name muss aus mindestens 3 Zeichen bestehen!";
          }elseif(!preg_match("/^[a-zA-Z]+$/", $firstname)){
            $error = true;
            $lastnameError ="Bitte nur Zeichen aus dem Alphabet eingeben!";
          }
          if(empty($address)){
            $error = true;
            $addressError ="Bitte firstnamen einfügen!";
          }elseif(strlen($address) < 3){
            $error = true;
            $addressError ="Der Name muss aus mindestens 3 Zeichen bestehen!";
          }elseif(!preg_match("/^[a-zA-Z]+$/", $address)){
            $error = true;
            $addressError ="Bitte nur Zeichen aus dem Alphabet eingeben!";
          }
        // $firstname Validation END
        if(empty($phone)){
            $error = true;
            $phoneError ="Bitte firstnamen einfügen!";
          }elseif(strlen($phone) < 3){
            $error = true;
            $phoneError ="Der Name muss aus mindestens 3 Zeichen bestehen!";
          }elseif(!preg_match("/^[a-zA-Z]+$/", $firstname)){
            $error = true;
            $phoneError ="Bitte nur Zeichen aus dem Alphabet eingeben!";
          }

        // Validation of email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $error = true;
          $emailError = "Bitte eine korrekte email eingeben!";
        }else{
          $sql = "Select email from users where email = '$email'";
          $result = mysqli_query($connect, $sql);
          if(mysqli_num_rows($result) != 0){
            $error = true;
            $emailError = "Diese email ist bereits in unserem System!";
          }
        }
        if(empty($password)){
          $error = true;
          $passError = "Bitte Passwort eingeben!";
        }elseif(strlen($password) < 6){
          $error = true;
          $passError = "Passwort muss aus mindestens 6 Zeichen bestehen";
        }

        $password = hash("sha256", $password);

        $picture = file_upload($_FILES["picture"]);

        if(!$error){
          $sql = "INSERT INTO `users`(`lastname`, `password`, `email`, `picture`) 
          VALUES ('$lastname','$password','$email','$picture->fileName') ";
          $res = mysqli_query($connect, $sql);
          if($res){
            $errType = "success";
            $errMsg = "Erfolgreich registriert!! Sie können sich nun einloggen";
            $firstname = "";
            $email = "";
            $uploadError = ($picture >$error != 0 ) ? $picture->ErrorMessage : "";
          }else{
            $errType = "danger";
          $errMsg = "something went wrong, try again later!!";
          $uploadError = ($picture >$error != 0 ) ? $picture->ErrorMessage : ""; 
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
            <?php
              if(isset($errMsg)){
              ?>
                <div class = "alert alert-<?= $errType ?>" role="alert">
                  <?= $errMsg ?> 
                  <?= $uploadError ?> 

                </div> 
                
                <?php 
              }
            ?>
            
                <form class="w-50" method="POST" action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME'])?>" enctype="multipart/form-data">
                <input type="text" placeholder="Bitte Ihren Vornamen einfügen" class="form-control" name="firstname" value="<?= $firstname ?>">
                            <span class="text-danger"><?= $firstnameError ?></span class="text-danger">
                            <input type="text" placeholder="Bitte Ihren Nachnamen einfügen" class="form-control" name="lastname" value="<?= $lastname ?>">
                            <span class="text-danger"><?= $lastnameError ?></span class="text-danger">
                        <input type="email" placeholder="Bitte Ihre email-Adresse einfügen" class="form-control" name="email" value="<?= $email ?>">
                        <span class="text-danger"><?= $emailError ?></span class="text-danger">
                        <input type="file" placeholder="Bitte Bild einfügen" class="form-control" name= "picture">
                        <input type="password" placeholder="Bitte Passwort einfügen" class="form-control" name= "password">
                        <span class="text-danger"><?= $passError ?></span class="text-danger">
                        <input type="text" placeholder="Bitte Ihre Telefonnummer einfügen" class="form-control" name="phone" value="<?= $phone ?>">
                        <span class="text-danger"><?= $teleError ?></span class="text-danger">
                        <input type="text" placeholder="Bitte Ihren Adresse einfügen" class="form-control" name="address" value="<?= $address ?>">
                        <span class="text-danger"><?= $addressError ?></span class="text-danger">

                        <input type="submit" class="form-control" name="register" value="Register">

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