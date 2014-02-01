<script type="text/javascript">
	document.write('<style>.noscript { display: none; }</style>');
</script>

<?php foreach($advertisements as $adv){//echo $adv['adv_default_img'];

//print_r($adv);?>
<!-- new view -->
	
<div class="container-fluid span12" style="border-bottom: 1px dotted; padding-top:10px; padding-bottom:10px;">
<div class="row-fluid" >
	<div class="container span9">
		<div class="row-fluid">
			<div class="span12" style="font-size:medium;" >
				<?php echo $adv['adv_title'];?>
			</div>				
		</div>
		<div class="row-fluid">
			<div class="span3">
				<?php if($adv['adv_default_img']!=null){?>
					<img src="<?php echo $adv['adv_default_img'];?>" width="120px" height="100px"/><br />
					<input type="hidden" name="imgPath[]" id="imgPath[]" value="<?php  echo $adv['adv_img_url']; ?>" />
					<a href='adv/more_images?path=<?php echo urlencode($adv['adv_img_path'])?>' class="more_images">More Images</a>
				<?php }?>
			</div>
			<div class="span9">
				<ul>
					<?php 
						foreach($adv['adv_short_desc'] as $sd)
						{
							if(!empty($sd))
							{
								echo "<li>".$sd."</li>";
							}
						}
					?>
				</ul>
			</div>				
		</div>
		<div class="row-fluid">
			<div class="input-prepend span3">
				&nbsp;
			</div>
			<div class="input-prepend span3">
				<span class="add-on">Published On:</span>
				<span class="input-small uneditable-input" style="width:80px">12 Apr 2013</span>
			</div>
			<div class="input-prepend span3">
				<span class="add-on">Serial Number:</span>
				<span class="input-small uneditable-input" style="width:75px">0000123</span>
			</div>
			<div class="input-prepend span3">
				<span class="add-on">Views:</span>
				<span class="input-small uneditable-input" style="width:50px">23</span>
			</div>
					
		</div>
	</div>
	<div class="container span3">
		<div class="row-fluid">
			<div class="input-prepend span3">
				<span class="add-on" style="width:60px">Location:</span>
				<span class="input-small uneditable-input">town/city</span>
			</div>			
		</div>
		<div class="row-fluid">
			<!-- <table class="table table-bordered table-striped table-condensed">
				<tr><td>Price</td></tr>
				<tr><td><?php echo $adv['adv_price'];?></td></tr>
			</table>-->	
			<div class="input-prepend span3">
				<span class="add-on" style="width:60px">Price:</span>
				<span class="input-small uneditable-input"><?php echo $adv['adv_price'];?></span>
			</div>				
		</div>
		<div class="row-fluid">
			<a href="#" id="contactPop" rel="popover" class="btn">Contact Seller</a>
		</div>
	</div>
</div>
</div>
	
<!-- end new view -->

<?php }?>

<!-- Modal -->
	<div id="moreImgModal" class="modal hide fade" style="width:800px" tabindex="-1" role="dialog" aria-labelledby="moreImgModalLabel" aria-hidden="true">
    	<div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		    <h3 id="moreImgModalLabel">More Images</h3>
	    </div>
	    <div class="modal-body">
	    	
	    	
    	<div id="container">
			<!-- Start Advanced Gallery Html Containers -->
			<div id="gallery" class="content">
				<div id="controls" class="controls"></div>
				<div class="slideshow-container">
					<div id="loading" class="loader"></div>
					<div id="slideshow" class="slideshow"></div>
				</div>
				<!-- <div id="caption" class="caption-container"></div> -->
			</div>
			<div id="thumbs" class="navigation">
				<ul class="thumbs noscript" id="imgThumbs">
				<li>
					<a class="thumb" name="leaf" href="http://farm4.static.flickr.com/3261/2538183196_8baf9a8015.jpg" title="Title #0">
						<img src="http://farm4.static.flickr.com/3261/2538183196_8baf9a8015_s.jpg" alt="Title #0" />
					</a>
				</li> 
				<li>
					<a class="thumb" name="leaf" href="http://farm4.static.flickr.com/3261/2538183196_8baf9a8015.jpg" title="Title #0">
						<img src="http://farm4.static.flickr.com/3261/2538183196_8baf9a8015_s.jpg" alt="Title #0" />
					</a>
				</li>				
			</ul>
			</div>
			<div style="clear: both;"></div>
		</div>
		    	
		    	
		    	
		</div>
		<div class="modal-footer">
		    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</div>


