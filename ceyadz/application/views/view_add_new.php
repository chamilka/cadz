<div class="container-fluid well">
	<?php echo validation_errors();?>
	<?php echo form_open('',array('id'=>'new-adv-form'));	?>	
	<ul class="nav nav-tabs" id="advTab">
		<li class="active"><a href="#advDetails">1. Advertisement</a></li>
		<li><a href="#images">2. Images</a></li>
		<li><a href="#publisher">3. About you</a></li>
		<li><a href="#advSubmit">4. Submit</a></li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane active" id="advDetails">
			<fieldset>
				<!-- <legend>New Advertisement</legend> -->
				<div class="control-group">
					<label class="control-label" for="title"><span class="text-error">*</span>
						Title:<span class="alert alert-error" id="title_msg">A short title
							to describe your advertisement</span> </label>
					<div class="controls">
						<?php echo form_input(array('name'=>'title','class'=>'span12','id'=>'title'))?>
					</div>
					<?php echo form_error('title');?>
				</div>
				<div class="control-group">
					<label class="control-label" for="category"><span
						class="text-error">*</span> Category: <span
						class="alert alert-error" id="category_msg">Select a suitable
							category for your advertisement</span> </label>
					<div class="control" id="cat-div">
						<div class="dropdown">
							<a class="dropdown-toggle btn" data-toggle="dropdown" href="#"
								id="btn_cat">Select Category</a>        
						<?php echo $categories;?>
						</div>
						<div class="dropdown" id="sub">&nbsp;</div>
					</div>
				<?php echo form_error('category');?>
			</div>
				<div id="disp_category_general" class="">
					<div class="control-group" id="shortDescGroup">
						<label class="control-label" for="shortDesc"><span
							class="text-error">*</span> Short Description:</label>
						<ol id="shortDescTxt">
							<?php
							echo "<li>";
							echo form_textarea ( array ('name' => 'shortDesc[]', 'id' => 'shortDesc[]', 'rows' => '1', 'class' => 'autosize span10', 'style' => 'resize:vertical;height:1.2em' ) );
							echo "&nbsp;";
							echo form_button ( array ('name' => 'more', 'id' => 'more' ), '+' );
							echo form_button ( array ('name' => 'less', 'id' => 'less' ), '-' );
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
				</div>

				<div id="disp_category_vehicle" class="hidden">
					<div class="control-group">
						<label class="control-label" for="make"><span class="text-error">*</span>
							Make:</label>
						<div class="controls">
					<?php echo form_input(array('name'=>'make','class'=>'span6','value'=>set_value('make')))?>
				</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="model"><span class="text-error">*</span>
							Model:</label>
						<div class="controls">
					<?php echo form_input(array('name'=>'model','class'=>'span6','value'=>set_value('model')))?>
				</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="category"><span
							class="text-error">*</span> Category:</label>
						<div class="controls">
					<?php echo form_input(array('name'=>'category','class'=>'span6','value'=>set_value('category')))?>
				</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="milage"><span class="text-error"></span>
							Milage:</label>
						<div class="controls">
					<?php echo form_input(array('name'=>'milage','class'=>'span6','value'=>set_value('milage')))?>
				</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="engine_capacity"><span
							class="text-error"></span> Engine capacity:</label>
						<div class="controls">
					<?php echo form_input(array('name'=>'engine_capacity','class'=>'span6','value'=>set_value('engine_capacity')))?>
				</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="fuel_type"><span
							class="text-error"></span> Fuel type:</label>
						<div class="controls">
					<?php echo form_input(array('name'=>'fuel_type','class'=>'span6','value'=>set_value('fuel_type')))?>
				</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="transmission"><span
							class="text-error"></span> Transmission:</label>
						<div class="controls">
					<?php echo form_input(array('name'=>'transmission','class'=>'span6','value'=>set_value('transmission')))?>
				</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="manu_year"><span
							class="text-error"></span> Year of manufacture:</label>
						<div class="controls">
					<?php echo form_input(array('name'=>'manu_year','class'=>'span2','value'=>set_value('make')))?>
				</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="body_type"><span
							class="text-error"></span> Body type:</label>
						<div class="controls" id="body_type_control">
					<?php echo form_input(array('name'=>'body_type','class'=>'span6 hidden','value'=>set_value('body_type')))?>
				</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="num_passengers"><span
							class="text-error"></span> Number of passengers:</label>
						<div class="controls">
					<?php echo form_input(array('name'=>'num_passengers','class'=>'span6','value'=>set_value('num_passengers')))?>
				</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="otherDesc">Other Description:</label>
						<div class="controls">
						<?php echo form_textarea(array('name'=>'otherDesc','resize'=>'none','class'=>'span12','style'=>'resize:vertical'));?>
				</div>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="price"><span class="text-error">*</span>
						Price: <span
						class="alert alert-error" id="price_msg">Providing reasonable price will attract more viewers</span></label> 
					<div class="controls input-prepend">
						<span class="add-on">Rs:</span>
				<?php echo form_input(array('name'=>'price','id'=>'price'));?>
			</div>
			<?php echo form_error('price');?>
		</div>
				<br />
				<?php echo form_input(array('name'=>'numImages','value'=>'0','type'=>'hidden','id'=>'numImages'));?>
		
			</fieldset>

			<div class="control-group">
				<div class="controls">
					<a href="#" class="btn btn-primary toImagesTab">Next<i class="icon-chevron-right icon-white"></i></a>
				</div>
			</div>
		</div>
		
		<div class="tab-pane" id="publisher">
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
					<?php //echo form_checkbox(array('name'=>'phnState','value'=>'n'));?> <!-- Do not show my contact number to all viewers.-->
				</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="location"><span
						class="text-error">*</span> Dirstrict/Area:</label>
					<div class="control" id="dist-div">
						<div class="dropup">
							<a class="dropdown-toggle btn" data-toggle="dropdown" href="#"
								id="btn_dist">Select District</a>        
						<?php echo $districts;?>
				</div>

						<div class="dropup" id="div_area">&nbsp;</div>
					</div>
			<?php echo form_error('district');?>
		</div>
			</fieldset>
			<div class="container span12">
				<div class="control-group">
					<div class="controls">
						<a href="#" id="" class="btn btn-primary toImagesTab"><i class="icon-chevron-left icon-white"></i>Back</a>
						<a href="#" id="" class="btn btn-primary toSubmitTab">Next<i class="icon-chevron-right icon-white"></i></a>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="advSubmit">
			<div class="form-actions">
				<div class="span4">
			<?php echo form_submit(array('name'=>'submit','value'=>'Submit','class'=>'btn btn-primary'));?>
		</div>
				<div class="span4">
			<?php echo form_reset(array('name'=>'res','value'=>'Cancel','class'=>'btn')); ?>
		</div>
			</div>
		<?php echo form_close(); ?>	
	</div>
	<div class="tab-pane" id="images">
			<!-- image upload form -->
			<div class="container-fluid well span12">
					<?php echo form_open_multipart('adv/upload_image',array('id'=>'imageform','class'=>'dropzone dz-clickable'));?>
						<div class="control-group">
							<label class="control-label" for="advimg">Upload Images:</label>
							<div class="control">
								<?php echo form_upload(array('name'=>'advimg','id'=>'advimg')); ?>	
							</div>
						</div>				
					<?php echo form_close(); ?>
						<div id="preview"></div>
						<div id="loaded"></div>
			</div>
			<div class="container span12">
				<div class="control-group">
					<div class="controls">
						<a href="#" id="" class="btn btn-primary toDetailsTab"><i class="icon-chevron-left icon-white"></i>Back</a>
						<a href="#" id="" class="btn btn-primary toPublisherTab">Next<i class="icon-chevron-right icon-white"></i></a>
					</div>
				</div>
			</div>
		</div>

