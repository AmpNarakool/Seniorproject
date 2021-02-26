<?php
$query = "SELECT * FROM menu_type as t ORDER BY t.t_id DESC" or die("Error:" . mysql_error());
$result = mysql_db_query($database_condb, $query);
  echo ' <table id="example" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class='danger'>
    <th width='2%'>No.</th>
    <th width='30%'>ชื่อประเภทอาหาร</th>
    <th width='5%'>แก้ไข</th>
    <th width='5%'>ลบ</th>
    </tr>";
  echo "</thead>";
  while($row = mysql_fetch_array($result)) {
  echo "<tr>";
    echo "<td align='center'>" .$i +=1 ."</td> ";
    echo "<td>" .$row["t_name"]."</td> "; 
    echo "</td> ";
    echo "<td><a href='food_type.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";
  echo "<td><a href='food_type_del_db.php?ID=$row[0]' onclick=\"return confirm('คุณต้องการลบบันทึกนี้? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
echo "</tr>";
}
echo "</table>";

?>