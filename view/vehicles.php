<?php 
	include_once 'header.php';
    include_once '../model/index.php'; 
    $vehicles = $wpdb->get_results("SELECT * FROM vehicles",ARRAY_A);
  

 ?>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-info">
      		<div class="box box-info">
        		<div class="box-header">
	        	<h4>
	          	 <center>Vehicles List</center>
	        	</h4>
                <a href="add_vehicles.php" class="btn btn-info pull-right add-vehicle">Add</a>
			    </div>
	            <div class="box-body">
		            <div class="table-responsive">
		             	<table  class="table table-bordered table-striped view_entry_table"  id="view_table_detail">
		                <thead>
			                <tr>
			                   <th>Vehicle Name</th>
			                   <th>Vehicle Number</th>
			                   <th>Model Number</th>
			                   <th>Insurance-Renewal</th>
			                   <th>FC-Renewal</th>
			                   <th>Tax-Renewal</th>
			                   <th>Rc-Renewal</th>
			                   <th>Action</th>
			                </tr>
		                </thead>
		                <body>
		                	<?php foreach ($vehicles as $key => $vehicle) {	?>
					<tr>
						<td><?php echo $vehicle['vehicle_name'] ?></td>
						<td><?php echo $vehicle['vehicle_number'] ?></td>
						<td><?php echo $vehicle['model_number'] ?></td>
						<td><?php 								
							$datestr=$vehicle['insurance'];//insurance date
							$date=strtotime($datestr);//Converted to a PHP date (a second count)
							$diff=$date-time();//time returns current time in seconds
							$days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
							if ($days>$vehicle['remain_date']) {
								echo "$days Days Remaining<br />";
							}
							else{
								echo "<p style='color: #f44242'>$days Days Overdue<br /></p>";
							}?>
						</td>
						<td><?php
							$datestr=$vehicle['fc_renewal'];//insurance date
							$date=strtotime($datestr);//Converted to a PHP date (a second count)
							$diff=$date-time();//time returns current time in seconds
							$days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
							if ($days>$vehicle['remain_date']) {
								echo "$days Days Remaining<br />";
							}
							else{
								echo "<p style='color: #f44242'>$days Days Overdue<br /></p>";
							}?>  
						</td>
						<td><?php
							$datestr=$vehicle['tax_date'];//insurance date
							$date=strtotime($datestr);//Converted to a PHP date (a second count)
							$diff=$date-time();//time returns current time in seconds
							$days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
							if ($days>$vehicle['remain_date']) {
								echo "$days Days Remaining<br />";
							}
							else{
								echo "<p style='color: #f44242'>$days Days Overdue<br /></p>";
							}?>  
						</td>
						<td><?php
							$datestr=$vehicle['rc_date'];//insurance date
							$date=strtotime($datestr);//Converted to a PHP date (a second count)
							$diff=$date-time();//time returns current time in seconds
							$days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
							if ($days>$vehicle['remain_date']) {
								echo "$days Days Remaining<br />";
							}
							else{
								echo "<p style='color: #f44242'>$days Days Overdue<br /></p>";
							}?>  
						</td>
						<td>
							<a href="edit_vehicles.php?id=<?php echo $vehicle['id']?>"><button type="button" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i> Edit</button>
							 <a href="../controller/delete_vehicle_controller.php?id=<?php echo $vehicle['id'] ?>"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> 
						</td>
					</tr>	
					<?php }?>
		               	</table>
		            </div>
	            </div>
  			</div>
    	</div>
	</div>
      
<?php include_once 'footer.php'; ?>