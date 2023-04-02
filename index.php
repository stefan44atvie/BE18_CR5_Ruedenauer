<?php 
    session_start();
    require_once "components/db_connect.php";

    $sql="select pets.pet_id, pets.picture, pets.name, pets.age, animal_type.animal_type, pets.description, vaccination.vacc_text, animal_size.size, animal_status.animal_status, breed.breed_name from pets
    inner join animal_type on pets.fk_animal_type_id = animal_type.type_id
    inner join vaccination on pets.fk_vaccination_id = vaccination.vacc_id
    inner join animal_size on pets.fk_size_id = animal_size.size_id
    inner join animal_status on pets.fk_status_id = animal_status.animalstatus_id
    inner join breed on pets.fk_breed_id = breed.breed_id";
    $result = mysqli_query ($connect, $sql);
  
    $row=mysqli_fetch_assoc($result);

    $layout = "";
    if (mysqli_num_rows ($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $layout .= "
        
        <div class='d-flex flex-wrap'>
            <div class='card d-inline p-3 bg-secondary text-white ' style='width: 18rem;'>
                <img src='pictures/animals/" .$row['picture']."' width='100' alt='Card image cap'</img>
                <div class='card-body'>
                    <h5 class='card-title'>{$row['name']}</h5>
                    <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href='#' class='btn btn-primary'>Go somewhere</a>
                </div>
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
  <title>Animal Pet Farm</title>
</head>
<body>

    <!-- Menu Part -->
        <ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
    </li>
</ul>
<!-- Menu End -->

    <div class="container" style="width:100%;margin-left:10px;">
        <h1> Animal Pet Farm </h1>

        <div class="d-flex flex-wrap">
            <?php
                echo $layout;
                
            ?>       
            
            <br>          
        </div>



    </div>






  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="./scripts.js"></script>
</body>
</html>