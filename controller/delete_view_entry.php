<?php  
 include_once '../model/index.php';
if($wpdb->delete('entry',array('id'=>$_GET['id']))){
	header("location:../view/view_entry.php");
}else{
	header("location:../view/view_entry.php");
}