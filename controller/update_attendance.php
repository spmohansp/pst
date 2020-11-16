<?php 
 include_once '../model/index.php';
	$attendance_data = array('driver_id'=>implode(',', $_POST['staff_id']));
	$where = array('id'=>$_GET['id']);
	if ($wpdb->update('attendance',$attendance_data,$where)) {
		header("location:../view/attendance.php?status=inserted&slug=attendance");
	}else{
		header("location:../view/attendance.php?status=error&slug=attendance");
	}
 ?>
