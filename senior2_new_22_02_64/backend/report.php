<?php include('access.php');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include('h.php');?>
    <?php include('datatable.php');?>
    
  </head>
  <body>
    <div class="container">
      <div class="row">
        <span id="hp">
          <?php  include('banner.php');?>
        </span>
      </div>
      <div class="row">
        <div class="col-md-2">
          <b>  ADMIN : <?php include('mm.php');?> </b>
          <br>
          <span id="hp">
            <?php include('report_menu.php');?>
          </span>
          
        </div>
        <div class="col-md-10">
          <?php
          $p = $_GET['p'];
          if($p=='d'){
          include('report_d.php');
          }elseif($p=='m'){
          include('report_m.php');
          }elseif($p=='y'){
          include('report_y.php');
          }elseif($p=='top5'){
          include('report_top5.php');
          }elseif($p=='mem'){
          include('report_by_member.php');
          }elseif($p=='qty'){
          include('report_topqty.php');
          }
          ?>
        </div>
      </div>
    </div>
  </body>
</html>
<?php include('f.php');?>