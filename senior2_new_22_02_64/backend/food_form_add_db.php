<meta charset="utf-8">
<?php
require_once('../Connections/condb.php');

	$m_id = $_POST['m_id'];
	$m_name = $_POST['m_name'];
	$t_id = $_POST['t_id'];
	$m_detail = $_POST['m_detail'];
	$m_price = $_POST['m_price'];
	$m_img11 = $_POST['m_img11'];
	$m_img22 = $_POST['m_img22'];
	$m_img1 = (isset($_POST['m_img1']) ? $_POST['m_img1'] : '');
	$m_img2 = (isset($_POST['m_img2']) ? $_POST['m_img2'] : '');
	//foreach ($_SESSION as $key => $value) {
		//echo($key ." ". $value ." ");
	//}

	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$upload=$_FILES['m_img1'];
	if($upload <> '') { 
 
	//โฟลเดอร์ที่เก็บไฟล์
	$path="../m_img/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['m_img1']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname ='img1'.$numrand.$date1.$type;
 
	$path_copy=$path.$newname;
	$path_link="../m_img/".$newname;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['m_img1']['tmp_name'],$path_copy);  
		
	}else{}

	// img2

	$upload2=$_FILES['m_img2']['name'];
	if($upload2 <> '') { 
 
	//โฟลเดอร์ที่เก็บไฟล์
	$path2="../m_img/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type2 = strrchr($_FILES['m_img2']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname2 ='img2'.$numrand.$date1.$type2;
 
	$path_copy2=$path2.$newname2;
	$path_link2="../m_img/".$newname2;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['m_img2']['tmp_name'],$path_copy2);  
		
	
	}else{
		$newname2='';
	}
	//ตรงไหนอะ
	//หน้านี้เลยๆ มันแอดข้อมูลไม่ได้
	$sql = "INSERT INTO menu	
	(
		m_name,
		t_id,
		m_detail,
		m_price,
		m_img1,
		m_img2
		)
		
		VALUES
		
		(
		'$m_name',
		'$t_id',
		'$m_detail',
		'$m_price',
		'$newname',
		'$newname2'		
		)";

$result = mysql_db_query($database_condb, $sql) or die("Error in query : $sql" .mysql_error());

	

	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = 'food.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'food.php'; ";
	echo "</script>";
}
?>