<?php 
	include_once 'header.php';
	include_once '../model/index.php';
	$vehicle_number = get_vehicle_details($wpdb);
	
 ?>
<div class="row">
   <!-- <div class="col-xs-12"> -->
    	<div class="panel panel-info">
      		<div class="box box-info">
        		<div class="box-header">
				<center><h4 >Add Pricing to vehicle</h4></center>
					<div class="box-body">
					   <div class="form-group">
					        <label>Vehicle Number</label>
					        <select class="form-control" required="" name="vehicle_id" id="vehicle_id">
					        	<option value="">Select Vehicle</option>
					        	<?php foreach ($vehicle_number as $key => $value) {
					        		echo "<option value='".$value['id']."'>".$value['vehicle_name']."</option>";
					        	} ?>
					        </select>
						</div>
						<div id="table"></div>
					</div>
            	</div>
			</div>
    	<!-- </div> -->
	</div>
</div>
<?php 
	function get_vehicle_details($wpdb){
		return $vehicle_detail = $wpdb->get_results("SELECT * FROM vehicles",ARRAY_A);
	}
 ?>
<?php	include_once 'footer.php';?>