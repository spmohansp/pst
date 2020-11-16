<?php 
include_once '../model/index.php';
include_once 'common_function.php';
if (!empty($_POST['table'])) {
	if ($_POST['table']=='vehicles') {
		$id=$_POST['vehicle_id'];
		$drivers = $wpdb->get_results("SELECT * FROM drivers WHERE vehicle_id = $id",ARRAY_A)[0];
		$data=array('status'=>'success','id'=>$drivers['id'],'driver_name'=>$drivers['driver_name'],'phone_number'=>$drivers['phone_number'],'vehicle_id'=>$drivers['vehicle_id']);
		echo json_encode($data);
	}else{
		$data=array('status'=>'error');
		echo json_encode($data);
	}
}else{
}
 ?>
