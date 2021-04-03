<?php
session_start();
include "config.php";
$sql="delete from orders where user='".$_SESSION["user"]."' AND id='".$_POST["orderid"]."'";
$result= $conn->query($sql);
header( "Location: Orders_page.php" );
?>
