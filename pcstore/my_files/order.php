<?php
session_start();
include "config.php";
$uservar =$_SESSION["user"];
$sql="select * from orders where 1";
$result= $conn->query($sql);
$idcounter=1;
while($row = $result->fetch_assoc()) {
    if($row['id']==$idcounter)
    $idcounter++;
}
$idvar=$idcounter;
$date= date("Y-m-d h:i:s");
$text="";
for ($x = 1; $x <= $_SESSION["procount"]; $x++) {
    if($_POST["quant".$x]>0){
            $text=$text."..".$_POST["productn".$x];
    }
}
$productsvar =$text;
$text="";
for ($x = 1; $x <= $_SESSION["procount"]; $x++) {
    if($_POST["quant".$x]>0){
            $text=$text."..".$_POST["quant".$x];
    }
}
$quanvar =$text;
$costvar =$_POST["myordercost"];
$addressvar =$_POST["street"]." ".$_POST["streetno"];
$cityvar=$_POST["city"];
$postvar=$_POST["post"];
$payvar=$_POST["pay"];
$text="";
for ($x = 1; $x <= $_SESSION["procount"]; $x++) {
    if($_POST["quant".$x]>0){
            $text=$text."..".$_POST["productp".$x];
    }
}
$costsvar=$text;
$sql="INSERT INTO orders (user, id, date, products, quantities, cost, address, city, postcode, payment, costs)
                        VALUES ('".$uservar."','".$idvar."','".$date."','".$productsvar."','".$quanvar."','".$costvar."','".$addressvar."','".$cityvar."','".$postvar."','".$payvar."','".$costsvar."')";
                    $result= $conn->query($sql);
header( "Location: Home_page.php" );
?>
