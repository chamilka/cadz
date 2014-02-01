<?php include('template/header.php');?>

<div class="row-fluid" style="margin-top:110px; padding-top:0px">	
	<div class="container-fluid span2 well">
		<?php //echo $cat_list;?>
 		<ul class="nav nav-list">
		    <li class=""><a href="#"><span style="margin-right:5px"><i><img src="<?php echo base_url().'img/ico/ceyIcons/car.png'?>"/></i></span>Vehicles</a></li>
		    <li class=""><a href="#"><span style="margin-right:5px"><i><img src="<?php echo base_url().'img/ico/ceyIcons/electronic1.png'?>"/></i></span>Electronics</a></li>
		    <li class=""><a href="#"><span style="margin-right:5px"><i><img src="<?php echo base_url().'img/ico/ceyIcons/clothing3.png'?>"/></i></span>Fashion</a></li>
		    <li class=""><a href="#"><span style="margin-right:5px"><i><img src="<?php echo base_url().'img/ico/ceyIcons/home&garden.png'?>"/></i></span>Home & Outdoor</a></li>
		    <li class=""><a href="#"><span style="margin-right:5px"><i><img src="<?php echo base_url().'img/ico/ceyIcons/wedding2.png'?>"/></i></span>Wedding</a></li>
		    <li class=""><a href="#"><span style="margin-right:5px"><i><img src="<?php echo base_url().'img/ico/ceyIcons/sport1.png'?>"/></i></span>Sporting</a></li>
		    <li class=""><a href="#"><span style="margin-right:5px"><i><img src="<?php echo base_url().'img/ico/ceyIcons/jobs.png'?>"/></i></span>Jobs</a></li>
		    <li class=""><a href="#"><span style="margin-right:5px"><i><img src="<?php echo base_url().'img/ico/ceyIcons/wedding2.png'?>"/></i></span>Matrimonial</a></li>
  		</ul>
	</div>
	<div class="container-fluid span10">		
		<?php echo $this->load->view($page);?>
	</div>
</div>

<?php include('template/footer.php');?>

