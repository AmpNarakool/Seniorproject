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
<script src="https://kit.fontawesome.com/a076d05399.js"></script>


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
    <br><br>
<?php
session_start();
//print_r($_SESSION);
//echo $_SESSION['MM_Username'];
//echo "<hr>";
if($_SESSION['MM_Username'] !=''){
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
if (PHP_VERSION < 6) {
$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
}
$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
switch ($theType) {
case "text":
$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
break;
case "long":
case "int":
$theValue = ($theValue != "") ? intval($theValue) : "NULL";
break;
case "double":
$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
break;
case "date":
$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
break;
case "defined":
$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
break;
}
return $theValue;
}
}
$colname_pf = "-1";
if (isset($_SESSION['MM_Username'])) {
$colname_pf = $_SESSION['MM_Username'];
}
mysql_select_db($database_condb, $condb);
$query_pf = sprintf("SELECT * FROM tbl_member WHERE mem_username = %s", GetSQLValueString($colname_pf, "text"));
$pf = mysql_query($query_pf, $condb) or die(mysql_error());
$row_pf = mysql_fetch_assoc($pf);
$totalRows_pf = mysql_num_rows($pf);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include('h.php');?>
    <?php include('datatable.php');?>
    <style type="text/css">
      @media print{
      #hp{
        display:none;
      }
    }
    </style>
  </head>
  <body>

    <!--start show  product-->
    <div class="container">
      <div class="row">
        <!-- content-->
        <div class="col-md-12">
          <?php
              $page = $_GET['page'];
              if($page=='mycart'){
                include('mycart.php');
              }else{
              include('detail_order_afer_cartdone.php');
              }
              
          ?>
          
          
          
        </div>
      </div>
    </div>
    <!--end show  product-->

  </body>
</html>
<?php
mysql_free_result($pf);
} else{ include('logout.php'); }//seseion
?>
