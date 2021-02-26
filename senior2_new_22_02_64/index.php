<?php include('h.php');?>
<?php require_once('Connections/condb.php');?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("badge").click(function(){
    $("div").animate({
      height: 'toggle'
    });
  });
});
</script> 

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
  min-height: 95%;
}

.fab {
  padding: 5px;
  font-size: 20px;
  width: 30px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 30%;
}
.fas {
  padding: 5px;
  font-size: 20px;
  width: 30px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 30%;
}

.fa:hover {
  opacity: 0.7;
}
.fa-line{
  color:green;
}
.fa-envelope{
  color:red;
}

    </style>
  </head>
  <body>
  <div class="container1">
  <div class=" w3-top ">
  
      <?php include('navbar2.php');?>
 
</div>
<br>
<br>
  

    
    <!--start show  product-->
    
    <div class="w3-container w3-black w3-padding-64 w3-large" id="menu">
      
     
        <!-- categories-->
        <div class="w3-row ">
        <div class=" ">
          <?php include('category.php');?>
        </div>
        </div>
        <div class="container">
        <br><br><br>
        <!-- product-->
        <div class="col-md-20 col-xs-24">
            <?php
            $t_id = $_GET['t_id'];
            $q = $_GET['q'];
            if($t_id !=''){
            include('listprd_by_type2.php');
            }else if($q!=''){
            include('listprd_by_q2.php');
            }else{
            include('listprd2.php');
            }
            ?>
          </div>
          
<!-- สคริปที่แสดงตัวเลขตะกร้า -->


          <!-- cart-->
         <div class="col-md-3">
            <?php
            include('cart.php');
            ?>
        </div>
        </div>
      </div>


<!--footer-->
<div class="card"  id="footer">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1874.0369002681907!2d99.87702785801535!3d20.04735129663459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30d7015b50ea57f3%3A0x1d8eac5f6f19c2c9!2zReC4q-C4oeC4teC4q-C4uOC5iOC4meC4lOC4tQ!5e0!3m2!1sth!2sth!4v1600746899964!5m2!1sth!2sth" width="100%" height="50%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    <div class="w3-half w3-left w3-margin-left" style="color: black;  padding-top: 5px; padding-bottom: 10px;">
      <br>
        <strong class="card-title" style="font-size: 20px; ">ช่องทางติดต่อ</strong>
      <br>
      <br>             
        <p class="card-text" style="font-size: 15px; padding: 2px;">
          <i class="fas fa-map-marker-alt"></i> ร้านอยู่ติดกับสำนักงานขายโครงการคชพลแลนด์ ม.แม่ฟ้าหลวง <br>
          <i class="fas fa-phone"></i> 088 267 8801<br>
            <a href="index.php?#footer" onclick="window.open('//www.facebook.com/EMeeHoonD/')" class="fab fa-facebook"></a>
            <a href="index.php?#footer" onclick="window.open('http://line.me/ti/p/~4731007048')" class="fab fa-line"></a>
            <a href="index.php?#footer" onclick="window.open('mailto:paulsingyang@gmail.com')" class="fas fa-envelope"></a>
            <br>
            <a href="login_admin.php"> Admin login </a> 
        </p>  
    </div>
    <!--div class="w3-half w3-right w3-margin-left">
      <img src="logoemee.png"  width="200" height="200" padding>
    </div-->
</div>
<!-- end footer-->
      <script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-red";
}
document.getElementById("myLink").click();
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
    </body>
  </html>
 