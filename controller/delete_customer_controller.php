<?php  
  include_once '../model/index.php';
$id=$_GET['id'];
$where = array('id'=>$id);
$delete = $wpdb->delete('customer',$where);
if($delete){
	header("location:../view/customers.php?status=deleted&slug=Customer");

}else{
	header("location:../view/customers.php?status=deleted&slug=Customer");
}

 ?>
  <!-- Delete Customer -->
<!-- <div class="modal fade" id="delete_model" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Are You Sure ! You Want to Delete Customer </h4>
      </div>
      <div class="modal-body">	
          <form action="#">
            <button type="submit" id="delete_customer" class="btn btn-danger" data-dismiss="modal">Delete </button>
            <button type="button" style="float: right;" class="btn btn-default" data-dismiss="modal">Close</button>
          </form>
      </div>
    </div>
  </div>
</div>   -->