
<h4>ฟอร์มเพิ่มข้อมูธนาคาร </h4>
<form action="payment_form_add_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
    <div class="col-sm-2 control-label">
      ธนาคาร :
    </div>
    <div class="col-sm-2">
      <input type="text" name="b_name" required class="form-control">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-2 control-label">
      ชื่อบัญชี :
    </div>
    <div class="col-sm-2">
      <input type="text" name="b_owner" required class="form-control">
    </div>
  </div> 

  <div class="form-group">
    <div class="col-sm-2 control-label">
      เลขที่บัญชี :
    </div>
    <div class="col-sm-2">
      <input type="number" name="b_number" required class="form-control">
    </div>
  </div> 
  
  <div class="form-group">
    <div class="col-sm-2 control-label">
      QR code :
    </div>
    <div class="col-sm-4">
      <input type="file" name="b_img" required class="form-control" accept="image/*">
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