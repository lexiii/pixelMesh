<?php if(!isset($index)) die(); ?>
<?php if(!(isset($logg)&&$logg==0)){ ?>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	</div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	  <ul class="nav navbar-nav">
	  <li class="active"><a href="<?php echo $config['path']; ?>"><?php echo $config['site_title']; ?></a></li>
<?php 
	foreach($config['admin_pages'] as $pg){ 
		echo '<li><a href="'.$config['path'].'admin/?p='.$pg.'">'.ucwords($pg).'</a></li>';
	}
	//if($config['use_password'])
		echo '<li><a href="'.$config['path'].'admin/?p=password">Password Protection</a></li>';
?>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
<?php 

if(isset($_SESSION['username'])&&$_SESSION['username']){
	echo '<li><a href="'.$config['path'].'admin/">'.$_SESSION['username'].'</a></li>';
	echo '<li><a href="'.$config['path'].'admin/?logout=1">Log out</a></li>';
} 
?>
	  </ul>
	</div>
  </div>
</nav>
<?php } else {
echo "<br/><br/>";
}?>

<br />
<br />
<br />
<br />
