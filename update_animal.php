<?php
session_start();


require "components/db_connect.php";
require_once "components/animal_upload.php";


$id = $_GET["pet_id"];
$sql = "select * from pets where pet_id = $id";
$result = mysqli_query($connect, $sql);


// SQL-Abfrage für Options Animal Type 
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

// Darstellung für Select-Dropdown
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

//$row = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) == 1) {
    $data = mysqli_fetch_assoc($result);
    $name = $data['name'];
    $age = $data['age'];
    $picture = $data['picture'];
    $type = $data["type_id"];
    $breed = $data["breed_id"];
    $vacc = $data["vacc_id"];
    $size = $data["size_id"];
    $status = $data["status_id"];


    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $age = $_POST["age"];
        $type = $_POST["animaltype"];
        $breed = $_POST["breed"];
        $vacc = $_POST["vaccination"];
        $size = $_POST["animalsize"];
        $status = $_POST["animalstatus"];


        // var_dump($type);
        // die();

        $picturearray = file_upload($_FILES['picture']);

        $picture = $picturearray->fileName;


        if ($picturearray->error === 0) {
            ($_POST['picture'] == "avatar.png") ?: unlink("pictures/animals/{$_POST['picture']}");
            $sqlupdate = "UPDATE `pets` SET `name`='$name',  `fk_animal_type_id`='$type', `fk_animal_type_id`='$type', `picture`='$picturearray->fileName', `age`='$age'  WHERE pet_id = $id";
        } else {
            $sqlupdate = "UPDATE `pets` SET `name`='$name', `age`='$age', `fk_animal_type_id`='$type'  WHERE pet_id = $id";
        }


        if (mysqli_query($connect, $sqlupdate)) {
            header("Location: listanimals.php");
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
   
    <h1> Update the animal</h1>
    <br>
    <div class="container" class="form-group">
        <!-- action="actions/a_update.php" -->
        <form method="POST" enctype="multipart/form-data">
            <input type="text" placeholder="name" class="form-control" name="name" value="<?= $name ?>">
            <input type="text" placeholder="age" class="form-control" name="age" value="<?= $age ?>">
            <input type="file" placeholder="Bild (HTTP-LINK)" class="form-control" name="picture">
            <select class="form-control dropdown-toggle" name="animaltype">
                            <option value="none">Choose Animal Type</option>
                            <?= $options_type;?>
            </select>
            <select class="form-control dropdown-toggle" name="breed" value="<?= $breed ?>">
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
            <input type="submit" name="submit" value="Update Animal" class="btn btn-success">
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