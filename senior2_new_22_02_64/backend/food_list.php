<?php
$query = "SELECT *
FROM menu as m  
LEFT JOIN menu_type as mt 
ON m.t_id = mt.t_id
ORDER BY m.m_id DESC" or die("Error:" . mysql_error());

$result = mysql_db_query($database_condb, $query);
echo ' <table id="example" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class='danger'>
      <th width='3%'>No.</th>
      <th width='10%'>รูป</th>
      <th width='20%'>ชื่อสินค้า</th>
      <th width='20%'>รายละเอียด</th>
      <th width='15%'>ประเภท</th>
      <th width='7%'>ราคา</th>
      <th width='3%'>แก้ไข</th>
      <th width='3%'>ลบ</th>
    </tr>";
  echo "</thead>";
  while($row = mysql_fetch_array($result)) {
  echo "<tr>";
    echo "<td align='center'>" .$i +=1 .  "</td> ";
    echo "<td>"."<img src='../m_img/".$row['m_img1']."' width='100%'>"."</td>";
    echo "<td>".$row["m_name"]."</td>";
    echo "<td>".$row['m_detail'];
    echo "<td>".$row['t_name'];
    echo "<td>";
     $pid =  $row['m_id'];
             echo '<font color="red">'; 
             echo $row['m_price']. ' บ. ';
             echo '</font>';
    echo "</td> ";

    echo "<td><a href='food.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";
    echo "<td><a href='food_del_db.php?ID=$row[0]' onclick=\"return confirm('คุณต้องการลบบันทึกนี้? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
  echo "</tr>";
  }
echo "</table>";

?>
<!--echo "<td><a href='food_detail.php?m_id=<?php echo $row[m_id];?>&t_id=<?php echo $row_prd[t_id];?>&act=edit' class='btn btn-info btn-xs' target='_blank'> รายละเอียด </a></td> ";-->