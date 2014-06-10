<?php
if(!isset($index)) die(); 
$pag = (($_SERVER['QUERY_STRING']!="")?$_SERVER['QUERY_STRING']:0);
$page = 'single';
//settings
include 'inc/config.php';
$title = 'main';
include "templates/wrapper.php";

