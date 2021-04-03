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
            .deleteorder {
                box-sizing: border-box;
                border: none;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                background-color: red;
                color: white;
            }
            .deleteorder:hover {
                background-color: #333;
            }
            .orderbox {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                background-color: #4CAF50;
            }
            .orderdiv {
                display:inline-block;
                width: 80%;
            }
            .deletediv {
                display:inline-block;
                width: 10%;
                min-width: 100px;
                padding-bottom:5px;
            }
            .title1 {
                display:inline-block;
                width: 30%;
                min-width: 150px;
            }
            .title2 {
                display:inline-block;
                width: 30%;
                min-width: 150px;
            }
            .title3 {
                display:inline-block;
                width: 30%;
                min-width: 150px;
            }
            .orderitem0 {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                width:105%;
                padding: 10px;
                background-color:#333;
            }
            .orderitem1 {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                width:105%;
                padding: 10px;
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
            <li class="active"><a href="Orders_page.php">My Orders</a></li>
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
            ?> Here are your Orders:</h1><br>
            <!---->
            <?php 
                 $sql="select * from orders where user='".$_SESSION["user"]."'";
                 $result= $conn->query($sql);
                 $count=0;
                 while($row = $result->fetch_assoc()) {
                     ?>
                     <div id="orderbox<?php echo $count; ?>" class="orderbox"><div class="orderdiv">
                    <?php      
                    $count++;
                    $var=explode("..", $row['products']);
                    $var2=explode("..", $row['costs']);
                    $var3=explode("..", $row['quantities']);
                    echo "<h3>Order Items:</h3><hr>";
                    for ($x = 1; $x < count($var); $x++) {
                        $y=$x % 2;
                        echo "<div class=\"orderitem".$y."\">";
                        echo "<h3>".$var[$x]."</h3>";
                        echo "<h4>Price:".$var2[$x]."€ &times;".$var3[$x]."</h4>";
                        echo "</div><br>";
                    }
                    echo "<hr>";
                    echo "<div class=\"title1\"><h4>Order ID:".$row['id']."</h4></div>";
                    echo "<div class=\"title2\"><h4>Cost:".$row['cost']."€</h4></div>";
                    echo "<div class=\"title3\"><h4>Payment:".$row['payment']."</h4></div>";
                    echo "<div><h4>Date:".$row['date']."</h4></div>";
                 ?> </div><div class="deletediv">
                    <form action="delete_order.php" method="POST" onsubmit="alert('Order successfully deleted')"> 
                     <input type="hidden" name="orderid" value="<?php echo $row['id']; ?>">
                     <button class="deleteorder"> &times; Delete Order</button>
                 </form></div><br></div><br><br><?php } ?>
                 <?php if($count==0){ 
                    echo "You have no Orders Registered";
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