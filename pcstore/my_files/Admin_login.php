<?php
session_start();
include "config.php";
?>
<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PcStore - Admin Page</title>
        <link rel="shortcut icon" type="image/png" href="images/homeicon.png" >
        <link rel="stylesheet" type="text/css" href="my_page.css">
        <script src="my_page.js"></script>
        <style>
            .shadow {
            width: 100%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            text-align: center;
            background-color: #4CAF50;
            }
            .active {
                background-color: #4CAF50;
            }
            #logoutb {
                width: 100%;
                box-sizing: border-box;
                border: none;
                background-color: #333;
                color: white;
            }
            #saver {
                border: none;
                color: white;
                background-color: #4CAF50;
            }
        </style>
    </head>
    <body onload="keeptheme()">
    <span id="mysession">
            <?php if(isset($_SESSION["theme"])){ echo $_SESSION["theme"]; } ?>
        </span>
        <script>
            some=document.getElementById("mysession").innerHTML;
        </script>
    <?php if(!isset($_SESSION["loggedina"])){
            ?>
            <a id=logo href="Home_page.php">
            
            <div class="header">
                <img id="logopic" src="images/computer.png">
                Pc Store.gr
            </div>
        </a>
    <?php }else { ?>
        <a id=logo href="Admin_login.php">
            
            <div class="header">
                <img id="logopic" src="images/computer.png">
                Pc Store.gr
            </div>
        </a>
    <?php } ?>
        <ul id="nav">
            <li class="active"><a href="Admin_login.php">Home</a></li>
            <?php if(isset($_SESSION["loggedina"])){
            ?> 
            <li><a href="Admin_panel.php">Control Panel</a></li>
            <?php } ?>
            <?php if(isset($_SESSION["loggedina"])){
            ?> 
            <li id="about1"><a><form action="logout.php"><input id="logoutb" type="submit" value="Log Out"></form></a></li>
            <?php } ?>
            <li id="about"><a href="#footer">About</a></li> 
        </ul>
        <div class="progress-container">
            <div class="progress-bar" id="myBar"></div>
        </div>
        
        <div id="main">
        <br>
        <div class="shadow">
            <br>
            <h1>Login as Administrator</h1>
            <br>
        </div>
        <br><br>
            <div>
                <button id="theme" onclick="changetheme()">
                    Dark Mode
                </button>
            </div>
            
            <div class="sample" id="SignIn">
                <div class="product">
                    
                    <?php if(!isset($_SESSION["loggedina"])){ ?>
                    <form method="POST" action="">
                    <!--This value saves the theme 0 for light 1 for dark-->
                    <input type="text" id="them" value="0" name="them" readonly>
                        <h2>Sign in</h2>
                        <label for="username">*Username:</label><br>
                        <input type="text" id="username" name="username" placeholder="Johna21@(mandatory)" required><br>
                        <label for="lname">*Password:</label><br>
                        <input type="password" id="pass" name="pass" placeholder="(mandatory)" required><br><br>
                        <!-- SRART PHP code for the log in -->
                        <?php
                        if(isset($_POST['username'])){
                            $color=$_POST['them'];
                            $uname=$_POST['username'];
                            if($_POST['username']=="admin" and $_POST['pass']=="admin"){
                                $_SESSION['loggedina'] = TRUE;
                                $_SESSION["theme"]=$color;
                                header( "Location: Admin_panel.php" );   
                            }
                            else{
                                echo "wrong credentials<br>";
                            }
                        }
                        ?>
                        <!-- END PHP code for the log in -->
                        <input type="submit" value="Sign In">
                        <?php }else { ?>
                            <form method="POST" action="">
                    <!--This value saves the theme 0 for light 1 for dark-->
                    <input type="text" id="them" value="0" name="them" readonly>
                            
                        <!-- END PHP code for the log in -->
                        <input id="saver" name="save" type="submit" value="Save theme">
                        <?php
                            if(isset($_POST['save'])){
                            $color=$_POST['them'];
                                $_SESSION["theme"]=$color;
                                $_SESSION['loggedina'] = TRUE;
                                header( "Location: Admin_login.php" );
                            }
                        ?>
                        <?php } ?>
                    </form>
                </div>
                
            </div>
        </div>

        <div class="footer" id="footer">
            <div class="foopart" id="social">
                <h3>Our Social Media:</h3>
                <img class="socialpic" src="images/insta.png"> Follow us on Instagram<br>
                <img class="socialpic" src="images/face.png"> Like us on Facebook<br>
                <img class="socialpic" src="images/twit.png"> Follow us on Twitter<br>
            </div>
            <div class="foopart" id="contact">
                <h3>Contact Us:</h3>
                <img class="socialpic" src="images/phone.png"> +300 210 2738543<br>
                <img class="socialpic" src="images/mail.png"> pcstore@email.com<br>
                <img class="socialpic" src="images/map.png"> Panepistimiou 50 Syntagma <br>
            </div>
            <div class="foopart" id="copy">
                <h3>Pc_Store.Gr</h3><br><br><br>
                <img class="socialpic" src="images/copy.png"> All right reserved<br>
            </div>
        </div>
    </body>
</html>