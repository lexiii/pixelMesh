<?php
// general structure of templating system
$index = 1;
include '../inc/config.php';
include 'creds.php';
if(isset($_SESSION['username'])&&$_SESSION['username']){
	$admin=1;
	$pag = (isset($_GET['p'])?$_GET['p']:"dash");
	if($pag=='dash'){
		if(file_exists("themes/".$config['admin_theme']."/dash.php"))
			$page = "themes/".$config['admin_theme']."/$pag";
		else
			$page = "pages/".$pag;
	}else{
		$page = "pages/".$pag;
	}
}else{
	$admin=0;
	$page = "../admin/login";
}
if(isset($error))
	echo "incorrect";
//settings
$title = 'Admin > '.ucwords((isset($_GET['p'])?$_GET['p']:"dash"))."  |   ".$config['site_title'];
$theme = "themes/".$config['admin_theme'];
include $theme."/wrapper.php";
