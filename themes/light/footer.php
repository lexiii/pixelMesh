<div class='container'>
<div class='jumbotron footerbar'>
<h4 class='pull-right'><small><?php echo $config['footer_right']; ?></small>
<?php
foreach($config['social_foot'] as $soc){
echo '<a href="'.$config[$soc].'" class="btn btn-social-icon btn-'.$soc.'">';
echo   '<i class="fa fa-'.$soc.'"></i></a>  ';
}
	if($config['lightswitch'])
		echo '<a  class="btn btn-social-icon btn-reddit lightswitch"><i class="fa fa-lightbulb-o"></i></a>  ';
?>
</h4>
<p class='footer'>
<a  class="btn btn-social-icon btn-reddit back-to-top"><i class="fa fa-caret-square-o-up"></i></a>
<p class='footer'><?php echo $config['footer_left']; ?></p>
<br />
<div class='container text-center'>
<h3><small>Powered by <a href='#'>pixelMesh</a>.</small></h3>
<img class='logo' src='<?php echo $config['path']; ?>img/logo-sml.png' width='50px'/>
</div>
</div>
</div>
