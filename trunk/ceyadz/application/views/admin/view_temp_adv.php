<?php //echo print_r($advs);?>
<html>
	<head>
		<title>Manage new advertisements</title>
		<link rel="stylesheet" href="<?php echo base_url().'css/bootstrap.css'?>" />
		<link rel="stylesheet" href="<?php echo base_url().'css/bootstrap-responsive.css'?>" />
	
	</head>
	<body>
		<h3> Manage New Advertisements</h3>
		<div>
			Filter by: 
			Date: <?php echo form_dropdown('fdate',array(''=>'None','today'=>'Today','yesterday'=>'Yesterday','2days'=>'Last 2days','5days'=>'Last 5days'))?>
		</div>
		<table class="table table-striped">
			<tr>
				<th style="text-align:center">ID</th>
				<th style="text-align:center">Title</th>
				<th style="text-align:center">Catagory</th>
				<th style="text-align:center">Price</th>
				<th style="text-align:center; width:80px">Date</th>
				<th style="text-align:center; width:50px">Status</th>
				<th style="text-align:center; width:50px">&nbsp;</th>
				<th style="text-align:center; width:50px">&nbsp;</th>
				<th style="text-align:center; width:50px">&nbsp;</th>
			</tr>
			<?php 
				foreach($advs as $adv)
				{
			?>
			<tr>
				<td><a href=<?php echo "view_temp_adv?id=".$adv['adv_id']?>><?php echo $adv['adv_id']?></a></td>
				<td><?php echo $adv['adv_title'] ?></td>
				<td><?php echo $adv['adv_catagory'] ?></td>
				<td style="text-align:right"><?php echo $adv['adv_price'] ?></td>
				<td style="text-align:center"><?php echo $adv['adv_sub_date'] ?></td>
				<td style="text-align:center"><?php echo $adv['adv_status'] ?></td>
				<!-- <td><?php echo form_button(array('id'=>'view_'.$adv['adv_id'],'class'=>'button'),'view')?></td> -->
				<td><a class="btn" href=<?php echo "view_temp_adv?id=".$adv['adv_id']?>>View</a></td>
				<td><a class="btn btn-primary" href=<?php echo "publish_adv?id=".$adv['adv_id']?>>Publish</a></td>
				<td><a class="btn btn-danger" href=<?php echo "reject_adv?id=".$adv['adv_id']?>>Reject</a></td>				
			</tr>
			<?php  
				}
			?>
		</table>
	</body>
</html>