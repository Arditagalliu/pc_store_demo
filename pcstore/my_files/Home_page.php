<?php
    session_start();
    include "config.php";
?>

<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PcStore - Home Page</title>
        <link rel="shortcut icon" type="image/png" href="images/homeicon.png" >
        <link rel="stylesheet" type="text/css" href="my_page.css">
        <script src="my_page.js"></script>
        <style>
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
        </style>
    </head>
    <body onload="keeptheme()">
    
        <span id="mysession">
            <?php if(isset($_SESSION["theme"])){ echo $_SESSION["theme"]; } ?></span>
        <script>
        some=document.getElementById("mysession").innerHTML;
        </script>
        <!---->
        <a id=logo href="Home_page.php">
            <div class="header">
                <img id="logopic" src="images/computer.png">
                Pc Store.gr
            </div>
        </a>
        <!---->
        <ul id="nav">
            <li class="active"><a href="Home_page.php">Home</a></li>
            <li><a href="Categories.php">Categories</a></li>
            <!---->
            <?php if(!isset($_SESSION["loggedin"])){
            ?> 
            <li><a href="Signup.php">Register</a></li>
            <li><a href="#SignIn">Sign In</a></li>
            <?php } ?>
            <!---->
            <?php if(isset($_SESSION["loggedin"])){
            ?> 
            <li><a href="Orders_page.php">My Orders</a></li>
            <?php } ?>
            <?php if(isset($_SESSION["loggedin"])){
            ?> 
            <li><a href="Photos.php">Our Photos</a></li>
            <?php } ?>
            <li id="about"><a href="#footer">About</a></li> 
            <!---->
            <?php if(isset($_SESSION["loggedin"])){
            ?> 
            <li id="about1"><a><form action="logout.php"><input id="logoutb" type="submit" value="Log Out"></form></a></li>
            <?php } ?>
            <!---->
        </ul>
        <!---->
        <div class="progress-container">
            <div class="progress-bar" id="myBar"></div>
        </div>
        <!---->
        <div id="main">
            <!---->
            <div>
                <img id="bgimg" src="images/playstation.png">
                <div class="middle">
                    <h1>COMING SOON</h1>
                    <h2><div id="demo"></div></h2>
                </div>
            </div>
            <!---->
            <p>
                Welcome to <span id="emphasis">PcStore.com</span>, The no-1 technology e-shop. 
                Our company is the determinant factor in the section for 56 years now 
                and we work hard to stay that way.
                You will find a large variety of <span id="emphasis">PCs, Smartphones, Tablets, Laptops</span>e.t.c.
            </p>
            <!---->
            <?php if(!isset($_SESSION["loggedin"])){
            ?>
            <div>
                <button id="theme" onclick="changetheme()">
                    Dark Mode
                </button>
            </div>
            <?php } ?>
            <!---->
            <div class="sample">
                <div class="product">
                    <div class="overlay"><div class="text">Apple Ipad</div></div>
                    <img class="pic" src="images/ipad.jpg">
                    <h1>Tablets</h1>
                </div>
            </div>
            <div class="sample">
                <div class="product">
                    <div class="overlay"><div class="text">Apple Iphone</div></div>
                    <img class="pic" src="images/iphone12.jpg">
                    <h1>Smartphones</h1>
                </div>
            </div>
            <div class="sample">
                <div class="product">
                    <div class="overlay"><div class="text">Sony Vaio</div></div>
                    <img class="pic" src="images/vaio.jpg">
                    <h1>Laptops</h1>
                </div>
            </div>
            <div class="sample">
                <div class="product">
                    <div class="overlay"><div class="text">Think Center</div></div>    
                    <img class="pic" src="images/thinkcenterm720.jpg">
                    <h1>Desktops</h1>
                </div>
            </div>
            <br><br>
            <!---->
            <?php if(!isset($_SESSION["loggedin"])){
            ?> 
            <p>
                If you want to purchase any product you have to first
                <span id="emphasis">Log In</span>
                To your personal acount in our website.
            </p>
            <div class="sample" id="SignIn">
                <div class="product">
                    
                    <form method="POST" action="authentication.php">
                    <!--This input saves the theme 0 for light 1 for dark-->
                    <input type="text" id="them" value="0" name="them" readonly>
                        <h2>Sign in</h2>
                        <label for="username">*Username:</label><br>
                        <input type="text" id="username" name="username" placeholder="Johna21@(mandatory)" required><br>
                        <label for="lname">*Password:</label><br>
                        <input type="password" id="pass" name="pass" placeholder="(mandatory)" required><br><br>
                        <input type="button" onclick="openForm()" value="Forgot Password?"></input><br>
                        <input type="submit" value="Sign In">
                    </form> 
                    
                    <div class="form-popup" id="myForm" onsubmit="alert('check your inbox for our mail')">
                        <form class="form-container" onsubmit="function closeForm() {
                            document.getElementById('myForm').style.display = 'none';">
                          <h2>Password Rcovery</h2>
                          <p>Input your acounts email to send you recovery instructions</p>
                          <label for="email"><b>Email</b></label>
                          <input type="text" placeholder="Enter Email" name="email" required>
                          <button type="submit" class="btn">Submit</button>
                          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                        </form>
                      </div>
                </div>
            </div>
            <?php } ?>
            <!---->
            <button class="chat-button" onclick="openchat()">Chat</button>

            <div class="chat-popup" id="chat">
            <form action="#main" class="chat-container" method="POST">
                <h1>Chat</h1>

                <label for="msg"><b>We are ready to answer every question</b></label>
                <textarea placeholder="Type message.." name="msg" required></textarea>

                <button type="submit" class="btn">Send</button>
                <button type="button" class="btn cancel" onclick="closechat()">Close</button>
            </form>
            </div>
            <!---->
            <?php if(!isset($_SESSION["loggedin"])){
            ?>
            <div class="sample" id="signup">
                <div class="product">
                    You don't Have an acount? <a href="Signup.php">Sign Up </a>.<br>
                </div>
            </div>
            <div class="sample" id="signup">
                <div class="product">
                    Are you the administrator? <a href="Admin_login.php">Login here </a>.<br>
                </div>
            </div>
            <?php } ?> 
            <!---->     
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