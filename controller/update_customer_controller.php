 <?php 
 include_once '../model/index.php';
$phone_number = serialize($_POST['phone_number']);
$customer_data=array('customer_name'=>$_POST['customer_name'],'phone_number'=>$phone_number);
$where = array('id'=>$_GET['id']);
$update = $wpdb->update('customer',$customer_data,$where);
if ($update) {
	header("location:../view/customers.php?status=updated&slug=Customer");
}else{
	header("location:../view/customers.php?status=updated&slug=Customer");
}
?>

 