<?php // require_once('../Connections/condb.php'); ?>
<?php
$colname_mm = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_mm = $_SESSION['MM_Username'];
}

mysql_select_db($database_condb, $condb);

$query_mycart = sprintf("SELECT c.c_id as cid, c.mem_id, c.mem_id AS coid, c.order_date, c.name, d.cd_id, c.pay_amount as total, c.course_status FROM course as c, course_detail as d WHERE c.c_order=d.cd_id ORDER BY c.order_date");

$mycart = mysql_query($query_mycart, $condb) or die(mysql_error());
$row_mycart = mysql_fetch_assoc($mycart);
$totalRows_mycart = mysql_num_rows($mycart);

?>
<?php //include('../datatable.php');?>

<h3 align="center"> คอร์สอาหาร </h3> 
<table id="example" class="display" cellspacing="0" border="1">
<thead>
  <tr>
    <th>รหัสสั่งซื้อ</th>
    <th>ลูกค้า</th>
    <th>จำนวนรายการ</th>
    <th>ราคารวม</th>
    <th>สถานะ</th>
    <th>วันที่ทำรายการ</th>
  </tr>
  </thead>
  <?php if($totalRows_mycart > 0){?>
  <?php do { ?>
    <tr>
      <td>
      
	  <?php echo $row_mycart['cid']; ?>
      <a href="index.php?course_id=<?php echo $row_mycart['cid']; ?>&act=show-detail-course" target="_blank">
      <span class="glyphicon glyphicon-zoom-in"></span>
      </a>
      </td>
      <td align="center">
      <?php echo $row_mycart['name'];?>
      </td>
      <td align="center">
      <?php echo 1?>
      </td>
       <td align="center">
      <?php echo number_format($row_mycart['total'],2);?>
      </td>
      <td align="center">
      <font color="red">
      <?php 
	  $status =  $row_mycart['course_status'];
	  include('status_course.php');
	  ?>  
      </font>
      </td>
      <td><?php echo $row_mycart['order_date']; ?></td>
    </tr>
    <?php } while ($row_mycart = mysql_fetch_assoc($mycart)); ?>
    <?php } ?>
</table>


