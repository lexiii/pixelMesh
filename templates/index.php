<?php
//VIEW
if(count($lat)==0){
	include $config['root']."templates/blank.php";
}else{
echo "<p class='text-right'><small>Showing ".$gpage*$config['per_page']." - ".$pp." of ".$els." images. (page ".($gpage+1)." of ".$pag." )</small></p><br/>";
for($l=$gpage*$config['per_page'];$l<$pp;$l++){
	$i = count($lat)-$l-1;
	include $config['root'].'templates/post.php';
}

//back and next
echo '<ul class="pager">';
if($gpage==0){
	echo "<li class='previous disabled'><a>&larr;</a>  ";
}else if($gpage==1){
	echo "<li class='previous'><a href='".$config['path']."'>&larr;</a>  ";
}else{
	echo "<li class='previous'><a href='".$config['path']."?".($gpage-1)."'>&larr;</a>  ";
}
echo '</li>';
if($gpage == ($pag-1)){
	echo "<li class='next disabled'><a>&rarr;</a>  ";
} else {
	echo "<li class='next'><a href='".$config['path']."?".($gpage+1)."'>&rarr;</a>  ";
}
echo '</li>';
}
?>
