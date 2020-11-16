<?php include_once 'header.php'; ?>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header">
				<h4>
					<center>Login Pin</center>
				</h4>
				<form class="form-horizontal" method="post" action="../controller/change_login_pin_controller.php">
					<div class="box-body">
						<div class="form-group">
							<div class="col-sm-6">
							<label>Old Pin</label>  
								<input type="text" class="form-control phone_no" placeholder="Enter Old Pin" name="old_pin" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-6">
							<label>New Pin</label>
								<input type="text" class="form-control phone_no" placeholder="Enter New Pin" name="new_pin" minlength="4" required>
							</div>
						</div>

						<div align="center">
							<input type="submit" class="btn btn-info" value="Change Pin">
							<input type="reset" class="btn btn-info" value="clear">
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>




<?php include_once 'footer.php'; ?>