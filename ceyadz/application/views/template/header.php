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
<link rel="stylesheet"
	href="<?php // echo base_url().'css/galleriffic/basic.css'?>" />
<link rel="stylesheet"
	href="<?php // echo base_url().'css/galleriffic/galleriffic-2.css'?>" />
<link rel="stylesheet"
	href="<?php  echo base_url().'css/jquery.ad-gallery.css'?>" />
<link rel="stylesheet"
	href="<?php  echo base_url().'css/dropzone.css'?>" />
<link rel="stylesheet" href="<?php  echo base_url().'css/basic.css'?>" />
<link rel="stylesheet" href="<?php  echo base_url().'css/style.css'?>" />


<script src="<?php echo base_url().'js/jquery-1.8.3.min.js'?>"></script>
<script src="<?php echo base_url().'js/bootstrap.js'?>"></script>
<script src="<?php echo base_url().'js/jquery.autosize-min.js'?>"></script>
<script src="<?php echo base_url().'js/jquery.form.js'?>"></script>
<script src="<?php echo base_url().'js/jquery.validate.min.js'?>"></script>
<script type="text/javascript"
	src="<?php //echo base_url().'js/dropzone.js'?>"></script>

<!-- <script src="<?php //echo base_url().'js/galleriffic/jquery.galleriffic.js' ?>"></script>
	<script src="<?php //echo base_url().'js/galleriffic/jquery.opacityrollover.js' ?>"></script>-->

<script type="text/javascript"
	src="<?php echo base_url().'js/jquery.ad-gallery.js'?>"></script>


<style type="text/css">
.preimage {
	width: 100px;
	border: solid 1px #dedede;
	padding: 10px;
}

#category,#sub-category,#district,#area {
	column-count: 3;
	-moz-column-count: 3;
	-webkit-column-count: 3;
	column-width: auto;
	-moz-column-width: auto; /* Firefox */
	-webkit-column-width: auto; /* Safari and Chrome */
	column-gap: 0;
	-moz-column-gap: 0;
	-webkit-column-gap: 0;
	width: 100%; /*your fixed width*/
	/*  height: 200px; /*your fixed height*/
}
</style>



</head>
<body>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="navbar navbar-fixed-top">
				<div class="navbar-inner">
					<a class="btn btn-navbar" data-toggle="collapse"
						data-target="#header_nav"> <span class="icon-th-list"></span>
					</a> <a class="brand" href="<?php echo base_url();?>"><img
						src="<?php echo base_url().'img/logo/logo.png';?>" alt="CeyAdz"
						style="padding-left: 10px" /></a>
					<div class="nav-collapse collapse" id="header_nav"
						style="padding-top: 50px">
						<ul class="nav">
							<li><a href="<?php echo base_url()?>">Home</a></li>
							<li><a href="<?php echo base_url().'adv/view_all'?>" class="">View
									All Advertisements</a></li>
							<li><a href="<?php echo base_url().'adv/add_new'?>" class="">Publish
									Your Advertisement</a></li>
							<li><a href="#" id="categoryPop" rel="popover">Categories</a></li>
						</ul>
						<form class="form-horizontal navbar-search" method="get"
							action="#">
							<div class="input-append">
								<input type="search" class="" name="q" autocomplete="off"
									placeholder="Search" tabindex="1">
								<div class="btn-group">
									<button class="btn dropdown-toggle" data-toggle="dropdown">
										Category <span class="caret"></span>
									</button>
									<ul class="dropdown-menu">...
									</ul>
								</div>
								<div class="btn-group">
									<button class="btn dropdown-toggle" data-toggle="dropdown">
										Area <span class="caret"></span>
									</button>
									<ul class="dropdown-menu">...
									</ul>
								</div>
								<button type="submit" class="btn">
									<i class="icon-search icon-large"></i>
								</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#categoryPop').popover({
			    placement : 'bottom',
			    title : 'Advertisement Catagories',
			    //content : 'http://www.google.lk',
			    content: getContent,
			    html:true
			});		

			$('.navbar li a').on('click', function() {
			    $(this).parent().parent().find('.active').removeClass('active');
			    $(this).parent().addClass('active').css('font-weight', 'bold');
			});
		});
		
			function getContent()
			{
			 	/*$.ajax({
				  type: "POST",
				  url: "/index.php/ajax/username_taken",
				  data: dataString,
				  success: function(msg) 
				        {
				   $("#status").html(msg);
				  }
				  });
				  });  */
				 // alert('test');
			}
		
	
		
	</script>