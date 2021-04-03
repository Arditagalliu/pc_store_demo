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
            .actiondiv {
                width: 100%;
                background-color: #4CAF50;
            }
            textarea {
            resize: none;
            }
            #catdesc, #prodesc {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                text-align:center;
                max-width: 200px;
                width: 50%;
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
                background-color: #3CBC8D;
                color: white;
                }
                #catname, #proname {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                text-align:center;
                border:none;
                max-width: 200px;
                width: 50%;
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
                background-color: #3CBC8D;
                color: white;
                }
                .titlediv {
                    color: white;
                    padding-top: 10px;
                    margin:0;
                    height:100px;
                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                    background-color:#333;
                }
                input[type="file"] {
                    display: none;
                }
                #category {
                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                    border: none;
                    background-color: #3CBC8D;
                }
                #proprice {
                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                    border: none;
                    max-width: 50px;
                    background-color: #3CBC8D;
                }
                .upload {
                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                    border: 1px solid #ccc;
                    display: inline-block;
                    padding: 6px 12px;
                    cursor: pointer;
                }
                .insertsub {
                    border:none;
                    background-color: #4CAF50;
                    color: white;
                }
                #forma1, #forma2, #forma3, #forma4, #forma5, #forma6 {
                    display:none;
                }
                .closefbutton {
                    margin-left:90%;
                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                    border:none;
                    background-color: red;
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
            <li><a href="Admin_login.php">Home</a></li>
            <?php if(isset($_SESSION["loggedina"])){
            ?> 
            <li class="active"><a href="Admin_panel.php">Control Panel</a></li>
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
        <div class="actiondiv">
            <div class="titlediv" onclick="document.getElementById('forma1').style.display= 'block';"><br><h3>Insert Category</h3></div>
            <form action="insert_cat.php" method="POST" id="forma1" enctype="multipart/form-data" onsubmit="alert('Inserted Category Successfully')">
                <br>
            <button class="closefbutton" type="button" onclick="document.getElementById('forma1').style.display= 'none';">&times;</button>
                <br>
                <label for="catname"><h5>Category Name*</h5></label>
                <input type="text" name="catname" id="catname" required><br>
                <label for="catpic"><h5>Upload a Picture*</h5><br><div class="upload">Upload</div></label>
                <input type="file" name="image" id="catpic" required><br>
                <label for="catdescr"><h5>Description*</h5></label>
                <textarea name="catdesc" id="catdesc" required></textarea>
                <h1><input type="submit" value="Insert" class="insertsub"><h1><br>
            </form>
        </div>
        <br>
        <div class="actiondiv">
        <div class="titlediv" onclick="document.getElementById('forma2').style.display= 'block';"><br><h3>Insert Product</h3></div>
            <form action="insert_product.php" method="POST" id="forma2" enctype="multipart/form-data" onsubmit="alert('Inserted Product Successfully')">
            <br>
            <button class="closefbutton" type="button" onclick="document.getElementById('forma2').style.display= 'none';">&times;</button>
                <br>
                <label for="proname"><h5>Product Name*</h5></label>
                <input type="text" name="proname" id="proname" required><br>
                <label for="proprice"><h5>Product Price*</h5></label>
                <input type="number" name="proprice" id="proprice" required> €‎‎<br>
                <label for="category"><h5>Category*</h5></label>
                <select name="category" id="category">
                <?php 
                $sql="select * from categories";
                $result= $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                ?>
                    <option value="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></option>
                <?php } ?>
                </select>
                <br>
                <label for="propic"><h5>Upload a Picture*</h5><br><div class="upload">Upload</div></label>
                <input type="file" name="propic" id="propic" required><br>
                <label for="prodesc"><h5>Description*</h5></label>
                <textarea name="prodesc" id="prodesc" required></textarea>
                <h1><input type="submit" value="Insert" class="insertsub"><h1><br>
            </form>
        </div>
        <br>
        <div class="actiondiv">
            <div class="titlediv" onclick="document.getElementById('forma3').style.display= 'block';"><br><h3>Delete Category</h3></div>
            <form action="delete_cat.php" method="POST" id="forma3" onsubmit="alert('Deleted Category Successfully')">
                <br>
            <button class="closefbutton" type="button" onclick="document.getElementById('forma3').style.display= 'none';">&times;</button>
                <br>
                <label for="catname"><h5>Category Name*</h5></label>
                <select name="catname" id="catname">
                <?php 
                $sql="select * from categories";
                $result= $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                ?>
                    <option value="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></option>
                <?php } ?>
                </select>    
                <br>
                <input type="checkbox" required>I agree on deleting</input>
                <h1><input type="submit" value="Delete" class="insertsub"><h1><br>
            </form>
        </div>
        <br>
        <div class="actiondiv">
            <div class="titlediv" onclick="document.getElementById('forma4').style.display= 'block';"><br><h3>Delete Product</h3></div>
            <form action="delete_pro.php" method="POST" id="forma4" onsubmit="alert('Deleted Product Successfully')">
                <br>
            <button class="closefbutton" type="button" onclick="document.getElementById('forma4').style.display= 'none';">&times;</button>
                <br>
                <label for="proname"><h5>Product Name*</h5></label>
                <select name="proname" id="proname">
                <?php 
                $sql="select * from products";
                $result= $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                ?>
                    <option value="<?php echo $row['proname']; ?>"><?php echo $row['proname']; ?></option>
                <?php } ?>
                </select><br>
                <input type="checkbox" required>I agree on deleting</input>
                <h1><input type="submit" value="Delete" class="insertsub"><h1><br>
            </form>
        </div>
        <br>
        <div class="actiondiv">
            <div class="titlediv" onclick="document.getElementById('forma5').style.display= 'block';"><br><h3>Update Product</h3></div>
            <form action="update_pro.php" method="POST" id="forma5" enctype="multipart/form-data" onsubmit="alert('Updated Product Successfully')">
                <br>
            <button class="closefbutton" type="button" onclick="document.getElementById('forma5').style.display= 'none';">&times;</button>
                <br>
                <label for="proname"><h5>Product to Update*</h5></label>
                <select name="proname" id="proname" required>
                <?php 
                $sql="select * from products";
                $result= $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                ?>
                    <option value="<?php echo $row['proname']; ?>"><?php echo $row['proname']; ?></option>
                <?php } ?>
                </select>
                <br>
                <label for="newcname"><h5>NEW Product Name</h5></label>
                <input type="text" name="newcname" id="catname"><br>
                <label for="proprice"><h5>NEW Product Price*</h5></label>
                <input type="number" name="proprice" id="proprice" required> €‎‎<br>
                <label for="newcimage"><h5>Upload a NEW Picture</h5><br><div class="upload">Upload</div></label>
                <input type="file" name="newcimage" id="newcimage"><br>
                <label for="newcdescr"><h5>NEW Description*</h5></label>
                <textarea name="newcdesc" id="catdesc"></textarea><br>
                <input type="checkbox" required>I agree on updating</input>
                <h1><input type="submit" value="Update" class="insertsub"><h1><br>
            </form>
        </div>
        <br>
        <div class="actiondiv">
            <div class="titlediv" onclick="document.getElementById('forma6').style.display= 'block';"><br><h3>Update Category</h3></div>
            <form action="update_cat.php" method="POST" id="forma6" enctype="multipart/form-data" onsubmit="alert('Update Category Successfully')">
                <br>
            <button class="closefbutton" type="button" onclick="document.getElementById('forma6').style.display= 'none';">&times;</button>
            <br>
                <label for="catname"><h5>Category to Update*</h5></label>
                <select name="catname" id="catname">
                <?php 
                $sql="select * from categories";
                $result= $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                ?>
                    <option value="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></option>
                <?php } ?>
                </select>    
                <br>
                <label for="newcname"><h5>NEW Category Name</h5></label>
                <input type="text" name="newcname" id="catname"><br>
                <label for="newcimage"><h5>Upload a NEW Picture</h5><br><div class="upload">Upload</div></label>
                <input type="file" name="newcimage" id="newcimage"><br>
                <label for="newcdescr"><h5>NEW Description*</h5></label>
                <textarea name="newcdesc" id="catdesc"></textarea><br>
                <input type="checkbox" required>I agree on updating</input>
                <h1><input type="submit" value="Update" class="insertsub"><h1><br>
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