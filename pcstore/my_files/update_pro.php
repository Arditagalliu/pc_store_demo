<?php
session_start();
include "config.php";
if(isset($_FILES['newcimage'])) {
    if($_FILES['newcimage']['name'] != "") {
        $target = "images/cat/".basename($_FILES['newcimage']['name']);
        $image = $_FILES['newcimage']['name'];
        $sql = "UPDATE products SET proimage='".$image."' WHERE proname='".$_POST['proname']."'";
        echo $sql;
        $result= $conn->query($sql);
        move_uploaded_file($_FILES['newcimage']['tmp_name'], $target);
    }
}
if($_POST['newcdesc'] != "") {
    $sql = "UPDATE products SET prodescription='".$_POST['newcdesc']."' WHERE proname='".$_POST['proname']."'";
    $result= $conn->query($sql);
}
if($_POST['proprice'] != "") {
    $sql = "UPDATE products SET proprice='".$_POST['proprice']."' WHERE proname='".$_POST['proname']."'";
    $result= $conn->query($sql);
    echo $sql;
}
if($_POST['newcname'] != "") {
    $sql = "UPDATE products SET proname='".$_POST['newcname']."' WHERE proname='".$_POST['proname']."'";
    $result= $conn->query($sql);
    echo $sql;
}
header( "Location: Admin_panel.php" );
?>