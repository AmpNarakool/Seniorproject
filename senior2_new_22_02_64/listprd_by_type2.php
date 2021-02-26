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
	height: 100%;

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
$t_id = $_GET['t_id'];
mysql_select_db($database_condb, $condb);
$query_prd = "SELECT * FROM menu WHERE t_id=$t_id ORDER BY m_id ";
$prd = mysql_query($query_prd, $condb) or die(mysql_error());
$row_prd = mysql_fetch_assoc($prd);
$totalRows_prd = mysql_num_rows($prd);

if($totalRows_prd > 0) { ?>

<?php do { ?>
  <div class="col-sm-2 img-resize" align="center">
  <img src="m_img/<?php echo $row_prd['m_img1'];?>" />
  <p align="center">
      <b><?php echo $row_prd['m_name']; ?> <font color="pink">  
      <br />       
      <?php echo $row_prd['m_price']; ?>  บาท </font> </b>
      <br />      
    <div>
    <a href="index.php?m_id=<?php echo $row_prd['m_id'];?>&act=add" class="btn btn-success btn-xs add-to-cart"> 
    <span class="glyphicon glyphicon-shopping-cart"></span> <?php include('backend/edit-ok.php');?>  สั่งซื้อ </a>
    </div>
  </p>

    <!-- สคริปที่แสดงตัวเลขตะกร้า -->
    
    
    
      
      
    </div>
  <?php } while ($row_prd = mysql_fetch_assoc($prd)); ?>

  <?php } else{
      echo "<h4 align='center'>";
      echo "ยังไม่เปิดให้บริการขณะนี้";
      echo "</h4>";
   }?>
<?php
mysql_free_result($prd);
?>
</body>
</html>