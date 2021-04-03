<?php
session_start();
include "config.php";
$target = "images/uploaded/".basename($_FILES['image']['name']);
$image = $_FILES['image']['name'];
$sql="select * from pictures where 1";
$result= $conn->query($sql);
$idcounter=1;
while($row = $result->fetch_assoc()) {
    if($row['picid']==$idcounter)
    $idcounter++;
}
$date= date("Y-m-d");
$sql="INSERT INTO pictures (picid,picname,picuser,picdate,picrate,picraters) VALUES ('".$idcounter."','".$image."','".$_SESSION["user"]."','".$date."','0','0')";
$result= $conn->query($sql);
move_uploaded_file($_FILES['image']['tmp_name'], $target);
header( "Location: Photos.php" );
?>