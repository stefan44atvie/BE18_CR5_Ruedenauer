<?php
require_once "components/db_connect.php";
// require_once "components/animal_upload.php";

$sql1 = "Select * from animal_type";
$result1 = mysqli_query($connect, $sql1);
$options = "";
while($row = mysqli_fetch_assoc($result1)){
    
}

// $sql="select pets.pet_id, pets.picture, pets.size, pets.size, animal_type.animal_type, pets.size, vaccination.vacc_text, animal_size.size, animal_status.animal_status, breed.breed_size from pets
//     inner join animal_type on pets.fk_animal_type_id = animal_type.type_id
//     inner join vaccination on pets.fk_vaccination_id = vaccination.vacc_id
//     inner join animal_size on pets.fk_size_id = animal_size.size_id
//     inner join animal_status on pets.fk_status_id = animal_status.animalstatus_id
//     inner join breed on pets.fk_breed_id = breed.breed_id";
    
//     $result = mysqli_query ($connect, $sql);
//     $row=mysqli_fetch_assoc($result);

    $sql_antype = "Select animal_type from animal_type";
    $result_anitype = mysqli_query($connect, $sql_antype);
    $row_antype = mysqli_fetch_assoc($result_anitype);

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
            <input type="text" placeholder="Bitte Tierart einfügen" class="form-control" size= "animal_type">
            <span class="text-danger"><?= $typeError ?></span class="text-danger">
            <input type="text" placeholder="Bitte Beschreibung einfügen" class="form-control" size= "size">
            <span class="text-danger"><?= $sizeError ?></span class="text-danger">
            <input type="text" placeholder="Bitte Impfstatus einfügen" class="form-control" size= "vacc_text">
            <span class="text-danger"><?= $vaccError ?></span class="text-danger">
            <input type="text" placeholder="Bitte Größe des Tieres einfügen" class="form-control" size= "animal_size">
            <span class="text-danger"><?= $sizeError ?></span class="text-danger">
            <input type="text" placeholder="Bitte Status des Tieres einfügen" class="form-control" size= "animal_status">
            <span class="text-danger"><?= $statusError ?></span class="text-danger">
            <input type="text" placeholder="Bitte Rasse des Tieres einfügen" class="form-control" size= "breed_size">
            <span class="text-danger"><?= $breedError ?></span class="text-danger">

           <select name = "Tierart">
                <option value="1"> Test1 </option>
                <option value="2"> Terst3 </option>
            </select>

            <input type="submit" class="form-control" size="submit" value="Tier eintrsizen">
</form>


  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="./scripts.js"></script>
</body>
</html>







