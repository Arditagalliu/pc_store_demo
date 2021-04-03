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
            #mainpic {
                border-radius:1%;
                width:50%;
                height:auto;
            }
            #commtext {
            width: 79%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            
            box-sizing: border-box;
            }
            select {
                padding: 12px 2px;
                width:50px;
                border-radius: 4px;
            }
            #commsub {
            width: 20%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 2px;
            margin: 8px 0;
            border: none;
            display:inline-block;
            border-radius: 4px;
            cursor: pointer;
            }
            #commsub:hover {
            background-color: #45a049;
            }
            #picinfos {
                background-color: #4CAF50;
                border-radius: 4px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }
            .comm {
                height:auto;
                background-color: #4CAF50;
                border-radius: 4px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
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
            
            <?php 
            $sql="select * from pictures where picid='".$_SESSION["picb"]."'";
            $result= $conn->query($sql);
            while($row = $result->fetch_assoc()) {
            ?>
            <?php
             if(isset($_POST['rate'])){
                $prevar= $row['picraters'] * $row['picrate'];
                echo $prevar;
                $prevar= $prevar + $_POST['rate'];
                echo $prevar;
                $newraters= $row['picraters'] + 1;
                echo $newraters;
                $var= $prevar / $newraters;
                echo $var;
                $sql = "UPDATE pictures SET picrate='".$var."' WHERE picid='".$_SESSION["picb"]."'";
                $result= $conn->query($sql);
                $sql = "UPDATE pictures SET picraters='".$newraters."' WHERE picid='".$_SESSION["picb"]."'";
                $result= $conn->query($sql);
             }
            ?>
            <div id="picinfos">
                <h3>Owner: <?php echo $row['picuser']?></h3>
                <h3>Uploaded: <?php echo $row['picdate']?></h3>
                <h3>Ratings: <?php for ($x = 1; $x <= $row['picrate']; $x++) {
                echo "&#128948;";
            } ?></h3>
            </div>
            <img id="mainpic" src="images/uploaded/<?php echo $row['picname']?>">
            <form method="POST" action="">
            <input type="text" id="commtext" name="commtext" placeholder="Add a comment">
            <input type="submit" id="commsub" value="Comment">
            </form>
            <?php
             if(isset($_POST['commtext'])){
                $sql="INSERT INTO comments (cpic,cuser,comment) VALUES ('".$_SESSION["picb"]."','".$_SESSION["user"]."','".$_POST['commtext']."')";
                $result= $conn->query($sql);
             }
            ?>
            <form method="POST" action="">
            <label for="rate">Rate us(1 to 5):</label>
            <select name="rate" id="rate">
            <option value="5">5</option>
            <option value="4">4</option>
            <option value="3">3</option>
            <option value="2">2</option>
            <option value="1">1</option>
            </select>
            <input type="submit" id="commsub" value="rate">
            </form>
            <?php
            $sql="select * from comments where cpic='".$_SESSION["picb"]."'";
            $result= $conn->query($sql);
            while($row = $result->fetch_assoc()) { 
            ?>
            <div class="comm">
            <h3><?php echo $row['cuser']?></h3>
            <br><?php echo $row['comment']?>

            </div>
            <?php
            } ?>
            <?php } ?>
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