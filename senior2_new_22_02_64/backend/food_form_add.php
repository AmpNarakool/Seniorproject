<?php require_once('../Connections/condb.php'); ?>
<?php
$ID = $_GET['ID'];

$sql_menutype = "SELECT * FROM menu_type";
$result_type = mysql_db_query($database_condb, $sql_menutype) or die ("Error in query: $sql " . mysql_error());
$row_ptype = mysql_fetch_array($result_type);
extract($row_ptype);

?>
<h4>ฟอร์มเพิ่มข้อมูลสินค้า/อาหาร </h4>
<form action="food_form_add_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
    <div class="col-sm-2 control-label">
      ชื่อสินค้า :
    </div>
    <div class="col-sm-5">
      <input type="text" name="m_name" required class="form-control">
    </div>
  </div>
 
  <div class="form-group">
    <div class="col-sm-2 control-label">
      ประเภทสินค้า :
    </div>
    <div class="col-sm-5">
    <select name="t_id" id="t_id" required="required">
          <option value="">กรุณาเลือกประเภท</option>
          <?php
do {  
?>
          <option value="<?php echo $row_ptype['t_id']?>"><?php echo $row_ptype['t_name']?></option>
          <?php
} while ($row_ptype = mysql_fetch_assoc($result_type));
  $rows = mysql_num_rows($result_type);
  if($rows > 0) {
      mysql_data_seek($result_type, 0);
	  $row_ptype = mysql_fetch_assoc($result_type);
  }
?>
        </select>
    </div>
  </div>

  <div class="form-group">
      <div class="col-sm-2 control-label">
        รายละเอียดสินค้า :
      </div>
      <div class="col-sm-5">
      <input type="text" name="m_detail" required class="form-control">
      
      </div>
    </div>

    <div class="form-group">
    <div class="col-sm-2 control-label">
      ราคาสินค้า :
    </div>
    <div class="col-sm-5">
      <input type="number" name="m_price" required class="form-control">
    </div>
     <div class="col-sm-1">
        บาท  
    </div>
  </div> 

  <div class="form-group">
    <div class="col-sm-2 control-label">
      รูปภาพอาหาร :
    </div>
    <div class="col-sm-5">
      ภาพที่1:
      <input type="file" name="m_img1" required class="form-control" accept="image/*">
      ภาพที่2:
      <input type="file" name="m_img2" required class="form-control" accept="image/*">
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