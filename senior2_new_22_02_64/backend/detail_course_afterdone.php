<!DOCTYPE html>
<html>
<title>สถานะคอร์สอาหาร</title>
<link rel="icon" href="logo.jpg" type="image/x-icon">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<style>
.success {
    background-color: #dff0d8;
}
</style>
<?php require_once '../Connections/condb.php';?>
<?php
error_reporting(error_reporting() & ~E_NOTICE);
session_start();

$colname_cartdone = "-1";
if (isset($_GET['course_id'])) {
    $colname_cartdone = $_GET['course_id'];
}

$query_cartdone = sprintf("SELECT * FROM course as c, course_detail as d WHERE c.c_id = $colname_cartdone AND c.c_order=d.cd_id");
$cartdone = mysql_query($query_cartdone, $condb) or die(mysql_error());
$row_cartdone = mysql_fetch_assoc($cartdone);
$totalRows_cartdone = mysql_num_rows($cartdone);

if (isset($_POST['button1'])) {
  // update status in course
  $coulumn_name = $_POST['button1'];
  $sql = "UPDATE course SET $coulumn_name = 1, course_status = 1 WHERE c_id= $colname_cartdone";
  $result = mysql_query($sql, $condb) or die(mysql_error());
  
  // select all order_status in course
  $sql = "SELECT order_status_1, order_status_2, order_status_3, order_status_4, order_status_5 FROM course WHERE c_id = $colname_cartdone";
  $result = mysql_query($sql, $condb) or die(mysql_error());
  $status_course = mysql_fetch_assoc($result);
  if (($status_course["order_status_1"] & $status_course["order_status_2"] & $status_course["order_status_3"] & $status_course["order_status_4"] & $status_course["order_status_5"]) == 1) {
    echo "success all";
    $sql = "UPDATE course SET course_status = 2 WHERE c_id= $colname_cartdone";
    $result = mysql_query($sql, $condb) or die(mysql_error());
  }
  echo "<script>";
  echo "alert('เปลียนสถานะ !');";
	echo "window.location ='index.php?act=show-course' ";
  echo "</script>";
}

?>

