<?php 
include_once '../model/index.php';
if($wpdb->update('pricing_master',$_POST,array('vechicle_id'=>$_POST['vechicle_id']))){
	header('location:../view/add_pricing.php');
}else{
	header('location:../view/add_pricing.php');
}

 ?>