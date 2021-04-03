<?php
session_start();
include "config.php";
?>

<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PcStore - Orders</title>
        <link rel="shortcut icon" type="image/png" href="images/categoriesicon.png" >
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
            #picuploader {
                padding: 10px;
                width:100%;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                background-color: #4CAF50;
            }
            .upload {

                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                border: 1px solid #ccc;
                display: inline-block;
                padding: 6px 12px;
                cursor: pointer;
            }
            input[type="file"] {
                display: none;
            }
            .insertsub {
                border:none;
                background-color: #4CAF50;
                color: white;
                margin-left: 50px;
            }
            .picturediv {
                padding:2px;
                height: 150px;
                margin:5px;
                display:inline-block;
                width: 150px;
            }
            .gallery {
                border-radius:10%;
                display:flex;
                width: 140px;
                height:auto;
            }
            .picb {
                background-color: #333;
                border-radius:10%;
                border:none;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                height: 150px;
            }
        </style>
    </head>
    <body onload="keeptheme()">
        <!---->
        <span id="mysession">
            <?php if(isset($_SESSION["theme"])){ echo $_SESSION["theme"]; } ?>
        </span>
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
            <li><a href="Home_page.php">Home</a></li>
            <li><a href="Categories.php">Categories</a></li>
            <?php if(isset($_SESSION["loggedin"])){
            ?> 
            <li><a href="Orders_page.php">My Orders</a></li>
            <?php } ?>
            <?php if(isset($_SESSION["loggedin"])){
            ?> 
            <li class="active"><a href="Photos.php">Our Photos</a></li>
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
            <div id="picuploader">
                <form action="uploader.php" method="POST" enctype="multipart/form-data" onsubmit="alert('Uploaded Successfully')">
                    <div id="uptitle"><h2>Upload a picture:</h2></div>
                    <label for="catpic"><div class="upload">Upload</div></label>
                    <input type="file" name="image" id="catpic" required>
                    <input type="submit" value="Submit" class="insertsub">
                </form>
            </div>
            <h1 id="welcomemess"><?php if(isset($_SESSION["user"])){ 
                echo "Welcome ".$_SESSION["loggedusern"];
            }
            ?> This is our Gallery:</h1><br>
            <!---->
            <div id="gallerydiv">
            <?php 
            $sql="select * from pictures where 1";
            $result= $conn->query($sql);
            $counter=0;
            while($row = $result->fetch_assoc()) {
                $counter++;
            ?>
            <div class="picturediv">
            <form action="choose_picture.php" method="POST">
            <button class="picb" name="picb" value="<?php echo $row['picid']; ?>"><img src="images/uploaded/<?php echo $row['picname']; ?>" class="gallery"></button>
            </form>
            </div>
            <?php
            }
            ?>
            </div>
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
            <br><br>
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