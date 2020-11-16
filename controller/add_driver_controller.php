<?php 
include_once '../model/index.php';
$drivers=$wpdb->insert('drivers',$_POST);

if($drivers){
	header("location:../view/drivers.php?status=inserted&slug=Driver");
}else{
	header("location:../view/drivers.php?status=error&slug=Driver");
}

?>