show=0;
shipprice = 2;
var q=new Array(0,0,0,0,0,0);
qon=0;
/*yes express shipment controller */
function quickship() {
    if(document.getElementById("quick").checked) {
        shipprice=8;
    }
    else {
        shipprice=2;
    }
}
/*yes Clear button function */
function clearance(procount) {
    if(disonoffswi==0){
    qon=0;
    for(s=1; s<=procount; s++){
        document.getElementById("productbox"+s).checked=false;
        document.getElementById("mybox"+s).value=0;
        document.getElementById("min"+s).style.display='none';
        document.getElementById("max"+s).style.display='none';
    }
}
}

/*yes random products button */
function luck(counter) {
    if(disonoffswi==0) {
    clearance(counter);
    for(s=1; s<=counter; s++){
    ritems=Math.floor(Math.random() * 6);
    document.getElementById("mybox"+s).value=ritems;
    if(ritems!=0){
        document.getElementById("productbox"+s).checked=true;
    }
    }
}
}
//yes
function cardback() {
    document.getElementById("ccard").disabled = false;
    document.getElementById("cash").disabled = false;
    document.getElementById('cardinfos').style.display='none'
    document.getElementById('back1').style.display='inline-block'
    document.getElementById('fsub').style.display='inline-block'
}
function palback() {
    document.getElementById("ccard").disabled = false;
    document.getElementById("cash").disabled = false;
    document.getElementById("paypal").disabled = false;
    document.getElementById('palinfos').style.display='none'
    document.getElementById('back1').style.display='inline-block'
    document.getElementById('fsub').style.display='inline-block'
}

/*yes Display payment methods */
function showpay(counterp) {
    x=document.getElementById('post').value;
    y = document.getElementById('street').value;
    z= document.getElementById('streetno').value;
    w= document.getElementById('city').value;   
    if(y.length == 0) {
        window.alert("Please Input your Street");
    }
    else if(z.length == 0 || z % 1 != 0) {
        window.alert("The Street Number has to be an integer");
    }
    else if(w.length == 0) {
        window.alert("Please Input your City");
    }
    else if(x.length != 5) {
        window.alert("The postal code has to be a 5digits integer");
    }
    else{
        thecart(counterp);
        document.getElementById("street").readOnly = true;
        document.getElementById("streetno").readOnly = true;
        document.getElementById("city").readOnly = true;
        document.getElementById("post").readOnly = true;
        document.getElementById("quick").disabled = true;
        document.getElementById('paymentcard').style.display='block';
        document.getElementById('back').style.display='none';
        document.getElementById('subship').style.display='none';
        document.getElementById("finalorderp").value = totalpayment;
    }
}
/*Display shipment */
sum=0;
tprice=0;
function showship(pcount) {
    place=0;
     alert(place);
    for(s=1; s<=pcount; s++){
        alert(place);
        if(document.getElementById("mybox"+s).value != 0){
            place=1;
        }
        alert(place);
    }
    if(place!=0){
        show=1;
        qon=1;
        document.getElementById("cprodiv").innerHTML = "\<br\>";
        cartfill();
        document.getElementById("product1").disabled = true;
        document.getElementById("product2").disabled = true;
        document.getElementById("product3").disabled = true;
        document.getElementById("product4").disabled = true;
        document.getElementById("product5").disabled = true;
        document.getElementById("product6").disabled = true;
        document.getElementById('ship').style.display='block'
        for(s=1; s<=6; s++){
            if(document.getElementById("mybox"+s).value==0) {
                document.getElementById("product"+s).checked=false;
            }
            document.getElementById("min"+s).style.display='none';
            document.getElementById("max"+s).style.display='none';
        }
        document.getElementById('clear').style.display = 'none';
        document.getElementById('shipbutton').style.display = 'none';
        document.getElementById('lucky').style.display = 'none';
        window.alert("With Express shipment the cost goes to:8€\nWithout Express is: 2€\nFor orders more than 1000€ shiping is FREE");
    }
else {
    window.alert("You didn't select any item");
}
}
/*Back to product selection */
function hideship() {
    document.getElementById('clear').style.display='inline-block'
    document.getElementById('lucky').style.display='inline-block'
    document.getElementById('shipbutton').style.display='block'
    document.getElementById('ship').style.display='none'
    document.getElementById("product1").disabled = false;
    document.getElementById("product2").disabled = false;
    document.getElementById("product3").disabled = false;
    document.getElementById("product4").disabled = false
    document.getElementById("product5").disabled = false;
    document.getElementById("product6").disabled = false;
    show=0;
}
/*yes Back to shipment method*/
function hidepay() {
    document.getElementById("street").readOnly = false;
        document.getElementById("streetno").readOnly = false;
        document.getElementById("city").readOnly = false;
        document.getElementById("post").readOnly = false;
        document.getElementById("quick").disabled = false;
        document.getElementById('paymentcard').style.display='none'
        document.getElementById('back').style.display='inline-block';
        document.getElementById('subship').style.display='inline-block';
        readon=0;
}
/*For payment method selection */
function sub() {
    if(document.getElementById("cash").checked) {
        document.getElementById('cardinfos').style.display='none'
        window.alert("Your Order was Successful")
        document.getElementById("orderform").submit(); 
    }
    if(document.getElementById("ccard").checked) {
        document.getElementById("cardno").required = true;
        document.getElementById("oname").required = true;
        document.getElementById("osname").required = true;
        document.getElementById("exp1").required = true;
        document.getElementById("exp2").required = true;
        document.getElementById('cardinfos').style.display= 'block';
        document.getElementById("cash").disabled = true;
        document.getElementById("paypal").disabled = true;
        document.getElementById('back1').style.display='none';
        document.getElementById('fsub').style.display='none';
    }
    
}

