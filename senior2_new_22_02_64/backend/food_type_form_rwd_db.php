<meta charset="utf-8">
<?php
	include('../connection.php');
	$u_id  = $_POST["u_id"];
	$password  = sha1($_POST["password"]);

	$sql = "UPDATE users SET 
	password='$password'
	WHERE u_id=$u_id
	 ";
	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
	mysqli_close($conn);
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขรหัสผ่านเรียบร้อย');";
	echo "window.location = 'emp.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'emp.php'; ";
	echo "</script>";
}
?>