<?php
//VIEW
echo "<p class='text-right'><small>Showing ".$gpage*$config['per_page']." - ".$pp." of ".$els." images. (page ".($gpage+1)." of ".$pag." )</small></p><br/>";
for($i=$gpage*$config['per_page'];$i<$pp;$i++){
	include 'templates/post.php';
}

//back and next
echo '<ul class="pager">';
if($gpage==0){
	echo "<li class='previous disabled'><a>&larr;</a>  ";
}else if($gpage==1){
	echo "<li class='previous'><a href='".$config['root']."'>&larr;</a>  ";
}else{
	echo "<li class='previous'><a href='".$config['root']."?".($gpage-1)."'>&larr;</a>  ";
}
echo '</li>';
if($gpage == ($pag-1)){
	echo "<li class='next disabled'><a>&rarr;</a>  ";
} else {
	echo "<li class='next'><a href='".$config['root']."?".($gpage+1)."'>&rarr;</a>  ";
}
echo '</li>';
?>
