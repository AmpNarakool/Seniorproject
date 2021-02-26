<?php //require_once('Connections/condb.php'); ?>
<?php

mysql_select_db($database_condb, $condb);
$query_typeprd = "SELECT * FROM menu_type ORDER BY t_id ASC";
$typeprd = mysql_query($query_typeprd, $condb) or die(mysql_error());
$row_typeprd = mysql_fetch_assoc($typeprd);
$totalRows_typeprd = mysql_num_rows($typeprd);
?>



     <div class=" " style="font-size:18px ">
              <a href="index.php" class=" w3-mobile tablink w3-hover-green w3-green" >ทั้งหมด        
<?php do { ?>
                <a href="index.php?t_id=<?php echo $row_typeprd['t_id'];?>&type-name=<?php echo $row_typeprd['t_name'];?>" class="w3-cell-top w3-hover-green" style="color:green"> <?php echo $row_typeprd['t_name']; ?>/</a></a> 
<?php } while ($row_typeprd = mysql_fetch_assoc($typeprd)); ?>
</div>                   

<?php
mysql_free_result($typeprd);
?>
