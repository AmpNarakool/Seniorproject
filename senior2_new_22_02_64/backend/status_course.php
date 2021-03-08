<?php 
if ($status != null) {
	if($status==0){
		  echo "<font color='red'>";
		  echo "ยังไม่จัดส่ง";
		  echo "</font>";
	  }elseif($status==1){
		  echo "<font color='green'>";
		  echo "กำลังดำเนินการ";
		  echo "</font>";
	}elseif($status==2){
		  echo "<font color='green'>";
		  echo "จัดส่งสำเร็จ";
		  echo "</font>";
	  }
}else {
	if($status_delivery == 0) {
	echo "<font color='red'>";
	echo "ยังไม่ได้จัดส่ง";
	echo "</font>";
}elseif ($status_delivery == 1) {
	echo "<font color='green'>";
	echo "จัดส่งสำเร็จ";
	echo "</font>";
}
}


?>