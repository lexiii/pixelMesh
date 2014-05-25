<?php
$page = 'index';
include 'inc/config.php';
include "templates/get_blog.php";
$gpage=0;
$els = count($lat);
$pp = ((1+$gpage)*$config['per_page']>$els?$els:(1+$gpage)*$config['per_page']);
$pag = ceil($els/$config['per_page']);
for($x=0;$x<$pag;$x++){
	$gpage=$x;
	$els = count($lat);
	$pp = ((1+$gpage)*$config['per_page']>$els?$els:(1+$gpage)*$config['per_page']);
	ob_start();
	//settings
	$title = 'main';
	include "templates/wrapper.php";

	$output = ob_get_contents();
	if($x==0){
	$file = fopen("index.html","w");
	}else{
	$file = fopen("pages/".$x.".html","w");
	}
	fwrite($file,$output);
	fclose($file);
	ob_end_clean();
	echo " - Built page ".$x."<br/>";
}
echo "<a href='".$config['root']."'>Return home</a>";
