<div class='container'>
<div class='jumbotron footerbar'>
<h4 class='pull-right'><small><?php echo $config['footer_right']; ?></small>
<?php
foreach($config['social_foot'] as $soc){
echo '<a href="'.$config[$soc].'" class="btn btn-social-icon btn-'.$soc.'">';
echo   '<i class="fa fa-'.$soc.'"></i></a>  ';
}
?>
</h4>
<p class='footer'><?php echo $config['footer_left']; ?></p>
<h3 class='text-center'><small>Blah CMS <br/>Developed by <a href='#'>Blah</a>.</small></h3>
</div>
</div>
