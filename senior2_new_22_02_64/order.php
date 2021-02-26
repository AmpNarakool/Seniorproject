<?php require_once('Connections/condb.php'); ?>
<?php
//error_reporting( error_reporting() & ~E_NOTICE );
session_start(); 
//print_r($_SESSION);
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
//session_start();
$colname_buyer = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_buyer = $_SESSION['MM_Username'];
}
mysql_select_db($database_condb, $condb);
$query_buyer = sprintf("SELECT * FROM tbl_member WHERE mem_username = %s", GetSQLValueString($colname_buyer, "text"));
$buyer = mysql_query($query_buyer, $condb) or die(mysql_error());
$row_buyer = mysql_fetch_assoc($buyer);
$totalRows_buyer = mysql_num_rows($buyer);

	//echo 'ss'.$row_buyer;
	
	if($_SESSION['MM_Username']!=''){  
?>
<br><br>
<button type="button" class="btn btn-info"><a href="index2.php">เลือกเมนูเพิ่ม</a></button>
  <br><br>
  <table width="700" border="1" align="center" class="table">
    <tr>
      <td width="1558" colspan="5" align="center" bgcolor="#4CAF50">
      <strong>รายการสั่งซื้อ</strong></td>
    </tr>
    <tr>
      <td align="center">ลำดับ</td>
      <td align="center">รายการอาหาร</td>
      <td align="center">ราคา</td>
      <td align="center">จำนวน</td>
      <td align="center">รวม/รายการ</td>
    </tr>
  <form  name="formlogin" action="saveorder.php" method="POST" id="login" class="form-horizontal">
<?php
	require_once('Connections/condb.php');
	$total=0;
	foreach($_SESSION['shopping_cart'] as $m_id=>$m_c_qty)
	{
		$sql = "select * from menu where m_id=$m_id";
		$query = mysql_db_query($database_condb, $sql);
		$row	= mysql_fetch_array($query);
		$sum	= $row['m_price']*$m_c_qty;
		$total	+= $sum;
    echo "<tr>";
    echo "<td align='center'>";
    echo  $i += 1;
    echo "</td>";
    echo "<td>" . $row["m_name"] . "</td>";
    echo "<td align='right'>" .number_format($row['m_price']) ."</td>";
    echo "<td align='right'>$m_c_qty</td>";
    echo "<td align='right'>".number_format($sum)."</td>";
    echo "</tr>";
?>

<input type="hidden"  name="m_name[]" value="<?php echo $row['m_name']; ?>" class="form-control" required placeholder="ชื่อ-สกุล" />

    <?php 
	}
	echo "<tr>";
    echo "<td  align='right' colspan='4'><b>รวม</b></td>";
    echo "<td align='right'>"."<b>".number_format($total).' บาท '."</b>"."</td>";
    echo "</tr>";
?>
</table>
		</div>
	</div>
</div>
<div class="container">
  <div class="row">
  <div class="col-md-4"></div>
    <div class="col-md-5" style="background-color:#f4f4f4">
      <h3 align="center" style="color:green">
      <span class="glyphicon glyphicon-shopping-cart"> </span>
         ที่อยู่ในการจัดส่ง  </h3>

        <div class="form-group">
          <div class="col-sm-12">
            <input type="text"  name="name" value="<?php echo $row_buyer['mem_name']; ?>" class="form-control" required placeholder="ชื่อ-สกุล" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <textarea name="address" class="form-control"  rows="3"  required placeholder="ที่อยู่ในการส่ง"><?php echo $row_buyer['mem_address']; ?></textarea> 
          </div>
 
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <input type="text"  name="phone" value="<?php echo $row_buyer['mem_tel']; ?>" class="form-control" required placeholder="เบอร์โทรศัพท์" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <input type="email"  name="email" class="form-control" value="<?php echo $row_buyer['mem_email']; ?>" required placeholder="อีเมล์" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12" align="center">
            <input name="mem_id" type="hidden" id="mem_id" value="<?php echo $row_buyer['mem_id']; ?>">
            <br>
            <button type="submit" class="btn btn-success" id="btn">
              ยืนยันสั่งซื้อ 
            </button>
             <br><br>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<br><br>
<?php
 } else{  
  include('logout3.php'); 
 }//seseion
 
mysql_free_result($buyer);
?>