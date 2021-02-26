
<?php
$ID = $_GET['ID'];
$t_id=$_GET['t_id'];

$colname_eprd = "-1";
if (isset($_GET['m_id'])) {
  $colname_eprd = $_GET['m_id'];
}

$sql_menu = "SELECT * FROM menu WHERE m_id=$ID";
$result_menu = mysql_db_query($database_condb, $sql_menu) or die ("Error in query: $sql " . mysql_error());
$row_menu = mysql_fetch_array($result_menu);
extract($row_menu);

$sql_prd = "SELECT * FROM menu_type as t WHERE t.t_id=$t_id";
$result_prd = mysql_db_query($database_condb, $sql_prd) or die ("Error in query: $sql " . mysql_error());
$row_prd = mysql_fetch_array($result_prd);
extract($row_prd);

$sql_menutype = "SELECT * FROM menu_type";
$result_type = mysql_db_query($database_condb, $sql_menutype) or die ("Error in query: $sql " . mysql_error());
$row_ptype = mysql_fetch_array($result_type);
extract($row_ptype);

?>

<h4> ฟอร์มแก้ไขเมนูอาหาร </h4>
<form action="food_form_edit_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">

<div class="form-group">
  <div class="col-sm-2 control-label">
    ชื่อเมนู :
  </div>
  <div class="col-sm-5">
    <input type="text" name="m_name" required class="form-control" value="<?php echo $row_menu['m_name'];?>">
  </div>
</div>

<div class="form-group">
  <div class="col-sm-2 control-label">
  ประเภทสินค้า :
  </div>
  <div class="col-sm-5">
  <select name="t_id" id="t_id" required="required">
    <option value="<?php echo $row_prd['t_id'];?>"><?php echo $row_prd['t_name'];?></option>
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
    <input type="text" name="m_detail" required class="form-control" value="<?php echo $row_menu['m_detail'];?>">
  </div>
</div>

<div class="form-group">
  <div class="col-sm-2 control-label">
  ราคาสินค้า :
  </div>
  <div class="col-sm-5">
    <input type="number" name="m_price" required class="form-control" value="<?php echo $row_menu['m_price'];?>">
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
      <img src="../m_img/<?php echo $row_menu['m_img1']; ?>" width="100">
      <br>
      <br>
      <input name="m_img1" type="file"  class="form-control" id="m_img1" size="50"/>
      <input name="m_img11" type="hidden" id="m_img11" value="<?php echo $row_menu['m_img1']; ?>">
      <input name="m_id" type="hidden" id="m_id" value="<?php echo $row_menu['m_id']; ?>">
      <br>
      
    ภาพที่2:
      <img src="../m_img/<?php echo $row_menu['m_img2']; ?>" width="100">
      <br>
      <br>
      <input  name="m_img2" type="file"  class="form-control" id="m_img2" size="50"/>
      <input  name="m_img22" type="hidden" id="m_img22" value="<?php echo $row_menu['m_img2']; ?>">
      <input name="m_id" type="hidden" id="m_id" value="<?php echo $row_menu['m_id']; ?>">
  </div>
</div>

<div class="form-group">
  <div class="col-sm-2">
  </div>
  <div class="col-sm-3">
    <input type="hidden" name="m_id" value="<?php echo $ID; ?>" />
    <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
  </div>
</div>
</form>