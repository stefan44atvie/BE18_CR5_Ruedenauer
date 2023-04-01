<?php 
      require_once "components/db_connect.php";

      $sql= "select * from users";
      $result = mysqli_query ($connect, $sql);
  
      $row=mysqli_fetch_assoc($result);
      $ete = $row["stext"];

      var_dump($result);
      die();

?>