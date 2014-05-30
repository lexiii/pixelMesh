<?php
if(!isset($index)) die();
$admin = (isset($_SESSION['username'])&&$_SESSION['username']?1:0);
if(!$admin) die();
if(file_exists($config['root']."inc/users.php"))
	include ($config['root']."inc/users.php");
else
	$users = [];
$url2 = $config['root']."inc/urls.txt"; // the url url (url^2)
if(file_exists($url2))
	$urls = json_decode(file_get_contents($url2));
else
	$urls=[];
?>
<br />
<br />
<br />
<div class="panel panel-default">
  <div class="panel-heading">Password Protection</div>
  <div class="panel-body">
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-4">
<p class='lead'>Users:</p>
<div class='list-group'>
<?php 
if(!isset($users)||count($users)==0){
	echo "no users";
}else{
	$keys = array_keys($users);
foreach($keys as $user){
	echo '<div class="list-group-item">'.$user.'<a href="makehash.php?action=uremove&user='.$user.'" type="button" class="btn btn-danger btn-xs pull-right"><i class="fa fa-ban"></i> Remove</a></div>';
}
}
?>
</div>
</div>
  <div class="col-md-1"></div>
  <div class="col-md-5">
<p class='lead'>Generated URLS:</p>
<div class='list-group'>
<?php 
if(count($urls)==0){
	echo "no URLS";
}else{
foreach($urls as $url){
	echo '<div class="list-group-item"><a><code>'.$url.'</code></a><a href="makehash.php?action=remove&hash='.$url.'" type="button" class="btn btn-danger btn-xs pull-right"><i class="fa fa-ban"></i> Revoke</a></div>';
}
}
?>
</div>
<a href='makehash.php?action=make' class='btn btn-primary'>Generate new user URL</a>
<a href='makehash.php?action=remove&hash=all' class='btn btn-danger pull-right'>Delete all hashes</a>
</div>
</div>
<br />
  </div>
  <div class="panel-footer">
<p class='lead text-right'>"Use password" must be on for these settings to have an effect</p>
</div>
</div>
<br />
<br />
<br />
<br />
