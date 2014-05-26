<?php
$page = 'index';
include 'inc/config.php';
include "templates/get_blog.php";
$gpage=0;
$admin = 0;
$els = count($lat);
$pp = ((1+$gpage)*$config['per_page']>$els?$els:(1+$gpage)*$config['per_page']);
$pag = ceil($els/$config['per_page']);
if($pag==0){
	$page = 'blank';
	$pag=1;
}
if(!isset($silent))
echo "<b>Blog:</b><br />";
for($x=0;$x<$pag;$x++){
	$gpage=$x;
	$els = count($lat);
	$pp = ((1+$gpage)*$config['per_page']>$els?$els:(1+$gpage)*$config['per_page']);
	ob_start();
	//settings
	$title = 'main';
//	include "templates/wrapper.php";
	include "templates/index.php";

	$output = ob_get_contents();
	if($x==0){
	$file = fopen("front.html","w");
	}else{
	$file = fopen("pages/".$x.".html","w");
	}
	fwrite($file,$output);
	fclose($file);
	ob_end_clean();
if(!isset($silent))
	echo " - Built page ".($x==0?'index':$x)."<br/>";
}
