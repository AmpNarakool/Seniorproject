<?php
require_once('../Connections/condb.php');

$query = "
SELECT SUM(total) AS totol, DATE_FORMAT(datesave, '%Y') AS datesave
FROM tbl_order_detail
GROUP BY DATE_FORMAT(datesave, '%Y%')
";
$result = mysql_db_query($database_condb, $query);
$resultchart = mysql_db_query($database_condb, $query);
//for chart
$datesave = array();
$totol = array();
while($rs = mysql_fetch_array($resultchart)){
$datesave[] = "\"".$rs['datesave']."\"";
$totol[] = "\"".$rs['totol']."\"";
}
$datesave = implode(",", $datesave);
$totol = implode(",", $totol);

?>
<h3 align="center">รายงานแยกตามปี</h3>
<table width="200" border="1" cellpadding="0"  cellspacing="0" align="center">
    <thead>
        <tr>
            <th width="10%">ปี</th>
            <th width="10%">ยอดขาย</th>
        </tr>
    </thead>
    
    <?php while($row = mysql_fetch_array($result)) { ?>
    <tr>
        <td align="center"><?php echo $row['datesave'];?></td>
        <td align="right"><?php echo number_format($row['totol'],2);?></td>
    </tr>
    
    <?php
    $at += $row['totol'];
    }
    //echo $at;
    ?>
    <tr>
        <td align="center">รวม</td>
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
    labels: [<?php echo $datesave;?>
    
    ],
    datasets: [{
    label: 'รายงานภาพรวม แยกตามปี (บาท)',
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