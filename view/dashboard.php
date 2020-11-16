<?php
	// echo "<pre>";
	include_once '../controller/common_function.php';
	include_once '../model/index.php';
	include_once 'header.php'; 
	
 ?>
        <div class="row">
        	<div class="col-xs-12">
        		<div class="box box-info">
        			<div class="box-header">
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-green">
                            <div class="inner">
                              <h3>₹: <?php echo number_format(getincome(date('m'),$wpdb)); ?></h3>

                              <p><?php echo date("M Y"); ?> Income</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-stats-bars"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                          <div class="small-box bg-yellow">
                            <div class="inner">
                              <h3>₹: <?php echo number_format(getLastMonthIncome(date("m",strtotime("-1 month")),date("Y",strtotime("-1 month")),$wpdb)); ?></h3>

                              <p><?php echo date("M Y",strtotime("-1 month")); ?> Income</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-stats-bars"></i>
                            </div>
                          </div>
                        </div>

                 
        			</div>
        		</div>
        	</div>
        </div>

		<div class="box box-success table-responsive">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo date("Y"); ?> Income Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <div class="box-body">
              <div class="chart">

                <canvas id="barChart" style="height: 230px; width: 668px;" width="668" height="230"></canvas>
              </div>
            </div>
            <!-- /.box-body -->	
        </div>


<!-- calculate bar chart income & expense -->

<?php 
	for ($i=1; $i <= 12; $i++) { 
		$raw_data = getincome($i,$wpdb);
		if (empty($raw_data)) {
			$income[]= 0;
		}
		else{
			$income[]= $raw_data;	
		}
	}
	$income_detail_chart = implode(',', $income);
?>


<script src="../js/Chart.js"></script>	
<script type="text/javascript">
    $(function() {
    	// chart
        var barChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August', 'September', 'October','November','December'],
            datasets: [{
                    label: 'Expense',
                    fillColor: 'rgba(236,181,11,9)',
                    strokeColor: 'rgba(236,181,11,1)',
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    // data: [0,0,0,0,0,0,0,0,0,0,0,0]
                },{
                    label: 'Income',
                    fillColor: 'rgba(225, 246, 222, 1)',
                    strokeColor: 'rgba(210, 214, 222, 1)',
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [<?php echo $income_detail_chart;?>]

                }
            ]
        }


        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChart = new Chart(barChartCanvas)
        barChartData.datasets[1].fillColor = '#00a65a'
        barChartData.datasets[1].strokeColor = '#00a65a'
        barChartData.datasets[1].pointColor = '#00a65a'
        var barChartOptions = {
            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            scaleBeginAtZero: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: true,
            //String - Colour of the grid lines
            scaleGridLineColor: 'rgba(0,0,0,.05)',
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - If there is a stroke on each bar
            barShowStroke: true,
            //Number - Pixel width of the bar stroke
            barStrokeWidth: 2,
            //Number - Spacing between each of the X value sets
            barValueSpacing: 5,
            //Number - Spacing between data sets within X values
            barDatasetSpacing: 1,
            //String - A legend template
            legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
            //Boolean - whether to make the chart responsive
            responsive: true,
            maintainAspectRatio: true
        }

        barChartOptions.datasetFill = false
        barChart.Bar(barChartData, barChartOptions)
    })
</script>		

<?php include_once 'footer.php'; ?>

