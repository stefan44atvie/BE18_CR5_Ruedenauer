<?php
session_start();


require "components/db_connect.php";
require_once "components/usermedia_file_upload.php";


$id = $_GET["userid"];
$sql = "select * from users where user_id = $id";
$result = mysqli_query($connect, $sql);
//$row = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) == 1) {
    $data = mysqli_fetch_assoc($result);
    $firstname = $data['firstname'];
    $email = $data['email'];
    $picture = $data['picture'];
    $lastname = $data['lastname'];
    $address = $data['address'];
    $phone = $data['phone'];
    $status = $data['status'];


    if (isset($_POST["submit"])) {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $status = $_POST["status"];
        $email = $_POST["email"];
        $picturearray = file_upload($_FILES['picture']);

        $picture = $picturearray->fileName;


        if ($picturearray->error === 0) {
            ($_POST['picture'] == "avatar.png") ?: unlink("/pictures/{$_POST['picture']}");
            $sqlupdate = "UPDATE `users` SET `firstname`='$firstname', `address`='$address', `lastname`='$lastname', `phone`='$phone', `status`='$status', `picture`='$picturearray->fileName', `email`='$email'  WHERE user_id = $id";
        } else {
            $sqlupdate = "UPDATE `users` SET `firstname`='$firstname',`lastname`='$lastname', `address`='$address', `status`='$status', `phone`='$phone', `email`='$email'  WHERE user_id = $id";
        }


        if (mysqli_query($connect, $sqlupdate)) {
            header("Location: listusers.php");
        } else {
            echo "something went wrong";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/beisl23.css">
    <link rel="stylesheet" href="css/bootstrap.css">

</head>

<body>
    
    <h1> Update the article</h1>
    <br>
    <div class="container" class="form-group">
        <!-- action="actions/a_update.php" -->
        <form method="POST" enctype="multipart/form-data">
            <input type="text" placeholder="firstname" class="form-control" name="firstname" value="<?= $firstname ?>">
            <input type="text" placeholder="lastname" class="form-control" name="lastname" value="<?= $lastname ?>">
            <input type="text" placeholder="Address" class="form-control" name="address" value="<?= $address ?>">
            <input type="text" placeholder="Phone" class="form-control" name="phone" value="<?= $phone ?>">
            <input type="text" placeholder="Status: Please only admin or user" class="form-control" name="status" value="<?= $status ?>">

            <input type="text" placeholder="email" class="form-control" name="email" value="<?= $email ?>">
            <input type="file" placeholder="Bild (HTTP-LINK)" class="form-control" name="picture">
            <input type="submit" name="submit" value="Update Profile" class="btn btn-success">
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
<!-- Ende Footer-Menü -->>
</body>

</html>