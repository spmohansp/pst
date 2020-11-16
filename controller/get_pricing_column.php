<?php 
error_reporting(0);
$vechicle_id  = $_POST['id'];

include_once '../model/index.php';
$check_column_name = "Select column_Name From INFORMATION_SCHEMA.COLUMNS WHERE table_schema = DATABASE() AND Table_Name = 'pricing_master'";
$column_name = $wpdb->get_results($check_column_name,ARRAY_A);
// echo $wpdb->last_query;
$check_price_amount = $wpdb->get_results("SELECT * FROM pricing_master WHERE vechicle_id=$vechicle_id",ARRAY_A)[0];

unset($column_name[0],$column_name[1],$column_name[2],$column_name[3]);

if ($check_price_amount['id']) { ?>
<form action="../controller/update_vechicle_price.php" method="post">
	<input type="hidden" name="vechicle_id" value="<?php echo $vechicle_id ?>">
	<div class='table-responsive'>
		<table class='table'>
			<thead>
				<tr>
					<th>Hours/Kilometer</th>
					<th>Amount (₹)</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				echo "<tr>
					<td>Additional Rate/hour</td>
					<td><input type='number' name='additional_rate' value='".$check_price_amount['additional_rate']."'></td>
	   			</tr>
	   			<tr>
					<td>Additional Rate/KM</td>
					<td><input type='number' step='0.01' min='0' name='additional_rate_km' value='".$check_price_amount['additional_rate_km']."'></td>
	   			</tr>";

				foreach ($column_name as $key => $value) {
				// echo $value['column_Name'];
				echo "<tr>
				<td>". $value['column_Name']."</td>
				<td><input type='number' maxlength='7' name='". $value['column_Name']."' value='".$check_price_amount[$value['column_Name']]."'></td>

				</tr>";
				} 


	   			?>
			</tbody>
		</table>
	</div>
<input type="submit" value="Update" class="btn btn-primary" >
</form>

<?php 
}else if($_POST['id']) { ?>
<form action="../controller/add_vechicle_price_controller.php" method="post">
	<input type="hidden" name="vechicle_id" value="<?php echo $vechicle_id ?>">
	<div class='table-responsive'>
	<table class='table'>
		<thead>
			<tr>
		        <th>Hours/Kilometer</th>
		        <th>Amount (₹)</th>
			</tr>
		</thead>
	   <tbody>
	   		<?php 
	   		echo "<tr>
   					<td>Additional Rate/hour</td>
   					<td><input type='number' name='additional_rate'></td>
	   			</tr>
	   			<tr>
   					<td>Additional Rate/KM</td>
   					<td><input type='number' step='0.01' min='0' name='additional_rate_km'></td>
	   			</tr>";


	   		foreach ($column_name as $key => $value) {
	   			// echo $value['column_Name'];
	   			echo "<tr>
   					<td>". $value['column_Name']."</td>
   					<td><input type='number' name='". $value['column_Name']."'></td>
	   			</tr>";
	   		} 

	   		?>
	   </tbody>
	</table>
</div>
	   		<input type="submit" value="Add Vechicle Price " class="btn btn-primary">
</form>
	
<?php } ?>


