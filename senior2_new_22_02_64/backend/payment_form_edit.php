<?php
$ID = $_GET['ID'];
$sql = "
SELECT *
FROM bank_account as b
WHERE b.b_id=$ID";
$result = mysql_db_query($database_condb, $sql) or die ("Error in query: $sql " . mysql_error());
$row = mysql_fetch_array($result);
extract($row);
?>
<h4> ฟอร์มแก้ไขรายละเอียดสินค้า </h4>
<form action="payment_form_edit_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
    <div class="col-sm-2 control-label">
      ธนาคาร :
    </div>
    <div class="col-sm-2">
      <input type="text" name="b_name" required class="form-control" autocomplete="off" value="<?php echo $row['b_name'];?>">
    </div>
    <!--div class="col-sm-3">
      <select name="b_bank" required class="form-control" autocomplete="off" value="<?php echo $row['b_name'];?>">
      <option value="<?php echo $row_ptype['t_id']?>"><?php echo $row_ptype['t_name']?></option>
      <?php
do {  
?>
          <option value="<?php echo $row_ptype['t_id']?>"><?php echo $row_ptype['t_name']?></option>
          <?php
} while ($row_ptype = mysql_fetch_assoc($ptype));
  $rows = mysql_num_rows($ptype);
  if($rows > 0) {
      mysql_data_seek($ptype, 0);
	  $row_ptype = mysql_fetch_assoc($ptype);
  }
?>
      </select>
    </div-->
  </div>

  <div class="form-group">
    <div class="col-sm-2 control-label">
      ชื่อบัญชี :
    </div>
    <div class="col-sm-2">
      <input type="text" name="b_owner" required class="form-control" autocomplete="off" value="<?php echo $row['b_owner'];?>">
    </div>
  </div> 

  <div class="form-group">
    <div class="col-sm-2 control-label">
      เลขที่บัญชี :
    </div>
    <div class="col-sm-2">
      <input type="number" name="b_number" required class="form-control" autocomplete="off" value="<?php echo $row['b_number'];?>">
    </div>
  </div> 

    <div class="form-group">
        <div class="col-sm-2 control-label">
        QR code :
        </div>
        <div class="col-sm-4">
          ภาพเก่า <br>
          <img src="../bimg/<?php echo $row['b_img'];?>" width="200px">
          <br><br>
          <input type="file" name="b_img"  accept="image/*" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-4">
          <input type="hidden" name="b_img2" value="<?php echo $row['b_img'];?>">
          <input type="hidden" name="b_id" value="<?php echo $row['b_id'];?>">
          <button type="submit" class="btn btn-primary">บันทึก</button>
        </div>
      </div>
    </form>