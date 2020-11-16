<?php 
include_once '../model/index.php';
$old_column_value = $_GET['old_column_value'];
$new_column_value = strtolower($_POST['hours'])."|".strtolower($_POST['kilo_meter']);
$check_column_name = "Select column_Name From INFORMATION_SCHEMA.COLUMNS Where Table_Name = 'pricing_master' And Column_Name = '$old_column_value'";
$column_name = $wpdb->get_results($check_column_name,ARRAY_A)[0];
if(empty($column_name['column_Name'])){
	header('location:../view/pricing.php?status=updated&slug=Pricing');
}else{

	if($wpdb->query("ALTER table `pricing_master` CHANGE `$old_column_value` `$new_column_value` varchar(255)")){
		header('location:../view/pricing.php?status=updated&slug=Pricing');
	}else{
		header('location:../view/pricing.php?status=error&slug=Pricing');
	}
	
}

 ?>