<?php
// this is the structure of a post
echo  '<div class="panel panel-default"><div class="panel-heading">'.$lat[$i][1].'</div>';
if(isset($single)&&$single==1){//links to image
	echo "<center><a href='res/".$lat[$i][0]."'><img src='".$config['path']."res/".$lat[$i][0]."' class='gal'/></a></center>";
}else{ //links to single page
	echo "<center><a href='".$config['path']."page.php?".$i."'><img src='".$config['path']."res/".$lat[$i][0]."' class='gal'/></a></center>";
}
echo "<p class='desc text-right'></p>";
if(isset($single_meta)){
	echo "<p class='meta text-right'>".$single_meta."</p>";
}
echo "</div><br/>";
?>
