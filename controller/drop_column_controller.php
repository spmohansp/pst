<?php 
include_once '../model/index.php';
$drop_column_name = $_GET['column_name'];
$check_column_name = "Select column_Name From INFORMATION_SCHEMA.COLUMNS Where Table_Name = 'pricing_master' And Column_Name = '$drop_column_name'";
$column_name = $wpdb->get_results($check_column_name,ARRAY_A)[0];
if(empty($column_name['column_Name'] )){
	header('location:../view/pricing.php?status=deleted&slug=Pricing');
}else{
	if($wpdb->query("ALTER table `pricing_master` DROP COLUMN   `$drop_column_name`")){
		header('location:../view/pricing.php?status=deleted&slug=Pricing');
	}else{
		header('location:../view/pricing.php?status=error');
	}
	
}

 ?>