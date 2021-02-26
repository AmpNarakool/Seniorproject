<?php //require_once('Connections/condb.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_condb, $condb);
$query_prd = "SELECT * FROM menu ORDER BY m_id DESC LIMIT 0 , 12";
$prd = mysql_query($query_prd, $condb) or die(mysql_error());
$row_prd = mysql_fetch_assoc($prd);
$totalRows_prd = mysql_num_rows($prd);
?>
<?php do { ?>
  <div class="col-sm-2" align="center">
  <img src="m_img/<?php echo $row_prd['m_img1'];?>" width="150px" heigth="150px"/>
    <p align="center">
      <b><?php echo $row_prd['m_name']; ?> <font color="red">  
        <br />
	  <?php echo $row_prd['m_price']; ?>  บาท </font> </b>
      <br />
	      
   <?php include('outstock.php');?>
   
   <script>
        $(document).ready(function() {
        var count = 0;
        $("a.add-to-cart").click(function(event) {
          count++;
          $("a.add-to-cart").addClass("size");
          setTimeout(function() {
            $("a.add-to-cart").addClass("hover");
          }, 200);
          setTimeout(function() {
            $("a.cart > span").addClass("counter");
            $("a.cart > span.counter").text(count);
          }, 400);
          setTimeout(function() {
            $("a.add-to-cart").removeClass("hover");
            $("a.add-to-cart").removeClass("size");
          }, 600);
          event.preventDefault();
        });
      });
    </script>
    
    
        
      <br><br>
      </p>
    </div>
  <?php } while ($row_prd = mysql_fetch_assoc($prd)); ?>
<?php
mysql_free_result($prd);
?>
