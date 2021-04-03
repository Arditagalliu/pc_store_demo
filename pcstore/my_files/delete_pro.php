<?php
session_start();
include "config.php";
$sql="delete from products where proname='".$_POST["proname"]."'";
$result= $conn->query($sql);
header( "Location: Admin_panel.php" );
?>