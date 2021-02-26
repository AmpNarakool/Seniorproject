<meta charset="utf-8">
<?php
include('../Connections/condb.php');
	$t_id = $_POST["t_id"];
	$t_name = $_POST["t_name"];

	$date1 = date("Ymd_His");
	$numrand = (mt_rand());

	$sql = "UPDATE menu_type SET 
	t_id='$t_id',
	t_name='$t_name'
	WHERE t_id='$t_id'";

	$result = mysql_db_query($database_condb, $sql) or die ("Error in query: $sql " . mysql_error());
	

	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลเรียบร้อย');";
	echo "window.location = 'food_type.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'food_type.php'; ";
	echo "</script>";
}
?>