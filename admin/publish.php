<?php 
$admin = (isset($_SESSION['username'])&&$_SESSION['username']?1:0);
//if($admin!=1) die();
if(!isset($_POST['file']))
	die('must include a file');
rename('tmp/'.$_POST['file'], '../res/'.$_POST['file'])or die('could not move file');
$db = "../inc/db.txt";
if(file_exists($db))
	$lat = json_decode(file_get_contents($db));
else
	$lat = [];
array_push($lat,[$_POST['file'],$_POST['title'],""]);
file_put_contents($db, json_encode($lat));
$silent = 1;
include '../make_blog.php';
header('Location:  ' . $_POST['path']."../admin/?p=upload");
