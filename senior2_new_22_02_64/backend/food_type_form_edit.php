<?php
$ID = $_GET['ID'];
$sql = "SELECT * FROM menu_type WHERE t_id=$ID";
$result = mysql_db_query($database_condb, $sql) or die ("Error in query: $sql " . mysql_error());
$row = mysql_fetch_array($result);
extract($row);
?>
<h4> ฟอร์มแก้ไขประเภทอาหาร </h4>
<form action="food_type_form_edit_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">

<div class="form-group">
    <div class="col-sm-2 control-label">
      ชื่อประเภท :
    </div>
    <div class="col-sm-3">
      <input type="text" name="t_name" required class="form-control" value="<?php echo $row['t_name'];?>">
    </div>
  </div>


  
  <div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-3">
      <input type="hidden" name="t_id" value="<?php echo $ID; ?>" />
      <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
    </div>
  </div>
</form>