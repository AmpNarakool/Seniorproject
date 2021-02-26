<?php
$query = "SELECT * FROM tbl_member  ORDER BY mem_id DESC" or die("Error:" . mysqli_error());
$result = mysql_db_query($database_condb, $query);
  echo ' <table id="example" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class='danger'>
    <th width='3%'>No.</th>
    <th width='10%'>ข้อมูล</th>
    <th width='30%'>ที่อยู่</th>
    <th width='3%'>ข้อมูล</th>
    <th width='3%'>ลบ</th>
    </tr>";
  echo "</thead>";
  while($row = mysql_fetch_array($result)) {
  echo "<tr>";
    echo "<td align='center'>" .$i +=1 ."</td> ";
    echo "<td>".'ชื่อ : '.$row['mem_name'].'<br>'.'user : '.$row['mem_username'].'<br>'.'pass : '.$row['mem_password']."</td> "; 
    echo "<td>".'ที่อยู่ : '.$row['mem_address'].'<br>'.'phone : '.$row['mem_tel'].'<br>'.'email : '.$row['mem_email']."</td> "; 
    echo "<td><a href='member.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";
  echo "<td><a href='member_del_db.php?ID=$row[0]' onclick=\"return confirm('คุณต้องการลบบันทึกนี้? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
echo "</tr>";
}
echo "</table>";

?>
