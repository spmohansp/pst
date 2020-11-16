<?php 
include_once '../model/index.php';
include_once 'common_function.php';
// echo "<pre>";
// $_POST['total_time'] = "5:30";
// $_POST['vehicles_id']="3";
// $_POST['total_km']="101";
// get vehicle all price detail
$pricing_values = get_table_values($_POST['vehicles_id'],$wpdb);
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


	if ($split_time[1]==0){
		foreach ($column_value as $key => $value) {
			$keys=$key;
			$keys1=$key;

			$split_colum_value=explode('|', $value);
			if (($split_colum_value[1]==$_POST['total_km'])&&($split_colum_value[0]>=$split_time[0])) {
				$total_price=$pricing_values[$value];
				break;
			}elseif (($split_colum_value[1]==$_POST['total_km'])&&($split_colum_value[0]<$split_time[0])) {
				$extra_time=$split_time[0]-$split_colum_value[0];
				$total_price=$pricing_values[$value]+$pricing_values['additional_rate']*$extra_time;
				break;
			}elseif (($split_colum_value[1]<$_POST['total_km'])&&($split_colum_value[0]>=$split_time[0])&& (explode('|', $column_value[++$keys])[1]>$_POST['total_km'])) {
				$extra_km=$_POST['total_km']-$split_colum_value[1];
				$total_price=$pricing_values[$value]+$pricing_values['additional_rate_km']*$extra_km;
				break;
			}elseif (($split_colum_value[1]<$_POST['total_km'])&&($split_colum_value[0]<$split_time[0])&& (explode('|', $column_value[++$keys1])[1]>$_POST['total_km'])) {
				$extra_time=$split_time[0]-$split_colum_value[0];
				$extra_km=$_POST['total_km']-$split_colum_value[1];
				$total_price=$pricing_values[$value]+$pricing_values['additional_rate']*$extra_time+$pricing_values['additional_rate_km']*$extra_km;
				break;
			}

		}

	}else{
		foreach ($column_value as $key => $value) {
			$split_colum_value=explode('|', $value);
			$keys=$key;
			$keys1=$key;

			// print_r($split_colum_value);
			if (($split_colum_value[1]==$_POST['total_km'])&&($split_colum_value[0]>=$split_time[0])) {
				if ($split_colum_value[0]==$split_time[0]) {  // time equal to same 
					$table_value=$split_colum_value[0]."|".$split_colum_value[1];
					$total_price=$pricing_values[$table_value]+($split_time[1]/60)*$pricing_values['additional_rate'];
					break;
				}else{//time less than 
					$total_price=$pricing_values[$value];
					break;
				}
			}elseif (($split_colum_value[1]==$_POST['total_km'])&&($split_colum_value[0]<$split_time[0])) {
				$table_value=$split_colum_value[0]."|".$split_colum_value[1];
				$extra_time=$split_time[0]-$split_colum_value[0];
				$total_price=$pricing_values[$table_value]+($split_time[1]/60)*$pricing_values['additional_rate']+$pricing_values['additional_rate']*$extra_time;
				break;
			}elseif (($split_colum_value[1]<$_POST['total_km'])&&($split_colum_value[0]>=$split_time[0])&& (explode('|', $column_value[++$keys])[1]>$_POST['total_km'])) {
				if ($split_colum_value[0]==$split_time[0]) {  // time equal to same 
					$table_value=$split_colum_value[0]."|".$split_colum_value[1];
					$extra_km=$_POST['total_km']-$split_colum_value[1];
					$total_price=$pricing_values[$table_value]+($split_time[1]/60)*$pricing_values['additional_rate']+$pricing_values['additional_rate_km']*$extra_km;
					break;
				}else{//time less than 
					$extra_km=$_POST['total_km']-$split_colum_value[1];
					$total_price=$pricing_values[$value]+$pricing_values['additional_rate_km']*$extra_km;
					break;
				}
			}elseif (($split_colum_value[1]<$_POST['total_km'])&&($split_colum_value[0]<$split_time[0])&& (explode('|', $column_value[++$keys1])[1]>$_POST['total_km'])) {
				
				$table_value=$split_colum_value[0]."|".$split_colum_value[1];
				$extra_time=$split_time[0]-$split_colum_value[0];
				$extra_km=$_POST['total_km']-$split_colum_value[1];

				$total_price=$pricing_values[$table_value]+($split_time[1]/60)*$pricing_values['additional_rate']+$pricing_values['additional_rate']*$extra_time+$pricing_values['additional_rate_km']*$extra_km;;
				break;
			}

		}
	}






	// $total_price =array('price'=>$total_price); 
echo json_encode($total_price);
	// print_r($total_price);

 ?>