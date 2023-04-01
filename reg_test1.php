<?php 
    session_start();
    require_once "components/db_connect.php";
    //require "components/userpicupload.php";

    $showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
 
    if(isset($_POST["register"])){
        $error = false;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
  
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }     
    if(strlen($password) == 0) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }
    
    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
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
    
    //Keine Fehler, wir können den Nutzer registrieren
    if(!$error) {    
        $passwort_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO `users`(`firstname`, `lastname`) 
            VALUES ('$firstname', '$lastname')";
        $result1 = mysqli_query($connect, $sql);
        
        if($result1) {        
            echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
            $showFormular = false;
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    } 
}
//  echo $test
if($showFormular) {
?>
<!DOCTYPE html> 
<html> 
<head>
  <title>Registrierung</title>    
</head> 
<body>
 
<div class="container">
<form class="w-50" method="POST" action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME'])?>" enctype="multipart/form-data">

E-Mail:<br>
<input type="email" size="40" maxlength="250" name="email"><br><br>
 
Password:<br> 
<input type="password" size="40"  maxlength="250" name="password"><br>
 
Vorname:<br>
<input type="text" size="40" maxlength="250" name="firstname"><br><br>

Nachname:<br>
<input type="text" size="40" maxlength="250" name="lastname"><br><br>


<input type="submit" value="register">
</form>

</div>
 
<?php
} //Ende von if($showFormular)
?>
 
</body>
</html>