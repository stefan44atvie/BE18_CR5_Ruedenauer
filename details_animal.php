<?php
    require_once "components/db_connect.php";

    session_start();

    $id = $_GET["pet_id"];
    
    $sql = "select pets.pet_id, pets.picture, pets.name, pets.age, animal_type.animal_type, pets.description, vaccination.vacc_text, animal_size.size, animal_status.animal_status, breed.breed_name from pets
    inner join animal_type on pets.fk_animal_type_id = animal_type.type_id
    inner join vaccination on pets.fk_vaccination_id = vaccination.vacc_id
    inner join animal_size on pets.fk_size_id = animal_size.size_id
    inner join animal_status on pets.fk_status_id = animal_status.animalstatus_id
    inner join breed on pets.fk_breed_id = breed.breed_id where pets.pet_id = $id";
    // echo $sql;
    // die();
    $result = mysqli_query($connect,$sql);
    $row = mysqli_fetch_assoc($result);

    
    if(isset($_POST["submit"])){
        $id1=$_GET["pet_id"];
        $status = 2;
        // var_dump($id1);
        // die();

             $sql2 = "INSERT INTO pets (`fk_status_id`) VALUES ('$status') where id = $id1";
             $res = mysqli_query($connect, $sql2);
             
             header("Location: userhome.php");
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
  <title>animal Farm Pets</title>
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
        <a class="nav-link" href="register.php">Register</a>
    </li>
</ul>
<!-- Menu End -->

<h1>Animal Farm Pets <small class="text-muted">Details</small></h1>
<div class="card" style="width: 18rem;">
  <img src="pictures/animals/<?= $row["picture"] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Name: <b><?= $row["name"] ?></b></li>
            <li class="list-group-item">Alter: <?= $row["age"] ?></li>
            <li class="list-group-item">Tier: <?= $row["animal_type"] ?></li>
            <li class="list-group-item">Rasse: <?= $row["breed_name"] ?></li>
            <li class="list-group-item">Tier: <?= $row["animal_type"] ?></li>
            <li class="list-group-item">Tier: <?= $row["description"] ?></li>
            <li class="list-group-item">Impfstatus: <?= $row["vacc_text"] ?></li>
            <li class="list-group-item">Größe: <?= $row["size"] ?></li>
            <li class="list-group-item">Wer will mich?: <?= $row["animal_status"] ?></li>
        </ul>
    </p>
  </div>
  <a href="home.php" class="btn btn-primary" role="button" data-bs-toggle="button">Back</a>
  <form method="POST">
  <input type="submit" class="form-control" name="submit" value="Take me home">
</form>

</div>


  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="./scripts.js"></script>
</body>
</html>