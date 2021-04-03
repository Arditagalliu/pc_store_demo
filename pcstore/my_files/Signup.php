<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PcStore - Signup Page</title>
        <link rel="shortcut icon" type="image/png" href="images/usericon.png" >
        <link rel="stylesheet" type="text/css" href="my_page.css">
        <script src="my_page.js"></script>
        <style>
            .active {
                background-color: #4CAF50;
            }
            .reginput {
                width: 300px;
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
                border: none;
                background-color: #3CBC8D;
                color: white;
            }
        </style>
    </head>
    <body>
         <a id=logo href="Home_page.php">
            
            <div class="header">
                <img id="logopic" src="images/computer.png">
                Pc Store.gr
            </div>
        </a>

        <ul id="nav">
            <li><a href="Home_page.php">Home</a></li>
            <li><a href="Categories.php">Categories</a></li>
            <li class="active"><a href="Signup.php">Register</a></li>
            <li><a href="Home_page.php#Signin">Sign In</a></li>
            <li id="about"><a href="#footer">About</a></li> 
        </ul>
        <div class="progress-container">
            <div class="progress-bar" id="myBar"></div>
        </div>
        
        <div id="main">
            
            
            <div>
                <button id="theme" onclick="changetheme()">
                    Dark Mode
                </button>
            </div>
            <input type="text" id="them" value="0" name="them" readonly>
            <img id="use" src="images/user.png"><br>
                <h1>Sign Up Form</h1>
                <form action="Signup.php" method="POST">
                        <label for="fname">*First name:</label><br>
                        <input type="text" class="reginput" id="fname" name="fname" placeholder="John(mandatory)" required><br><br>
                        <label for="lname">*Last name:</label><br>
                        <input type="text" class="reginput" id="lname" name="lname" placeholder="Doe(mandatory)" required><br><br>
                        <label for="usernam">*Username:</label><br>
                        <input type="text" class="reginput" id="usernam" name="usernam" placeholder="Johna21@(mandatory)" required><br><br>
                        <label for="num">*Phone Number: </label><br>
                        <input type="number" class="reginput" id="num" name="num" placeholder="6946393947(mandatory)" required><br><br>
                        <label for="email">*Email:</label><br>
                        <input type="email" class="reginput" id="email" name="email" placeholder="pcstore@email.com(mand.)" required> <br><br>
                        <p>Your password will be generated and sent in the email you enter</p>
                        <p>While also be displayed after the signup button for 10 sec</p>
                        <input class="reginput" id="regsub" type="submit" value="Sign Up"><br>
                </form>
                <?php
                include "config.php";
                if(isset($_POST['usernam'])){
                    $uname=$_POST['usernam'];
                    $ulname=$_POST['lname'];
                    $ufname=$_POST['fname'];
                    $unumber=$_POST['num'];
                    $umail=$_POST['email'];
                    $utype="normal";
                    $length= rand(8,16);
                    for ($x = 1; $x <= $length; $x++){
                    $array[] = rand(0,9);
                    }
                    $unencryptedpassword=implode($array);
                    $password = md5($unencryptedpassword);
                    $sql="select * from users where username='".$uname."'limit 1";
                    $result= $conn->query($sql);
                    if($result->num_rows==1){
                        echo "a user with this username already exists";   
                    }
                    else{
                        echo "Your password is:";
                        echo $unencryptedpassword;
                        $msg = "Thank you for joining our team!!! Here is your password:'".$unencryptedpassword."'";
                    mail($umail,"PC-store",$msg);
                        $sql="INSERT INTO users (username, password, firstname, surname, email, phone, type)
                        VALUES ('".$uname."','".$password."','".$ufname."','".$ulname."','".$umail."','".$unumber."','".$utype."')";
                    $result= $conn->query($sql);
                    echo "<br>Successful registration go login";
                    echo "<br>You will be redirected to login in 10sec";
                    header( "refresh:10; url=Home_page.php" );
                    }
                }
                ?>
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