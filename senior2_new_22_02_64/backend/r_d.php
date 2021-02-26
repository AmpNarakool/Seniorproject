<?php
$queryd = "
SELECT SUM(o_price_total) AS stotal,
DATE_FORMAT(o_date, '%d-%m-%Y') AS o_date
FROM orders
GROUP BY DATE_FORMAT(o_date, '%d%')";
$resultd = mysqli_query($conn, $queryd);

$querym = "
SELECT SUM(o_price_total) AS stotalm,
DATE_FORMAT(o_date, '%M-%Y') AS o_date
FROM orders
GROUP BY DATE_FORMAT(o_date, '%m%')";
$resultm = mysqli_query($conn, $querym);


$queryy = "
SELECT SUM(o_price_total) AS stotaly,
DATE_FORMAT(o_date, '%d-%m-%Y') AS o_date
FROM orders
GROUP BY DATE_FORMAT(o_date, '%Y%')";
$resulty = mysqli_query($conn, $queryy);
?>
<h4>รายงานแยกตามวัน</h4>
<table width="300" border="1" cellpadding="0"  cellspacing="0">
    <thead>
        <tr>
            <th width="40%">ว/ด/ป</th>
            <th width="60%">ยอดขาย</th>
        </tr>
    </thead>
    <?php while($row = mysqli_fetch_array($resultd)) { ?>
    <tr>
        <td align="center">
            <?php echo date('d-M-Y',strtotime($row['o_date']));?>
        </td>
        <td align="right"><?php echo number_format($row['stotal'],2);?></td>
    </tr>
    
    <?php
    $atd += $row['stotal'];
    }
    ?>
    <tr>
        <td align="center">รวม</td>
        <td align="right" bgcolor="yellow"><?php echo number_format($atd,2);?></td>
    </tr>
</table>

<hr>

<h4>รายงานแยกตามเดือน</h4>
<table width="300" border="1" cellpadding="0"  cellspacing="0">
    <thead>
        <tr>
            <th width="40%">เดือน</th>
            <th width="60%">ยอดขาย</th>
        </tr>
    </thead>
    <?php while($row = mysqli_fetch_array($resultm)) { ?>
    <tr>
        <td align="center">
            <?php echo date('M-Y',strtotime($row['o_date']));?>
        </td>
        <td align="right"><?php echo number_format($row['stotalm'],2);?></td>
    </tr>
    
    <?php
    $atm += $row['stotalm'];
    }
    ?>
    <tr>
        <td align="center">รวม</td>
        <td align="right" bgcolor="yellow"><?php echo number_format($atm,2);?></td>
    </tr>
</table>

<hr>

<h4>รายงานแยกตามปี</h4>
<table width="300" border="1" cellpadding="0"  cellspacing="0">
    <thead>
        <tr>
            <th width="40%">ปี</th>
            <th width="60%">ยอดขาย</th>
        </tr>
    </thead>
    <?php while($row = mysqli_fetch_array($resulty)) { ?>
    <tr>
        <td align="center">
            <?php echo date('Y',strtotime($row['o_date']));?>
        </td>
        <td align="right"><?php echo number_format($row['stotaly'],2);?></td>
    </tr>
    
    <?php
    $aty += $row['stotaly'];
    }
    ?>
    <tr>
        <td align="center">รวม</td>
        <td align="right" bgcolor="yellow"><?php echo number_format($aty,2);?></td>
    </tr>
</table>
