<?php 
 include_once '../model/index.php';
$vehicles_data=array('vehicle_name'=>$_POST['vehicle_name'],'vehicle_number'=>$_POST['vehicle_number'],'model_number'=>$_POST['model_number'],'insurance'=>$_POST['insurance'],'fc_renewal'=>$_POST['fc_renewal'],'tax_date'=>$_POST['tax_date'],'rc_date'=>$_POST['rc_date'],'remain_date'=>$_POST['remain_date']);
$where = array('id'=>$_GET['id']);
$update = $wpdb->update('vehicles',$vehicles_data,$where);
if ($update) {
	header("location:../view/vehicles.php?status=updated&slug=Vechicle");
}else{
	header("location:../view/vehicles.php?status=error");
}

?> 


 