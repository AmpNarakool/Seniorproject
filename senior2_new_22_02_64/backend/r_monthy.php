<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            $query = "
            SELECT pay_amount, SUM(pay_amount) AS totol, DATE_FORMAT(order_date, '%M-%Y') AS order_date
            FROM orders
            GROUP BY DATE_FORMAT(order_date, '%m%')
            ORDER BY DATE_FORMAT(order_date, '%Y-%m-%d') DESC
            ";
            $result = mysql_db_query($database_condb, $query);
            $resultchart = mysql_db_query($database_condb, $query);
            //for chart
            $order_date = array();
            $totol = array();
            while($rs = mysql_fetch_array($resultchart)){
            $order_date[] = "\"".$rs['order_date']."\"";
            $totol[] = "\"".$rs['totol']."\"";
            }
            $order_date = implode(",", $order_date);
            $totol = implode(",", $totol);
            
            ?>
            <h3 align="center">รายงานสรุปยอดขายในรูปแบบกราฟ</h3>
            
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
                labels: [<?php echo $order_date;?>],
                datasets: [{
                label: 'รายงานยอดขาย แยกตามเดือน (บาท)',
                data: [<?php echo $totol;?>],
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
            <div class="col-sm-7">
                <h3>สรุปยอดขายแบบเดือน</h3>
                <table  class="table table-striped" border="1" cellpadding="0"  cellspacing="0" align="center">
                    <thead>
                        <tr class="table-primary">
                            <th width="30%">ว/ด/ป</th>
                            <th width="70%"><center>รายได้</center></th>
                        </tr>
                    </thead>
                    
                    <?php while($row = mysql_fetch_array($result)) { ?>
                    <tr>
                        <td> -<?php echo $row['order_date'];?></td>
                        <td align="right"><?php echo number_format($row['totol'],2);?></td>
                    </tr>
                    <?php
                    @$amount_total += $row['totol'];
                    }
                    ?>
                    <tr class="table-danger">
                        <td align="center">รวม</td>
                        <td align="right"><b>
                        <?php echo number_format($amount_total,2);?></b></td></td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
</div>