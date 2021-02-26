<?php
$ID = $_GET['u_id'];
$sql = "SELECT * FROM users WHERE u_id=$ID";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>
<h4> แบบฟอร์มแก้ไขรหัสผ่าน </h4>
<form action="emp_form_rwd_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
    <div class="col-sm-2 control-label">
      Username :
    </div>
    <div class="col-sm-3">
      <input type="text" name="username" required class="form-control" autocomplete="off" value="<?php echo $row['username'];?>" disabled>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      Password :
    </div>
    <div class="col-sm-3">
      <input type="text" name="password" required class="form-control">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-4">
      <input type="hidden" name="u_id" value="<?php echo $row['u_id'];?>">
      <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
    </div>
  </div>
</form>