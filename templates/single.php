<?php
// this generates a single page
include 'templates/get_blog.php';
$url = explode('&', $pag, 2); 
$pag =$url[0]; 
$pag = (is_numeric($pag)?$pag:1);//input is number
$i = $pag;
$single=1;
$single_meta = "<b>Perma-link: </b>".$config['absolute_url']."page.php?".$i."&";
include 'templates/post.php';
?>

