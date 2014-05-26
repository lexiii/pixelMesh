<div class='container'>
<div class='jumbotron topbar'>
<h1><a href="<?php echo $config['root']; ?>" class='site_title'><?php echo $config['site_title']; ?></a></h1>
<p><?php echo $config['tagline']; ?></p>
</div>

<nav class="navbar navbar-default titlebar" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
	  <li class="active"><a href="<?php echo $config['root']; ?>">Home</a></li>
<?php 
if(!isset($admin)||$admin == 0){
	foreach($config['pages'] as $pg){ 
		echo '<li><a href="'.$config['root']."pages.php?".$pg.'">'.ucwords($pg).'</a></li>';
	}
}else{
	foreach($config['admin_pages'] as $pg){ 
		echo '<li><a href="'.$config['root'].'admin.php?p='.$pg.'">'.ucwords($pg).'</a></li>';
	}
}
?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
<?php 
foreach($config['social_top'] as $soc){
echo '<a href="'.$config[$soc].'" class="btn btn-social-icon btn-'.$soc.'">';
echo   '<i class="fa fa-'.$soc.'"></i></a>  ';
}
?>
<?php foreach($config['links'] as $pg){ 
	echo '<li><a href="'.$pg[1].'">'.$pg[0].'</a></li>';
} ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


</div>
