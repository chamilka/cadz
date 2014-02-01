<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" href="<?php echo base_url().'css/bootstrap.css'?>" />
		<link rel="stylesheet" href="<?php echo base_url().'css/bootstrap-responsive.css'?>" />
		<title><?php echo $title;?></title>
		<style>
			#error_msg
			{
				padding-top:50px;
			}
			p
			{
				padding-left:20px;
			}
			
			
		</style>
	</head>
	<body>
		<div class="container-fluid span8 offset2" id="error_msg">
			<div class="alert alert-error">
				<?php echo $message; ?>
			</div>
			<div class="container span4">
				<a href="<?php echo base_url();?>"><img src="<?php echo base_url().'img/logo/logo.png'?>" alt="CeyAdz"></a>
				<div style="vertical-align:bottom; padding-left:80px">To satisfy all your advertising needs.</div>
			</div>
		</div>
	</body>
</html>

