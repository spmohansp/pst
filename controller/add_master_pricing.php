<?php 
// echo "<pre>";
include_once '../model/index.php';
$pricing_master = strtolower($_POST['hours'])."|".strtolower($_POST['kilo_meter']);
$check_column_name = "Select column_Name From INFORMATION_SCHEMA.COLUMNS Where Table_Name = 'pricing_master' And Column_Name = '$pricing_master'";
$column_name = $wpdb->get_results($check_column_name,ARRAY_A);
if(empty($column_name['column_Name'])){
	$wpdb->query("ALTER table `pricing_master` ADD `$pricing_master` varchar(255)");	
	header('location:../view/pricing.php?status=inserted&slug=Pricing');
}else{
	header('location:../view/pricing.php?status=error');
	
}

 ?>