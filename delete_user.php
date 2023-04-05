<?php
session_start();

if(!isset($_SESSION["admin"])){
    header("Location: login.php");
 }

    require_once "components/db_connect.php";
    $id = $_GET["userid"];
    
    $sql = "DELETE FROM `users` WHERE user_id=$id";
    
    if(mysqli_query($connect, $sql)){
            header("Location: listusers.php");
        }
    

?>