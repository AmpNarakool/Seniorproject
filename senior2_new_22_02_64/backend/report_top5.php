<?php
require_once('../Connections/condb.php');


$query = "
SELECT p.p_name, SUM(o.total) AS totol 
FROM tbl_order_detail as o 
INNER JOIN tbl_product as p ON p.p_id=o.p_id 
GROUP BY o.p_id ORDER BY  totol DESC LIMIT 5 
";
$result = mysql_db_query($database_condb, $query);
$resultchart = mysql_db_query($database_condb, $query);
//for chart
$p_name = array();
$totol = array();
while($rs = mysql_fetch_array($resultchart)){
$p_name[] = "\"".$rs['p_name']."\"";
$totol[] = "\"".$rs['totol']."\"";
}
$p_name = implode(",", $p_name);
$totol = implode(",", $totol);

?>
<h3 align="center">รายงานสินค้าขายดีเรียงตามยอดขายลำดับ 5 อันดับ </h3>
<table width="400" border="1" cellpadding="0"  cellspacing="0" align="center">
    <thead>
        <tr>
            <th width="7%"><center>No.</center></th>
            <th width="33%">ชื่อสินค้า</th>
            <th width="60%">ยอดขาย</th>
        </tr>
    </thead>
    
    <?php while($row = mysql_fetch_array($result)) { ?>
    <tr>
        <td align="center"><?php echo $i += 1;?></td>
        <td><?php echo $row['p_name'];?></td>
        <td align="right"><?php echo number_format($row['totol'],2);?></td>
    </tr>
    
    <?php
    $at += $row['totol'];
    }
    //echo $at;
    ?>
    <tr>
        <td align="center" colspan="2">รวม</td>
        <td align="right" bgcolor="yellow"><?php echo number_format($at,2);?></td>
    </tr>
</table>
<?php // mysqli_close($con);?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
<hr>
<p align="center">
    <!--devbanban.com-->
    <canvas id="myChart" width="800px" height="300px"></canvas>
    <script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
    labels: [<?php echo $p_name;?>
    
    ],
    datasets: [{
    label: 'รายงานสินค้าขายดี(บาท)',
    data: [<?php echo $totol;?>
    ],
    backgroundColor: [
    'rgba(255, 99, 132, 0.2)',
    'rgba(54, 162, 235, 0.2)',
    'rgba(255, 206, 86, 0.2)',
    'rgba(75, 192, 192, 0.2)',
    'rgba(153, 102, 255, 0.2)',
    'rgba(255, 159, 64, 0.2)'
    ],
    borderColor: [
    'rgba(255,99,132,1)',
    'rgba(54, 162, 235, 1)',
    'rgba(255, 206, 86, 1)',
    'rgba(75, 192, 192, 1)',
    'rgba(153, 102, 255, 1)',
    'rgba(255, 159, 64, 1)'
    ],
    borderWidth: 1
    }]
    },
    options: {
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero:true
    }
    }]
    }
    }
    });
    </script>
</p>
<!--devbanban.com-->