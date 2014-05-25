<!DOCTYPE HTML>
<html>
<head>
<title>
<?php echo $title; ?>
</title>
<?php include "head.php"; ?>
</head>
<body>
<?php 
include "header.php";
?>
<div class='container main'>
<?php include "templates/".$page.".php"; ?>
</div>
<?php
include "footer.php";
include "scripts.php";
?>
</body>
</html>
