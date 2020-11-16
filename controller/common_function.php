<?php 
include_once '../model/index.php';

function get_vehicle_number($id,$wpdb){
	if ($id=='*') {
		return $vehicles = $wpdb->get_results("SELECT * FROM vehicles",ARRAY_A)[0];
	}else{
		return $vehicles = $wpdb->get_results("SELECT * FROM vehicles WHERE id = $id",ARRAY_A)[0];
	}
}
function get_customers($id,$wpdb){
	if ($id=='*') {
		return $customers = $wpdb->get_results("SELECT * FROM customer",ARRAY_A)[0];
	}else{
		return $customers = $wpdb->get_results("SELECT * FROM customer WHERE id = $id",ARRAY_A)[0];
	}
}
function get_drivers($id,$wpdb){
	if ($id=='*') {
		return $drivers = $wpdb->get_results("SELECT * FROM drivers",ARRAY_A);
	}else{
		return $drivers = $wpdb->get_results("SELECT * FROM drivers WHERE id = $id",ARRAY_A)[0];
	}
}

function get_table_values($vehicle_id,$wpdb){
	return $colum_data = $wpdb->get_results("SELECT * FROM pricing_master WHERE vechicle_id = $vehicle_id",ARRAY_A)[0];
}

function get_location($wpdb){
	$locations = $wpdb->get_results("SELECT starting_location,destination_location FROM entry",ARRAY_A);
	foreach ($locations as $key => $value) {
		$location[]=$value['starting_location'];
		$location[]=$value['destination_location'];
	}
	return $entry_location = '"'.implode('","', $location).'"';
}

// calculate monthly income
function total_monthly_income_amount($wpdb){
	$entry_monthly_income = array_sum($wpdb->get_results("SELECT bill_amount FROM entry WHERE MONTH(date) = MONTH(CURRENT_DATE())",ARRAY_A)[0]);
	return $entry_monthly_income;
}

// calculate income for each month
function getincome($month,$wpdb){
	$income =$wpdb->get_results($wpdb->prepare("SELECT sum(bill_amount) FROM entry WHERE MONTH(date) = %s AND YEAR(date) = %s",$month,date('Y')),ARRAY_N)[0][0];
	return $income;
}

// calculate income for each month
function getLastMonthIncome($month,$year,$wpdb){
	$income =$wpdb->get_results($wpdb->prepare("SELECT sum(bill_amount) FROM entry WHERE MONTH(date) = %s AND YEAR(date) = %s",$month,$year),ARRAY_N)[0][0];
	return $income;
}

// send message function
function send_message($phone_number,$message){
    $url = 'http://greefitech.siegsms.in/PostSms.aspx';
    $fields_string ="";
    $fields = array( 'userid' =>urlencode('greefitech'), 'pass'=>urlencode('madhuMitha123.'), 'phone'=>urlencode($phone_number), 'msg'=>urlencode($message));
    //url-ify
    foreach($fields as $key=>$value){
        $fields_string .= $key.'='.$value.'&'; rtrim($fields_string,'&');
    }
    rtrim($fields_string,'&');
    $url_final = $url.'?'.$fields_string;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url_final);
    // curl_setopt($ch,CURLOPT_POST,count($fields));
    // curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
    $result = curl_exec($ch);
    curl_close($ch);
}