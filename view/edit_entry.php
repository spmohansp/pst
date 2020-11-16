<?php include_once 'header.php';
include_once '../model/index.php';
include_once '../controller/common_function.php';
$customers = $wpdb->get_results("SELECT * FROM customer ORDER BY customer_name",ARRAY_A);
$vehicles = $wpdb->get_results("SELECT * FROM vehicles",ARRAY_A);
$drivers = $wpdb->get_results("SELECT * FROM drivers ORDER BY driver_name",ARRAY_A);
$id = $_GET['id'];
$entry_detail = $wpdb->get_results("SELECT * FROM entry WHERE id = $id",ARRAY_A)[0];
// print_r($entry_detail);
?>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header">
				<h4>
					<center>Entry</center>
				</h4>

<!-- ===========
Entry Form start
================= -->
<form class="form-horizontal" method="post" action="../controller/update_entry_controller.php">
	<div class="box-body">
		<div class="form-group">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<input type="hidden" value="<?php echo $entry_detail['id'] ?>" name="id">
				<label>Date:</label> 
				<input type="date" class="form-control" max="<?php echo date('Y-m-d'); ?>" value="<?php echo $entry_detail['date'] ?>" placeholder="Date" name="date" required>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<label>Customers:</label>
				<select class="form-control" name="customer_id" required>
				<option value="">Select Customer</option>
				<?php foreach ($customers as $key => $customer) { 
					echo '<option value="'.$customer['id'].'"';
					if ($entry_detail['customer_id']==$customer['id']) {
							echo 'selected';
					}	
					echo '>'.$customer['customer_name'].'</option>';
				 } ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<label>Vehicle Number:</label>
				<select name="vehicle_id" class="form-control" id="vehicles" required>
				<option value="">Select Vehicle</option>
				<?php foreach ($vehicles as $key => $vehicle) { 
					echo '<option value="'.$vehicle['id'].'"';
					if ($entry_detail['vehicle_id']==$vehicle['id']) {
						echo 'selected';
					}
					echo '>'.$vehicle['vehicle_name'].'</option>';
				} ?>  
				</select>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<label>Driver Name:</label>
				<select name="driver_id" class="form-control" id="driver" required>
				<option value="">Select Driver</option>
				<?php foreach ($drivers as $key => $driver) { 
					echo '<option value="'.$driver['id'].'"';
					if ($entry_detail['driver_id']==$driver['id']) {
							echo 'selected';
					}

					echo '>'.$driver['driver_name'].'</option>';
				 } ?>  
				</select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<label> Starting Location:</label>
				<input type="text" class="form-control location_search" value="<?php echo $entry_detail['starting_location'] ?>" placeholder="Starting Location" name="starting_location" required>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<label> Destination Location:</label>
				<input type="text" id="destination_location" class="form-control location_search" value="<?php echo $entry_detail['destination_location'] ?>" placeholder="Destination Location" name="destination_location">
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-4 col-sm-3 col-xs-12">
				<label>Starting KM:</label>
				<input type="number" min="0" value="<?php echo $entry_detail['starting_km'] ?>" class="form-control calculate_value" id="starting_km" placeholder="Starting KM" name="starting_km" required>
			</div>

			<div class="col-md-4 col-sm-3 col-xs-12">
				<label>Ending KM:</label>
				<input type="number" id="ending_km" value="<?php echo $entry_detail['ending_km'] ?>" min="0" class="form-control calculate_value" placeholder="Ending KM" name="ending_km">
			</div>
			<div class="col-md-4 col-sm-3 col-xs-12">
				<label>Total KM:</label>
				<input type="number" min="0" value="<?php echo $entry_detail['total_km'] ?>" class="form-control calculate_value" id="total_km" placeholder="Total KM" name="total_km" readonly required>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4 col-sm-3 col-xs-12">
				<label>Starting Time:</label>
				<input type="datetime-local" value="<?php echo $entry_detail['starting_time'] ?>" class="form-control calculate_value" placeholder="Starting Time" name="starting_time" required>
			</div>
			<div class="col-md-4 col-sm-3 col-xs-12">
				<label>Ending Time:</label>
				<input type="datetime-local" id="ending_time" value="<?php echo $entry_detail['ending_time'] ?>" class="form-control calculate_value" placeholder="Ending Time" name="ending_time" required>
			</div>
			<div class="col-md-4 col-sm-3 col-xs-12">
				<label>Total Time:</label>
				<input type="text" id="total_time" value="<?php echo $entry_detail['total_time'] ?>" class="form-control calculate_value" placeholder="Total Time" name="total_time" readonly>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4 col-sm-3 col-xs-12">
				<label>Type:</label>
				<select class="form-control calculate_value" required name="type" id="type">
					<option value="">Select Type</option>
					<option value="ac"
					<?php if ($entry_detail['type']=='ac') {
						echo 'selected';
					} ?>
					>AC</option>
					<option value="non_ac"
					<?php if ($entry_detail['type']=='non_ac') {
						echo 'selected';
					} ?>
					>Non AC</option>
				</select>
			</div>
			<div class="col-md-4 col-sm-3 col-xs-12">
				<label>Extra Amount</label>
				<input type="number" id="extra_amount" value="<?php echo $entry_detail['extra_amount'] ?>"  class="form-control calculate_value" placeholder="Extra Time" name="extra_amount" >
			</div>
			<div class="col-md-4 col-sm-3 col-xs-12">
				<label>Bill Amount: (₹)</label>
				<input type="number" id="bill_amount" value="<?php echo $entry_detail['bill_amount'] ?>" class="form-control calculate_value" placeholder="Bill Amount" name="bill_amount" readonly>
			</div>
		</div>
		<div class="box-footer" align="center">
			<input type="submit" class="btn btn-info save" name="save" value="save">
			<input type="submit" class="btn btn-info submit" name="submit" value="submit">
			<!-- <input type="reset" class="btn btn-info" value="clear"> -->
		</div>
	</div>
</form>		
<!--========
	Entry Form End
===========  -->

			</div>
		</div>
	</div>
</div>

 <?php include_once 'footer.php'; ?>
<script type="text/javascript">
$(document).ready(function() {
	var dataSrc = [<?php echo get_location($wpdb); ?>];
    $(".location_search").autocomplete({
        source:dataSrc
    });
});
</script>