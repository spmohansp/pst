<?php
include_once '../model/index.php';
$drivers_data=array('driver_name'=>$_POST['driver_name'],'phone_number'=>$_POST['phone_number'],'vehicle_id'=>$_POST['vehicle_id']);
$where = array('id'=>$_GET['id']);
	if ($wpdb->update('drivers',$drivers_data,$where)) {
		header("location:../view/drivers.php?status=updated&slug=Driver");
	}else{
		header("location:../view/drivers.php?status=error");
	}
?>