<table width="500" border="1" align="center" class="table">
    <tr>
        <td colspan="5" align="center">
            <p align="center"> <button class="btn btn-primary btn-sm" onclick="window.print()"> พิมพ์ </button> </p>
        </td>
    </tr>
    <tr>
        <td width="500" colspan="5" align="center">
            <strong>รายการสั่งซื้อคุณ<?php echo $row_cartdone['mem_name']; ?> <br />
                เบอร์โทร : <?php echo $row_cartdone['phone']; ?> <br />
                ที่อยู่ :<?php echo $row_cartdone['address']; ?> <br />
                วันที่ทำรายการ : <?php echo $row_cartdone['order_date']; ?> <br />
                <font color="red"> สถานะ :
                    <?php
                        $status = $row_cartdone['course_status'];
                        $status_delivery = null;
                        include 'status_course.php';
                    ?>
                    <br />
                </font>
            </strong>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="left" valign="top">
                        <strong>
                            <font color="red"><br />
                                ชำระเงิน ธ.<?php echo $row_cartdone['b_name']; ?> <br />
                                เลข บ/ช <?php echo $row_cartdone['b_number']; ?> <br />
                                จำนวน <?php echo $row_cartdone['pay_amount']; ?><br />
                                วันที่ชำระ <?php echo date('d/m/Y', strtotime($row_cartdone['pay_date'])); ?></font>
                            <br />
                    </td>
                    <td><strong>
                            <font color="red">
                                <img src="../pimg/<?php echo $row_cartdone['pay_slip']; ?>" width="200px" />
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
    <tr class="success" colspan="4">
        <td align="center"><strong style="font-size:16px">วัน</strong></td>
        <td align="center"><strong style="font-size:16px">รายการอาหาร</strong></td>
        <td align="center"><strong style="font-size:16px">อัพเดทสถานะ</strong></td>
        <td align="center"><strong style="font-size:16px">สถานะการจัดส่ง</strong></td>
    </tr>
    <tr>
        <form method="post">
            <td align='center'>วันจันทร์<br><br><br></td>
            <td>
                <?php echo "มื้อที่1: " . $row_cartdone["meal_1"] . "<br>" . "มื้อที่2: " . $row_cartdone["meal_1_1"]; ?>
            </td>
            <td align='center'>
                <?php if ($row_cartdone["order_status_1"] == 0): ?>
                <button type="submit" class='btn btn-success btn-xs' name='button1'
                    value="<?php echo "order_status_1" ?>">จัดส่ง
                </button>
                <?php elseif ($row_cartdone["order_status_1"] != 0): ?>
                <button disabled class='btn btn-success btn-xs'>จัดส่งแล้ว</button>
                <?php endif;?>
            </td>
            <td align='center'>
                <?php 
                  $status = null;
                  $status_delivery = $row_cartdone['order_status_1'];
                  include('status_course.php');
                ?>
            </td>
        </form>
    </tr>
    <tr>
        <form method="post">
            <td align='center'>วันอังคาร<br><br><br></td>
            <td>
                <?php echo "มื้อที่1: " . $row_cartdone["meal_2"] . "<br>" . "มื้อที่2: " . $row_cartdone["meal_2_2"]; ?>
            </td>
            <td align='center'>
                <?php if ($row_cartdone["order_status_2"] == 0): ?>
                <button type="submit" class='btn btn-success btn-xs' name='button1'
                    value="<?php echo "order_status_2" ?>">จัดส่ง
                </button>
                <?php elseif ($row_cartdone["order_status_2"] != 0): ?>
                <button disabled class='btn btn-success btn-xs'>จัดส่งแล้ว</button>
                <?php endif;?>
            </td>
            <td align='center'>
                <?php 
                  $status = null;
                  $status_delivery = $row_cartdone['order_status_2'];
                  include('status_course.php');
                ?>
            </td>
        </form>
    </tr>
    <tr>
        <form method="post">
            <td align='center'>วันพุธ<br><br><br></td>
            <td>
                <?php echo "มื้อที่1: " . $row_cartdone["meal_3"] . "<br>" . "มื้อที่2: " . $row_cartdone["meal_3_3"]; ?>
            </td>
            <td align='center'>
                <?php if ($row_cartdone["order_status_3"] == 0): ?>
                <button type="submit" class='btn btn-success btn-xs' name='button1'
                    value="<?php echo "order_status_3" ?>">จัดส่ง
                </button>
                <?php elseif ($row_cartdone["order_status_3"] != 0): ?>
                <button disabled class='btn btn-success btn-xs'>จัดส่งแล้ว</button>
                <?php endif;?>
            </td>
            <td align='center'>
                <?php 
                  $status = null;
                  $status_delivery = $row_cartdone['order_status_3'];
                  include('status_course.php');
                ?>
            </td>
        </form>
    </tr>
    <tr>
        <form method="post">
            <td align='center'>วันพฤหัส<br><br><br></td>
            <td>
                <?php echo "มื้อที่1: " . $row_cartdone["meal_4"] . "<br>" . "มื้อที่2: " . $row_cartdone["meal_4_4"]; ?>
            </td>
            <td align='center'>
                <?php if ($row_cartdone["order_status_4"] == 0): ?>
                <button type="submit" class='btn btn-success btn-xs' name='button1'
                    value="<?php echo "order_status_4" ?>">จัดส่ง
                </button>
                <?php elseif ($row_cartdone["order_status_4"] != 0): ?>
                <button disabled class='btn btn-success btn-xs'>จัดส่งแล้ว</button>
                <?php endif;?>
            </td>
            <td align='center'>
                <?php 
                  $status = null;
                  $status_delivery = $row_cartdone['order_status_4'];
                  echo $status;
                  include('status_course.php');
                ?>
            </td>
        </form>
    </tr>
    <tr>
        <form method="post">
            <td align='center'>วันศุกร์<br><br><br></td>
            <td>
                <?php echo "มื้อที่1: " . $row_cartdone["meal_5"] . "<br>" . "มื้อที่2: " . $row_cartdone["meal_5_5"]; ?>
            </td>
            <td align='center'>
                <?php if ($row_cartdone["order_status_5"] == 0): ?>
                <button type="submit" class='btn btn-success btn-xs' name='button1'
                    value="<?php echo "order_status_5" ?>">จัดส่ง
                </button>
                <?php elseif ($row_cartdone["order_status_5"] != 0): ?>
                <button disabled class='btn btn-success btn-xs'>จัดส่งแล้ว</button>
                <?php endif;?>
            </td>
            <td align='center'>
                <?php 
                  $status = null;
                  $status_delivery = $row_cartdone['order_status_5'];
                  include('status_course.php');
                ?>
            </td>
        </form>
    </tr>
    </div>
    </div>
    </div>
    </body>

</html>