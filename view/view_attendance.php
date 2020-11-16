<?php include_once 'header.php'; 
  include_once '../model/index.php';
	$driver_detail = $wpdb->get_results("SELECT * FROM drivers ORDER BY driver_name",ARRAY_A);


?>


<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-info">
			<div class="box box-info">
				<div class="box-header">
					<h4>
						<center>View Attendance</center>
					</h4>
				<form class="form-horizontal" method="get">
					<div class="box-body">
					   <div class="form-group">
						   	<div class="col-sm-3">
						        <label>Name</label>
						        <select class="form-control" name="driver">
						        	<option value="">Select</option>
						        	<?php 
						        	foreach ($driver_detail as $key => $value) {
						        		echo '<option value="'.$value['id'].'">'.$value['driver_name'].'</option>';
						        	}?>
						        </select>
						    </div>
							<div class="col-sm-4">
								<button type="submit" class="btn btn-info">View Attendance</button>
							</div>
						</div>
					</div>
			    </form>

				<?php 
					if (isset($_GET['driver'])) {
						// echo "<pre>";
					$id=$_GET['driver'];
					$attendance_list_details = $wpdb->get_results("SELECT * FROM attendance where driver_id like '%$id%' order by date DESC",ARRAY_A);
					// print_r($attendance_list_details);
					 if(!empty($attendance_list_details)){ ?>
				          <div class="box-body">
				            <div class="table-responsive">
				              <table  class="table table-bordered table-striped" id="view_table_detail">
				                <thead>
				                  <tr>
				                    <th>Date Present</th>
				                  </tr>
				                </thead>
				                <tbody>
			                	<?php foreach ($attendance_list_details as $key => $value) {
				                		$driver_present=explode(',', $value['driver_id']);
				                		foreach ($driver_present as $key => $ids) {
				                			if ($id==$ids) {
				                				echo '<tr><td>'.date('d-m-Y',strtotime($value['date'])).'</td></tr>';
				                			}
				                		}
				                	}?>
				                </tbody>
				              </table>
				            </div>
				          </div>
					  <?php }else{
					      		echo "<blockquote><p>No Attendance Detail!!</p></blockquote>";
					  		} 
					}
				 ?>

				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once 'footer.php'; ?>
