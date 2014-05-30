<!DOCTYPE HTML>
<html>
<head>
<title>
<?php echo $title; ?>
</title>
<?php include $config['root']."head.php"; ?>
</head>
<body>
<?php 
include $config['root']."header.php";
?>
<div class='container main'>
<?php 
if(isset($admin)&&$admin==1){
	include $config['root']."admin/".$page.".php";
}else{
if(isset($type)){
	include $config['root'].$page.".".$type; 
}else{
	include $config['root']."templates/".$page.".php"; 
}
}

?>
</div>
<?php
include $config['root']."footer.php";
include $config['root']."scripts.php";
?>
</body>
</html>
