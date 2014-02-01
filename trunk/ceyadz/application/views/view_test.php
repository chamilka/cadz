<?php include('template/header.php')?>
<?php
  	$img_ext=".png";
	$img_path="http://localhost/thechameleoneye/images/gallery/wildlife/";
	$num_img=3;
	?>
<div class="container" style="padding-top:200px">
    <!-- Button to trigger modal -->
    <a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>
     
    <!-- Modal -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Modal header</h3>
    </div>
    <div class="modal-body">
    <p>One fine body…</p>
        <div id="myCarousel" class="carousel slide">
    <ol class="carousel-indicators">
    <?php
						for($i=1;$i<=$num_img;$i++)
						{
							echo "<li data-target='#myCarousel' data-slide-to-'".$i."'>";
							//echo "<a href='".$img_path.$i.$img_ext."'>"; //$img_path."thumbs/t".$i.$img_ext
							echo "<img src='".$img_path."thumbs/t".$i.$img_ext."' ";
							echo "title='A title for image' ";
							echo "alt='This is a nice, and incredibly descriptive, description of the image 7.jpg' ";
							//echo "class='image0'";
							echo "/>";
							//echo "</a>";
							echo "</li>";
							
						}
					
	?>
    </ol>
    <!-- Carousel items -->
    <div class="carousel-inner">
    <div class="active item">…</div>
    <div class="item">…</div>
    <div class="item">…</div>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
    </div>
    <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
    </div>
    </div>
    </div>
<?php include('template/footer.php')?>
 