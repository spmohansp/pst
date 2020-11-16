<?php 
	include_once 'header.php';
	include_once '../model/index.php';
 ?>
<div class="row">
   <div class="col-xs-12">
    	<div class="panel panel-info">
      		<div class="box box-info">
        		<div class="box-header">
				<h4 ><center>Add Customer Details</center></h4>
	        	<form class="form-horizontal" method="post" action="../controller/add_customer_controller.php">
					<div class="box-body">
					   <div class="form-group">
						   	<div class="col-sm-7">
						        <label>Name</label>
						        <input type="text" class="form-control" id="inputEmail3" placeholder="Customer Name" name="customer_name" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-7">
							    <a class="btn btn-danger add_more_phone_number pull-right"><i class="fa fa-plus"></i></a>
							    <label>Phone No</label>
							    <input type="tel" minlength="10" maxlength="10" class="form-control phone_no" placeholder="Customer Phone Number" name="phone_number[]" pattern="[1-9]{1}[0-9]{9}" required>
							</div> 
							<!-- <div class="col-sm-5">
							</div> -->
						</div> 

						<div class="add_phone_number_div">
			            </div>
					</div>
					<div class="box-footer col-sm-7">
						<button type="submit" class="btn btn-info pull-right">Add  Customer</button>
					</div>
			    </form>
            	</div>
			</div>
    	</div>
	</div>
</div>
<?php	include_once 'footer.php';?>
<script>

	$('.add_more_phone_number').click(function(){ //click event on add more fields button having class add_more_button
        // e.preventDefault();
        $('.add_phone_number_div').append('<div class="form-group"><div class="col-sm-7"><label>Phone No</label><input type="tel" maxlength="10" minlength="10" class="form-control phone_no" placeholder="Customer Phone Number" name="phone_number[]" required><a href="#" class=" btn remove_field pull-right" style="margin-left:10px;"><i class="fa fa-remove"></i></a></div></div>');
    });  
    $('.add_phone_number_div').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent('div').remove();
    })
</script>
