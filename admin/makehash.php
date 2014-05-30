<?php
include('admin_check.php');
$action = (isset($_GET['action'])?$_GET['action']:'make');
$url2 = "../inc/urls.txt"; // the url url (url^2)
if(file_exists($url2))
	$urls = json_decode(file_get_contents($url2));
else
	$urls=[];

if($action == 'make'){
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomString = '';
	for ($i = 0; $i < 10; $i++) {
		$randomString .= $characters[rand(0, strlen($characters) - 1)];
	}
	array_push($urls,md5($randomString));
}else if($action == 'remove'){
	if(isset($_GET['hash'])){
		$hash = $_GET['hash'];	
		if($hash == 'all'){
			$urls = [];
		}else{
			$pos = array_search($hash, $urls);
			if($pos !== FALSE){
				unset($urls[$pos]);
				$urls = array_values($urls);
			}
		}
	}
}else if($action == "uremove"){
	include('../inc/users.php');
	$users2 = array_keys($users);
	if($_GET['user']){
		$pos = array_search($_GET['user'], $users2);
		if($pos !== FALSE){
			unset($users[$users2[$pos]]);
			$key = array_keys($users);
			$output = "<?php \n";
			for($i=0;$i<count($users);$i++){
				$output .= '$users["'.$key[$i].'"] = "'.$users[$key[$i]].'";'."\n";
			}
			if($users == [])
				$output = "<?php \n".'$users=[];';
			file_put_contents('../inc/users.php', $output);
		}
	}
}

file_put_contents($url2, json_encode($urls));
header( 'Location: index.php?p=password' ) ;

