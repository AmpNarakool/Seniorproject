<?php require_once('../Connections/condb.php'); ?>
<?php include('access.php');?>
<!DOCTYPE html>
<html>
<title>การเงิน</title>
<link rel = "icon" href ="logo.jpg"  type = "image/x-icon">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include('h.php');?>
  <?php include('datatable.php');?>
  
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>


<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
html {
overflow: -moz-scrollbars-vertical; 
overflow-y: scroll;
}
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width:5%;
  border-radius: 5%;
}
form.search input[type=text] {
  padding: 5px;
  margin-left: 15px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: while;
}

form.search button {
  float: left;
  width: 10%;
  padding: 5px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.search button:hover {
  background: #0b7dda;
}


</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-green w3-large" style="z-index:2">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i> </button>
  <span class="w3-bar-item w3-right">Eหมี-หุ่น-ดี</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="logo.jpg" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <font>Welcome,<?php include('mm.php');?>
     <br>
      </font>
     <br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Admin</h5>
  </div>
  <div class="w3-bar-block">
    <a href="index.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-clipboard-list"></i> คำสั่งซื้อทั้งหมด </a>
    <a href="sale.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-chart-line"></i>  ยอดขาย </a>
    <a href="food_type.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-calendar-plus"></i>  เพิ่มประเภทเมนู</a>  
    <a href="food.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book-medical"></i>  เพิ่มเมนู</a>
    <a href="payment.php" class="w3-bar-item w3-button w3-padding w3-green "><i class="fa fa-cash-register"></i>  การเงิน</a>
    <a href="course.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-list-alt"></i>  คอร์สอาหาร</a>
    <a href="member.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user-edit"></i>  รายชื่อสมาชิก</a>
    <a href="emp.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users"></i>  รายชื่อพนักงาน</a>
    <a href="../logout.php" onclick="return confirm('ย้นยันการออกจากระบบ');" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out-alt"></i>  ออกจากระบบ</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<div class="main">
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-bell"></i> ข้อมูลธนาคาร</b> <a href="payment.php?act=add" class="btn-info btn-sm">+ เพิ่มข้อมูล +</a></h5>
  </header>
        <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
             
              
              <div class="box-body">
              <div class="col-sm-12">
              <?php
                  $act = $_GET['act'];
                    if($act == 'add'){
                    include('payment_form_add.php');
                    }elseif ($act == 'edit') {
                    include('payment_form_edit.php');
                    }elseif ($act == 'option') {
                    include('payment_form_add_option.php');
                    }elseif($act=='pro'){
                    include('payment_pro_form_edit.php');
                    }else {
                    include('payment_list.php');
                    }
                ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>
<!-- container section end -->

<!-- javascripts -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>

<!--custome script for all page-->
<script src="js/scripts.js"></script>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</body>
</html>
