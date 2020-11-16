<?php
	if (!empty($_POST)) {
		include_once '../model/index.php';

		foreach($_POST['phone_number'] as $Phone){
			$customer_list = $wpdb->get_results("SELECT * FROM customer WHERE phone_number LIKE '%$Phone%'",ARRAY_A);
			if(!empty($customer_list)) {
				header("location:../view/customers.php?status=error&slug=Customer");
				exit();
			}
		}
		$phone_number = serialize($_POST['phone_number']);
		$customer_data=array('customer_name'=>$_POST['customer_name'],'phone_number'=>$phone_number);
		if($wpdb->insert('customer',$customer_data)){
			header("location:../view/customers.php?status=inserted&slug=Customer");
		}else{
			header("location:../view/customers.php?status=inserted&slug=Customer");
		}
	}else{
		header("location:../view/customers.php?status=inserted&slug=Customer");
	}
?>

