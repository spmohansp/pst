<?php include_once 'header.php'; 
  include_once '../model/index.php';
  include_once '../controller/common_function.php';
$vehicles_list = $wpdb->get_results("SELECT * FROM vehicles",ARRAY_A);
$driver_list = $wpdb->get_results("SELECT * FROM drivers order by driver_name",ARRAY_A);
$id=$_GET['id'];
$attendance_detail = $wpdb->get_results("SELECT * FROM attendance where id=$id",ARRAY_A)[0];
// echo "<pre>";
// print_r($attendance_detail);
?>

<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-info">
			<div class="box box-info">
				<div class="box-header">
					<h4>
						<center>Attendance For <?php echo $attendance_detail['date'];?></center>
					</h4>
					<form class="form-horizontal" method="post" action="../controller/update_attendance.php?id=<?php echo $attendance_detail['id'] ?>">
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
		                				<input type="checkbox" class="form-check-input" name="staff_id[]" value="<?php echo $value['id'] ?>"
                					<?php 
		                				$driver_id=explode(',',$attendance_detail['driver_id']);
		                				foreach ($driver_id as $key => $id) {
		                					if ($id===$value['id']) {
		                						echo 'checked';
		                					}
		                				}?>
		                				>
		                			</td>
		                		</tr>
			                <?php }?>
			                </tbody>
			              </table>
			            </div>
			          </div>
					<div class="box-footer col-sm-7">
						<button type="submit" class="btn btn-info pull-right">Update Attendance</button>
					</div>
			    </form>
		
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once 'footer.php'; ?>