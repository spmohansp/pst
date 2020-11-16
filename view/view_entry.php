<?php 
	include_once 'header.php';
	include_once '../controller/common_function.php';
	include_once '../model/index.php';
 ?>

<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-info">
      		<div class="box box-info">
	        	<h4>
	          	 <center>View Entry List</center>
	        	</h4>
				<?php
			    	$entry_detail = $wpdb->get_results("SELECT * FROM entry WHERE status = '0' order by date desc",ARRAY_A);
			        if(!empty($entry_detail)){ ?>
			          <div class="box-body">
			            <div class="table-responsive">
			              <table  class="table table-bordered table-striped view_entry_table1">
			                <thead>
			                  <tr>
			                  	<th>Date</th>
			                    <th>Customers</th>
			                    <th>Vehicle No</th>
			                    <th>Bill Amount: (₹)</th>
			                    <th>Delete</th>
			                  </tr>
			                </thead>
			                <tbody>
			                	<?php 
			                    foreach ($entry_detail as $key => $value) { 
				              	echo '<tr>
				              		  <td>'.date('d-m-Y',strtotime($value['date'])).'</td>
				                      <td>'.get_customers($value['customer_id'],$wpdb)['customer_name'].'</td>
				                      <td>'.get_vehicle_number($value['vehicle_id'],$wpdb)['vehicle_name'].'</td>
				                      <td>'.number_format($value['bill_amount']).'</td>
				                      <td><a href="../controller/delete_view_entry.php?id='.$value['id'].'"><button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button></a></td>
			                    	</tr>';
				               	} ?>
			                </tbody>
			              </table>
			            </div>
			          </div>
			      <?php }else{
			          echo "<blockquote><p>No Entry till now added!!</p></blockquote>";
			      } ?>
		    </div>
		</div>
	</div>
</div>
 <?php include_once 'footer.php'; ?>


 <script type="text/javascript">
	$(".view_entry_table1").DataTable({
	   "order":[],
      dom: 'lBfrtip',
        lengthMenu: [ [10, 20, 50, -1], [10, 20, 50, "All"] ],
         pageLength: 10,
         responsive: false,
        columnDefs: [{ type: 'date-dd-mmm-yyyy', targets: 0 }],
         buttons: [
           {
              extend: 'excelHtml5',
              filename: '<?php echo date("Y/m/d")." Report"?>',
              title:'<?php echo "Entry Report"?>',
              footer: true
          },
          {
              extend: 'pdfHtml5',
              filename: '<?php echo date("Y/m/d")." Report"?>',
              title: '<?php echo "Entry Report"?>',
            footer: true, customize: function (doc) {
           
                doc['footer']=(function(page, pages) {
                    return {
                        columns: [
                            '© Greefi Technology,Salem',
                            {
                                alignment: 'right',
                                text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                            }
                        ],
                        margin: [10, 0]
                    }
                });
                
            }
              },
              {
                  extend: 'print',
                  title: '<?php echo "Entry Report"?>',
                  footer: true,
              }
        ]
	});
	 $('.dt-buttons a').addClass('btn btn-info btn-sm');
</script>