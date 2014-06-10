<div class="panel panel-default">
  <div class="panel-body">
<?php
if(!isset($index)) die(); 
$action = 'message';
if (isset($_SERVER['QUERY_STRING'])) { 
	$hash = $_SERVER['QUERY_STRING'];
	if($hash == 'login')
		$action = 'login';
	$url2 = "inc/urls.txt"; // the url url (url^2)
	if(file_exists($url2)){
		$urls = json_decode(file_get_contents($url2));
		$pos = array_search($hash, $urls);
		if($pos !== FALSE){
			$action = 'reg';
		}
	}
}
if($action == 'reg'){
?>

<div class="row">
  <div class="col-md-4">
			<form role="form" action='login-val.php' method='post'>
			<input type='hidden' name='hash' value='<?php echo $hash; ?>' />
				<div class="form-group">
					 <label for="username">Username</label><input class="form-control" id="username" name='username' type="text" />
				</div>
				<div class="form-group">
					 <label for="password1">Password</label><input class="form-control" name="password1" id="password1" type="password" />
				</div>
				<div class="form-group">
					 <label for="password2">Password <small>(again)</small></label><input class="form-control" name='password2' id="password2" type="password" />
				</div>
				 <button type="submit" class="btn btn-info">Register!</button>
			</form>
</div>
  <div class="col-md-3">
<p class='lead'>Register</p>
<p>blah blah blah</p>
</div>
  <div class="col-md-3 pull-right"> <img src='<?php echo $config['path']; ?>img/logo.png' class='img-responsive' style='opacity:0.05;'/> </div>
</div>


<?php
}else if($action == 'login'){
?>
<div class="row">
  <div class="col-md-4">
<h2 class='text-center'>
<i class="fa fa-question-circle fa-3x"></i>
</h2>
<p class='text-center'>This blog is only accessable to people the owner allows in.</p>
<p class='text-center'>Please message the owner to gain access</p>
</div>
  <div class="col-md-4">
			<form role="form">
				<div class="form-group">
					 <label for="username">Username</label><input class="form-control" id="username" name='username' type="text" />
				</div>
				<div class="form-group">
					 <label for="password1">Password</label><input class="form-control" name="password1" id="password1" type="password" />
				</div>
				 <button type="submit" class="btn btn-info">Login</button>
			</form>
</div>
  <div class="col-md-3 pull-right"> <img src='<?php echo $config['path']; ?>img/logo.png' class='img-responsive' style='opacity:0.05;'/> </div>
</div>
<?php
}else{
?>
<div class="row">
  <div class="col-md-9">
<h2 class='text-center'>
<i class="fa fa-lock fa-3x"></i>
</h2>
<h2 class='text-center'>This gallery is private</h2>
<br />
<p class='text-center'><a href='?login'>I have an account.</a></p>
</div>
  <div class="col-md-3 pull-right"> <img src='<?php echo $config['path']; ?>img/logo.png' class='img-responsive' style='opacity:0.05;'/> </div>
</div>
<?php
}
?>
  </div>
</div>
