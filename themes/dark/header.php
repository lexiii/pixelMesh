<?php if(!isset($index)) die(); ?>
<?php if(!(isset($logg)&&$logg==0)){ ?>
<nav class="navbar navbar-default navbar-fixed-top titlebar" role="navigation">
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

<a href="<?php echo $config['path']; ?>" class='site_title'></a></h1>
	  <li class="active"><a href="<?php echo $config['path']; ?>"><?php echo $config['site_title']; ?></a></li>
<?php 
foreach($config['pages'] as $pg){ 
	echo '<li><a href="'.$config['path']."pages.php?".$pg.'">'.ucwords($pg).'</a></li>';
}
?>
	  </ul>
	  <ul class="nav navbar-nav navbar-right righttop">
<?php 
foreach($config['social_top'] as $soc){
	echo '<a href="'.$config[$soc].'" class="btn btn-social-icon btn-'.$soc.'">';
	echo   '<i class="fa fa-'.$soc.'"></i></a>  ';
}
}
foreach($config['links'] as $pg){ 
	echo '<li><a href="'.$pg[1].'">'.$pg[0].'</a></li>';
} 
?>
	  </ul>
	</div>
  </div>
</nav>

<br />
<br />
<br />
<br />
