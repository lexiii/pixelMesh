<?php if(!isset($index)) die(); ?>
<nav class="navbar navbar-default" style='padding-left:10px;margin-bottom:0px;' role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
<a class='navbar-brand'><img class='logo' src='<?php echo $config['path']; ?>img/logo-sml.png' width='30px' style='position:relative;bottom:5px;'/></a>
	  <a class="navbar-brand" href="<?php echo $config['path']; ?>"><?php echo $config['site_title']; ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right">
<?php
if(isset($_SESSION['username'])&&$_SESSION['username']){
	echo '<li><a href="'.$config['path'].'admin/">'.$_SESSION['username'].'</a></li>';
	echo '<li><a href="'.$config['path'].'admin/?logout=1">Log out</a></li>';
}
?>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

  <div class="col-md-2">
<div class="sidebar-nav">
	<div class="well" style="width:100%;height:100vh; padding: 8px 0 0 10px; border-radius:0 0 10px 10px;">
		<ul class="nav nav-list"> 
		  <li class="nav-header">Admin Menu</li>        
<?php

if(isset($_SESSION['username'])&&$_SESSION['username']){
//	foreach($config['admin_pages'] as $pg){ 
	for($i=0;$i<count($config['admin_pages']);$i++){
		//echo '<li><i class="fa '.$config['admin_icons'][$i].'"></i> <a href="'.$config['path'].'admin/?p='.$config['admin_pages'][$i].'">'.ucwords($config['admin_pages'][$i]).'</a></li>';
		echo '<li> <i style="position:relative;left:7px;" class="fa fa-'.$config['admin_icons'][$i].'"></i><a style="display:inline-block;" href="'.$config['path'].'admin/?p='.$config['admin_pages'][$i].'">'.ucwords($config['admin_pages'][$i]).'</a></li>';
	}
	echo '<li class="divider"></li>';
	echo '<li><i style="position:relative;left:7px;" class="fa fa-user"></i><a style="display:inline-block" href="'.$config['path'].'admin/">'.$_SESSION['username'].'</a></li>';
	echo '<li><i style="position:relative;left:7px;" class="fa fa-share"></i><a style="display:inline-block" href="'.$config['path'].'admin/?logout=1">Log out</a></li>';
} 
?>
		</ul>
	</div>
</div>
</div>
