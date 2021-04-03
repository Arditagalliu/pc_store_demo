<?php
session_start();
include "config.php";
?>

<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PcStore - Categories</title>
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
            <li class="active"><a href="Categories.php">Categories</a></li>
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
            <h1 id="welcomemess"><?php if(isset($_SESSION["user"])){ 
                echo "Welcome ".$_SESSION["loggedusern"];
            }
            ?> Choose the category you want:</h1><br>
            <!---->
            <?php 
                 $sql="select * from categories";
                 $result= $conn->query($sql);
                 $count=0;
                 while($row = $result->fetch_assoc()) {
                    $count++;
                    if($count % 2 == 1){
                     ?>
                     <form action="category_select.php" method="POST">
                     <button type="submit" name="cat" value="<?php echo $row['title']; ?>" class="category">
                     <img src="images/cat/<?php echo $row['image'];?>" class="catpic" onmouseout="document.getElementById('ctext<?php echo $count; ?>').style.display='none'" onmouseover="document.getElementById('ctext<?php echo $count; ?>').style.display='block'">
                     <?php
                    echo "<h1>".$row['title']."</h1>";
                    echo "<h2 class=\"ctext\" id=\"ctext".$count."\">".$row['description']."</h2>";
                    ?></button></form><br><?php
                    }
                    else {
                        ?>
                        <form action="category_select.php" method="POST">
                        <button type="submit" name="cat" value="<?php echo $row['title']; ?>" class="category2">
                        <img src="images/cat/<?php echo $row['image'];?>" class="catpic" onmouseout="document.getElementById('ctext<?php echo $count; ?>').style.display='none'" onmouseover="document.getElementById('ctext<?php echo $count; ?>').style.display='block'">
                        <?php
                       echo "<h1>".$row['title']."</h1>";
                       echo "<h2 class=\"ctext\" id=\"ctext".$count."\">".$row['description']."</h2>";
                       ?></button></form><br><?php
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