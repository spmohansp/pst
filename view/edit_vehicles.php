<?php 
  include_once 'header.php';
  include_once '../model/index.php';
  $id=$_GET['id'];
  $vehicles_list = $wpdb->get_results("SELECT * FROM vehicles where id='$id' ",ARRAY_A);
  ?>
     <div class="row">
    <div class="col-xs-12">
        <div class="panel panel-info">
           <div class="box box-info">
               <div class="box-header">
               	<h4>Edit Vehicle<h4>
				<form class="form-horizontal"  method="post" action="../controller/update_vehicle_controller.php?id=<?php echo $vehicles_list[0]['id']?>"">
					<div class="box-body">
						<div class="form-group ">
								<label for="inputEmail3" class="col-sm-2 control-label">Vehicle Name</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="inputEmail3" placeholder="Vehicle Name" name="vehicle_name" value="<?php echo $vehicles_list[0]['vehicle_name']?>" required>
							</div>
						</div>
						<div class="form-group ">
								<label for="inputEmail3" class="col-sm-2 control-label">Vehicle Number</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="inputEmail3" placeholder="Vehicle Number" name="vehicle_number" value="<?php echo $vehicles_list[0]['vehicle_number']?>" required>
							</div>
						</div>   
						<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Model Number</label>  
							<div class="col-sm-5">
								<input type="text" class="form-control" id="inputEmail3" placeholder="Model Number" name="model_number" value="<?php echo $vehicles_list[0]['model_number']?>" required>
							</div>
						</div>   

						<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Insurance-Date</label>  
							<div class="col-sm-5">
								<input type="date" class="form-control" id="inputEmail3" placeholder="Insuarance" name="insurance" value="<?php echo $vehicles_list[0]['insurance']?>">
							</div>
						</div> 
						<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">FC-Renewal</label>  
							<div class="col-sm-5">
								<input type="date" class="form-control" id="inputEmail3" placeholder="FC" name="fc_renewal" value="<?php echo $vehicles_list[0]['fc_renewal']?>">
							</div>
						</div> 
						<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Tax Renewal</label>  
							<div class="col-sm-5">
								<input type="date" class="form-control" id="inputEmail3" placeholder="tax" name="tax_date" value="<?php echo $vehicles_list[0]['tax_date']?>">
							</div>
						</div>
						<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Rc Renewal</label>  
							<div class="col-sm-5">
								<input type="date" class="form-control" id="inputEmail3" placeholder="Remain Renewal Date" name="rc_date" value="<?php echo $vehicles_list[0]['rc_date']?>">
							</div>
						</div>  
						<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Remain Before Day</label>  
							<div class="col-sm-5">
								<input type="number" class="form-control" id="inputEmail3" placeholder="Remain Renewal Date" name="remain_date" value="<?php echo $vehicles_list[0]['remain_date']?>">
							</div>
						</div> 
					</div>
					<div class="box-footer col-sm-7">
						<button type="submit" id="add_new_vehicle"  class="btn btn-info pull-right">Update Vehicle</button>
					</div>
				</form>
			    </div>
		    </div>
		</div>
	</div>
</div>


<?php include_once 'footer.php'; ?>
