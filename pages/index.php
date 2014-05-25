<?php
$page = (isset($_SERVER['QUERY_STRING'])?$_SERVER['QUERY_STRING']:1);
$page = (is_numeric($page)?$page:1);
$page = (file_exists($page.".html")?$page:1);
include $page.".html";
?>
