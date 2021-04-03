<?php
session_start();
include "config.php";
if(isset($_FILES['newcimage'])) {
    if($_FILES['newcimage']['name'] != "") {
        $target = "images/cat/".basename($_FILES['newcimage']['name']);
        $image = $_FILES['newcimage']['name'];
        $sql = "UPDATE categories SET image='".$image."' WHERE title='".$_POST['catname']."'";
        $result= $conn->query($sql);
        move_uploaded_file($_FILES['newcimage']['tmp_name'], $target);
    }
}
if($_POST['newcdesc'] != "") {
    $sql = "UPDATE categories SET description='".$_POST['newcdesc']."' WHERE title='".$_POST['catname']."'";
    $result= $conn->query($sql);
}
if($_POST['newcname'] != "") {
    $sql = "UPDATE categories SET title='".$_POST['newcname']."' WHERE title='".$_POST['catname']."'";
    $result= $conn->query($sql);
    $sql = "UPDATE products SET procategory='".$_POST['newcname']."' WHERE procategory='".$_POST['catname']."'";
    $result= $conn->query($sql);
}
header( "Location: Admin_panel.php" );
?>