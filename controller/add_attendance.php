<?php 
include_once '../model/index.php';


if(isset($_POST['date'])){
	$data = array('date'=>$_POST['date'],'driver_id'=>implode(',', $_POST['staff_id']));
	$date= $_POST['date'];
}else{
	$data = array('date'=>date("Y-m-d"),'driver_id'=>implode(',', $_POST['staff_id']));
	$date= date('Y-m-d');
}

$attendance_detail = $wpdb->get_results("SELECT date FROM attendance where date='$date'",ARRAY_A);

if (!$attendance_detail) {
	if ($wpdb->insert('attendance',$data)) {
		header("location:../view/attendance.php?status=inserted&slug=attendance");
	}else{
		header("location:../view/attendance.php?status=error&slug=attendance");
	}
}else{
	header("location:../view/attendance.php?status=error&slug=attendance Already Inserted");
}

 ?>