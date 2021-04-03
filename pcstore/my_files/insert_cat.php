<?php
session_start();
include "config.php";
$target = "images/cat/".basename($_FILES['image']['name']);
$image = $_FILES['image']['name'];
$sql="INSERT INTO categories (title,description,image) VALUES ('".$_POST["catname"]."','".$_POST["catdesc"]."','".$image."')";
$result= $conn->query($sql);
move_uploaded_file($_FILES['image']['tmp_name'], $target);
header( "Location: Admin_panel.php" );
?>