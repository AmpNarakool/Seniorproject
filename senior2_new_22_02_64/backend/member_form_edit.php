<?php
$ID = $_GET['ID'];
$sql = "SELECT * FROM tbl_member WHERE mem_id=$ID";
$result = mysql_db_query($database_condb, $sql) or die ("Error in query: $sql " . mysql_error());
$row = mysql_fetch_array($result);
extract($row);
?>
<h4> ฟอร์มแก้ไขข้อมูลสมาชิก </h4>
<form action="member_form_edit_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">

<div class="form-group">
  <div class="col-sm-2 control-label">
    Username :
  </div>
  <div class="col-sm-3">
    <input type="username" name="mem_username" required class="form-control" value="<?php echo $row['mem_username'];?>">
  </div>
</div>

  <div class="form-group">
    <div class="col-sm-2 control-label">
      Password :
    </div>
    <div class="col-sm-3">
      <input type="username" name="mem_password" required class="form-control" value="<?php echo $row['mem_password'];?>">
    </div>
  </div>

<div class="form-group">
    <div class="col-sm-2 control-label">
      ชื่อ :
    </div>
    <div class="col-sm-3">
      <input type="text" name="mem_name" required class="form-control" value="<?php echo $row['mem_name'];?>">
    </div>
  </div>

<div class="form-group">
  <div class="col-sm-2 control-label">
    email :
  </div>
  <div class="col-sm-3">
    <input type="text" name="mem_email" required class="form-control" value="<?php echo $row['mem_email'];?>">
  </div>
</div>

<div class="form-group">
  <div class="col-sm-2 control-label">
    Phone :
  </div>
  <div class="col-sm-3">
    <input type="text" name="mem_tel" required class="form-control" value="<?php echo $row['mem_tel'];?>">
  </div>
</div>

<div class="form-group">
  <div class="col-sm-2 control-label">
    ที่อยู่ :
  </div>
  <div class="col-sm-3">
  <input type="text" name="mem_address" required class="form-control"  value="<?php echo $row['mem_address']; ?>">
  </div>
</div>
  
  
  <div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-3">
      <input type="hidden" name="mem_id" value="<?php echo $ID; ?>" />
      <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
    </div>
  </div>
</form>


<!--div class="form-group">
    <div class="col-sm-2 control-label">
      รูปภาพ:
    </div>
    <div class="col-sm-4">
      ภาพเก่า <br>
      <img src="../people_img/<?php echo $row['img'];?>" width="200px">
      <br>
      เลือกภาพใหม่ <br>
      <input type="file" name="img"  class="form-control" accept="image/*">
    </div>
  </div-->