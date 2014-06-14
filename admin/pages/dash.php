<?php
if(!isset($index)) die();
$admin = (isset($_SESSION['username'])&&$_SESSION['username']?1:0);
$files  = array_diff(scandir($config['root'] . 'res'), array( '..', '.','.gitignore'));
$pages  = count(array_diff(scandir($config['root'] . 'pages'), array( '..', '.','.gitignore')));
$upages = count(array_diff(scandir($config['root'] . 'extra'), array( '..', '.')));
$files2 = array_diff(scandir($config['root'] . 'admin/tmp'), array( '..', '.', '.gitignore'));
$count  = count($files);
$count2 = count($files2);
if ($count != 0)
    $file = $config['path'] . "res/" . $files[rand(1, count($files)) + 1];
else
    $file = "http://lorempixel.com/300/200/nature/";
?>
<br />
<br />
<div class="panel panel-default">
  <div class="panel-body">
<div class="row">
  <div class="col-md-3 dash-el">
<h3>Welcome to pixelMesh</h3>
<img src="<?php
echo $file;
?>" alt="..." class="img-rounded" width='100%' />
<small>Random image from your gallery</small>
</div>
  <div class="col-md-3 dash-el">
<h3>Stats</h3>
Gallery Images <span class='badge pull-right'><?php echo $count ?></span></br>
Gallery Pages <span class='badge pull-right'><?php echo $pages ?></span></br>
Unused Images <span class='badge pull-right'><?php echo $count2 ?></span></br>
Text Pages <span class='badge pull-right'><?php echo $upages ?></span></br>
<i>Slider is <b><?php echo ($config['slider'] ? "enabled" : "disabled"); ?></b></i>
<!--
<b>
<?php
echo $count . "</b> image" . ($count == 1 ? '' : 's');
?> in gallery <br/>
<b><?php
echo $count2 . "</b> image" . ($count2 == 1 ? '' : 's');
?> in temp folder <br/>
<b><?php
echo $pages . "</b> page" . ($pages == 1 ? '' : 's');
?> in the gallery <br/>
<b><?php
echo $upages . "</b> text page" . ($upages == 1 ? '' : 's');
?> <br/>
Slideshow <b><?php
echo ($config['slider'] ? "enabled" : "disabled");
?></b><br />
-->
<hr />
  <a  href='http://www.dignitasdesigns.net/pixelmesh'class="btn btn-social btn-instagram btn-block" target="_blank"> <i class="fa fa-globe"></i> pixelMesh homepage </a>
</div>
  <div class="col-md-3 dash-el">
<h3>Thanks to</h3>
<a href='http://getbootstrap.com'>Twitter Bootstrap </a><br/>
<a href='http://bootswatch.com/lumen/'>Bootswatch </a><br/>
<a href='http://lipis.github.io/bootstrap-social/'>Social Button</a><br/>
<a href='http://dev7studios.com/plugins/nivo-slider/'>Nivo Slider</a><br/>
<hr />
<br />
  <a  href='https://blockchain.info/address/19gLcYUrxev9EEvUvjcpdGKSp8xQnzC32o'class="btn btn-social btn-soundcloud btn-block" target="_blank"> <i class="fa fa-btc"></i> Donate to the author </a>
</div>

  <div class="col-md-3 dash-el">
  <img src='<?php
echo $config['path'];
?>img/logo.png' class='img-responsive' style='opacity:0.1;'/>
</div>
</div>
  </div>
</div>
