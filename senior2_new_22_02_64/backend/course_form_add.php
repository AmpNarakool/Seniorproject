<?php require_once('../Connections/condb.php'); ?>
<?php
$ID = $_GET['ID'];

$sql_menu = "SELECT * FROM menu";
$result_menu = mysql_db_query($database_condb, $sql_menu) or die ("Error in query: $sql " . mysql_error());
$row_menu = mysql_fetch_array($result_menu);
extract($row_menu);

?>
<h4>ฟอร์มเพิ่มรายการอาหารในคอร์ส </h4>
<form action="course_form_add_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">

  <div class="form-group">
    <div class="col-sm-2 control-label">
      ประจำสัปดาห์ที่ :
    </div>
    <div class="col-sm-5">
      <input type="datetime-local" name="cd_weekly" required class="form-control">
    </div>
  </div>
<!--วันจันทร์-->
  <div class="form-group">
    <div class="col-sm-2 control-label" >
      วันจันทร์ :
    </div>
    <div class="col-sm-1 control-label">
      มื้อที่1 
    </div>
    <div class="col-sm-1 control-label"  >
      <select name="meal_1" id="m_name" required="required">
        <option value="">กรุณาเลือกเมนู</option>
          <?php
            do {  
          ?>
          <option value="<?php echo $row_menu['m_name']?>"><?php echo $row_menu['m_name']?></option>
          <?php
            } while ($row_menu = mysql_fetch_assoc($result_menu));
              $rows = mysql_num_rows($result_menu);
              if($rows > 0) {
                mysql_data_seek($result_menu, 0);
	              $row_menu = mysql_fetch_assoc($result_menu);
              }
          ?>
      </select>
    </div>
    <br>
    <br>
    <div class="col-sm-3 control-label">
      มื้อที่2 
    </div>
    <div class="col-sm-1 control-label"  >
      <select name="meal_1_1" id="m_name" required="required">
        <option value="">กรุณาเลือกเมนู</option>
          <?php
            do {  
          ?>
          <option value="<?php echo $row_menu['m_name']?>"><?php echo $row_menu['m_name']?></option>
          <?php
            } while ($row_menu = mysql_fetch_assoc($result_menu));
              $rows = mysql_num_rows($result_menu);
              if($rows > 0) {
                mysql_data_seek($result_menu, 0);
	              $row_menu = mysql_fetch_assoc($result_menu);
              }
          ?>
      </select>
    </div> 
  </div>

<!--วันอังคาร-->
  <div class="form-group">
    <div class="col-sm-2 control-label" >
      วันอังคาร :
    </div>
    <div class="col-sm-1 control-label">
      มื้อที่1 
    </div>
    <div class="col-sm-1 control-label"  >
      <select name="meal_2" id="m_name" required="required">
        <option value="">กรุณาเลือกเมนู</option>
          <?php
            do {  
          ?>
          <option value="<?php echo $row_menu['m_name']?>"><?php echo $row_menu['m_name']?></option>
          <?php
            } while ($row_menu = mysql_fetch_assoc($result_menu));
              $rows = mysql_num_rows($result_menu);
              if($rows > 0) {
                mysql_data_seek($result_menu, 0);
	              $row_menu = mysql_fetch_assoc($result_menu);
              }
          ?>
      </select>
    </div>
    <br>
    <br>
    <div class="col-sm-3 control-label">
      มื้อที่2 
    </div>
    <div class="col-sm-1 control-label"  >
      <select name="meal_2_2" id="m_name" required="required">
        <option value="">กรุณาเลือกเมนู</option>
          <?php
            do {  
          ?>
          <option value="<?php echo $row_menu['m_name']?>"><?php echo $row_menu['m_name']?></option>
          <?php
            } while ($row_menu = mysql_fetch_assoc($result_menu));
              $rows = mysql_num_rows($result_menu);
              if($rows > 0) {
                mysql_data_seek($result_menu, 0);
	              $row_menu = mysql_fetch_assoc($result_menu);
              }
          ?>
      </select>
    </div> 
  </div>
