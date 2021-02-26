<h4> แบบฟอร์มแก้ไขข้อมูลผู้จัดการร้าน </h4>
<form action="emp_form_add_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">

<div class="form-group">
    <div class="col-sm-2 control-label">
      ชื่อ :
    </div>
    <div class="col-sm-3">
      <input type="text" name="admin_name" required class="form-control" >
    </div>
</div>

<div class="form-group">
    <div class="col-sm-2 control-label">
      Username :
    </div>
    <div class="col-sm-3">
      <input type="text" name="admin_user" required class="form-control" >
    </div>
</div>

<div class="form-group">
    <div class="col-sm-2 control-label" class="form-control" >
      Password :
    </div>
    <div class="col-sm-3">
      <input type="password" name="admin_pass" required class="form-control">
    </div>
</div>
  
  <div class="form-group">
  <div class="col-sm-2">
    </div>
    <div class="col-sm-3">
      <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
    </div>
  </div>
</form>