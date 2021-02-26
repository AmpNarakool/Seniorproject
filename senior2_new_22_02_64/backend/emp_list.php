<?php
$query = "SELECT * FROM tbl_admin  ORDER BY admin_id DESC" or die("Error:" . mysqli_error());
$result = mysql_db_query($database_condb, $query);
  echo ' <table id="example" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class='danger'>
    <th width='3%'>No.</th>
    <th width='10%'>ชื่อ</th>
    <th width='10%'>Username</th>
    <th width='10%'>Password</th>
    <th width='3%'>ข้อมูล</th>
    <th width='3%'>ลบ</th>
    </tr>";
  echo "</thead>";
  while($row = mysql_fetch_array($result)) {
  echo "<tr>";
    echo "<td align='center'>" .$i +=1 ."</td> ";
    echo "<td>".$row['admin_name']."</td> "; 
    echo "<td>".$row['admin_user']."</td> "; 
    echo "<td>".$row['admin_pass']."</td> "; 
    echo "<td><a href='emp.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";
  echo "<td><a href='emp_del_db.php?ID=$row[0]' onclick=\"return confirm('คุณต้องการลบบันทึกนี้? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
echo "</tr>";
}
echo "</table>";

?>
