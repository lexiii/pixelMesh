<?php
//VIEW
echo "<p class='text-right'><small>Showing ".$gpage*$config['per_page']." - ".$pp." of ".$els." images</small></p><br/>";
for($i=$gpage*$config['per_page'];$i<$pp;$i++){
	include 'templates/post.php';
}

//back and next
echo '<ul class="pager">';
if($gpage==0){
	echo "<li class='previous disabled'><a href='#'>&larr;</a>  ";
}else if($gpage==1){
	echo "<li class='previous'><a href='".$config['root']."index.html'>&larr;</a>  ";
}else{
	echo "<li class='previous'><a href='".$config['root']."pages/?".($gpage-1)."'>&larr;</a>  ";
}
echo '</li><li class="next">';
echo "<a href='".$config['root']."pages/?".($gpage+1)."'>&rarr;</a>  ";
echo '</li>';
?>
