<meta charset="utf-8">
<?php
require_once('../Connections/condb.php');

	$cd_id = $_POST["cd_id"];
	$m_id =  $_POST["m_id"];
	$c_id =  $_POST["c_id"];
	$cd_weekly = $_POST["cd_weekly"];
	$meal_1 = $_POST["meal_1"];
	$meal_2 = $_POST["meal_2"];
	$meal_3 = $_POST["meal_3"];
	$meal_4 = $_POST["meal_4"];
	$meal_5 = $_POST["meal_5"];
	$meal_1_1 = $_POST["meal_1_1"];
	$meal_2_2 = $_POST["meal_2_2"];
	$meal_3_3 = $_POST["meal_3_3"];
	$meal_4_4 = $_POST["meal_4_4"];
	$meal_5_5 = $_POST["meal_5_5"];
	

	//foreach ($_SESSION as $key => $value) {
		//echo($key ." ". $value ." ");
	//}

	//$date1 = date("Ymd_His");
	//$numrand = (mt_rand());
	//$m_img = (isset($_POST['m_img']) ? $_POST['m_img'] : '');
	//$upload=$_FILES['m_img']['name'];
	//if($upload !='') { 
	
		//$path="../m_img/";
		//$type = strrchr($_FILES['m_img']['name'],".");
		//$newname ='f'.$numrand.$date1.$type;
		//$path_copy=$path.$newname;
		//$path_link="../m_img/".$newname;
		//move_uploaded_file($_FILES['m_img']['tmp_name'],$path_copy);  
	//}

	$sql = "INSERT INTO course_detail
	(

	m_id,
	cd_weekly,
	
	meal_1,
	meal_2,
	meal_3,
	meal_4,
	meal_5,
	meal_1_1,
	meal_2_2,
	meal_3_3,
	meal_4_4,
	meal_5_5
	)
	VALUES
	(

	'$m_id',
	'$cd_weekly',
	'$meal_1',
	'$meal_2',
	'$meal_3',
	'$meal_4',
	'$meal_5',
	'$meal_1_1',
	'$meal_2_2',
	'$meal_3_3',
	'$meal_4_4',
	'$meal_5_5'
	)";

$result = mysql_db_query($database_condb, $sql) or die("Error in query : $sql" .mysql_error());


	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = 'course.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'course.php'; ";
	echo "</script>";
}
?>