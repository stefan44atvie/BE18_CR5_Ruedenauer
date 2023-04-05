<?php
session_start();

if(!isset($_SESSION["admin"])){
    header("Location: login.php");
 }

    require_once "components/db_connect.php";
    $id = $_GET["animalid"];
    
    $sql = "DELETE FROM `pets` WHERE pet_id=$id";
    
    if(mysqli_query($connect, $sql)){
            header("Location: listanimals.php");
        }
    

?>