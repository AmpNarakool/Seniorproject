<?php
$query = "
SELECT * FROM bank_account as b 
ORDER BY b.b_id DESC" or die("Error:" . mysql_error());
$result = mysql_db_query($database_condb, $query);
echo ' <table id="example" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class='danger'>
      <th width='3%'>No.</th>
      <th width='10%'>QR code</th>
      <th width='30%'>ธนาคาร</th>
      <th width='15%'>ชื่อบัญชี</th>
      <th width='10%'>เลขที่บัญชี</th>
      <th width='3%'>แก้ไข</th>
      <th width='3%'>ลบ</th>
    </tr>";
  echo "</thead>";
  while($row = mysql_fetch_array($result)) {
  echo "<tr>";
    echo "<td align='center'>" .$i +=1 .  "</td> ";
    echo "<td>"."<img src='../bimg/".$row['b_img']."' width='100%'>"."</td>";
    echo "<td>".$row["b_name"]
    ."</td> ";
    echo "<td>".$row['b_owner'];
    echo "<td>";
     $pid =  $row['b_id'];
             echo '<font color="red">'; 
             echo $row['b_number'];
             echo '</font>';
    echo "</td> ";
    echo "<td><a href='payment.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a>
    </td> ";
    echo "<td><a href='payment_del_db.php?ID=$row[0]' onclick=\"return confirm('คุณต้องการลบบันทึกนี้? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
  echo "</tr>";
  }
echo "</table>";

?>