<?php if(!isset($index)) die(); ?>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.1.1/spacelab/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo $config['font-awesome']; ?>" />
<link rel="stylesheet" href="<?php echo $config['absolute_url']; ?>css/bootstrap-social.css">
<link rel="stylesheet" href="<?php echo $config['absolute_url']; ?>css/main.css">
<?php
if($config['slider']&&$page=='front'){ ?>
<link rel="stylesheet" href="<?php echo $config['absolute_url']; ?>css/nivo-slider.css">
<link rel="stylesheet" href="<?php echo $config['absolute_url']; ?>css/themes/<?php echo $config['slider_theme']."/".$config['slider_theme']; ?>.css" type="text/css" />
<?php } ?>
