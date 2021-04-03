<?php
//This php file makes the users login authentication
//and establishes a session for the user.
session_start();
include "config.php";
if(isset($_POST['cat'])){
    $_SESSION['category'] = $_POST['cat'] ;
        header( "Location: Products.php" );
    }
    else{
        header( "Location: Categories.php" ); 
    }
?>