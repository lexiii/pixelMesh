<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<?php
if($config['slider']&&$page=='front'){ ?>
<script src="js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
effect: '<?php echo $config['slider_transition']; ?>',
	<?php echo $config['slider_extrasettings']; ?>                
	pauseTime: <?php echo $config['slider_pausetime']; ?>                
});
});
</script>
<?php } ?>
