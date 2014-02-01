<!DOCTYPE html>
<html>
	<head>
		<title>Admin Login</title>
		<link rel="stylesheet" href="<?php echo base_url().'css/bootstrap.css'?>" />
		<link rel="stylesheet" href="<?php echo base_url().'css/bootstrap-responsive.css'?>" />
		<style type="text/css">
			body{
				align:center;
			}	
		</style>		
	</head>
	<body>
		<div class="row-fluid">
		 	<div class="span4 offset4 well">
		 		<div class='alert alert-error'>
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo validation_errors();?>
				</div>
					
				<?php echo form_open('admin/validate_user')?>
				<fieldset>
					<legend>Loging to CeyAdz</legend>
					<div class="control-group offset2">
						<label class="control-label" for="uname">Username:</label>
						<div class="controls">
								<?php echo form_input('uname');?>
							</div>
						<label class="control-label" for="pword">Password:</label>
						<div class="controls">
								<?php echo form_password('pword');?>
							</div>
					</div>
					<div class="form-actions">
						<div class="span5 offset2">
							<?php echo form_submit(array('name'=>'submit','value'=>'Login','class'=>'btn btn-primary'));?>
						</div>
						<div class="span5">
							<?php echo form_reset(array('name'=>'res','value'=>'Cancel','class'=>'btn')); ?>
						</div>						
					</div>		
					
				</fieldset>
			</div>
		</div>
	</body>
</html>