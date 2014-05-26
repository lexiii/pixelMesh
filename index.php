<?php
// general structure of templating system
//$page = (isset($_GET['p'])?$_GET['p']:"front");
if(!file_exists('front.html')){
	$silent = 1;
	include 'make_blog.php';
}
if(isset($_SERVER['QUERY_STRING'])){
	$page = $_SERVER['QUERY_STRING'];
	if(is_numeric($page)){
		$page = "pages/".$page;
		if(!file_exists($page.".html")){
			$page = "front";
		}	
	}else{
		$page = "front";
	}
}else{
	$page = "front";
}
//settings
include 'inc/config.php';
$title = 'main';
include "templates/wrapper2.php";
