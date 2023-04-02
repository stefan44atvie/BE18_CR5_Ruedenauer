<?php 
    session_start();
    require_once "components/db_connect.php";

  //   if (isset($_SESSION['admin'])) {
  //     header("Location: dashboard.php");
  //     exit;
  // }
  // // if session is not set this will redirect to login page
  // if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
  //     header("Location: login.php");
  //     exit;
  // }

    $sql="select pets.pet_id, select pets.picture, pets.name, pets.age, animal_type.animal_type, pets.description, vaccination.vacc_text, animal_size.size, animal_status.animal_status, breed.breed_name from pets
    inner join animal_type on pets.fk_animal_type_id = animal_type.type_id
    inner join vaccination on pets.fk_vaccination_id = vaccination.vacc_id
    inner join animal_size on pets.fk_size_id = animal_size.size_id
    inner join animal_status on pets.fk_status_id = animal_status.animalstatus_id
    inner join breed on pets.fk_breed_id = breed.breed_id";
    $result = mysqli_query ($connect, $sql);
  
    $row=mysqli_fetch_assoc($result);
    $ete = $row["stext"];
  

    $layout = "";
    if (mysqli_num_rows ($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $layout .= "
            
                    <tr>
                    <td><img src='pictures/.$row["picture"].'' width='100' alt='Card image cap'</img></td>
                    <td><a class='tabletext'>{$row["name"]}</a></td>
                    <td><a class='tabletext'>{$row["age"]}</a></td>
                    <td><a class='tabletext'>{$row["animal_type"]}</a></td>
                    <td><a class='tabletext'>{$row["description"]}</a></td>
                    <td><a class='tabletext'>{$row["vacc_text"]}</a></td>
                    <td><a class='tabletext'>{$row["size"]}</a></td>
                    <td><a class='tabletext'>{$row["animal_status"]}</a></td>
                    <td><a class='tabletext'>{$row["breed_name"]}</a></td>

                    <td><a class='btn btn-info' href='details_user.php?id={$row["pet_id"]}'>Details</a></td>

                   
                </tr>  
                ";
            $body2 .="
                    <div class='card' style='width: 18rem;''>
                    <img src='{$row["picture"]}' class='card-img-top' alt='...'>
                    <div class='card-body'>
                    <p class='card-text'>{$row["name"]} und {$row["description"]}</p>
                    </div>
                    </div>
                    
            ";

        };
    }else{
        $layout .= "no result";        
    };


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
  <title>Simple Page</title>
</head>
<body>
 
<!-- test -->

<div class="container">
  <table class="table table-striped thead-dark w-75">
      <thead>
        <tr>
          <th scope="col">Bild</th>
          <th scope="col">Name</th>
          <th scope="col">Alter</th>
          <th scope="col">Tierart</th>
          <th scope="col">Beschreibung</th>
          <th scope="col">Impfstatus</th>
          <th scope="col">Größe</th>
          <th scope="col">Zu haben?</th>
          <th scope="col">Rasse</th>

        </tr>
      </thead>
      <tbody>
          
            <?php
                echo $layout;
                ?>
            
      </tbody>
    </table>
  </div>

  <div class="container">
    <?php 
        echo $body2;
        ?>
</div>



  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="./scripts.js"></script>
</body>
</html>