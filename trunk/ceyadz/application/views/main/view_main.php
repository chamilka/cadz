<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device.width,initial-scale=1.0">
		<?php echo link_tag('img/ico/favicon.ico', 'shortcut icon', 'image/ico'); ?>
		<title><?php echo $title;?></title>
<link rel="stylesheet"
	href="<?php echo base_url().'css/bootstrap.css'?>" />
<link rel="stylesheet"
	href="<?php echo base_url().'css/bootstrap-responsive.css'?>" />
<script src="<?php echo base_url().'js/jquery-1.8.3.min.js'?>"></script>
<script src="<?php echo base_url().'js/bootstrap.js'?>"></script>

<style>
#tab { /*position: absolute;
			    width: 100%;*/
	border: 1px solid gray;
	text-align: center;
	padding-top: 5px;
	height: 400px;
}

.cont {
	margin-top: 20px;
	border-bottom-width: thin;
	border-bottom-style: solid;
	border-bottom-color: #A3A3A3;
}

#cat {
	column-count: 4;
	-moz-column-count: 4;
	-webkit-column-count: 4;
	column-width: auto;
	-moz-column-width: auto; /* Firefox */
	-webkit-column-width: auto; /* Safari and Chrome */
	column-gap: 0;
	-moz-column-gap: 0;
	-webkit-column-gap: 0;
	width: 100%; /*your fixed width*/
	/*	   height: 200px; /*your fixed height*/
}

.popover-inner {
	width: 800px;
}

.popover {
	width: 800px;
}

.popover.bottom {
	margin-left: 200px;
}

.popover-title {
	padding-top: 4px;
	background-color: #ffffff;
	border-bottom: none;
}

.popover.bottom .arrow {
	left: 25%;
}
</style>
</head>
<body>
	<div class="span10 offset1" id="tab">
		<a class="brand" href="<?php echo base_url();?>"><img
			src="<?php echo base_url().'img/logo/welcome2.gif';?>" alt="CeyAdz"
			style="padding-left: 10px" /></a>
	</div>
	<div class="row-fluid">
		<div class="span10 offset1 cont">
			<div class="span2">
				<a class="brand" href="<?php echo base_url();?>"><img
					src="<?php echo base_url().'img/logo/logo.png';?>" alt="Ceyadz"
					style="padding-left: 10px" /></a>
			</div>
			<div class="span10 ">
				<div class="span6 ">
					<!-- <h2>Ceyadz.com</h2> 
						<i>Sri Lankas best Advertising portal</i>-->
					<img src="<?php echo base_url().'img/logo/title.png';?>"
						alt="Ceyadz.com" style="padding-left: 10px" />
				</div>
				<div class="span4 pull-right">
					<h3>Free from</h3>
					<ul>
						<li>Cookies</li>
						<li>Third Party Advertisements</li>
						<li>Malware</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span10 offset1 cont">
			<!-- <div class="span2 well">
					&nbsp;
				</div> -->
			<div class="span12 well">
					<?php //echo form_button(array('class'=>'btn btn-primary','id'=>'search','rel'=>'popover'),'Advanced Search');?>
					<div class="span8" id='searchDiv'>
						<?php echo form_open('admin/search_member',array('id'=>'searchForm','class'=>'form-inline')); ?>
							<?php echo form_input(array('name'=>'searchBox','id'=>'searchBox','class'=>'span6','placeholder'=>'Search...'));?>
							<?php echo form_dropdown('searchCat',$cats,'','class="span2" id="searchCat"');?>
							<?php echo form_dropdown('searchDist',$dists,'','class="span2" id="searchDist"');?>
							<?php echo form_submit('name=sub','Search','class="btn"');?>
						<?php echo form_close(); ?>
					</div>
				<div class="span4" style="text-align: right">
					<h4>
						<a href="<?php echo base_url().'adv/add_new'?>" class="">Publish
							Your Free Ad </a>/ <a
							href="<?php echo base_url().'adv/view_all'?>" class=""> View Ads</a>
					</h4>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span10 offset1 well" style="height: 400px">Random adz goes
			here</div>
	</div>
	<div class="row-fluid">
		<div class="span10 offset1 well" id="categories">
				<?php
				echo $cat_list;
				?>
		</div>
	</div>
	<script>
			/*window.onload(function(){
				alert('window height ');alert($(window).height());
			});*/
			$(document).ready(function() {
					
				$("#search").popover({
			    	trigger: 'click',
					placement: 'bottom',
					html: true,
					content:'<div class="span12 well">'+$('#searchDiv').html()+'</div>',
					//content:$('#searchDiv').html()
				});
										
				$('#tab').click(function(){
					$('#tab').slideUp(2500);
					$('#tab').fadeOut(2500);								
			    });

			    $('.sub').each(function(){
				    $('li:gt(4)',this).hide();
			    });

			    $('.disp').click(function(e){
				    e.preventDefault();
				    if($(this).html()=='More')
				    {
				    	lis=$(this).siblings('ul');
						$('li:gt(4)',lis).fadeIn('slow');
						$(this).html('Less');
				    }
				    else{
				    	lis=$(this).siblings('ul');
						$('li:gt(4)',lis).fadeOut('slow');
						$(this).html('More');
				    }
					
				});
			    /*
				$('.sub').each().function(){
					('.sub li:gt(4)').hide();
				});
				//$('#ele').append('<li><a id="disp" href="#">More</a></li>');
				$('#disp').live('click',function(e){
					e.preventDefault();
					if($(this).html()=='More'){
				 		$('#ele li:gt(4)').fadeIn();
				 		$(this).html('Less');
				 		//$('ul').append('<a id="disp" href="#">Less</a>');
					}
					else{
						$('#ele li:gt(4)').fadeOut();
						$(this).html('More');
					}
				});*/

				

				//$('#categories dd:lt('4')').show();
			});
		</script>

	<div class="row-fluid">
		<footer>
			<div class="container span12">
				<div class="navbar">
					<div class="navbar-inner">
						<a class="btn btn-navbar" data-toggle="collapse"
							data-target="#footer_nav"> <span class="icon-th-list"></span>
						</a>
						<div class="nav-collapse collapse" id="footer_nav">
							<ul class="nav span6 offset3">
								<li><a href="<?php echo base_url().'common/about_us'?>">About Us</a></li>
								<li><a href="<?php echo base_url().'common/contact_us'?>">Contact Us</a></li>
								<li><a href="<?php echo base_url().'common/terms_of_use'?>">Terms of Use</a></li>
								<li><a href="<?php echo base_url().'common/privacy_policy'?>">Privacy Policy</a></li>
								<li><a href="<?php echo base_url().'common/site_map'?>">Site Map</a></li>
								<li><a href="<?php echo base_url().'common/help'?>">Help</a>
							</ul>
						</div>
						<div class="span4 offset4">
							<h5>Copyright &copy; 2008 - 2012 Cey Trend Incorporated</h5>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

</body>
</html>