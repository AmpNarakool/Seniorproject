<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	error_reporting( error_reporting() & ~E_NOTICE );
    @session_start();  
	

	// echo "<pre>";
	// print_r($_SESSION);
	// echo "<hr>";
	// print_r($_POST);
	// echo "</pre>";
	// exit();

?>



<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php
   
require_once('Connections/condb.php');

//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
	$mem_id = $_POST['mem_id'];
	$name = $_POST["name"]; 
	$address = $_POST["address"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$m_c_qty = $_POST["m_c_qty"];
	$total = $_POST['total'];
	$order_date = date("Y-m-d H:i:s");
	$order_status = 1;
	$pay_slip ='';
	$b_name ='';
	$b_number ='';
	$pay_date ='';
	$pay_amount ='';
	$m_name = $_POST['m_name'];
	$food_status='';

	
	//บันทึกการสั่งซื้อลงใน order_detail
	mysql_db_query($database_condb, "BEGIN"); 
	$sql1 = "INSERT  INTO orders VALUES
	('$order_id',
	'$mem_id',  
	'$name',
	'$address',
	'$email',
	'$phone',
	'$order_status',
	'$pay_slip',
	'$b_name',
	'$b_number',
	'$pay_date',
	'$pay_amount',
	'$food_status',
	'$order_date' 
	)";
	
	$query1	= mysql_db_query($database_condb, $sql1) or die ("Error in query: $sql1 " . mysql_error());
	

 
 
	$sql2 = "SELECT MAX(order_id) AS order_id FROM orders  WHERE mem_id='$mem_id'";
	$query2	= mysql_db_query($database_condb, $sql2);
	$row = mysql_fetch_array($query2);
	$order_id = $row['order_id'];
	
	
	foreach($_SESSION['shopping_cart'] as $m_id=>$m_c_qty)
	 
	{
		$sql3	= "SELECT * FROM menu where m_id=$m_id";
		$query3 = mysql_db_query($database_condb, $sql3);
		$row3 = mysql_fetch_array($query3);
		$total=$row3['m_price']*$m_c_qty;
		$count=mysql_num_rows($query3);
		
	
	 //  for($k=0; $k<$count; $k++){  	
		// if(isset($p_name[$k])){

		
		$sql4	= "INSERT INTO  order_detail 
		values(null, 
		'$order_id', 
		'$m_id',
		'$m_name', 
		'$m_c_qty', 
		'$total',
		'$order_date')";
		$query4	= mysql_db_query($database_condb, $sql4);

		$sqlpname ="UPDATE order_detail t2, 
		(
		SELECT m_name, m_id FROM menu
		) 
		t1 
		SET t2.m_name = t1.m_name WHERE t1.m_id = t2.m_id";

	    $querypanem	= mysql_db_query($database_condb, $sqlpname);

 
 }




// exit;
	
	if($query1 && $query4){
		mysql_db_query($database_condb, "COMMIT");
		//$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
		foreach($_SESSION['shopping_cart'] as $m_id)
		{	
			unset($_SESSION['shopping_cart']);
			echo "<script>";
			echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
			echo "window.location ='my_order.php?order_id=$order_id&act=show-order'; ";
			echo "</script>";
		}
	}
	else{
		mysql_db_query($database_condb, "ROLLBACK");  
			echo "<script>";
			echo "alert('บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่');";
			echo "window.location ='confirm_order.php'; ";
			echo "</script>";	
	}

	mysql_close($condb);
?>
