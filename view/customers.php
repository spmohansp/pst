 <?php
 
  include_once 'header.php';
  include_once '../model/index.php';

$customer_list = $wpdb->get_results("SELECT * FROM customer ORDER BY customer_name",ARRAY_A);
?> 


<!-- view customer -->
<div class="row">
  <div class="col-xs-12">
    <div class="panel panel-info">
      <div class="box box-info">
        <div class="box-header">
          <h4>
          <center>Customers List</center>
          </h4>
             <a href="add_customers.php"  class="btn btn-info btn-sm  pull-right"><i class="fa fa-plus"></i> Add Customer</a>
        </div>
        <?php if(!empty($customer_list)){ ?>
          <div class="box-body">
            <div class="table-responsive">
              <table  class="table table-bordered table-striped" id="view_table_detail">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Phone No</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                	<?php 
                    foreach ($customer_list as $key => $value) { 
                  	$var1 = unserialize($value['phone_number']);
					
	              	?>
	                  <tr>
	                      <td><?php echo $value['customer_name'] ?></td>

	                      <td>
	                      <?php echo implode(",", $var1); ?>
	                      </td>
	                        

		                    <td><a href="edit_customer.php?id=<?php echo $value['id']?>"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button></a>
	                           <a href="../controller/delete_customer_controller.php?id=<?php echo $value['id']?>">  <button type='button' class='btn btn-danger btn-sm'><i class="fa fa-trash"></i> Delete</button></a>
                       </td>
	                  </tr>
	               <?php } ?>
                </tbody>
              </table>
            </div>
          </div>


      <?php }else{
          echo "<blockquote><p>No Customer till now added!!</p></blockquote>";
      } ?>
      </div>
    </div>
  </div>
</div>


<?php include_once 'footer.php'; ?>
