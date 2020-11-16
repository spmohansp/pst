<?php include_once 'header.php'; 
include_once '../model/index.php';
$vehicles_list = $wpdb->get_results("SELECT * FROM vehicles");
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h4>
                    <center>Vehicle Report</center>
                </h4>
			        <?php if(!empty($vehicles_list)){ ?>
			          <div class="box-body">
			            <div class="table-responsive">
			              <table  class="table table-bordered table-striped" id="staff_detail_table">
			                <thead>
			                  <tr>
			                    <th>Vehicle Name</th>
			                  </tr>
			                </thead>
			                <tbody>
			                  <?php 
			                  foreach ($vehicles_list as $key => $value) {
			                      echo "<tr>
			                            <td><a href='vehicle_wise_report.php?id=$value->id'>$value->vehicle_name</a></td>
			                            </td>
			                      </tr>";
			                  }?>
			                </tbody>
			              </table>
			            </div>
			          </div>
			      <?php }else{
			      		echo '<blockquote><p>No Vehicle Report till now!!</p></blockquote>';
			       } ?>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>