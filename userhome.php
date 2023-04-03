<?php 
    session_start();
    require_once "components/db_connect.php";

  //   var_dump($_SESSION);
  // die();
    if (isset($_SESSION['adm'])) {
      header("Location: dashboard.php");
      exit;
  }
  // if session is not set this will redirect to login page
  // if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
  //     header("Location: login.php");
  //     exit;
  // }

    

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
        <a href='logout.php?logout' class='btn btn-warning'>Logout</a>

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
          
            
      </tbody>
    </table>
  </div>

  <div class="container">
    
</div>



  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="./scripts.js"></script>
</body>
</html>