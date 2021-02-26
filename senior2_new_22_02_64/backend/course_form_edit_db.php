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
	
$cd_id = $_POST['cd_id'];
$m_id = $_POST['m_id'];
$c_id = $_POST['c_id'];
$cd_weekly = $_POST['cd_weekly'];
$meal_1 = $_POST['meal_1'];
$meal_2 = $_POST['meal_2'];
$meal_3 = $_POST['meal_3'];
$meal_4 = $_POST['meal_4'];
$meal_5 = $_POST['meal_5'];
$meal_1_1 = $_POST['meal_1_1'];
$meal_2_2 = $_POST['meal_2_2'];
$meal_3_3 = $_POST['meal_3_3'];
$meal_4_4 = $_POST['meal_4_4'];
$meal_5_5 = $_POST['meal_5_5'];
	

$sql = "UPDATE course_detail SET 
	m_id='$m_id',
	cd_weekly='$cd_weekly',
	meal_1='$meal_1',
	meal_2='$meal_2',
	meal_3='$meal_3',
	meal_4='$meal_4',
	meal_5='$meal_5',
	meal_1_1='$meal_1_1',
	meal_2_2='$meal_2_2',
	meal_3_3='$meal_3_3',
	meal_4_4='$meal_4_4',
	meal_5_5='$meal_5_5'
	WHERE cd_id='$cd_id'
	";

	$result = mysql_db_query($database_condb, $sql) or die ("Error in query: $sql " . mysql_error());

	

	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลสำเร็จ');";
	echo "window.location = 'course.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "alert('Error!!');";
	echo "window.location = 'course_form_edit.php'; ";
	echo "</script>";
}
?>




