<?php
$index = 1;
// check for the inital run script.

if (file_exists('FIRST_RUN.php')) {
	include ('FIRST_RUN.php');

	die();
}

// rebuild html if something goes wrong.

if (!file_exists('front.html')) {
	$silent = 1;
	include 'make_blog.php';

	include 'make_blog.php';
	// run twice just to make sure.
}
	include 'inc/config.php';
$logg = !$config['use_password'];
// load 'pages' if url ends in ?number and that page exists. otherwise load the front page
if($logg){
	if (isset($_SERVER['QUERY_STRING'])) { 
		$page = $_SERVER['QUERY_STRING'];
		if (is_numeric($page)) {
			$page = "pages/" . $page;
			if (!file_exists($page . ".html")) {
				$page = "front";
			}
		}
		else {
			$page = "front";
		}
	} else {
		$page = "front";
	}


	$title = "blah";//$config['title'];
	$theme = $config['root']."themes/".$config['theme']."/";
	include $theme."index.php";
} else {
	$page = "../login";
	$title = "blah";//$config['title'];
	include "themes/".$config['theme']."/"."login.php";
	//include "templates/wrapper.php";
}
