<?php 
include_once '../model/index.php';
if($wpdb->insert('pricing_master',$_POST)){
	header("location:../view/add_pricing.php");
}else{
	header("location:../view/add_pricing.php");
}

 ?>