<!DOCTYPE HTML>
<html>
<head>
<title>
<?php echo $title; ?>
</title>
<?php include $theme."head.php"; ?>
</head>
<body>
<?php 
include $theme."header.php";
?>
<div class='container main'>
<?php 
	include $page.(isset($type)?".$type":".html"); 
?>
</div>
<?php
include $theme."footer.php";
include $theme."scripts.php";
include "scripts.php";
?>
</body>
</html>
