<?php
session_start();
include "config.php";
?>

<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PcStore - Products</title>
        <link rel="shortcut icon" type="image/png" href="images/categoriesicon.png" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            @media screen and (max-device-width: 600px) {
                #converter {
                    display: none;
                    padding-bottom: 10px;
                    width:100%;
                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                    background-color: #4CAF50;
                }
                #shipingcard {
                display: none;
                width: 100%;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                background-color: #4CAF50;
                }
                #paymentcard {
                    display: none;
                    width: 100%;
                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                    background-color: #4CAF50;
                }
                #cardinfos {
                display: none;
                width: 100%;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                background-color: #4CAF50;
                }
            }
            @media screen and (min-device-width: 601px) {
                #converter {
                    display: none;
                    margin-bottom: 50px;
                    margin-top: 50px;
                    padding-bottom: 10px;
                    width:100%;
                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                    background-color: #4CAF50;
                }
            #shipingcard {
                display: none;
                width: 50%;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                background-color: #4CAF50;
            }
            #cardinfos {
                display: none;
                width: 50%;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                background-color: #4CAF50;
            }
            #paymentcard {
                margin-left: 50%;
                display: none;
                width: 50%;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                background-color: #4CAF50;
            }
            }
            .shipinput {
                text-align:center;
                width: 50%;
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
                border: none;
                background-color: #3CBC8D;
                color: white;
            }
            .qship {
                background-color: rgb(231, 46, 46);
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }
            .paypic {
                width: 20px;
                height: auto;
            }
            .paypic1 {
  width: 30px;
  height: auto;
}
            #finalorderp {
                width: 50px;
                }
                #inputeu {
                text-align:center;
                width: 50%;
                max-width: 200px;
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
                border: none;
                background-color: #3CBC8D;
                color: white;
                }
                #inputdol {
                text-align:center;
                max-width: 200px;
                width: 50%;
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
                border: none;
                background-color: #3CBC8D;
                color: white;
                }
                #convtitle {
                    color: white;
                    padding-top: 10px;
                    margin:0;
                    height:100px;
                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                    background-color:#333;
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
            <li><a href="Photos.php">Our Photos</a></li>
            <?php } ?>
            <li id="about"><a href="#footer">About</a></li>
            <li id="about"><a href="#preconv" onclick="converter()">Converter</a></li>
            <?php if(isset($_SESSION["category"])){
            ?> 
            <li class="active"><a href="Products.php"><?php echo $_SESSION["category"]; ?></a></li>
            <?php } ?>
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
        <div id="preconv"> </div>
        <div id="converter">
                <div id="convtitle"><h2>Currency Converter</h2></div><br>
            <label>Euros :
            <input id="inputeu" type="number" oninput="LengthConverter(this.value)" onchange="LengthConverter(this.value)"></label>
            <hr><label> Dollars:
            <input id="inputdol" type="number" oninput="LengthConverter2(this.value)" onchange="LengthConverter2(this.value)"></label>
            </div>
        <?php if(!isset($_SESSION["loggedin"])){
            ?>
            <p id="warning">*You have to login first to place an order</p>
            <?php } ?>
            <form method="POST" id="orderform" action="order.php" onsubmit="alert('Your Order was placed')">
            <?php 
                 $sql=$sql="select * from products where procategory='".$_SESSION["category"]."'";
                 $result= $conn->query($sql);
                 $count=0;
                 while($row = $result->fetch_assoc()) {
                     $count++;
                        ?>
                        <div id="procardout">
                        <div id="product<?php echo $count; ?>" class="procard">
                        <img src="images/cat/<?php echo $row['proimage'];?>" class="propic" id="propic<?php echo $count; ?>">
                        <?php
                       echo "<h2 id=\"pname".$count."\">".$row['proname']."</h2>";
                       echo $row['prodescription'];
                       echo "<h2 id=\"pprice".$count."\">".$row['proprice']."€‎‎</h2>";
                       ?><input type="hidden" name="productp<?php echo $count; ?>" id="price<?php echo $count; ?>" value="<?php echo $row['proprice']; ?>"></div><br>
                       <input type="hidden" name="productn<?php echo $count; ?>" value="<?php echo $row['proname']; ?>">
                       <input type="number" name="quant<?php echo $count; ?>" class="quan" id="mybox<?php echo $count; ?>" value="0" readonly/>
                       <input type="button" class="min" id="min<?php echo $count; ?>" value="-" onclick="minus(<?php echo $count; ?>)"></input>
                        <input type="button" class="max" id="max<?php echo $count; ?>" value="+" onclick="plus(<?php echo $count; ?>)"></input>
                        <label class="button" onclick="disonoff(<?php echo $count; ?>)">
                        <i class="fa fa-shopping-cart"></i> Cart
                            <input type="checkbox" class="productbox" id="productbox<?php echo $count; ?>" name="prod" value="<?php echo $row['proname']; ?>" <?php if(!isset($_SESSION["loggedin"])) {echo "readonly";} ?>>
                        </label>
                 </div>
                       <?php
                       if( $count % 3 == 0) { echo "<br>"; }
                 }
                 $_SESSION["procount"]=$count;
            ?>

            <?php if( $count == 0) { echo "<br><br><h1>There are no products in this category yet</h1><br><br><br><br>"; } ?>    
            <?php if(isset($_SESSION["loggedin"])){
            ?>
            <a><input name="clear" id="clear" value="clear" type="button" onclick="clearance(<?php echo $count; ?>)"></a>
            <input name="chance" id="lucky" value="Lucky Shot" type="button" onclick="luck(<?php echo $count; ?>)"><br>
            <?php } ?>
            
        <!---->
        <br>
        <?php if(isset($_SESSION["loggedin"])){
            ?>
            <span id="shipbutton">
            <input class="button" type="button" value="Shipment Methods" onclick="shipopen(<?php echo $count; ?>)"><br>
            <br>
            </span>
            <?php } ?>
            
        <div id="shipingcard">
        <br><h2>Shipment Info:</h2><br>
                <label for="street">*Street:</label><br>
                <input type="text" class="shipinput" id="street" name="street" placeholder="Panepistimiou(mandatory)" required onkeypress="return (event.charCode > 64 && 
                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"><br><br>
                <label for="streetno">*Street No:</label><br>
                <input type="text" class="shipinput" id="streetno" name="streetno" required placeholder="10(mandatory)" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" maxlength="3"><br><br>
                <label for="city">*City:</label><br>
                <input type="text" class="shipinput" id="city" name="city" placeholder="Syntagma(mandatory)" required onkeypress="return (event.charCode > 64 && 
                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"><br><br>
                <label for="post">*Postal Code:</label><br>
                <input type="text" class="shipinput" id="post" name="post" placeholder="10563(mandatory)" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" maxlength="5"><br><br>
                <label for="quick" class="qship">express shipment
                <input type="checkbox" id="quick" name="quick" value="yes" onclick="quickship()">
                </label>
                <br>
                <a href="#product1"><input id="back" class="button" type="button" value="back" onclick="shipclose(<?php echo $count; ?>)"></a>
                <a href="#paymentcard"><input id="subship" class="button" type="button"  action="#paym" value="Next" onclick="showpay(<?php echo $count; ?>)"></a><br>
        </div>
        <br>
        <div id="paymentcard">
        <h2>Payment Method</h2>
                Order Price:<input id="finalorderp" name="myordercost" readonly>€<br><br>
                <input type="radio" id="cash" name="pay" value="cash" checked>
                <label for="cash">
                    <img class="paypic" src="images/cash.png">
                </label>
                <input type="radio" id="ccard" name="pay" value="card">
                <label for="ccard">
                    <img class="paypic" src="images/card.webp">
                </label>
                <br>
                <a href="#ship"><input id="back1" class="button" type="button" value="back" onclick="hidepay()"></a>
                <input id="fsub" class="button" type="button" value="Submit Method" onclick="sub()"><br>
        </div><br>
        <div id="cardinfos">
                <br>
                <h2>Card Info:</h2>
                <input type="radio" id="visa" name="payme" value="visa" >
                <label for="visa">
                    <img class="paypic1" src="images/visa.png">
                </label>
                <input type="radio" id="masterc" name="payme" value="mastercard" checked>
                <label for="masterc">
                    <img class="paypic1" src="images/master.png">
                </label>
                <br>
                <label for="cardno">*Card No:</label><br>
                <input type="text" id="cardno" class="shipinput" name="cardno" required placeholder="(mandatory)" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" maxlength="16" minlength="16"><br><br>
                <label for="oname">*Owner Name:</label><br>
                <input type="text" id="oname" class="shipinput" name="oname" placeholder="(mandatory)" required onkeypress="return (event.charCode > 64 && 
                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"><br>
                <label for="osmane">*Owner Surname:</label><br>
                <input type="text" id="osname" class="shipinput" name="osname" placeholder="(mandatory)" required onkeypress="return (event.charCode > 64 && 
                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"><br><br>
                <label for="exp1">*Expire Month:</label><br>
                <input type="text" id="exp1" class="shipinput" name="exp1" required placeholder="(mandatory)" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" maxlength="2" minlength="2"><br><br>
                <label for="exp2">*Expire Year:</label><br>
                <input type="text" id="exp2" class="shipinput" name="exp2" required placeholder="(mandatory)" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" maxlength="4" minlength="4"><br><br>
                <a href="#paym"><input id="back2" class="button" type="button" value="back" onclick="cardback()"></a>
                <input id="psub" class="button" type="submit" value="Submit Order"><br>
            </div>
    </form>
        <!---->
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <h1>Cart</h1>
            <div id="cartdivision"></div>
        </div>
        <?php if(isset($_SESSION["loggedin"])){
        ?>
        <button id="cartbutton" onclick="openNav(<?php echo $count; ?>)"><i class="fa fa-shopping-cart"></i></button>
        <?php } ?>
        <!---->
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