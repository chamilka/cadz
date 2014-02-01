<?php echo form_open_multipart('adv/upload_image',array('id'=>'imageform'));?>
			<div class="control-group">
						<div class="control">
					<?php echo form_upload(array('name'=>'advimg','id'=>'advimg')); ?>	
				</div>
					</div>	
		<?php echo form_close(); ?>