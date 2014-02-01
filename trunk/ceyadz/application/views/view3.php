<?php include('template/header.php')?>
<div class="span10" style="margin-top:150px;border: 1px solid black">

	<button type="button" id="selCatagory">Select Catagory</button>
	<br/>
	<a href="#" id="selCatPop" rel="popover" class="btn">Please Select</a>
	<div class="dropdown">
    <a class="dropdown-toggle btn" data-toggle="dropdown" href="#" >sel sel</a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
	    <li><a tabindex="-1" href="#">Action</a></li>
	    <li><a tabindex="-1" href="#">Another action</a></li>
	    <li><a tabindex="-1" href="#">Something else here</a></li>
	    <li class="divider"></li>
	     <li class="dropdown-submenu">
                    <a tabindex="-1" href="#">More options</a>
                    <ul class="dropdown-menu">
                      <li><a tabindex="-1" href="#">Second level link</a></li>
                      <li><a tabindex="-1" href="#">Second level link</a></li>
                      <li><a tabindex="-1" href="#">Second level link</a></li>
                      <li><a tabindex="-1" href="#">Second level link</a></li>
                      <li><a tabindex="-1" href="#">Second level link</a></li>
                    </ul>
         </li>
    </ul>
</div>
	
</div>


<script type="text/javascript">
	$(document).ready(function(){
		//alert('test');
		$('#selCatPop').popover({
		    placement : 'right',
		    title : 'Advertisement Catagories',
		    //content : 'http://www.google.lk',
		    content: get_catagories,
		    html:true
		});	
		/*
		$('#selCatPop').click(function(){
			$.ajax({
				url: '<?php echo base_url()?>'+'adv/load_catagories',
				dataType: "text",
				success: function(response){
					if(response){
						//alert(response);
						//Clean the popover previous content
			            $('.popover.in').empty();    

			            //Fill in content with new AJAX data
			            $('.popover.in').html(response);
					}
				}	
			});	
		});*/

		function get_catagories()
		{
			$.ajax({
				url: '<?php echo base_url()?>'+'adv/test_ajax',
				dataType: "text",
				success: function(response){
					if(response){
						//alert(response);
						//Clean the popover previous content
			            $('.popover.in').empty();    

			            //Fill in content with new AJAX data
			            $('.popover.in').html(response);
					}
				}	
			});	
		}
		
		/*$('#selCatagory').click(function(){
			if($('#selCatagory').html()=='Selected')
				$(this).html('Select Catagory');
			else
				$(this).html('Selected');
			//alert('clicked');

		});

		$('#selCatPop').popover({
		    placement : 'right',
		    title : 'Advertisement Catagories',
		    //content : 'http://www.google.lk',
		    content: "<a href='http://www.google.lk'>Google</a>",
		    html:true
		});	

		$.ajax({
	        type: HTTP_GET,
	        url: "/myURL"

	        success: function(data)
	        {
	            //Clean the popover previous content
	            $('#selCatPop.in .popover-inner').empty();    

	            //Fill in content with new AJAX data
	            $('.popover.in .popover-inner').html(data);

	        }
	    });*/
		    /*$.ajax({
				type:
			});*/
	});
</script>
<?php //include('template/footer.php')?>