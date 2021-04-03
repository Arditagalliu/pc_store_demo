<?php
session_start();
include "config.php";
$target = "images/cat/".basename($_FILES['propic']['name']);
$image = $_FILES['propic']['name'];
$sql="INSERT INTO products (proname,proprice,proimage,prodescription,procategory) 
VALUES ('".$_POST["proname"]."','".$_POST["proprice"]."','".$image."','".$_POST["prodesc"]."','".$_POST["category"]."')";
$result= $conn->query($sql);
move_uploaded_file($_FILES['propic']['tmp_name'], $target);
header( "Location: Admin_panel.php" );
?>