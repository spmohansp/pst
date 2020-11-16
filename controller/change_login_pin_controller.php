<?php 
echo "<pre>";
if (!empty($_POST['old_pin'] && $_POST['new_pin'])) {
	include_once '../model/index.php';
	$login_pin = $wpdb->get_results("SELECT * FROM login_pin",ARRAY_N)[0];
	if ($login_pin[1]==$_POST['old_pin']) {
		$data=array('login_pin'=>$_POST['new_pin']);
		$where = array('id'=>'1');
		if($update = $wpdb->update('login_pin',$data,$where)){
		  header("location:../view/login_pin.php?status=updated&slug=Login Pin");
		}else {
			header("location:../view/login_pin.php?status=error&slug=Login Pin");
		}
	}else{
		header("location:../view/login_pin.php?status=error&slug=Login Pin");
	}
}else{
	header("location:../view/login_pin.php?status=error&slug=Login Pin");
}


 ?>