<!DOCTYPE HTML>
<html>
<head>
<title>
<?php echo $title; ?>
</title>
<?php 
$theme = "admin/$theme/";
include $config['root'].$theme."head.php"; ?>
</head>
<body>
<div class="row">
<?php 
include $config['root'].$theme."header.php";
?>
  <div class="col-md-9 pull-left">
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
include $config['root'].$theme."footer.php";
include $config['root'].$theme."scripts.php";
?>
</body>
</html>
