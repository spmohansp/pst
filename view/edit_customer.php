<?php 
  include_once 'header.php';
  include_once '../model/index.php';
  $id=$_GET['id'];
  $customer_list = $wpdb->get_results("SELECT * FROM customer where id='$id' ",ARRAY_A);
  // print_r($customer_list);
?>
     
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-info">
            <div class="box box-info">
              <div class="box-header">
                <h4>
                 <center>Edit Customers</center>
                </h4>
                  <form method="post" action="../controller/update_customer_controller.php?id=<?php echo $customer_list[0]['id']?>">
                  <div class="form-group col-sm-7">
                      <label for="email">Name:</label>
                      <input type="text" class="form-control" id="name" placeholder="Customer Name" name="customer_name" value="<?php echo $customer_list[0]['customer_name'];?>">
                      <a class="btn btn-danger add_more_phone_number pull-right" style="margin-top: 3px"><i class="fa fa-plus"></i></a>
                  </div>
                  <div class="add_phone_number_div ">
                    <?php
                    $var1 = unserialize($customer_list[0]['phone_number']);
                    foreach ($var1 as $key => $value1) { 
                      ?>
                    <div class="form-group col-sm-7">
                        <label for="email">Phone No:  </label>
                        <input type="tel" class="form-control phone_no" placeholder="Customer Phone Number" name="phone_number[]" value= "<?php echo $value1 ?>" minlength="10" maxlength="10" required>
                        <a href="#" class=" btn remove_field pull-right" style="margin-left:10px;"><i class="fa fa-remove"></i></a>
                    </div>
                    <?php }?>
                  </div>

                  <div class="col-sm-7">
                    <button type="submit" id="submit" class="btn btn-info pull-right" data-dismiss="modal">Update Customer</button>
                  </div>
                </form>
              </div>
            </div>
        </div>  
    </div> 
</div>  
<?php include_once 'footer.php'; ?>
 <script>

  $('.add_more_phone_number').click(function(){ //click event on add more fields button having class add_more_button
        // e.preventDefault();
        $('.add_phone_number_div').append('<div class="form-group col-sm-7"><label>Phone No</label><input type="tel" placeholder="Customer Phone Number" name="phone_number[]" class="form-control phone_no"  maxlength="10" minlength="10" required><a href="#" class="btn remove_field pull-right" style="margin-left:10px;"><i class="fa fa-remove"></i></a></div>');
    });  
    $('.add_phone_number_div').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent('div').remove();
    })
</script>