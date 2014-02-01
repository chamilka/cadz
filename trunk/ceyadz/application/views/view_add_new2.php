<div class="container-fluid well span8">
	<?php echo validation_errors();?>
	<?php echo form_open('',array('id'=>'new-adv-form'));	?>	
		<fieldset>
		<legend>New Advertisement</legend>
		<div class="control-group">
			<label class="control-label" for="title"><span class="text-error">*</span>
				Title:</label>
			<div class="controls">
				<?php echo form_input(array('name'=>'title','class'=>'span12','value'=>set_value('username')))?>
			</div>
			<?php echo form_error('title');?>
		</div>
		<div class="control-group">
			<label class="control-label" for="category"><span class="text-error">*</span>
				Category:</label>
			<div class="control" id="cat-div">
				<div class="dropdown">
						<!--  data-toggle="dropdown" -->
    					<a class="dropdown-toggle btn" data-toggle="dropdown" href="#" id="btn_cat" >Select Category</a>        
						<?php echo $categories;?>
				</div>
				
				<div class="dropdown" id="sub">
					&nbsp;
				</div>
			</div>
			<?php echo form_error('category');?>
		</div>
		<div class="control-group" id="shortDescGroup">
			<label class="control-label" for="shortDesc"><span class="text-error">*</span> Short Description:</label>
			<ol id="shortDescTxt">
						<?php
						echo "<li>";
						echo form_textarea(array('name'=>'shortDesc[]','id'=>'shortDesc[]','rows'=>'1','class'=>'autosize span10','style'=>'resize:vertical;height:1.2em'));
						echo "&nbsp;";
						echo form_button(array('name'=>'more','id'=>'more'),'+');
						echo form_button(array('name'=>'less','id'=>'less'),'-');
						echo "</li>"; 
						?>						
			</ol>
			<?php echo form_error('shortDesc[]');?>		
		</div>
		<div class="control-group">
			<label class="control-label" for="fullDesc">Full Description:</label>
			<div class="controls">
					<?php echo form_textarea(array('name'=>'fullDesc','resize'=>'none','class'=>'span12','style'=>'resize:vertical'));?>
					<!-- <input type="text" id="title" placeholder="Title">-->
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="price"><span class="text-error">*</span>
				Price</label>
			<div class="controls input-prepend">
				<span class="add-on">Rs:</span>
				<?php echo form_input('price')?>
			</div>
			<?php echo form_error('price');?>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="advimg">Upload Images:</label>
		</div>
		<div class="control">
			<?php echo form_upload(array('name'=>'advimg','id'=>'advimg')); ?>
			<div id="preview"></div>
			<div id="loaded"></div>	
		</div>
		<br/>					
	</fieldset>
	<fieldset>
		<legend>Your Details</legend>
		<div class="control-group">
			<label class="control-label" for="pubName"><span class="text-error">*</span>
				Name:</label>
			<div class="controls">
				<?php echo form_input(array('name'=>'pubName','class'=>'span12'));?>
			</div>
			<?php echo form_error('pubName');?>
		</div>
		<div class="control-group">
			<label class="control-label" for="email"><span class="text-error">*</span>
				Email:</label>
			<div class="controls">
				<?php echo form_input(array('name'=>'email','class'=>'span8'));?>
			</div>
			<?php echo form_error('email');?>
		</div>
		<div class="control-group">
			<label class="control-label" for="phone">Contact Number:</label>
			<div class="controls">
				<?php echo form_input(array('name'=>'phone',));?>
				<label class="control-label checkbox">
					<?php echo form_checkbox(array('name'=>'phnState','value'=>'n'));?> Do not show my contact number to all viewers.
				</label>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="location"><span class="text-error">*</span>
				Dirstrict/Area:</label>
			<div class="control" id="dist-div">
				<div class="dropup">
						<a class="dropdown-toggle btn" data-toggle="dropdown" href="#" id="btn_dist" >Select District</a>        
						<?php echo $districts;?>
				</div>
				
				<div class="dropup" id="div_area">
					&nbsp;
				</div>
			</div>
			<?php echo form_error('district');?>
		</div>
	</fieldset>
	<div class="form-actions">
		<?php echo form_input(array('name'=>'numImages','value'=>'0','type'=>'hidden','id'=>'numImages'));?>
		<div class="span4">
			<?php echo form_submit(array('name'=>'submit','value'=>'Submit','class'=>'btn btn-primary'));?>
		</div>
		<div class="span4">
			<?php echo form_reset(array('name'=>'res','value'=>'Cancel','class'=>'btn')); ?>
		</div>
	</div>
	<?php echo form_close(); ?>	
