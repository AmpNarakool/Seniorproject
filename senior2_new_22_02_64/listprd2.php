<!DOCTYPE html>
<html lang="en">
<body>
<style type="text/css">
div.img-resize img {
	height: 200px;
  width: 200px;
  padding: 10px
}

div.img-resize {
	height: 50%;

	text-align: center;
}
</style>


<?php //require_once('Connections/condb.php'); ?>
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

mysql_select_db($database_condb, $condb);
$query_prd = "SELECT * FROM menu ORDER BY m_id DESC LIMIT 12";
$prd = mysql_query($query_prd, $condb) or die(mysql_error());
$row_prd = mysql_fetch_assoc($prd);
$totalRows_prd = mysql_num_rows($prd);
?>
<?php do { ?>
  <div class="col-sm-2 img-resize" align="center">
  <img src="m_img/<?php echo $row_prd['m_img1'];?>" />
    <p align="center">
        <b><?php echo $row_prd['m_name']; ?> <font color="green">  
        <br/>
      <?php echo $row_prd['m_price']; ?>  บาท </font> </b>
        <br/>  
      <?php include('outstock2.php');?>
    </p>

    <!-- สคริปที่แสดงตัวเลขตะกร้า -->
   
    

    </div>
  <?php } while ($row_prd = mysql_fetch_assoc($prd)); ?>
<?php
mysql_free_result($prd);
?>
</body>
</html>