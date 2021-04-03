<?php
session_start();
include "config.php";
$sql="delete from categories where title='".$_POST["catname"]."'";
$result= $conn->query($sql);
$sql="delete from products where procategory='".$_POST["catname"]."'";
$result= $conn->query($sql);
header( "Location: Admin_panel.php" );
?>