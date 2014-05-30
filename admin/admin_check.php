<?php
include 'creds.php';
$admin = (isset($_SESSION['username'])&&$_SESSION['username']?1:0);
if(!$admin) die();
