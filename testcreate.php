<?php
    require_once "components/db_connect.php";

    $sql1 = "Select * from `animal_type`";
    $result1 = mysqli_query($connect, $sql1);
    $options = "";

    $sql2 = "Select * from `animal_size`";
    $result2 = mysqli_query($connect, $sql2);
    $options2 = "";

    //while loop for animal type select
    while($row = mysqli_fetch_assoc($result1)){
 
 
      $options .= "<option value='{$row["type_id"]}'>{$row["animal_type"]}</option>";
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
  <title>Simple Page</title>
</head>
<body>
<select name = "Tierart">
                <option value="none"> Select an animal type </option>
                <?php  echo $options; ?>
            </select>
 
  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="./scripts.js"></script>
</body>
</html>