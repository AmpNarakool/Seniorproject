<meta charset="utf-8">
<?php
require_once('../Connections/condb.php');
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting( error_reporting() & ~E_NOTICE );
 
 //Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());	
	
$m_id = $_POST['m_id'];
$m_name = $_POST['m_name'];
$t_id = $_POST['t_id'];
$m_detail = $_POST['m_detail'];
$m_price = $_POST['m_price'];
$m_img11 = $_POST['m_img11'];
$m_img22 = $_POST['m_img22'];
$m_img1 = (isset($_POST['m_img1']) ? $_POST['m_img1'] : '');
$m_img2 = (isset($_POST['m_img2']) ? $_POST['m_img2'] : '');

$upload=$_FILES['m_img1']['name'];;
	if($upload !='') { 
 
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
	
	}else{
		
		$newname = $m_img11;
				
	}
 
$upload2=$_FILES['m_img2']['name'];;
	if($upload2 !='') { 
 
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
		
		$newname2 = $m_img22;
				
	}
 
	

	$sql = "UPDATE menu SET 
	m_name='$m_name',
	t_id='$t_id',
	m_detail='$m_detail',
	m_img1='$newname',
	m_img2='$newname2',
	m_price='$m_price'
	WHERE m_id='$m_id'
	";

	$result = mysql_db_query($database_condb, $sql) or die ("Error in query: $sql " . mysql_error());

	mysql_close();

	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลสำเร็จ');";
	echo "window.location = 'food.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "alert('Error!!');";
	echo "window.location = 'food_form_edit.php'; ";
	echo "</script>";
}
?>




