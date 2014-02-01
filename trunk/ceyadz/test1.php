	<?php 
		$path=createDirectory("img/advertisements/temp/");
		echo $path;
		
		?>
		<?php
		function createDirectory($path)
		{
			$temp_path=$path.rand(100000,999999)."/";
			if(!is_dir($temp_path)){
				mkdir($temp_path);
				return $temp_path;
			}
			else{
				while(is_dir($temp_path))
				{
					$temp_path=$path.rand(100000,999999)."/";
				}
				mkdir($temp_path);
				return $temp_path;
			}
		}
		
	?>
	