<?php
session_start();
include "config.php";
        $sql="select * from pictures where picid='".$_SESSION["picb"]."'";
        $result= $conn->query($sql);
        while($rows = $result->fetch_assoc()) {
             if(isset($_POST['rate'])){
                $prevar= $rows['picraters'] * $rows['picrate'];
                echo $prevar;
                $prevar= $prevar + $_POST['rate'];
                echo $prevar;
                $newraters= $rows['picraters'] + 1;
                echo $newraters;
                $var= $prevar / $newraters;
                echo $var;
                $sql = "UPDATE pictures SET picrate='".$var."' WHERE picid='".$_SESSION["picb"]."'";
                $result= $conn->query($sql);
                $sql = "UPDATE pictures SET picraters='".$newraters."' WHERE picid='".$_SESSION["picb"]."'";
                $result= $conn->query($sql);
             }
            }
            header( "Location: picture.php" );
            ?>