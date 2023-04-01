<?php
require_once "components/db_connect.php";
// require_once "components/animal_upload.php";

//FOR select button Animalo Type
$sql_antype_select = "Select * from `animal_type`";
$result1 = mysqli_query($connect, $sql_antype_select);
$options = "";
$sql_animalsize_select = "Select * from `animal_size`";
$result2 = mysqli_query($connect, $sql_animalsize_select);
$options2 = "";
$sql_animalstatus_select = "Select * from `animal_status`";
$result3 = mysqli_query($connect, $sql_animalstatus_select);
$options3 = "";
$sql_vaccination_select = "Select * from `vaccination`";
$result4 = mysqli_query($connect, $sql_vaccination_select);
$options4 = "";
$sql_breed_select = "Select * from `breed`";
$result5 = mysqli_query($connect, $sql_breed_select);
$options5 = "";

while($row = mysqli_fetch_assoc($result1)){
   $options .= "<option value='{$row["type_id"]}'>{$row["animal_type"]}</option>";
}
while($row = mysqli_fetch_assoc($result2)){
    $options2 .= "<option value='{$row["size_id"]}'>{$row["size"]}</option>";
 }
 while($row = mysqli_fetch_assoc($result3)){
    $options3 .= "<option value='{$row["animalstatus_id"]}'>{$row["animal_status"]}</option>";
 }
 while($row = mysqli_fetch_assoc($result4)){
    $options4 .= "<option value='{$row["vacc_id"]}'>{$row["vacc_text"]}</option>";
 }
 while($row = mysqli_fetch_assoc($result5)){
    $options5 .= "<option value='{$row["breed_id"]}'>{$row["breed_name"]}</option>";
 }

// Select End Animal type



// $sql="select pets.pet_id, pets.picture, pets.size, pets.size, animal_type.animal_type, pets.size, vaccination.vacc_text, animal_size.size, animal_status.animal_status, breed.breed_size from pets
//     inner join animal_type on pets.fk_animal_type_id = animal_type.type_id
//     inner join vaccination on pets.fk_vaccination_id = vaccination.vacc_id
//     inner join animal_size on pets.fk_size_id = animal_size.size_id
//     inner join animal_status on pets.fk_status_id = animal_status.animalstatus_id
//     inner join breed on pets.fk_breed_id = breed.breed_id";
    
//     $result = mysqli_query ($connect, $sql);
//     $row=mysqli_fetch_assoc($result);

    // function cleanInput($param){
    //     $clean = trim($param);
    //     $clean = strip_tags($param);
    //     $clean = htmlspecialchars($param);

    //     return $clean;
    //   }
    //   $nameError = $ageError = $typeError = $descriptionError = $vaccError = $sizeError = $statusError = $breedError  = 
    //   $name = $size = $animal_type = $description = $vacc_text = $animal_size = $animal_status = $breed_name ="";

    //   if(isset($POST["submit"])){
    //     $name = cleanInput($_POST["name"]);
    //     $age = cleanInput($_POST["age"]);
    //     $animal_type = cleanInput($_POST["animal_type"]);
    //     $description = cleanInput($_POST["description"]);
    //     $vacc_text = cleanInput($_POST["vacc_text"]);
    //     $animal_size = cleanInput($_POST["animal_size"]);
    //     $animal_status = cleanInput($_POST["animal_status"]);
    //     $breed_name = cleanInput($_POST["breed_name"]);

    //     $picture=$_POST["picture"];

    //     $error = false;

    //     //Validation starts
    //     //size des Tieres
    //     if(empty($name)){
    //         $error = true;
    //         $nameError ="Bitte Tiersizen einfügen!";
    //       }elseif(!preg_match("/^[a-zA-Z]+$/", $name)){
    //         $error = true;
    //         $nameError ="Bitte nur Zeichen aus dem Alphabet eingeben!";
    //       }
    //     //Animal Type
    //     if(empty($age)){
    //         $error = true;
    //         $ageError ="Bitte Alter einfügen!";
    //       }
    //       //size
    //       if(empty($animal_type)){
    //         $error = true;
    //         $typeError ="Bitte Beschreibung einfügen!";
    //       }
    //       //Vaccination
    //       if(empty($description)){
    //         $error = true;
    //         $descriptionError ="Bitte Beschreibung einfügen!";
    //       }
    //       if(empty($vacc_text)){
    //         $error = true;
    //         $vaccError ="Bitte Alter einfügen!";
    //       }
    //       if(empty($animal_size)){
    //         $error = true;
    //         $sizeError ="Bitte Größe einfügen!";
    //       }
    //       if(empty($animal_status)){
    //         $error = true;
    //         $statusError ="Bitte Status einfügen!";
    //       }
    //       if(empty($breed_name)){
    //         $error = true;
    //         $breedError ="Bitte Rasse einfügen!";
    //       }

    //       $picture = file_upload($_FILES["picture"]);

    //       if(!$error){
    //         $sql1 = "INSERT INTO `pets`(`name`, `picture`, `age`, `description`, `fk_animal_type_id`, `fk_breed_id`, `fk_vaccination_id`, `fk_size_id`, `fk_status_id`) VALUES ('')"
    //       }




    //   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <!-- Meta Tags -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta size="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSS Files Links -->
  <link rel="stylesheet" href="css/bootstrap.css">

  <!-- Title -->
  <title>New animals</title>
</head>
<body>
<form class="w-50" method="POST" action="<?= htmlspecialchars($_SERVER['SCRIPT_size'])?>" enctype="multipart/form-data">
            <input type="text" placeholder="Bitte den Namen des Tieres einfügen" class="form-control" size="size" value="<?= $name ?>">
            <span class="text-danger"><?= $nameError ?></span class="text-danger">
            
            <input type="text" placeholder="Bitte das Alter einfügen" class="form-control" size="age" value="<?= $age ?>">
            <span class="text-danger"><?= $ageError ?></span class="text-danger">
            <input type="file" placeholder="Bitte Bild einfügen" class="form-control" size= "picture">
            <span class="text-danger"><?= $picError ?></span class="text-danger">            
            <select class="form-select" name = "Tierart">
                <option value="none"> Select an animal type </option>
                <?php  echo $options; ?>
            </select>
            <span class="text-danger"><?= $typeError ?></span class="text-danger">
            <input type="text" placeholder="Bitte Beschreibung einfügen" class="form-control" size= "size">
            <span class="text-danger"><?= $sizeError ?></span class="text-danger">
            <select class="form-select" name = "vaccination">
                <option value="none"> Select an Vaccination status </option>
                <?php  echo $options4; ?>
            </select>            
            <span class="text-danger"><?= $vaccError ?></span class="text-danger">
            <select class="form-select" name = "animal_size">
                <option value="none"> Select an animal size </option>
                <?php  echo $options2; ?>
            </select>
            <span class="text-danger"><?= $sizeError ?></span class="text-danger">
            <select class="form-select" name = "animal_status">
                <option value="none"> Select status of the animal </option>
                <?php  echo $options3; ?>
            </select>            
            <span class="text-danger"><?= $statusError ?></span class="text-danger">
            <select class="form-select" name = "breed_name">
                <option value="none"> Select an animal breed </option>
                <?php  echo $options5; ?>
            </select>            
            <!-- select button  -->
            <span class="text-danger"><?= $breedError ?></span class="text-danger">

            <input type="submit" class="form-control" size="submit" value="Tier eintrsizen">
</form>


  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="./scripts.js"></script>
</body>
</html>







