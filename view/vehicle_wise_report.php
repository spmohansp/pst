<?php include_once 'header.php'; 
include_once '../model/index.php';
include_once '../controller/common_function.php';
$id = $_GET['id'];
$entry_list = $wpdb->get_results("SELECT * FROM entry where vehicle_id = $id && status = '0'",ARRAY_A);
?>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header">
	            <h4>
	                <center>Vehicle Wise Report</center>
	            </h4>
		        <?php if(!empty($entry_list)){ ?>
				<div class="box-body">
		            <div class="table-responsive">
	          	    <div class="col-md-3">
	                    <input type="text" id="min" placeholder="From" class="form-control" style="width:242px">
	                    </div>
	                    <div class="col-md-3">
	                    <input type="text"  id="max" placeholder="To" class="form-control" style="width:242px">
	                    </div>
	                    <div class="col-md-3">
	                    <input type="button" value="search" id="test" class="btn btn-primary">
	                </div> <br /><br />

		              <table  class="table table-bordered table-striped view_data_table">
		                <thead>
		                  <tr>
		                    <th>Date</th>
                        <th>From</th>
                        <th>To</th>
		                    <th>Bill Amount: (₹)</th>
		                  </tr>
		                </thead>
		                <tfoot>
		                    <tr>
		                        <th colspan="2" style="text-align:right">Total:</th>
		                        <th></th>
                            <th></th>
		                    </tr>
		                </tfoot>
		                <tbody>
		                <?php 
		                  foreach ($entry_list as $key => $value) {
		                  	echo '<tr>
	                  				<td>'.date('d-m-Y',strtotime($value['date'])).'</td>
                            <td>'.$value['starting_location'].'</td>
                            <td>'.$value['destination_location'].'</td>
	                  				<td>'.$value['bill_amount'].'</td>
		                  		</tr>';
		                  }?> 
		                </tbody>
		              </table>
		            </div>
		          </div>
				<?php }else{
				    echo "<blockquote><p>No Report till now!!</p></blockquote>";
				} ?>
			</div>
		</div>
	</div>
</div>





<?php include_once 'footer.php'; ?>

 <script>
        $(document).ready( function () {
            $.fn.dataTable.ext.search.push(
                function( settings, data, dataIndex ) {
                    var min = $('#min').val();
                    var max = $('#max').val();
                    var date =  data[0]; // use data for the age column
                    var data_table_date = date.split("-");
                    var table_date = data_table_date[0];
                    var table_month = data_table_date[1];
                    var table_year = data_table_date[2];
                    var table_date_final  = table_year + '-' + table_month + '-' + table_date;
                    
                    var minimum  = min.split("-");
                    var min_date = minimum[0];
                    var min_month = minimum[1];
                    var min_year = minimum[2];
                    var minimum_date = min_year + '-' + min_month + '-' + min_date;

                    var maximum  = max.split("-");
                    var max_date = maximum[0];
                    var max_month = maximum[1];
                    var max_year = maximum[2];
                    var maximum_date = max_year + '-' + max_month + '-' + max_date;
                    // console.log(table_date_final);
                    
                   
                    // if ( ( min == '' && max == '' ) ||
                    // ( min == '' && date <= max ) ||
                    // ( min <= date && '' == max ) ||
                    // ( min <= date && date <= max ) )
                    if((min == '' && max == '') ||
                      (min == '' &&  table_date_final <= maximum_date )  ||
                      (minimum_date <= table_date_final && '' == max) ||
                      (minimum_date <= table_date_final && table_date_final <= maximum_date))
                    {
                    return true;
                    }
                    return false;
                }
            );

            var table = $('.view_data_table').DataTable({
               "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
            
           // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                // console.log(total);
 
            // // Total over this page
            pageTotal = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 3 ).footer() ).html(
                ''+pageTotal 
            );
        },
              // Export Button
                    dom: 'lBfrtip',
                      lengthMenu: [ [10, 20, 50, -1], [10, 20, 50, "All"] ],
                       pageLength: 10,
                       responsive: false,
                      columnDefs: [
                          { type: 'date-dd-mmm-yyyy', targets: 0 }
                       ],
                      buttons: [
                           {
                              extend: 'excelHtml5',
                              filename: '<?php echo get_vehicle_number($id,$wpdb)['vehicle_name'].'_'.date("Y/m/d")." Report"?>',
                              title:'<?php echo get_vehicle_number($id,$wpdb)['vehicle_name']." Report"?>',
                              footer: true
                          },
                          {
                              extend: 'pdfHtml5',
                              filename: '<?php echo get_vehicle_number($id,$wpdb)['vehicle_name'].'_'.date("Y/m/d")." Report"?>',
                              title: '<?php echo get_vehicle_number($id,$wpdb)['vehicle_name']." Report"?>',
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
                              title: '<?php echo get_vehicle_number($id,$wpdb)['vehicle_name']." Report"?>',
                              footer: true,
                          }
                    ]

                    // Sum of the coumnns


            });
           $('.dt-buttons a').addClass('btn btn-info btn-sm');

            $('#test').click( function() {
                table.draw();
            });

         //Date Picker 
            $("#min").datepicker({
                onSelect: function(currDate) {
                    $("#status").html("Selected date: " + currDate);
                },
                dateFormat: 'dd-mm-yy'
            });
            $("#max").datepicker({
                onSelect: function(currDate) {
                    $("#status").html("Selected date: " + currDate);
                },
                dateFormat: 'dd-mm-yy'
            });   
   });
</script> 

