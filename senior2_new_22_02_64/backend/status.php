<?php 
if($status==1){
		  echo "<font color='red'>";
		  echo "รอชำระเงิน";
		  echo "</font>";
	  }elseif($status==2){
		  echo "<font color='green'>";
		  echo "ชำระเงินแล้ว";
		  echo "</font>";
	}elseif($status==3){
		  echo "<font color='green'>";
		  echo "ชำระเงินสด";
		  echo "</font>";
	  }elseif($status==4){
		echo "<font color='green'>";
		echo "กำลังเตรียมอาหาร";
		echo "</font>";
	}elseif($status==5){
		echo "<font color='green'>";
		echo "กำลังไปส่งอาหาร";
		echo "</font>";
	} 
?>