<?php
$addCount = 0;
foreach ( $advertisements as $adv ) {
	$addCount += 1;
	?>
<div class="row-fluid adv-rows" id="<?php echo $addCount;?>">
	<div class="title_panel span12">
		<h4><?php echo $adv['adv_title'];?></h4>
	</div>
	<div class="thumb_panel span2"><?php if($adv['adv_default_img']!=null){?>
					<img src="<?php echo $adv['adv_default_img'];?>" width="120px"
			height="100px" /><br /> <input type="hidden" name="imgPath[]"
			id="imgPath[]" value="<?php  echo $adv['adv_img_url']; ?>" /> <a
			href='<?php echo base_url()?>adv/more_images?path=<?php echo urlencode($adv['adv_img_path'])?>'
			class="more_images btn btn-primary btn-small">More Images</a>
				<?php }?></div>
	<div class="content_panel span7" style="margin-left:0px">
		<div class="main_content">
			<ul>
				<?php
	foreach ( $adv ['adv_short_desc'] as $sd ) {
		if (! empty ( $sd )) {
			echo "<li>" . $sd . "</li>";
		}
	}
	?>
			</ul>
			<a href='#' class="full_description btn btn-primary btn-small">Full
				description</a>
		</div>
		<div class="full_description_content hide well">
			<button type="button" class="close btn_close">
				<i class="icon-remove"></i>
			</button>
			<span><?php echo $adv ['adv_full_desc']?></span>
		</div>
		<div class="more_images_content hide well">
			<button type="button" class="close btn_close">
				<i class="icon-remove"></i>
			</button>
			<div class="image_gallery">
			</div>
		</div>
		<div class="contact_details_content hide well">
			<button type="button" class="close btn_close">
				<i class="icon-remove"></i>
			</button>
			<table class="table table-condensed table-striped">
				<tr>
					<th colspan="2">Contact Details</th>
				</tr>
				<tr>
					<td>Phone</td>
					<td><?php echo $adv ['adv_phone']?></td>
				</tr>
				<tr>
					<td>Location</td>
					<td><?php 
							$location = "";
							if ($adv ['adv_city'] != "") {
								$location = $adv ['adv_city'] . ", ";
							}
							if ($adv ['adv_district'] != "") {
								$location .= $adv ['adv_district'];
							}
							echo $location;
						?>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="details_panel span2">
		<table class="table table-condensed">
			<tr>
				<td>Price:</td>
				<td><?php echo $adv['adv_price']?></td>
			</tr>
			<tr>
				<td>Location:</td>
				<td><?php
					echo $location;
					?>
				</td>
			</tr>
			<tr>
				<td>Uploaded:</td>
				<td><?php echo $adv['adv_uploaded']?></td>
			</tr>
			<tr>
				<td colspan="2"><a href="#" class="contact_details btn btn-primary btn-small">Contact Details</a></td>
			</tr>
		</table>
	</div>
</div>
<?php }?>

<script type="text/javascript">
	$(document).ready(function(){
			//alert("test");
			$('.more_images').click(function(e){
				e.preventDefault();
				var row_id=$(this).parent().parent().attr('id');
				$.ajax({
					type: "GET",
					url: $(this).attr('href'),
				})
				.done(function(response) {
	    			var more_images_panel=$("div#"+row_id).find('.more_images_content');
	    			hideAllContent(more_images_panel);
	    			more_images_panel.removeClass('hide');
	    			more_images_panel.find('.image_gallery').html(response);
	    			//more_images_panel.find('.ad-thumbs').html(response);

	    			var galleries = $('.ad-gallery').adGallery();
	    		    $('#switch-effect').change(
	    		      function() {
	    		        galleries[0].settings.effect = $(this).val();
	    		        return false;
	    		      }
	    		    );
				})
	  			.fail(function( jqXHR, textStatus ) {
					alert( "Request failed: " + textStatus );
				});
			});

			//full description panel view
			$('.full_description').click(function(e){
				e.preventDefault();
				var row_id=$(this).parent().parent().parent().attr('id');
				var full_desc_panel=$("div#"+row_id).find('.full_description_content');
				hideAllContent(full_desc_panel);
				full_desc_panel.removeClass('hide');
			});

			//contact details panel view
			$('.contact_details').click(function(e){
				e.preventDefault();
				var row_id=$(this).parent().parent().parent().parent().parent().parent().attr('id');
				var contact_details_panel=$("div#"+row_id).find('.contact_details_content');
				hideAllContent(contact_details_panel);
				contact_details_panel.removeClass('hide');
			});

			//close button in each panel
			$('.btn_close').click(function(){
				showMainContent($(this).parent());
			});
		});

	var showMainContent = function (currentPanel) {
		$(currentPanel).siblings('.main_content').removeClass('hide');
		$(currentPanel).addClass('hide');
		$(currentPanel).children('div').html('');
	};

	var hideAllContent = function (currentPanel) {
		$(currentPanel).siblings('div.main_content').addClass('hide');
		$(currentPanel).siblings('div.more_images_content').addClass('hide');	
		$(currentPanel).siblings('div.full_description_content').addClass('hide');	
	};
	
</script>