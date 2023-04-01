<?php
session_start(); // start a new session or continues the previous
if (isset($_SESSION['user']) != "") {
    header("Location: home.php"); // redirects to home.php
}
if (isset($_SESSION['adm']) != "") {
    header("Location: dashboard.php"); // redirects to home.php
}
require_once 'components/db_connect.php';
// require_once 'components/usermedia_upload.php';
function cleanInput($param){
    $clean = trim($param);
        $clean = strip_tags($clean);
        $clean = htmlspecialchars($clean);
        
        return $clean;

  }
$error = false;
$firstname = $lastname = $email = $date_of_birth = $password = $picture = '';
$firstnameError = $lastnameError = $emailError = $dateError = $passError = $picError = '';
if (isset($_POST['register'])) {

   

    $uploadError = '';
    $picture = file_upload($_FILES['picture']);

    // basic name validation
    if (empty($firstname) || empty($lastname)) {
        $error = true;
        $firstnameError = "Please enter your full name and surname";
    } else if (strlen($firstname) < 3 || strlen($lastname) < 3) {
        $error = true;
        $firstnameError = "Name and surname must have at least 3 characters.";
    } else if (!preg_match("/^[a-zA-Z]+$/", $firstname) || !preg_match("/^[a-zA-Z]+$/", $lastname)) {
        $error = true;
        $firstnameError = "Name and surname must contain only letters and no spaces.";
    }

    // basic email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email address.";
    } else {
        // checks whether the email exists or not
        $query = "SELECT email FROM users WHERE email='$email'";
        $result = mysqli_query($connect, $query);
        $count = mysqli_num_rows($result);
        if ($count != 0) {
            $error = true;
            $emailError = "Provided Email is already in use.";
        }
    }
    // checks if the date input was left empty
    if (empty($date_of_birth)) {
        $error = true;
        $dateError = "Please enter your date of birth.";
    }
    // password validation
    if (empty($pass)) {
        $error = true;
        $passError = "Please enter password.";
    } else if (strlen($pass) < 6) {
        $error = true;
        $passError = "Password must have at least 6 characters.";
    }

    // password hashing for security
    $password = hash('sha256', $pass);
    // if there's no error, continue to signup
    if (!$error) {

        $sql = "INSERT INTO `users`(`firstname`, `email`, `password`) 
            VALUES ('$firstname',  '$email', '$password')";
            $res = mysqli_query($connect, $sql);
        if ($res) {
            $errTyp = "success";
            $errMSG = "Successfully registered, you may login now";
            $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later...";
            $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
        }
    }
}

mysqli_close($connect);
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
                      <input type="text" placeholder="Bitte den gewünschten firstnamen einfügen" class="form-control" name="firstname" value="<?= $firstname ?>">
                      <span class="text-danger"><?= $firstnameError ?></span class="text-danger">
                      <input type="email" placeholder="Bitte Ihre email-Adresse einfügen" class="form-control" name="email" value="<?= $email ?>">
                      <span class="text-danger"><?= $emailError ?></span class="text-danger">
                      <input type="file" placeholder="Bitte Bild einfügen" class="form-control" name= "picture">
                      <input type="password" placeholder="Bitte Passwort einfügen" class="form-control" name= "password">
                      <span class="text-danger"><?= $passError ?></span class="text-danger">
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