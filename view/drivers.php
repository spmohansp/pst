<?php 
	include_once 'header.php';
    include_once '../model/index.php'; 
    include_once '../controller/common_function.php';
    $drivers = $wpdb->get_results("SELECT * FROM drivers",ARRAY_A);
?>

<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-info">
      		<div class="box box-info">
        		<div class="box-header">
		        	<h4>
		          	 <center>Drivers List</center>
		        	</h4>
                	<a href="add_drivers.php" class="btn btn-info pull-right add-vehicle">Add</a>
			    </div>
	            <div class="box-body">
		            <div class="table-responsive">
		             	<table  class="table table-bordered table-striped view_entry_table"  id="view_table_detail">
			                <thead>
				                <tr>
				                   <th>Driver Name</th>
				                   <th>Phone Number</th>
				                   <th>Vehicle Number</th>
				                   <th>Action</th>
				                </tr>
			                </thead>
			                <body>
			                	<?php
			                	foreach ($drivers as $key => $driver) {?>
			                	<tr>
			                		<td><?php echo $driver['driver_name']?></td>
			                		<td><?php echo $driver['phone_number']?></td>
			                		<td><?php echo get_vehicle_number($driver['vehicle_id'],$wpdb)['vehicle_name'] ?></td>
			                		<td>
			                			<a href="edit_drivers.php?id=<?php echo $driver['id']?>"><button type="button" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i> Edit</button></a>
			                			<a href="../controller/delete_driver_controller.php?id=<?php echo $driver['id']?>"><button class="btn btn-danger  btn-sm"><i class="fa fa-trash"></i> Delete</button></a>
			                		</td>
			                	</tr>	
			                	<?php } ?>
			                </body>
			            </table>
			        </div>
			    </div>
			</div>
		</div>
	</div>
</div>

<?php include_once 'footer.php'; ?>