<script type="text/javascript">
	$(document).ready(function(){

		$('#contactPop').popover({
		    placement : 'top',
		    title : '<?php echo $adv["adv_title"]."dfasfas;fjakldfjajjreafjaofjoirejg oifajfoiajorpijafpjopajfoiaj"?>',
		    //content : 'http://www.google.lk',
		    content: 'Test',
		    html:true
		});	

		
		$(".more_images").live('click',function(e){
			e.preventDefault();
			$("#moreImgModal").modal();
			//$(".modal-body").html('<img src="../img/loadingImages.gif" alt="Loading...."/>');
			$("#thumbs").html('<img src="../img/loadingImages.gif" alt="Loading...."/>');
			cont=$(this);
			$.ajax({
				url: '<?php echo base_url()?>'+cont.attr('href'),
				dataType: 'html',
				success: function(response){
					if(response){
						//$('.modal-body').html('');
						//$('.modal-body').html(response);
						//$('#imgThumbs').html(response);
						//$('.modal-body #thumbs').html('');
						//$('.modal-body #thumbs').html(response);
						//$("#moreImgModal").modal();
						$("#thumbs").html('');
						$("#thumbs").html(response);
						
					}
				},	
			});	
		});

		// We only want these styles applied when javascript is enabled
		$('div.navigation').css({'width' : '100px', 'float' : 'left'});
		$('div.content').css('display', 'block');

		// Initially set opacity on thumbs and add
		// additional styling for hover effect on thumbs
		var onMouseOutOpacity = 0.67;
		$('#thumbs ul.thumbs li').opacityrollover({
			mouseOutOpacity:   onMouseOutOpacity,
			mouseOverOpacity:  1.0,
			fadeSpeed:         'fast',
			exemptionSelector: '.selected'
		});
		
		// Initialize Advanced Galleriffic Gallery
		var gallery = $('#thumbs').galleriffic({
			delay:                     2500,
			numThumbs:                 15,
			preloadAhead:              10,
			enableTopPager:            true,
			enableBottomPager:         true,
			maxPagesToShow:            7,
			imageContainerSel:         '#slideshow',
			controlsContainerSel:      '#controls',
			captionContainerSel:       '#caption',
			loadingContainerSel:       '#loading',
			renderSSControls:          true,
			renderNavControls:         true,
			playLinkText:              'Play Slideshow',
			pauseLinkText:             'Pause Slideshow',
			prevLinkText:              '&lsaquo; Previous Photo',
			nextLinkText:              'Next Photo &rsaquo;',
			nextPageLinkText:          'Next &rsaquo;',
			prevPageLinkText:          '&lsaquo; Prev',
			enableHistory:             false,
			autoStart:                 true,
			syncTransitions:           true,
			defaultTransitionDuration: 900,
			onSlideChange:             function(prevIndex, nextIndex) {
				// 'this' refers to the gallery, which is an extension of $('#thumbs')
				this.find('ul.thumbs').children()
					.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
					.eq(nextIndex).fadeTo('fast', 1.0);
			},
			onPageTransitionOut:       function(callback) {
				this.fadeTo('fast', 0.0, callback);
			},
			onPageTransitionIn:        function() {
				this.fadeTo('fast', 1.0);
			}
		});
		
	});
</script>