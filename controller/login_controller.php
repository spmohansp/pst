<?php
echo "<pre>";
include_once '../model/index.php';
	session_start();
	$login_pin = $wpdb->get_results("SELECT * FROM login_pin",ARRAY_A)[0];
	// $login_pin['login_pin']='1';
	$phone_number=$_REQUEST['phone_no'];
	if($phone_number==$login_pin['login_pin']){
		$_SESSION["user_details"]['username'] = $login_pin['username'];
        $_SESSION["user_details"]['phone_no'] = $login_pin['phone_no'];
        $_SESSION["user_details"]['company_name'] = $login_pin['company_name'];
        echo "success";
	}else{
		echo "error";
	}
