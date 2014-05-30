<?php
$admin = (isset($_SESSION['username'])&&$_SESSION['username']?1:0);
if($admin!=1) die();
//echo $_POST['file']."<br />".$_POST['content'];
file_put_contents("../extra/".$_POST['file'].".php", $_POST['content']);
    header('Location: ./?p=edit&e='.$_POST['file']);
?>