/*yes add product button */
function plus(i) {
    x= "mybox";
    x= x+i;
    if(document.getElementById(x).value<5){
    document.getElementById(x).value++;
    }
}
/*yes subtract product button*/
function minus(j) {
    x= "mybox";
    x= x+j;
    if(document.getElementById(x).value>0){
    document.getElementById(x).value--;
    }
}
/*yes express shipment controller */
disonoffswi=0;
function disonoff(a) {
    if(disonoffswi == 0){
    if(document.getElementById("productbox"+a).checked==false) {
        document.getElementById("min"+a).style.display='none'
        document.getElementById("max"+a).style.display='none'
        document.getElementById("mybox"+a).value=0;
    }
    else if(show==0 && !document.getElementById("productbox"+a).readOnly) {
        document.getElementById("max"+a).style.display='inline-block'
        document.getElementById("min"+a).style.display='inline-block'
    }
}
}
//yes Open the forgot password form
function openForm() {
    document.getElementById("myForm").style.display = "block";
}
//yes Close the forgot password form
function closeForm() {
    document.getElementById("myForm").style.display = "none";
}
t=0;
swi=0;
function Cart() {

    cartfill()
    if(qon==0){
        for(s=1;s<=6;s++){
            q[s]=0;
            }
    }
    for(s=1;s<=6;s++){
        if(q[s]!=0){
            swi=1;
        }
    }
    if(t==0 && swi==1 && qon==1){
        document.getElementById("about1").style.backgroundColor = "red";
        document.getElementById("forma").style.display = "none";
        document.getElementById("cartdiv").style.display = "block";
        t=1;
    }
    else if(t==1){
        document.getElementById("about1").style.backgroundColor = "#4CAF50";
        document.getElementById("forma").style.display = "block";
        document.getElementById("cartdiv").style.display = "none";
        t=0;
    }
    else{alert("Your cart is empty")}
}
function cartfill() {
    for(s=1;s<=6;s++){
        if(q[s]!=0){

    document.getElementById("cprodiv").insertAdjacentHTML("beforeend","\<div id=\"cproduct"+s+"\"\>"+
    "\<div id=\"ctitle"+s+"\"\>"+document.getElementById("title"+s).innerText+"\</div\>"+"\<br\>"+
    "\<div id=\"cprice"+s+"\"\>"+"1 Item Price:"+document.getElementById("p"+s).innerText+"€\</div\>"+"\<br\>"
    +"\<div id=\"cquan"+s+"\"\>"+"Quantity:"+document.getElementById("mybox"+s).value+" items\</div\>"+"\<br\>"
    +"\</div\>"+"\<br\>");
    }}
    quickship();
}
//yes The function for the theme change button
function changetheme() {
    them= document.getElementById("them").value;
    if(them==0) {
        document.getElementById("main").style.backgroundColor = "#333";
    document.getElementById("main").style.color = "white";
    document.getElementById("footer").style.backgroundColor = "#4CAF50";
    document.getElementById("footer").style.color = "#333";
    document.getElementById("them").value=1;
    document.getElementById("theme").innerHTML = "Light Mode";
    document.getElementById("theme").style.backgroundColor = "#4CAF50";
    document.getElementById("theme").style.color = "black";
    document.getElementById("bgimg").src = "images/playstation2.png";
    }
    else {
        document.getElementById("main").style.backgroundColor = "rgb(199, 228, 247)";
    document.getElementById("main").style.color = "black";
    document.getElementById("footer").style.backgroundColor = "#333";
    document.getElementById("footer").style.color = "white";
    document.getElementById("them").value=0;
    document.getElementById("theme").innerHTML = "Dark Mode";
    document.getElementById("theme").style.backgroundColor = "#333";
    document.getElementById("theme").style.color = "white";
    document.getElementById("bgimg").src = "images/playstation.png";
    }
}
//yes When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunction()};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled-1 + "%";
}
//yes Open or Close a chat form 
function openchat() {
    document.getElementById("chat").style.display = "block";
  }
  
  function closechat() {
    document.getElementById("chat").style.display = "none";
  }
