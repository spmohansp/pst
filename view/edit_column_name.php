<?php 
include_once '../model/index.php';
include_once 'header.php';
$column_name = $_GET['column_name'];
$value = explode('|',$column_name);
 ?>

 <!-- View Customer Details Model -->
<div class="row">
   <div class="col-xs-12 ">
    	<div class="panel panel-info">
      		<div class="box box-info">
        		<div class="box-header">
				<h4 >Edit Master Pricing</h4>
	        	<form class="form-horizontal" method="post" action="../controller/update_column_controller.php?old_column_value=<?php echo $column_name;?>">
					<div class="box-body">
					   <div class="form-group">
					        <label>Hours</label>
					        <input type="text" class="form-control"  placeholder="Hours" value="<?php echo $value['0']; ?>" maxlength="4" name="hours" pattern="\d*"  required>
						</div>
						<div class="form-group">
						    <label>Kilo Meter</label>
						    <input type="text" value="<?php echo $value['1']; ?>" pattern="\d*"  class="form-control phone_no" placeholder="Customer Phone Number" name="kilo_meter" maxlength="4" required="">
						</div> 
					</div>
					
					<div class="box-footer">
						<button type="submit" class="btn btn-info pull-right">Update  Master Pricing</button>
					</div>
			    </form>
            	</div>
			</div>
    	</div>
	</div>
</div> 

 <?php include_once 'footer.php'; ?>

 <?php include_once 'footer.php'; ?>