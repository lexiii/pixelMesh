<?php if(!isset($index)) die(); ?>
<div class='container'>
<div class='jumbotron <?php echo (isset($logg)&&$logg==0?"":"topbar"); ?>'>
<h1><a href="<?php echo $config['path']; ?>" class='site_title'><?php echo $config['site_title']; ?></a></h1>
<p><?php echo $config['tagline']; ?></p>
</div>
<?php if(!(isset($logg)&&$logg==0)){ ?>
<nav class="navbar navbar-default titlebar" role="navigation">
  <div class="container-fluid">
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
	  <li class="active"><a href="<?php echo $config['path']; ?>">Home</a></li>
<?php 
if(!isset($admin)||$admin == 0){
	foreach($config['pages'] as $pg){ 
		echo '<li><a href="'.$config['path']."pages.php?".$pg.'">'.ucwords($pg).'</a></li>';
	}
}else{
	foreach($config['admin_pages'] as $pg){ 
		echo '<li><a href="'.$config['path'].'admin/?p='.$pg.'">'.ucwords($pg).'</a></li>';
	}
	//if($config['use_password'])
		echo '<li><a href="'.$config['path'].'admin/?p=password">Password Protection</a></li>';
}
?>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
<?php 

if(isset($_SESSION['username'])&&$_SESSION['username']){
	echo '<li><a href="'.$config['path'].'admin/">'.$_SESSION['username'].'</a></li>';
	echo '<li><a href="'.$config['path'].'admin/?logout=1">Log out</a></li>';
}else{
	foreach($config['social_top'] as $soc){
		echo '<a href="'.$config[$soc].'" class="btn btn-social-icon btn-'.$soc.'">';
		echo   '<i class="fa fa-'.$soc.'"></i></a>  ';
	}
	if($config['lightswitch'])
		echo '<a  class="btn btn-social-icon btn-reddit lightswitch"><i class="fa fa-lightbulb-o"></i></a>  ';
}
foreach($config['links'] as $pg){ 
	echo '<li><a href="'.$pg[1].'">'.$pg[0].'</a></li>';
} 
?>
	  </ul>
	</div>
  </div>
</nav>
<?php } else {
echo "<br/><br/>";
}?>

</div>
