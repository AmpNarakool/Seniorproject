<meta charset="UTF-8" />
<?php
include('../Connections/condb.php');
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting( error_reporting() & ~E_NOTICE );
 

$food_status = $_POST['status_order'];
$order_id = $_POST['order_id'];
// $order_status = $_POST['order_status'];
	
$sql ="UPDATE orders SET order_status=$food_status WHERE order_id= $order_id";
		$result = mysql_query($sql, $condb) or die(mysql_error());
//  echo $sql;
// exit();
		mysql_close();
		
		if($result){
			echo "<script>";
			echo "alert('เพิ่มสถานะ !');";
			echo "window.location ='index.php' ";
			echo "</script>";
		} else {
			
			echo "<script>";
			echo "alert('ERROR!');";
			echo "window.location ='index.php?order_id=$order_id&act=show-order'; ";
			echo "</script>";
		}
		


?>