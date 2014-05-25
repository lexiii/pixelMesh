<?php
// general structure of templating system
$page = (isset($_GET['p'])?$_GET['p']:"index");
if($page=='index'){
	include "get_blog.php";
}
$make = 1;
if($make==1){
ob_start();
}
//settings
include 'inc/config.php';
$title = 'main';
include "templates/wrapper.php";

if($make==1){
	$output = ob_get_contents();
	$file = fopen($page.".html","w");
	fwrite($file,$output);
	fclose($file);
}
