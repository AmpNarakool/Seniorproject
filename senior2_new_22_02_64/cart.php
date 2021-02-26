<?php require_once('Connections/condb.php'); ?>

<?php
    //error_reporting( error_reporting() & ~E_NOTICE );
    @session_start(); 
    $m_id = $_GET['m_id']; 
	$act = $_GET['act'];

	if($act=='add' && !empty($m_id))
	{
		if(!isset($_SESSION['shopping_cart']))
		{
			 
			$_SESSION['shopping_cart']=array();
		}else{
		 
		}
		if(isset($_SESSION['shopping_cart'][$m_id]))
		{
			$_SESSION['shopping_cart'][$m_id]++;
		}
		else
		{
			$_SESSION['shopping_cart'][$m_id]=1;
		}
		    echo "<script>";
			echo "window.location ='index.php'; ";
			echo "</script>";
	}

	if($act=='remove' && !empty($m_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['shopping_cart'][$m_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $m_id=>$amount)
		{
			$_SESSION['shopping_cart'][$m_id]=$amount;
		}
	}
	?>
<button type="button" class="btn btn-info"><a href="index.php">เลือกเมนูเพิ่ม</a></button>
<br><br>
      <form id="frmcart" name="frmcart" method="post" action="?act=update">
        <table width="100%" border="1" align="center" class="table1 table-hover1">
        <tr>
          <td height="40" colspan="5" align="center" bgcolor="#4CAF50"><strong><b>ตะกร้าของฉัน</strong></td>
        </tr>
        <tr>
		<td><center></center></td>
		<td><center>รายการอาหาร</center></td>
          <td><center>ราคา</center></td>
          <td><center>จำนวน</center></td>
          <td><center>รวม</center></td>
        </tr>
        <?php

if(!empty($_SESSION['shopping_cart']))
{
require_once('Connections/condb.php');
	foreach($_SESSION['shopping_cart'] as $m_id=>$m_c_qty)
	{
		$sql = "select * from menu where m_id=$m_id";
		$query = mysql_db_query($database_condb, $sql);
		while($row = mysql_fetch_array($query))
		{
		 
		$sum = $row['m_price'] * $m_c_qty;
		$pqty = $row['m_c_qty'];
		$total += $sum;
		echo "<tr>";
		echo "<td width='100px'>";
		echo "<img src='m_img/".$row[m_img1]."' width='100'>";
		echo "</td>";
		echo "<td width='334'>"." " . $row["m_name"] . "</td>";
		echo "<td width='100px' align='center'>" .number_format($row["m_price"]) . "</td>";
		
		echo "<td width='20px' align='center'>";  
		echo "<input type='number' name='amount[$m_id]' value='$m_c_qty' max='$pqty'  width='20px'/></td>";
		
		echo "<td width='120' align='right'>";
		echo  number_format($sum). ' &nbsp; ';
		echo "<a href='cart2.php?m_id=$m_id&act=remove' class='btn btn-danger btn-xs'>ลบ</a>";
		echo "</td>";
		// echo "<td width='100' align='center'><a href='cart.php?p_id=$p_id&act=remove' class='btn btn-danger btn-xs'>ลบ</a></td>";
		
		echo "</tr>";
		}
 
	}
	echo "<tr>";
  	echo "<td colspan='4' bgcolor='#4CAF50' align='right'>รวม</td>";
  	echo "<td align='center' bgcolor='#4CAF50'>";
  	echo "<b>";
  	echo  number_format($total), บาท;
  	echo "</b>";
  	echo "</td>";
  
	echo "</tr>";
}
?>
          </table>
       <p align="right">   
        <?php if($total > 0){ ?>
          <td colspan="3" align="right">
          <button type="submit" name="button" id="button" class="btn btn-warning"> คำนวณ </button>
          <?php $chk = $_GET['act'];
		      if($chk=='update'){?>
            <button type="button" name="Submit2"  onclick="window.location='confirm_order.php';" class="btn btn-success"> 
            <span class="glyphicon glyphicon-shopping-cart"> </span> สั่งซื้อ </button>
               <?php }else{ }?>
            </td>
            <?php }else { 
			echo "<font color='red'>";
			echo "ไม่มีรายการสั่งซื้อ";
			echo "</font>";
			} ?>
          </p>
      </form>
 
 