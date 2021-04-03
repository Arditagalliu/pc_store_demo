<?php
session_start();
include "config.php";
$_SESSION['picb']=$_POST['picb'];
header( "Location: picture.php" );
?>