</div>


<script type="text/javascript">
	$(document).ready(function(){

		$('#title_msg').hide();
		$('#category_msg').hide();
		$('#price_msg').hide();
		$('#title').focus(function(){
			$('#title_msg').show();
		});
		$('#title').blur(function(){
			$('#title_msg').hide();
		});
		$('#btn_cat').mouseover(function(){
			$('#category_msg').show();
		});
		$('#btn_cat').mouseout(function(){
			$('#category_msg').hide();
		});
		$('#price').focus(function(){
			$('#price_msg').show();
		});
		$('#price').blur(function(){
			$('#price_msg').hide();
		});

		$('.toDetailsTab').click(function(e){
			e.preventDefault();
			$('#advTab a[href="#advDetails"]').tab('show');
		});

		$('.toImagesTab').click(function(e){
			e.preventDefault();
			$('#advTab a[href="#images"]').tab('show');
		});

		$('.toPublisherTab').click(function(e){
			e.preventDefault();
			$('#advTab a[href="#publisher"]').tab('show');
		});

		$('.toSubmitTab').click(function(e){
			e.preventDefault();
			$('#advTab a[href="#advSubmit"]').tab('show');
		});
		
		$('#advTab a[href="#images"]').on('shown', function (e) {
			  if(e.target.href.substr(e.target.href.indexOf('#')+1)=="images"){
				 // $('#images').html('<form class="dropzone dz-clickable"><div class="dz-default dz-message"><span> Drop files here to upload</span></div></form>');
			  }
			});
		
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
				if($(this).html()=='Vehicles')
				{
					$('#disp_category_general').addClass('hidden')
					$('#disp_category_vehicle').removeClass('hidden');
				}
				else
				{
					$('#disp_category_general').removeClass('hidden')
					$('#disp_category_vehicle').addClass('hidden');
				}
					
			}
		});

		$('.sel_sub_cat').live('click',function(e){
			e.preventDefault();
			$('#btn_cat').html($('#btn_cat').html()+" : "+$(this).html());
			$(this).parent().parent().parent().html('');
			sel_cat=$('#btn_cat').html();
			$('#cat-div').append("<input type='hidden' name='sub_category' value='"+$(this).attr('href')+"'>");
			alert($(this).html());
			if($(this).html()=='Cars')
			{
				$('#body_type_control').html('');
			}
			else
			{
				$('#body_type_control').html('<?php echo form_input(array('name'=>'body_type','class'=>'span6 hidden','value'=>set_value('body_type')))?>');
			}
			
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
		    alert('test');
			$("#imageform").ajaxForm({
					success: function(response){
						$("#preview").html('');
						$("#numImages").val(parseInt($("#numImages").val())+1);
						$('#loaded').prepend(response);
					}
			}).submit();

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

		$('#advTab a').click(function (e) {
			  e.preventDefault();
			  $(this).tab('show');
		})
	});

	/**/

	
</script>


