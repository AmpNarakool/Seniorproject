<?php
error_reporting( error_reporting() & ~E_NOTICE );
session_start();

$colname_cartdone = "-1";
if (isset($_GET['order_id'])) {
$colname_cartdone = (int)$_GET['order_id'];
}

$query_cartdone = sprintf("
SELECT * FROM
orders as o,
order_detail as d,
menu as m,
tbl_member  as me
WHERE o.order_id = $colname_cartdone
AND o.order_id=d.order_id
AND d.m_id=m.m_id
AND o.mem_id = me.mem_id
ORDER BY o.order_date ASC");
$sql = mysql_query($query_cartdone, $condb) or die(mysql_error());
$totalRows_cartdone = mysql_num_rows($sql);
$json = array();
$index = 0;

for ($x = 0; $x < $totalRows_cartdone; $x++) {
  $row = mysql_fetch_assoc($sql);
  array_push($json, $row);
}

// print_r($colname_buyer);

// print_r($totalRows_cartdone);

$index = 0

?>

<table width="700" border="1" align="center" class="table">
    <tr>
        <td colspan="5" align="center">
            <p align="center"> <button class="btn btn-primary btn-sm" onclick="window.print()"> พิมพ์ </button> </p>
        </td>
    </tr>
    <tr>
        <td width="1558" colspan="5" align="center">


            <strong>รายการสั่งซื้อคุณ<?php echo $json[0]['mem_name'];?> <br />
                เบอร์โทร : <?php echo $json[0]['phone'];?> <br />
                ที่อยู่ :<?php echo $json[0]['address'];?> <br />
                วันที่ทำรายการ : <?php echo $json[0]['order_date'];?> <br />
                <font color="red"> สถานะ :
                    <?php
      $status =  $json[0]['order_status'];
      include('status.php');?>
                    <br />
                </font>
            </strong>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="left" valign="top">
                        <strong>
                            <font color="red"><br />
                                ชำระเงิน ธ.<?php echo $json[0]['b_name'];?> <br />
                                เลข บ/ช <?php echo $json[0]['b_number'];?> <br />
                                จำนวน <?php echo $json[0]['pay_amount'];?><br />
                                วันที่ชำระ <?php echo date('d/m/Y',strtotime($json[0]['pay_date']));?></font><br />
                    </td>
                    <td><strong>
                            <font color="red">
                                <img src="../pimg/<?php echo $row_cartdone['pay_slip'];?>" width="200px" />
                            </font>
                        </strong></td>
                </tr>
            </table>
            <strong>
                <font color="red">
                    <div align="center"></div>

                </font>
            </strong>
        </td>
    </tr>
    <tr class="success">
        <td align="center">รหัส</td>
        <td align="center">รายการอาหาร</td>
        <td align="center">ราคา</td>
        <td align="center">จำนวน</td>
        <td align="center">รวม</td>
    </tr>
    <?php do { ?>
    <tr>
        <td align="center"><?php echo $json[$index]['d_id'];?></td>
        <td><?php echo $json[$index]['m_name'];?></td>
        <td align="center"><?php echo $json[$index]['m_price'];?></td>
        <td align="center"><?php echo $json[$index]['m_c_qty'];?></td>
        <td align="center"><?php echo number_format($json[$index]['total'],2);?></td>
    </tr>
    <?php
  $sum  = $json[$index]['m_price']*$json[$index]['m_c_qty'];
  $total  += $sum;
  $index++
  
  ?>
    <?php } while ($index < count($json)); ?>
    <tr>
        <td colspan="4" align="center">รวม</td>
        <td align="center"><b> <?php echo number_format($total,2);?></b></td>
    </tr>

    <tr>
    <tr colspan="5">
        <td>
            <?php if($status == 2 || $status == 3) : ?>
            <h3> อัพเดทสถานะอาหาร</h3>
            <form method="post" action="food_status.php">
                <table width="100%" borders="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="10%">สถานะอาหาร</td>
                        <td width="20%">
                            <input name="status_order" type="hidden" value="<?php echo 4?>">
                            <input name="order_id" type="hidden" value="<?php echo $colname_cartdone?>">
                            <?php 
                            $status = 4 ;
                            include('status.php');
                          ?>
                        </td>
                        <td width="5%">
                            <input type="submit" name="button" id="button" class="btn btn-primary" value="อัพเดต" />
                        </td>
                    </tr>
                </table>
            </form>
            <?php elseif($status == 4) : ?>
            <h3> อัพเดทสถานะอาหาร</h3>
            <form method="post" action="food_status.php">
                <table width="100%" borders="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="5%">สถานะอาหาร</td>
                        <td width="10%">
                            <input name="status_order" type="hidden" value="<?php echo 5?>">
                            <input name="order_id" type="hidden" value="<?php echo $colname_cartdone?>">
                            <?php 
                            $status = 5;
                            include('status.php');
                          ?>
                        </td>
                        <td width="20%">
                            <input type="submit" name="button" id="button" class="btn btn-primary" value="อัพเดต" />
                        </td>
                    </tr>
                </table>
            </form>
            <?php elseif($status == 5) : ?>
            <h3> อัพเดทสถานะอาหาร </h3>
            <form method="post" action="food_status.php">
                <table width="100%" borders="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="5%">สถานะอาหาร</td>
                        <td width="10%">
                            <input name="status_order" type="hidden" value="<?php echo 6?>">
                            <input name="order_id" type="hidden" value="<?php echo $colname_cartdone?>">
                            <?php 
                            $status = 6;
                            include('status.php');
                          ?>
                        </td>
                        <td width="20%">
                            <input type="submit" name="button" id="button" class="btn btn-primary" value="อัพเดต" />
                        </td>
                    </tr>
                </table>
            </form>
            <?php else : ?>
            <h3> รายงานสถานะ </h3>
            <table width="100%" borders="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="5%">สถานะอาหาร</td>
                    <td width="10%">
                        <?php 
                            $status = 6;
                            include('status.php');
                          ?>
                    </td>
                </tr>
            </table>
            <?php endif; ?>
        </td>
    </tr>
    <?php
    mysql_free_result($buyer);
    mysql_free_result($cartdone);
?>