<?php
//if(!isset($index)) die();
session_start();


if(isset($_GET['logout'])) {
    $_SESSION['username'] = '';
    header('Location:  ' . $_SERVER['PHP_SELF']);
}

if(isset($_POST['username'])) {
    if($config['admin'][$_POST['username']] == md5($config['salt'].$_POST['password'])) {
        $_SESSION['username'] = $_POST['username'];
    }else {
		$error = 1;
    }
}
?>
