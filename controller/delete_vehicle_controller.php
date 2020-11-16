<?php  
  include_once '../model/index.php';
if($wpdb->delete('vehicles',array('id'=>$_GET['id']))){
	header("location:../view/vehicles.php?status=deleted&slug=Vehicle");
}else{
	header("location:../view/vehicles.php?status=error");
}