<!--วันพุธ-->
  <div class="form-group">
    <div class="col-sm-2 control-label" >
      วันพุธ :
    </div>
    <div class="col-sm-1 control-label">
      มื้อที่1 
    </div>
    <div class="col-sm-1 control-label"  >
      <select name="meal_3" id="m_name" required="required">
        <option value="">กรุณาเลือกเมนู</option>
          <?php
            do {  
          ?>
          <option value="<?php echo $row_menu['m_name']?>"><?php echo $row_menu['m_name']?></option>
          <?php
            } while ($row_menu = mysql_fetch_assoc($result_menu));
              $rows = mysql_num_rows($result_menu);
              if($rows > 0) {
                mysql_data_seek($result_menu, 0);
	              $row_menu = mysql_fetch_assoc($result_menu);
              }
          ?>
      </select>
    </div>
    <br>
    <br>
    <div class="col-sm-3 control-label">
      มื้อที่2 
    </div>
    <div class="col-sm-1 control-label"  >
      <select name="meal_3_3" id="m_name" required="required">
        <option value="">กรุณาเลือกเมนู</option>
          <?php
            do {  
          ?>
          <option value="<?php echo $row_menu['m_name']?>"><?php echo $row_menu['m_name']?></option>
          <?php
            } while ($row_menu = mysql_fetch_assoc($result_menu));
              $rows = mysql_num_rows($result_menu);
              if($rows > 0) {
                mysql_data_seek($result_menu, 0);
	              $row_menu = mysql_fetch_assoc($result_menu);
              }
          ?>
      </select>
    </div> 
  </div>
<!--วันพฤหัสบดี-->
  <div class="form-group">
    <div class="col-sm-2 control-label" >
      วันพฤหัสบดี :
    </div>
    <div class="col-sm-1 control-label">
      มื้อที่1 
    </div>
    <div class="col-sm-1 control-label"  >
      <select name="meal_4" id="m_name" required="required">
        <option value="">กรุณาเลือกเมนู</option>
          <?php
            do {  
          ?>
          <option value="<?php echo $row_menu['m_name']?>"><?php echo $row_menu['m_name']?></option>
          <?php
            } while ($row_menu = mysql_fetch_assoc($result_menu));
              $rows = mysql_num_rows($result_menu);
              if($rows > 0) {
                mysql_data_seek($result_menu, 0);
	              $row_menu = mysql_fetch_assoc($result_menu);
              }
          ?>
      </select>
    </div>
    <br>
    <br>
    <div class="col-sm-3 control-label">
      มื้อที่2 
    </div>
    <div class="col-sm-1 control-label"  >
      <select name="meal_4_4" id="m_name" required="required">
        <option value="">กรุณาเลือกเมนู</option>
          <?php
            do {  
          ?>
          <option value="<?php echo $row_menu['m_name']?>"><?php echo $row_menu['m_name']?></option>
          <?php
            } while ($row_menu = mysql_fetch_assoc($result_menu));
              $rows = mysql_num_rows($result_menu);
              if($rows > 0) {
                mysql_data_seek($result_menu, 0);
	              $row_menu = mysql_fetch_assoc($result_menu);
              }
          ?>
      </select>
    </div> 
  </div>
<!--วันศุกร์-->
  <div class="form-group">
    <div class="col-sm-2 control-label" >
      วันศุกร์ :
    </div>
    <div class="col-sm-1 control-label">
      มื้อที่1 
    </div>
    <div class="col-sm-1 control-label"  >
      <select name="meal_5" id="m_name" required="required">
        <option value="">กรุณาเลือกเมนู</option>
          <?php
            do {  
          ?>
          <option value="<?php echo $row_menu['m_name']?>"><?php echo $row_menu['m_name']?></option>
          <?php
            } while ($row_menu = mysql_fetch_assoc($result_menu));
              $rows = mysql_num_rows($result_menu);
              if($rows > 0) {
                mysql_data_seek($result_menu, 0);
	              $row_menu = mysql_fetch_assoc($result_menu);
              }
          ?>
      </select>
    </div>
    <br>
    <br>
    <div class="col-sm-3 control-label">
      มื้อที่2 
    </div>
    <div class="col-sm-1 control-label"  >
      <select name="meal_5_5" id="m_name" required="required">
        <option value="">กรุณาเลือกเมนู</option>
          <?php
            do {  
          ?>
          <option value="<?php echo $row_menu['m_name']?>"><?php echo $row_menu['m_name']?></option>
          <?php
            } while ($row_menu = mysql_fetch_assoc($result_menu));
              $rows = mysql_num_rows($result_menu);
              if($rows > 0) {
                mysql_data_seek($result_menu, 0);
	              $row_menu = mysql_fetch_assoc($result_menu);
              }
          ?>
      </select>
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