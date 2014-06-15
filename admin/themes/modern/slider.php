<div class="slider-wrapper theme-default">
	<div class="ribbon"></div>
<div id="slider" class="nivoSlider">
<?php
if($config['slider_get']=='choose'){
foreach($config['slider_pics'] as $i)
		echo '<img src="'.$config['path'].'res/'.$lat[$i][0].'" alt="'.$lat[$i][1].'" />';
}else{
$slider_images = ($config['slider_images']<count($lat)?$config['slider_images']:count($lat));
	for($l=$gpage*$config['per_page'];$l<$slider_images;$l++){
		if($config['slider_get']=='newest'){
			$i = count($lat)-$l-1;
		}else{
			$i = $l;
		}
		echo '<img src="'.$config['path'].'res/'.$lat[$i][0].'" alt="'.$lat[$i][1].'" />';
	}
}
?>
</div>
</div>
