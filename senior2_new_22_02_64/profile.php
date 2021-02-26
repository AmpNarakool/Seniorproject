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
  </head>
  <body>

 <!--start show  product-->
 <div class="container">
 	<div class="row">
    	<!-- menu-->
    	<div class="col-md-3">
        	  <?php include('m_menu.php');?>
        </div>
        <!-- content-->
        <div class="col-md-1"></div>
        <div class="col-md-6">
        
    <?php 
			 $do = $_GET['do'];
			 if($do =='edit-profile'){
					include('edit_profile.php');
			 }else{
		?>

    <?php
    $colname_editm = "-1";
    if (isset($_SESSION['MM_Username'])) {
      $colname_editm = $_SESSION['MM_Username'];
    }
    mysql_select_db($database_condb, $condb);
    $query_editm = sprintf("SELECT * FROM tbl_member WHERE mem_username = %s", GetSQLValueString($colname_editm, "text"));
    $editm = mysql_query($query_editm, $condb) or die(mysql_error());
    $row_editm = mysql_fetch_assoc($editm);
    $totalRows_editm = mysql_num_rows($editm);
    ?> 
          
          <a href="profile.php?do=edit-profile" class="btn btn-success" style="font-size:18px;">แก้ไขข้อมูลส่วนตัว</a> 
          <br><br>
          <form  name="register" action="edit_profile_db.php" method="POST" id="register" class="form-horizontal">

       <div class="form-group">
       	<div class="col-sm-2" align="right"> Username: </div>
          <div class="col-sm-5" align="left">
            <input  name="mem_username" type="text" disabled class="form-control" id="mem_username" value="<?php echo $row_editm['mem_username']; ?>" minlength="2"  />
          </div>
      </div>
        
        <div class="form-group">
        <div class="col-sm-2" align="right"> Password: </div>
          <div class="col-sm-5" align="left">
            <input  name="mem_password" type="password" disabled class="form-control" id="mem_password" placeholder="password" pattern="^[a-zA-Z0-9]+$" value="<?php echo $row_editm['mem_password']; ?>" minlength="2" />
          </div>
        </div>
        <div class="form-group">
        <div class="col-sm-2" align="right"> ชื่อ-สกุล: </div>
          <div class="col-sm-7" align="left">
            <input  name="mem_name" type="text" disabled class="form-control" id="mem_name" placeholder="ชื่อ-สกุล" value="<?php echo $row_editm['mem_name']; ?>" />
          </div>
        </div>
        
  
        <div class="form-group">
        <div class="col-sm-2" align="right"> อีเมล์: </div>
          <div class="col-sm-6" align="left">
            <input  name="mem_email" type="email" disabled class="form-control" id="mem_email"   placeholder="อีเมล์" value="<?php echo $row_editm['mem_email']; ?>"/>
          </div>
        </div>
        <div class="form-group">
        <div class="col-sm-2" align="right"> เบอร์โทร: </div>
          <div class="col-sm-6" align="left">
            <input  name="mem_tel" type="text" disabled class="form-control" id="mem_tel"  placeholder="เบอร์โทร" value="<?php echo $row_editm['mem_tel']; ?>" />
          </div>
        </div>
        <div class="form-group">
        <div class="col-sm-2" align="right"> ที่อยู่ : </div>
          <div class="col-sm-6" align="left">
            <textarea name="mem_address" disabled class="form-control" id="mem_address" required><?php echo $row_editm['mem_address']; ?></textarea> 
          </div>
        </div>
      <div class="form-group">
      <div class="col-sm-2"> </div>
          <div class="col-sm-6">
          <input name="mem_id" type="hidden" id="mem_id" value="<?php echo $row_editm['mem_id']; ?>">
          <input name="do" type="hidden" id="do" value="edit-profile">
          </div>
           
      </div>
      </form>        
            </p>
            
            <?php } ?>
            
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
