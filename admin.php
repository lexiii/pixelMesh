<?php
// general structure of templating system
$logged = 1;
if($logged==1){
	$admin=1;
	$page = (isset($_GET['p'])?$_GET['p']:"dash");
}else{
	$admin=0;
	$page = "login";
}
//settings
include 'inc/config.php';
$title = 'main';
include "templates/wrapper.php";
