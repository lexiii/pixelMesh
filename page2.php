<?php
if(!isset($index)) die(); 
// general structure of templating system
$page = "pages/".(($_SERVER['QUERY_STRING']!="")?$_SERVER['QUERY_STRING']:"1");

$files = array_diff(scandir("pages"), array('..', '.'));
$go="pages/1";
foreach($files as $file){
	if($file==$_SERVER['QUERY_STRING'].".php"){
		$go=$page;
	}
}
$page = $go;
$type = "html";
//settings
include 'inc/config.php';
$title = 'main';
include "templates/wrapper.php";
