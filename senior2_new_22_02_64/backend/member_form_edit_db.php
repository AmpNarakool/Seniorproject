<meta charset="utf-8">
<?php
include('../Connections/condb.php');
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting( error_reporting() & ~E_NOTICE );

$mem_id = $_POST['mem_id'];
$mem_username = $_POST['mem_username'];
$mem_password = $_POST['mem_password'];
$mem_name = $_POST['mem_name'];
$mem_email = $_POST['mem_email'];
$mem_tel = $_POST['mem_tel'];
$mem_address = $_POST['mem_address'];




	$sql = "UPDATE tbl_member SET 
	mem_username='$mem_username',
	mem_password='$mem_password',
	mem_name='$mem_name',
	mem_email='$mem_email',
	mem_tel='$mem_tel',
	mem_address='$mem_address'	
	WHERE mem_id='$mem_id' ";

	$result = mysql_db_query($database_condb, $sql) or die ("Error in query: $sql " . mysql_error());
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลเรียบร้อย');";
	echo "window.location = 'member.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'member.php'; ";
	echo "</script>";
}
?>