<?php 
include_once '../model/index.php';
include_once '../controller/common_function.php';

	if ($_POST['save']) {
	$data = array('date'=>$_POST['date'],'customer_id'=>$_POST['customer_id'],'vehicle_id'=>$_POST['vehicle_id'],'driver_id'=>$_POST['driver_id'],'starting_location'=>$_POST['starting_location'],'destination_location'=>$_POST['destination_location'],'starting_km'=>$_POST['starting_km'],'ending_km'=>$_POST['ending_km'],'total_km'=>$_POST['total_km'],'starting_time'=>$_POST['starting_time'],'ending_time'=>$_POST['ending_time'],'total_time'=>$_POST['total_time'],'type'=>$_POST['type'],'extra_amount'=>$_POST['extra_amount'],'bill_amount'=>$_POST['bill_amount'],'status'=>'1');
		if($wpdb->insert('entry',$data)){
			header("location:../view/entry.php?status=inserted&slug=Entry");
		}else{
			header("location:../view/entry.php?status=error");
		}
	}elseif ($_POST['submit']) {
	 $data = array('date'=>$_POST['date'],'customer_id'=>$_POST['customer_id'],'vehicle_id'=>$_POST['vehicle_id'],'driver_id'=>$_POST['driver_id'],'starting_location'=>$_POST['starting_location'],'destination_location'=>$_POST['destination_location'],'starting_km'=>$_POST['starting_km'],'ending_km'=>$_POST['ending_km'],'total_km'=>$_POST['total_km'],'starting_time'=>$_POST['starting_time'],'ending_time'=>$_POST['ending_time'],'total_time'=>$_POST['total_time'],'type'=>$_POST['type'],'extra_amount'=>$_POST['extra_amount'],'bill_amount'=>$_POST['bill_amount'],'status'=>'0');
		if($wpdb->insert('entry',$data)){
			$customer_phone_number= unserialize(get_customers($_POST['customer_id'],$wpdb)['phone_number'])[0];
			$driver_phone_number= get_drivers($_POST['driver_id'],$wpdb)['phone_number'];
			
			$customer_message='Bill Amount-'.$_POST['bill_amount'].' Have A Nice Day-pst';
			$driver_message='Bill Amount For '.get_customers($_POST['customer_id'],$wpdb)['customer_name'].' is '.$_POST['bill_amount'];

			// send_message($customer_phone_number,$customer_message);
			// send_message($driver_phone_number,$driver_message);



			header("location:../view/view_entry.php?status=inserted&slug=Entry");

			// send message code 
		}else{
			header("location:../view/entry.php?status=error");
		}

	}else{
		header("location:../view/entry.php?status=error");
	}

 ?>