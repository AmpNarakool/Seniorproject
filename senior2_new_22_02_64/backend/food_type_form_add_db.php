<meta charset="utf-8">
<?php
include('../Connections/condb.php');
$t_id = $_POST["t_id"];
$t_name = $_POST["t_name"];

$date1 = date("Ymd_His");
$numrand = (mt_rand());

	$check = "
	SELECT t_name
	FROM menu_type  
	WHERE t_name = '$t_name' 
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

	$sql = "INSERT INTO menu_type
	(t_id, t_name) VALUES ('$t_id','$t_name')";

	$result = mysql_db_query($database_condb, $sql) or die ("Error in query: $sql " . mysql_error());

	}


	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลเรียบร้อย');";
	echo "window.location = 'food_type.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'food_type.php'; ";
	echo "</script>";
}
?>