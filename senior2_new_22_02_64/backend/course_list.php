<?php
$query = "SELECT * FROM course_detail as c  
          LEFT JOIN menu as m
          ON c.m_id = m.m_id
          ORDER BY c.cd_id DESC" or die("Error:" . mysql_error());

$result = mysql_db_query($database_condb, $query);
echo ' <table id="example1" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class='danger'>
      <th width='3%'>No.</th>
      <th width='10%'>ประจำสัปดาห์ที่</th>
      <th width='20%'>ข้อมูล</th>
      <th width='3%'>แก้ไข</th>
      <th width='3%'>ลบ</th>
    </tr>";
  echo "</thead>";
  while($row = mysql_fetch_array($result)) {
  echo "<tr>";
    echo "<td align='center'>" .$i +=1 .  "</td> ";
    echo "<td>".$row["cd_weekly"]."</td> ";
    echo "<td>"."วันจันทร์"."<br>"."มื้อที่1: ".$row["meal_1"]."<br>"."มื้อที่2: ".$row["meal_1_1"]."<br>"
              ."วันอังคาร"."<br>"."มื้อที่1: ".$row["meal_2"]."<br>"."มื้อที่2: ".$row["meal_2_2"]."<br>"
              ."วันพุธ"."<br>"."มื้อที่1: ".$row["meal_3"]."<br>"."มื้อที่2: ".$row["meal_3_3"]."<br>"
              ."วันพฤหัสบดี"."<br>"."มื้อที่1: ".$row["meal_4"]."<br>"."มื้อที่2: ".$row["meal_4_4"]."<br>"
              ."วันศุกร์"."<br>"."มื้อที่1: ".$row["meal_5"]."<br>"."มื้อที่2: ".$row["meal_5_5"]
        ."</td> ";
    echo "<td><a href='course.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a>
    </td> ";
    echo "<td><a href='course_del_db.php?ID=$row[0]' onclick=\"return confirm('คุณต้องการลบบันทึกนี้? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
  echo "</tr>";
  }
echo "</table>";
?>