<meta charset="utf-8">
<?php
require_once('../Connections/condb.php');

	$b_id = (int) $_POST["b_id"];
	$b_name = $_POST["b_name"];
	$b_owner = $_POST["b_owner"];
	$b_number = $_POST["b_number"];

	//foreach ($_SESSION as $key => $value) {
		//echo($key ." ". $value ." ");
	//}

	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$b_img = (isset($_POST['b_img']) ? $_POST['b_img'] : '');
	$upload=$_FILES['b_img']['name'];
	if($upload !='') { 
	
		$path="../bimg/";
		$type = strrchr($_FILES['b_img']['name'],".");
		$newname ='f'.$numrand.$date1.$type;
		$path_copy=$path.$newname;
		$path_link="../bimg/".$newname;
		move_uploaded_file($_FILES['b_img']['tmp_name'],$path_copy);  
	}

	$sql = "INSERT INTO bank_account
	(
	b_name,
	b_owner,
	b_number,
	b_img
	)
	VALUES
	(
	'$b_name',
	'$b_owner',
	'$b_number',
	'$newname'
	)";

	$result = mysql_db_query($database_condb, $sql) or die(mysql_error($database_condb));

	mysql_close($database_condb);

	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = 'payment.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'payment.php'; ";
	echo "</script>";
}
?>