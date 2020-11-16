<?php 
include_once '../model/index.php';
$vehicles=$wpdb->insert('vehicles',$_POST);
if($vehicles){
	header("location:../view/vehicles.php?status=success&slug=Vechicle");
}else{
		header("location:../view/vehicles.php?status=error&slug=Vechicle");
}

?>