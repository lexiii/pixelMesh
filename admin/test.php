<?php
// general structure of templating system

$files = array_diff(scandir("extra"), array('..', '.'));
$go="extra/about";
foreach($files as $file){
	if($file==$_SERVER['QUERY_STRING'].".php"){
		$go=$page;
	}
}
$page = $go;
//settings
include 'inc/config.php';
$title = 'main';
$type = 'php';
include "templates/wrapper.php";
