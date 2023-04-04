<?php
session_start();


require "components/db_connect.php";
require_once "components/animal_upload.php";



$sql_type = "SELECT * FROM `animal_type`";
$all_types = mysqli_query($connect,$sql_type);
$options_type ="";

$sql_breed = "SELECT * FROM `breed`";
$all_breed = mysqli_query($connect, $sql_breed);
$options_breed ="";

$sql_vacc = "Select * from `vaccination`";
$all_vacc = mysqli_query($connect, $sql_vacc);
$options_vacc ="";

$sql_size = "Select * from `animal_size`";
$all_size =  mysqli_query($connect, $sql_size);
$options_size ="";

$sql_status = "Select * from `animal_status`";
$all_status = mysqli_query($connect, $sql_status);
$options_status ="";


while($row = mysqli_fetch_assoc($all_types)){
    $options_type .= "<option value='{$row["type_id"]}'>{$row["animal_type"]}</option>";
}
while($row1 = mysqli_fetch_assoc($all_breed)){
    $options_breed .= "<option value='{$row1["breed_id"]}'>{$row1["breed_name"]}</option>";
}
while($row2 = mysqli_fetch_assoc($all_vacc)){
    $options_vacc .= "<option value='{$row2["vacc_id"]}'>{$row2["vacc_text"]}</option>";
}
while($row3 = mysqli_fetch_assoc($all_size)){
    $options_size .= "<option value='{$row3["size_id"]}'>{$row3["size"]}</option>";
}
while($row4 = mysqli_fetch_assoc($all_status)){
    $options_status .= "<option value='{$row4["animalstatus_id"]}'>{$row4["animal_status"]}</option>";
}


    $id = $_GET["pet_id"];
    $sql = "select * from pets where pet_id = $id";
    $result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) == 1) {
    $data = mysqli_fetch_assoc($result);
    $name = $data['name'];
    $age = $data['age'];
    $description = $data['description'];
    $picture = $_POST['picture'];
    $picture = $data['picture'];
    $type = $_POST["animaltype"];
    $breed = $_POST["breed"];
    $vacc = $_POST["vaccination"];
    $ansize = $_POST["animalsize"];
    $anstatus = $_POST["animalstatus"];


    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $age = $_POST["age"];
        $picturearray = file_upload($_FILES['picture']);
        $description = $_POST['description'];
        $picture = $data['picture'];
        // $picture = $_POST['picture'];
        $type = $_POST["animaltype"];
        $breed = $_POST["breed"];
        $vacc = $_POST["vaccination"];
        $ansize = $_POST["animalsize"];
        $anstatus = $_POST["animalstatus"];
        $picture = $picturearray->fileName;

        if ($picturearray->error === 0) {
            ($_POST['picture'] == "avatar.jpg") ?: unlink("pictures/animals/{$_POST['picture']}");
            $sqlupdate = "UPDATE `pets` SET `name`='$name', `age`='$age', `picture`='$picturearray->fileName',`description` = '$description', fk_animal_type_id`='$type', `fk_breed_id` = '$breed', `fk_vaccination_id`= '$vacc', `fk_size_id`= '$ansize', `fk_status_id`= '$anstatus' WHERE pet_id = $id";
            // `picture`='$picturearray->fileName',

            
            // ($_POST['picture'] == "avatar.jpg") ?: unlink("pictures/animals/{$_POST['picture']}");
            // $sqlupdate = "UPDATE `pets` SET `name`='$name',`picture`='$picturearray->fileName', `age`='$age', `description` = '$description', `fk_animal_type_id`='$type', `fk_breed_id` = '$breed', `fk_vaccination_id`= '$vacc', `fk_size_id`= '$ansize', `fk_status_id`= '$anstatus'  WHERE pet_id = $id";
        } else {
            $sqlupdate = "UPDATE `pets` SET `name`='$name', `age`='$age', `description` = '$description',`fk_animal_type_id`='$type', `fk_breed_id` = '$breed', `fk_vaccination_id`= '$vacc',`fk_size_id`= '$ansize', `fk_status_id`= '$anstatus'  
            WHERE pet_id = $id";
        }


        if (mysqli_query($connect, $sqlupdate)) {
            header("Location: index.php");
        } else {
            echo "something went wrong";
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

  <!-- Title -->
  <title>Animal Pet Farm</title>
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

<h1> Update the article</h1>
    <br>
    <div class="container" class="form-group">
        <!-- action="actions/a_update.php" -->
        <form method="POST" enctype="multipart/form-data">
            <input type="text" placeholder="name of animal" class="form-control" name="name" value="<?= $name ?>">
            <input type="text" placeholder="age of animal" class="form-control" name="age" value="<?= $age ?>">
            <input type="file" placeholder="Bild (HTTP-LINK)" class="form-control" name="picture">
            <input type="text" placeholder="Description" class="form-control" name="description" value="<?= $description ?>">
            <select class="form-control dropdown-toggle" name="animaltype">
                            <option value="none">Choose Animal Type</option>
                            <?= $options_type;?>
            </select>
            <select class="form-control dropdown-toggle" name="breed">
                            <option value="none">Choose Breed</option>
                            <?= $options_breed;?>
            </select>
            <select class="form-control dropdown-toggle" name="vaccination">
                            <option value="none">Choose Vaccination</option>
                            <?= $options_vacc;?>
            </select>
            <select class="form-control dropdown-toggle" name="animalsize">
                            <option value="none">Choose Animal Size</option>
                            <?= $options_size;?>
            </select>
            <select class="form-control dropdown-toggle" name="animalstatus">
                            <option value="none">Choose Animal Status</option>
                            <?= $options_status;?>
            </select>
            <input type="submit" name="submit" value="Update Profile" class="btn btn-success">
        </form>
    </div>