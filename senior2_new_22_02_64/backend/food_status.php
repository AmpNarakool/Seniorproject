<meta charset="UTF-8" />
<?php
include('../Connections/condb.php');
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting( error_reporting() & ~E_NOTICE );
 

$food_status = $_POST['food_status'];
$order_id = $_POST['order_id'];
$order_status = $_POST['order_status'];

 
$sql ="UPDATE orders SET	 
		food_status='$food_status',
		order_status='$order_status'
		WHERE order_id=$order_id
	 ";
		
		$result = mysql_db_query($database_condb, $sql) or die("Error in query : $sql" .mysql_error());
//  echo $sql;
// exit();
		mysql_close();
		
		if($result){
			echo "<script>";
			echo "alert('เพิ่มสถานะ !');";
			echo "window.location ='index.php?order_id=$order_id&act=show-order'; ";
			echo "</script>";
		} else {
			
			echo "<script>";
			echo "alert('ERROR!');";
			echo "window.location ='menu.php'; ";
			echo "</script>";
		}
		


?>