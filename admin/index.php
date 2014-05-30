<?php
// general structure of templating system
$index = 1;
include '../inc/config.php';
include 'creds.php';
if(isset($_SESSION['username'])&&$_SESSION['username']){
	$admin=1;
	$page = "pages/".(isset($_GET['p'])?$_GET['p']:"dash");
}else{
	$admin=0;
	$page = "../admin/login";
}
if(isset($error))
	echo "incorrect";
//settings
$title = 'main';
include "../templates/wrapper.php";
