<?php
// this is the structure of a post
echo  '<div class="panel panel-default"><div class="panel-heading">'.$lat[$i][1].'</div>';
if(isset($single)&&$single==1){//links to image
	echo "<center><a href='res/".$lat[$i][0]."'><img src='".$config['root']."res/".$lat[$i][0]."' class='gal'/></a></center></div><br/>";
}else{ //links to single page
	echo "<center><a href='".$config['root']."page.php?".$i."'><img src='".$config['root']."res/".$lat[$i][0]."' class='gal'/></a></center></div><br/>";
}
?>
