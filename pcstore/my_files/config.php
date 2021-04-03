<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pcstore";

    //establish connection
    $conn = new mysqli($hostname , $username , $password , $dbname);

    //connection test
    if ($conn->connect_error)
    {
        die("Connection failed:" . $conn->connect_error);
    }
?>