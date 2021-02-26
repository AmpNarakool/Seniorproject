<meta charset="utf-8">
<?php
include('../Connections/condb.php');

$admin_id = $_POST['admin_id'];
$admin_user = $_POST['admin_user'];
$admin_pass = $_POST['admin_pass'];
$admin_name = $_POST['admin_name'];
	
$check ="SELECT admin_user, admin_name 
		FROM tbl_admin 
		WHERE admin_user = '$admin_user' 
		OR admin_name='$admin_name'
		";
$result1 = mysql_db_query($database_condb, $check) or die(mysql_error());
$num=mysql_num_rows($result1);

    if($num > 0)
    {
	    echo "<script>";
	    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มข้อมูลใหม่อีกครั้ง !');";
	    echo "window.history.back();";
	    echo "</script>";
    }else{

	$sql = "INSERT INTO tbl_admin
	(
		admin_user,
		admin_pass,
		admin_name
	)
	VALUES
	(
	'$admin_user',
	'$admin_pass',
	'$admin_name'
	)";

	$result = mysql_db_query($database_condb, $sql) or die("Error in query : $sql" .mysql_error());

	}
	

	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลเรียบร้อย');";
	echo "window.location = 'emp.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'emp.php'; ";
	echo "</script>";
}
?>