</div>

<!-- image upload form 
<div class="container-fluid well span4">
	<div class="container-fluid">					
		<?php echo form_open_multipart('adv/upload_image',array('id'=>'imageform'));?>
			<div class="control-group">
				<label class="control-label" for="advimg">Upload Images:</label>
			</div>
			<div class="control">
				<?php echo form_upload(array('name'=>'advimg','id'=>'advimg')); ?>	
			</div>				
		<?php echo form_close(); ?>
		<div id="preview"></div>
		<div id="loaded"></div>
	</div>
</div>-->


<script type="text/javascript">
	$(document).ready(function(){
		$('.sel_cat').live('click',function(e){
			//alert('test');
			e.preventDefault();
			var cat_id=$(this).attr('href');
			$('#btn_cat').html($(this).html());
			$('#sub').html('');
			if($(this).html()!='Select Category')
			{				
				$.ajax({
					url: '<?php echo base_url()?>'+'adv/create_sub_list?catid='+cat_id,
					dataType: "html",
					success: function(response){
						if(response){
							$('#sub').html(response);
							$('#btn_sub_cat').dropdown('toggle');
						}
					}	
				});	
			}
		});

		$('.sel_sub_cat').live('click',function(e){
			e.preventDefault();
			$('#btn_cat').html($('#btn_cat').html()+" : "+$(this).html());
			$(this).parent().parent().parent().html('');
			sel_cat=$('#btn_cat').html();
			$('#cat-div').append("<input type='hidden' name='category' value='"+sel_cat+"'>");
		});

		$('.sel_dist').live('click',function(e){
			//alert('test');
			e.preventDefault();
			var dist_id=$(this).attr('href');
			$('#btn_dist').html($(this).html());
			$('#div_area').html('');
			if($(this).html()!='Select District')
			{				
				$.ajax({
					url: '<?php echo base_url()?>'+'adv/create_area_list?distid='+dist_id,
					dataType: "html",
					success: function(response){
						if(response){
							$('#div_area').html(response);
							$('#btn_area').dropdown('toggle');
								
							
						}
					}	
				});	
			}
		});

		$('.sel_area').live('click',function(e){
			e.preventDefault();
			$('#btn_dist').html($('#btn_dist').html()+" : "+$(this).html());
			$(this).parent().parent().parent().html('');
			sel_dist=$('#btn_dist').html();
			$('#dist-div').append("<input type='hidden' name='area' value='"+sel_dist+"'>");
		});
		
		$('#advimg').live('change',function(){
			$("#preview").html('');
		    $("#preview").html('<img src="<?php echo base_url()?>'+'img/loader.gif" alt="Uploading...."/>');
		    var fileData=$(this).prop('files')[0];
		    var formData = new FormData();                  
		    formData.append("file", fileData);
		    //alert(formData);
			/*$("#imageform").ajaxForm({
					success: function(response){
						$("#preview").html('');
						$("#numImages").val(parseInt($("#numImages").val())+1);
						$('#loaded').prepend(response);
					}
			}).submit();*/
			
			$.ajax({
				url: '<?php echo base_url()?>'+'adv/upload_image',
				dataType: "script",
				cache:"false",
				contentType: 'multipart/form-data',
				processData:"false",
				data:formData,
				//type:'post',
				/*success: function(response){
					if(response){
						$("#preview").html('');
						$("#numImages").val(parseInt($("#numImages").val())+1);
						$('#loaded').prepend(response);						
					}
				}	*/
			});	
			alert('success');

		});	

		$('.imgDelete').live('click',function(e){
			e.preventDefault();
			var cont=$(this);
			$.ajax({
				url: '<?php echo base_url()?>'+cont.attr('href'),
				dataType: "text",
				success: function(response){
					if(response){
						cont.parent().remove();
						("#numImages").val(paseInt($("#numImages").val())-1);
					}
				}	
			});	
		});

		$('.autosize').autosize();
		var count=2;
		$('#more').click(function(){
			if(count<=5)
			{
				$('#shortDescTxt').append("<li><textarea name='shortDesc[]' id='shortDesc[]' rows='1' class='autosize span10' style='resize:vertical;height:1.2em'></textarea></li>");
				$('.autosize').autosize();
				count++;
			}			
		});
		
		$('#less').click(function() {
			if(count>2){
				$('#shortDescTxt li:last').remove();
				count--;
			} 
        });
	});

	/**/

	
</script>


