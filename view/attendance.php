<?php include_once 'header.php'; 
  include_once '../model/index.php';
  include_once '../controller/common_function.php';
$vehicles_list = $wpdb->get_results("SELECT * FROM vehicles",ARRAY_A);
$driver_list = $wpdb->get_results("SELECT * FROM drivers order by driver_name",ARRAY_A);

$date= date('Y-m-d');
$attendance_detail = $wpdb->get_results("SELECT date FROM attendance where date='$date'",ARRAY_A);

	$attendance_details = $wpdb->get_results("SELECT * FROM attendance ORDER BY date DESC",ARRAY_A);

?>

<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-info">
			<div class="box box-info">
				<div class="box-header">
					<h4>
						<center>Attendance For <?php echo date("d-m-y", strtotime(date("Y/m/d")));?></center>
					</h4>
					<a href="add_attendance.php" type="button" class="btn btn-primary pull-right btn-sm">Add Attendance</a>

					<?php if (!$attendance_detail) {?>
						
					<form class="form-horizontal" method="post" action="../controller/add_attendance.php">
					 <div class="box-body">
			            <div class="table-responsive">
			              <table  class="table table-bordered table-striped">
			                <thead>
			                  <tr>
			                    <th>Vehicle No</th>
			                    <th>Driver Name</th>
			                    <th>Attendance</th>
			                  </tr>
			                </thead>
			                <tbody>
		                	<?php foreach ($driver_list as $key => $value) {?>
		                		<tr>
		                			<td>
		                				<p><?php echo get_vehicle_number($value['vehicle_id'],$wpdb)['vehicle_name'] ?></p>
		                			</td>
		                			<td>
			               				<p><?php echo $value['driver_name'] ?></p>
		                			</td>
		                			<td>
		                				<input type="checkbox" class="form-check-input" name="staff_id[]" value="<?php echo $value['id'] ?>">
		                			</td>
		                		</tr>
			                <?php }?>
			                </tbody>
			              </table>
			            </div>
			          </div>
					<div class="box-footer col-sm-7">
						<button type="submit" class="btn btn-info pull-right">Add Attendance</button>
					</div>
			    </form>
					<?php } ?>
		
				</div>
			        <?php if(!empty($attendance_details)){ ?>
			          <div class="box-body">
			            <div class="table-responsive">
			              <table  class="table table-bordered table-striped" id="view_table_detail">
			                <thead>
			                  <tr>
			                    <th>Date</th>
			                    <th>Action</th>
			                  </tr>
			                </thead>
			                <tbody>
			                	<?php foreach ($attendance_details as $key => $value) {?>
					                 <tr>
					                 	<td><?php echo date('d-m-Y',strtotime($value['date'])) ?></td>
					                 	<td><a href="edit_attendance.php?id=<?php echo $value['id'] ?>" class="btn btn-primary">Edit</a></td>
					                 </tr>
			                	<?php }?>
			                </tbody>
			              </table>
			            </div>
			          </div>
			      <?php }else{
			          echo "<blockquote><p>No Attendance Detail till now added!!</p></blockquote>";
			      } ?>
			</div>
		</div>
	</div>
</div>

<?php include_once 'footer.php'; ?>