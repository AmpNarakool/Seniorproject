<?php include('h.php');?>
<?php require_once('Connections/condb.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">


    <style type="text/css">
    input[type=number]{
    width:40px;
    text-align:center;
    color:red;
    font-weight:600;
    },
    body, html {height: 100%}
    body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Amatic SC", sans-serif}
.menu {
  display: none;
  font-size: 12px;}
.bgimg {
  background-repeat: repeat;
  background-size:auto ;
  background-image: url("bg2.jpg");
  background-color:  "red";
  opacity: 0.8;
  min-height: 60%;
}
    </style>
  </head>
  <body>
  <div class="container1">
  <div class="w3-top ">
  
      <?php include('navbar2.php');?>
 
</div>
<br>
<br>
<div class="bgimg w3-display-container " id="home">
      <div class="w3-display-bottomleft w3-padding">
        <span class="w3-tag w3-xlarge">เปิดร้านทุกวัน 12:00น. - 22:00น. </span>
      </div>
      <div class="w3-display-center w3-center">
        <img src = "logoemee.png" width="300" height="300">
        <p><a href="#menu" class="w3-button w3-xxlarge w3-green">เมนูของเรา</a></p>
      </div>
    </div>


 <!--start show  product-->
 <div class="container">
 	<div class="row">
        <!-- product-->
        <div class="col-md-12 w3-padding-64">
         	 <?php  include('cart.php');?>
        </div>
    </div>
</div>
 <!--end show  product-->
 
  </body>
</html>
