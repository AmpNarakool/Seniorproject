<?php
$ID = $_GET['ID'];
$sql = "SELECT * FROM tbl_admin WHERE admin_id=$ID";
$result = mysql_db_query($database_condb, $sql) or die ("Error in query: $sql " . mysql_error());
$row = mysql_fetch_array($result);
extract($row);
?>
<h4> ฟอร์มแก้ไขข้อมูลพนักงาน </h4>
<form action="emp_form_edit_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">

<div class="form-group">
    <div class="col-sm-2 control-label">
      ชื่อ :
    </div>
    <div class="col-sm-3">
      <input type="text" name="admin_name" required class="form-control" value="<?php echo $row['admin_name'];?>">
    </div>
</div>

<div class="form-group">
  <div class="col-sm-2 control-label">
    Username :
  </div>
  <div class="col-sm-3">
    <input type="username" name="admin_user" required class="form-control" value="<?php echo $row['admin_user'];?>">
  </div>
</div>

  <div class="form-group">
    <div class="col-sm-2 control-label">
      Password :
    </div>
    <div class="col-sm-3">
      <input type="username" name="admin_pass" required class="form-control" value="<?php echo $row['admin_pass'];?>">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-3">
      <input type="hidden" name="admin_id" value="<?php echo $ID; ?>" />
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