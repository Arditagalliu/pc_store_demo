<?php
//This php file makes the users login authentication
//and establishes a session for the user.
session_start();
include "config.php";
if(isset($_POST['username'])){
    $color=$_POST['them'];
    $uname=$_POST['username'];
    $unencryptedpassword=$_POST['pass'];
    $password = md5($unencryptedpassword);
    $sql="select * from users where username='".$uname."'AND password='".$password."'limit 1";
    $result= $conn->query($sql);
    if($result->num_rows==1){
        $_SESSION['loggedin'] = TRUE;
        $_SESSION["user"]=$uname;
        $row = $result->fetch_assoc();
            $_SESSION['loggedusern'] =$row['firstname'];
            $_SESSION['loggedusers'] =$row['surname'];
            $_SESSION['loggedusere'] =$row['email'];
            $_SESSION['loggeduserp'] =$row['phone'];
        //$_SESSION["loggeduser"]=$result['username'];
        $_SESSION["theme"]=$color;
        header( "Location: Categories.php" );   
    }
    else{
        echo "<h1>wrong credentials if not redirected in 3sec</h1>
        <h2>click<a href='Home_page.php'>Go Back</a></h2>";
        header( "refresh:3; url=Home_page.php" );
    }
}
?>