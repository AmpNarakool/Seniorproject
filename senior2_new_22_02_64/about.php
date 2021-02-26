<?php include('h.php');?>
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
<!-- About Container -->
    <div class="w3-container w3-padding-64 w3-green w3-opacity-min w3-xlarge" id="about">
        <div class="w3-content1">
            <h1 class="w3-center w3-jumbo" style="margin-bottom:58px">เกี่ยวกับเรา</h1>
            <div class="w3-half w3-left w3-large w3-padding">
                <p >ที่ “E หมีหุ่นดี” เพราะเรารู้ดี ว่าการพยายามลดน้ำหนัก มันลำบากยากเย็นเพียงใด <i class="fas fa-exclamation w3-text-red"></i><i class="fas fa-exclamation w3-text-red"></i></p>
                <p>จากประสบการณ์ตรงของเจ้าของร้าน ที่เคยมีน้ำหนักเกินกว่ามาตรฐาน(110 กก) ผ่านการลดน้ำหนักด้วยเทคนิคต่างๆบนโลกโซเชี่ยลที่ใครๆก็บอกว่าดี 
                    ครั้งแล้วครั้งเล่าจนนับครั้งไม่ถ้วน <i class="fas fa-exclamation w3-text-red"></i><i class="fas fa-exclamation w3-text-red"></i> สุดท้ายอ้วนกว่าเดิม <i class="fas fa-sad-cry w3-text-yellow"></i></p>
                <p>จนกระทั่งมาค้นพบวิธีลดน้ำหนักวิธีนึง ซึ่งเห็นผลมากๆ นั่นคือ “เดินสายกลาง” ไม่มากไปและไม่น้อยไป
                    จึงเกิดมาเป็นอาหารลดน้ำหนักที่ทานง่าย ไม่เบื่อ ปรุงแต่งน้อย และที่สำคัญไม่จำเจ ทานได้ตลอดเวลา</p>
                <p>“มีน้องๆหลายท่านกังวลเกี่ยวกับการลดน้ำหนักมากเกินไป 
                    อยากลดได้เดือนละ 5 กก. บางคนเคร่งเรื่องการกินมากเกินไป(นับแคลลอรี่) บางคนก็ทานอาหารน้อยมากๆจนบางครั้งก็ไม่ทานเลย” 
                    ที่กล่าวมาทั้งหมดนี้ล้วนเคยเกิดขึ้นกับพี่มาแล้วทั้งสิ้นครับ ดังนั้นพี่ย่อมเข้าใจหัวอกน้องเป็นธรรมดา </p>
                <p>ถ้าน้องๆอยากลดน้ำหนักจริงๆ ลองเข้ามาปรึกษาที่ร้านดูก่อนได้ครับ ทางร้านยังยินดีให้คำปรึกษา และแนะนำเทคนิคการควบคุมอาหารวิธีต่างๆที่ได้ผล 100% แต่ขออย่างเดียวขอให้น้องตั้งใจนะครับ 
                    พี่กล้าการันตีว่าพี่จะไม่ทำให้น้องผิดหวังเลย <i class="fas fa-heart w3-text-red"></i></p>
            </div>
            <div class="w3-half w3-right  " style=" width:45%;">  
                <img src="p_emee.jpg">
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
                    <a href="about.php"> เกี่ยวกับเรา </a> 
                    <br>
                    <a href="login_admin.php"> Admin login </a> 
                </p>  
            </div>
    <!--div class="w3-half w3-right w3-margin-left">
      <img src="logoemee.png"  width="200" height="200" padding>
    </div-->
<!-- end footer-->
</div>

<!--end-->
</div>
</body>
</html>