// Set the date we're counting down to
var countDownDate = new Date("Aug 30, 2020 15:37:25").getTime();

// Update the count down every 1 second
var countdownfunction = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();
  
  // Find the distance between now an the count down date
  var distance = countDownDate - now;
  
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(countdownfunction);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
//yes this preserves the same theme
function keeptheme() {
    if(document.getElementById("mysession").innerHTML) {
    them= document.getElementById("mysession").innerHTML;
    if(them==1) {
        document.getElementById("main").style.backgroundColor = "#333";
    document.getElementById("main").style.color = "white";
    document.getElementById("footer").style.backgroundColor = "#4CAF50";
    document.getElementById("footer").style.color = "#333";
    document.getElementById("bgimg").src = "images/playstation2.png";
    
    }
    else {
        document.getElementById("main").style.backgroundColor = "rgb(199, 228, 247)";
    document.getElementById("main").style.color = "black";
    document.getElementById("footer").style.backgroundColor = "#333";
    document.getElementById("footer").style.color = "white";
    document.getElementById("bgimg").src = "images/playstation.png";
    }
    }
}
//yes
function openNav(counter) {
    thecart(counter);
    document.getElementById("mySidenav").style.display = "block";
  }
//yes
  function closeNav() {
    document.getElementById("mySidenav").style.display = "none";
  }
//yes
totalpayment=0;
  function thecart(pcounter) {
    document.getElementById("cartdivision").innerHTML ="";
    total=0;
    icounter=0;
    for(s=1;s<=pcounter;s++){
        for(m=1;m<=document.getElementById("mybox"+s).value;m++){
            icounter++;
            for(l=1;l<=document.getElementById("price"+s).value;l++){
                total++;
            }
            
        }
        if(document.getElementById("mybox"+s).value !=0 ){
            document.getElementById("cartdivision").insertAdjacentHTML("beforeend","<div class=\"cartpro\"><span><img src=\""+document.getElementById("propic"+s).src+"\" class=\"cartimages\"></span>");
            document.getElementById("cartdivision").insertAdjacentHTML("beforeend","<div class=\"cartnames\"><h3>"+document.getElementById("pname"+s).innerHTML+"</h3>"); 
            document.getElementById("cartdivision").insertAdjacentHTML("beforeend","<br><span>price:"+document.getElementById("pprice"+s).innerHTML+"</span><br><span> items:"+document.getElementById("mybox"+s).value+"</span></div></div><br><br>"); 

        }
    }
    quickship();
    if(total>=1000 && shipprice>=2) {shipprice=shipprice-2;}
    if(total<1000 && shipprice==0) {shipprice=shipprice+2;}
    if(total==0) {shipprice=0;}
    totalp=total + shipprice;
    totalpayment=totalp;
    document.getElementById("cartdivision").insertAdjacentHTML("beforeend","<hr><span id=\"summarycart\"><br><h2>Order Price:"
    +total+"€</h2><h3>Total Items:"+icounter+"</h3></span>");
    document.getElementById("cartdivision").insertAdjacentHTML("beforeend","<span id=\"summarycart2\"><br><h2>Shiping Cost:"
    +shipprice+"€</h2><h1>Total Price:"+totalp+"</h1></span>");
  }
  //yes
  function shipopen(pcounter) {
    icounter=0;
    for(s=1;s<=pcounter;s++){
        for(m=1;m<=document.getElementById("mybox"+s).value;m++){
            icounter++;
        }
    }
    if(icounter !=0 ){
        thecart(pcounter);
        window.alert("Shiping cost is 2€ for order  less than 1000€ \n"+
        "Shiping cost is free for order  more than 1000€ \n"+
        "For quick shiping is extra 6€");
        for(s=1;s<=pcounter;s++){
            disonoffswi=1;
            document.getElementById("productbox"+s).disabled = true;
            document.getElementById("max"+s).style.display= "none";
            document.getElementById("min"+s).style.display= "none";
            
        }
        document.getElementById("shipbutton").style.display = "none";
        document.getElementById("shipingcard").style.display = "block";
    }
    else {
        window.alert("You didn't select any item");
    }
  }
  function shipclose(pcounter) {
    for(s=1;s<=pcounter;s++){
        disonoffswi=0;
        document.getElementById("productbox"+s).disabled = false;
        
    }
    document.getElementById("shipbutton").style.display = "block";
    document.getElementById("shipingcard").style.display = "none";
  }
  function LengthConverter(valNum) {
    document.getElementById("inputdol").value=Number(valNum * 1.12).toFixed(2);
  }
  function LengthConverter2(valNum) {
    document.getElementById("inputeu").value=Number(valNum / 1.12).toFixed(2);
  }
  conv=0;
  function converter() {
    if(conv==1) {
        document.getElementById("converter").style.display = "none";
        conv=0;
    }
    else {
        document.getElementById("converter").style.display = "block";
        conv=1;
    }
}