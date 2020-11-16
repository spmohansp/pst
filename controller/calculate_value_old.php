<?php 
include_once '../model/index.php';
include_once 'common_function.php';
// get vehicle all price detail
$vehilce_price_values = get_table_values($_POST['vehicles_id'],$wpdb);
// split time
$split_time = explode(':', $_POST['total_time']);
// get all column name
$check_column_name = "Select column_Name From INFORMATION_SCHEMA.COLUMNS Where Table_Name = 'pricing_master'";
$column_names = $wpdb->get_results($check_column_name,ARRAY_A);
unset($column_names[0],$column_names[1],$column_names[2],$column_names[3]);//remove 3 columns(id,vehicleno.)
foreach ($column_names as $key => $value) {
	$column_value[]=$value['column_Name'];
}
// print_r($column_value);









	if($split_time[0]<explode('|', $column_value[0])[0] || $_POST['total_km']<explode('|', $column_value[0])[1]){
		$first_colunm=explode('|', $column_value[0]);



		if($_POST['total_km']<=$first_colunm[1]  && $split_time[0]>=$first_colunm[0]){
			$total_price=$vehilce_price_values[$column_value[0]]+(($split_time[0]-$first_colunm[0])*$vehilce_price_values['additional_rate']);
		}elseif($_POST['total_km']<=$first_colunm[1]){
			$total_price=$vehilce_price_values[$column_value[0]];
		}
		// {
		// 	$total_price=$vehilce_price_values[$column_value[0]]+(($_POST['total_km']-$first_colunm[1])*$vehilce_price_values['additional_rate_km']);
		// }
	}elseif ($split_time[1]==0) {
		// echo "in";
		foreach ($column_value as $key => $value) {
			$split_colum_value=explode('|', $value);
			if ($split_colum_value[0]==$split_time[0] && $split_colum_value[1]==$_POST['total_km']) {
				// $table_value=$split_colum_value[0].'|'.$split_colum_value[1];
				$total_price=$vehilce_price_values[$value];
				break;
			}elseif ($split_colum_value[0]>$split_time[0] && $split_colum_value[1]==$_POST['total_km']) {
				// $table_value=$split_colum_value[0].'|'.$split_colum_value[1];
				$total_price=$vehilce_price_values[$value];
				break;
			}elseif ($split_colum_value[0]>$split_time[0] && $split_colum_value[1]<$_POST['total_km']) {
				// $table_value=$split_colum_value[0].'|'.$split_colum_value[1];
				$total_price=$vehilce_price_values[$value]+(($_POST['total_km']-explode('|', $column_value[$key])[1])*$vehilce_price_values['additional_rate_km']);
				break;
			}else if($split_colum_value[0]==$split_time[0] && ($split_colum_value[1]<$_POST['total_km']) && (explode('|', $column_value[++$key])[1]>$_POST['total_km'])){
				$total_price=$vehilce_price_values[$value]+(abs($_POST['total_km']-explode('|', $column_value[--$key])[1])*$vehilce_price_values['additional_rate_km']);
				break;
			}else if($split_colum_value[0]<=$split_time[0] && $split_colum_value[1]==$_POST['total_km']){
				$total_price=$vehilce_price_values[$value]+abs($split_time[0]-explode('|', $column_value[$key])[0])*$vehilce_price_values['additional_rate'];
				break;
			}else if($split_colum_value[0]<$split_time[0] && ($split_colum_value[1]<$_POST['total_km']) && (explode('|', $column_value[++$key])[1]>$_POST['total_km'])){
				$total_price=$vehilce_price_values[$value]+(abs($_POST['total_km']-explode('|', $column_value[--$key])[1])*$vehilce_price_values['additional_rate_km'])+abs($split_time[0]-explode('|', $column_value[$key])[0])*$vehilce_price_values['additional_rate'];
				break;
			}
		}
	}else{
		foreach ($column_value as $key => $value) {
			$split_colum_value=explode('|', $value);
			if ($split_colum_value[0]==$split_time[0] && $split_colum_value[1]==$_POST['total_km']) {
				$table_value=$split_colum_value[0]."|".$split_colum_value[1];
				$total_price=$vehilce_price_values[$table_value]+($split_time[1]/60)*$vehilce_price_values['additional_rate'];
				break;
			}elseif ($split_colum_value[0]>$split_time[0] && $split_colum_value[1]==$_POST['total_km']) {
				// $table_value=$split_colum_value[0].'|'.$split_colum_value[1];
				$total_price=$vehilce_price_values[$value]+($split_time[1]/60)*$vehilce_price_values['additional_rate'];
				break;
			}elseif ($split_colum_value[0]>$split_time[0] && $split_colum_value[1]<$_POST['total_km']) {
				// $table_value=$split_colum_value[0].'|'.$split_colum_value[1];
				$total_price=$vehilce_price_values[$value]+(($_POST['total_km']-explode('|', $column_value[$key])[1])*$vehilce_price_values['additional_rate_km'])+($split_time[1]/60)*$vehilce_price_values['additional_rate'];
				break;
			}else if($split_colum_value[0]==$split_time[0] && ($split_colum_value[1]<$_POST['total_km']) && (explode('|', $column_value[++$key])[1]>$_POST['total_km'])){
				$total_price=$vehilce_price_values[$value]+(abs($_POST['total_km']-explode('|', $column_value[--$key])[1])*$vehilce_price_values['additional_rate_km'])+($split_time[1]/60)*$vehilce_price_values['additional_rate'];
				break;
			}else if($split_colum_value[0]<=$split_time[0] && $split_colum_value[1]==$_POST['total_km']){
				$total_price=$vehilce_price_values[$value]+abs($split_time[0]-explode('|', $column_value[$key])[0])*$vehilce_price_values['additional_rate']+($split_time[1]/60)*$vehilce_price_values['additional_rate'];
				break;
			}else if($split_colum_value[0]<$split_time[0] && ($split_colum_value[1]<$_POST['total_km']) && (explode('|', $column_value[++$key])[1]>$_POST['total_km'])){

				$total_price=$vehilce_price_values[$value]+(abs($_POST['total_km']-explode('|', $column_value[--$key])[1])*$vehilce_price_values['additional_rate_km'])+abs($split_time[0]-explode('|', $column_value[$key])[0])*$vehilce_price_values['additional_rate']+($split_time[1]/60)*$vehilce_price_values['additional_rate'];
				break;
			}
		}
	}

	// $total_price =array('price'=>$total_price); 
echo json_encode($total_price);
	// print_r($total_price);

 ?>