<meta charset="utf-8">
<?php
include('../Connections/condb.php');
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting( error_reporting() & ~E_NOTICE );

$admin_id = $_POST['admin_id'];
$admin_user = $_POST['admin_user'];
$admin_pass = $_POST['admin_pass'];
$admin_name = $_POST['admin_name'];

$sql = "UPDATE tbl_admin SET 
	admin_user='$admin_user',
	admin_pass='$admin_pass',
	admin_name='$admin_name'	
	WHERE admin_id='$admin_id' ";

	$result = mysql_db_query($database_condb, $sql) or die ("Error in query: $sql " . mysql_error());
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลเรียบร้อย');";
	echo "window.location = 'emp.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'emp.php'; ";
	echo "</script>";
}
?>