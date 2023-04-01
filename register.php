<?php 
      require_once "components/db_connect.php";
      require_once "components/userpicupload.php";


        // wenn user oder adm bereits angemeldet sind, werden diese auf Unterseiten umgeleitet
    //   session_start();
     
    //     if(isset($_SESSION["user"])){
    //         header("Location: userhome.php");
    //     }
    //     if(isset($_SESSION["adm"])){
    //         header("Location: dashboard.php");
    //     }
      function cleanInput($param){
        $clean = trim($param);
        $clean = strip_tags($param);
        $clean = htmlspecialchars($param);

        return $clean;
      }

      $firstnameError = $lastnameError = $passError = $firstname = $lastname = $addressError = $phone = $email = $password = "";
      if(isset($_POST["register"])){
        $firstname = cleanInput($_POST["firstname"]);
        $lastname = cleanInput($_POST["lastname"]);
        $password = cleanInput($_POST["password"]);
        $address = $_POST["address"];
        $phone = cleanInput($_POST["phone"]);
        $email = cleanInput($_POST["email"]);

        $error = false;

            // Validation of $username
            if(empty($lastname)){
            $error = true;
            $lastnameError ="Bitte Nachnamen einfügen!";
            }elseif(strlen($lastname) < 3){
            $error = true;
            $lastnameError ="Der Name muss aus mindestens 3 Zeichen bestehen!";
            }elseif(!preg_match("/^[a-zA-Z]+$/", $lastname)){
            $error = true;
            $lastnameError ="Bitte nur Zeichen aus dem Alphabet eingeben!";
            }
            // $username Validation END
            
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

            // $picture = file_upload($_FILES["picture"]);
            // var_dump($address);
            // die();
            if(!$error){
            $sql = "INSERT INTO `users`(`firstname`, `lastname`, `àddress`) 
            VALUES ('$firstname', '$lastname', '$address)";
            // var_dump($sql);
            // die();
            // `, `picture`, `email`, `phone`, `address`, `password`
            // , '$lastname', '$picture->fileName', '$email', '$phone', '$address', '$password'

            // INSERT INTO `users`(`firstname`, `lastname`, `picture`, `email`, `phone`, `address`, `status`, `password`, `reg_date`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]')
            $res = mysqli_query($connect, $sql);
            if($res){
                $errType = "success";
                $errMsg = "Erfolgreich registriert!! Sie können sich nun einloggen";
                $username = "";
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

  <!-- CSS Files Links -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/petstore.css">
  
  <!-- Title -->
  <title>Simple Page</title>
</head>
<body>
  
<div class= "container">
        <h1>Please Sign up here </h1>

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
                        <!-- <span class="text-danger"><?= $addressError ?></span class="text-danger"> -->

                        <input type="submit" class="form-control" name="register" value="Register">
        </form>
</div>

  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="./scripts.js"></script>
</body>
</html>