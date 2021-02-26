<?php require_once('Connections/condb.php'); ?>
<?php include('h.php');?>
<?php
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

$colname_mlogin = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_mlogin = $_SESSION['MM_Username'];
}
mysql_select_db($database_condb, $condb);
$query_mlogin = sprintf("SELECT * FROM tbl_member WHERE mem_username = %s", GetSQLValueString($colname_mlogin, "text"));
$mlogin = mysql_query($query_mlogin, $condb) or die(mysql_error());
$row_mlogin = mysql_fetch_assoc($mlogin);
$totalRows_mlogin = mysql_num_rows($mlogin);

$num_items_in_cart = isset($_SESSION['shopping_cart']) ? count($_SESSION['shopping_cart']) : 0;
?>


<nav class="navbar navbar-default">
<div class=" w3-bar  w3-green "  id="myNavbar">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header navbar-left">
      <a href="index.php"><img src="m_img/f128927630520200914_190700.png" alt="อีหมีหุ่นดี" width="50px" ></a>

    </div>


    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav navbar-right ">
        <li><a href="cart2.php" style="color:black" class="cart"><i class="fa fa-shopping-cart "><span class="badge"><?php echo $num_items_in_cart; ?></span></i></a></li>
        
  
<?php 
  $mm = ($_SESSION['MM_Username']);
  
  if($mm !=''){
    
    echo "<li>";
    echo "<a href='profile.php' style='color:black'>";
    echo  "โปรไฟล์คุณ," .$row_mlogin['mem_name'];
    echo "</a>";
    echo "</li>";
    
    echo "<?php include('category.php');?>";
    echo "<li><a href='logout.php' style='color:black'>ออกจากระบบ</a></li>";
    
  }else{
    echo "<li><a href='login.php' style='color:black' class='fa fa-user'> ลงทะเบียน / เข้าสู่ระบบ</a></li>";
   
  }
?>
                

        
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php
mysql_free_result($mlogin);
?>
