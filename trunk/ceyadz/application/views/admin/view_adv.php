<?php //echo print_r($advs);?>
<html>
	<head>
		<title>Manage new advertisements</title>
		<link rel="stylesheet" href="<?php echo base_url().'css/bootstrap.css'?>" />
		<link rel="stylesheet" href="<?php echo base_url().'css/bootstrap-responsive.css'?>" />
	
	</head>
	<body>
		<h3><?php echo $adv_type;?></h3>
		<table class="table table-striped">
			<tr>
				<td>Title</td>
			</tr>
			<tr style="left-margin:50px;padding-bottom:50px">
				<td><?php echo $adv['adv_title'];?></td>
			</tr>
			<tr>
				<td>Short Description</td>
			</tr>
			<tr>
				<td><?php echo $adv['adv_short_desc'];?></td>
			</tr>
		</table>
	</body>
</html>