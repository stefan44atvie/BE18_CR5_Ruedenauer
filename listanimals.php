<?php

    require "components/db_connect.php";

    $sql="select pets.pet_id, pets.picture, pets.name, pets.age, animal_type.animal_type, pets.description, vaccination.vacc_text, animal_size.size, animal_status.animal_status, breed.breed_name from pets
    inner join animal_type on pets.fk_animal_type_id = animal_type.type_id
    inner join vaccination on pets.fk_vaccination_id = vaccination.vacc_id
    inner join animal_size on pets.fk_size_id = animal_size.size_id
    inner join animal_status on pets.fk_status_id = animal_status.animalstatus_id
    inner join breed on pets.fk_breed_id = breed.breed_id";
    $result = mysqli_query ($connect, $sql);
    $id=$_SESSION["id"];

    $layout ="";
    $layout2="";

    if (mysqli_num_rows ($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            
              $layout2 .= "
                        <td>Options</td>
                        <td><img src='pictures/animals/" .$row['picture']."' width='100' alt='Card image cap'>
                        <td>{$row["name"]}</td>
                        <td>{$row["animal_type"]}</td>
                        <td>{$row["breed_name"]}</td>
                        <td>{$row["age"]}</td>
                        <td>{$row["description"]}</td>
                        <td>{$row["vacc_text"]}</td>
                        </tr>
                                
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

    <div class="container " style="margin-left:10px;">
        <h1 class="text-center"> Animal Pet Farm <small class="text-muted">Is this pet maybe yours soon?</small></h1>

        <table class='table'>
                    <thead>
                        <tr>
                        <th scope='col'>Options</th>    
                        <th scope='col'>Bild</th>
                        <th scope='col'>Name</th>
                        <th scope='col'>Tierart</th>
                        <th scope='col'>Rasse</th>
                        <th scope='col'>Alter</th>
                        <th scope='col'>Description</th>
                        <th scope='col'>Vaccination</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                echo $layout2;
                                ?>
                                </tr>
                        
                        </tbody>
                        </table>
                            <br>          



    </div>






  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="./scripts.js"></script>
</body>
</html>