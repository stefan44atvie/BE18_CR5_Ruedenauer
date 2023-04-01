<!DOCTYPE html>
<html lang="en">
<head>
 
  <!-- Meta Tags -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- CSS Files Links -->
  <link rel="stylesheet" href="css/bootstrap.css">
<?php        


?>
  <!-- Title -->
  <title>Simple Page</title>
</head>
<body>
    <?php echo "Test" ?>
    <form class="w-75 "action =="<?= htmlspecialchars($_SERVER['SCRIPT_NAME'])?>">
        <input type="text" placeholder="please insert your first name" class="form-control" name="firstname">
        <input type="text" placeholder="please insert your last name" class="form-control" name="lastname">
        <input type="email" placeholder="please insert your email" class="form-control" name="email">
        <input type="text" placeholder="please insert your address" class="form-control" name="address">
        <input type="text" placeholder="please insert your phone number" class="form-control" name="phone">
        <input type="file" placeholder="please insert your picture" class="form-control" name="picture">
        <input type="text" placeholder="please insert your password" class="form-control" name="password">
        <input type="submit" class="form-control" name="register" value="Register">

    </form>

  <noscript>Your browser don't support JavaScript!</noscript>
  <script src="./scripts.js"></script>
</body>
</html>