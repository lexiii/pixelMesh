<?php 
if(!isset($index)) die();
$admin = (isset($_SESSION['username'])&&$_SESSION['username']?1:0);
$editing='about.php';
$editing = (isset($_GET['e'])?$_GET['e']:"about");
?>

<div class="panel panel-default">
<div class='panel-heading'>Now editing <?php echo $editing ?>.php</div>
  <div class="panel-body">

	<form action="<?php echo $config['path']; ?>admin/edit_page.php" method='post'>
	<input type='hidden' value='<?php echo $editing; ?>' name='file'></input>
<textarea name="content" style='width:100%;' name='content' rows="10">
<?php 
if(file_exists($config['root'].'extra/'.$editing.".php")){
	echo file_get_contents($config['root'].'extra/'.$editing.'.php');
}
?>
</textarea>
<ul>
<?php
foreach($config['pages'] as $page){
	echo "<li>".
		"<a href='".$config['path']."admin/?p=edit&e=".$page."'>".
		$page.
		"</a></li>";
}
?>
</ul>
  </div>
  <div class="panel-footer">
<a type='submit' class='btn btn-primary pull-right'>Update</a>
<br />
<br />
</div>
</form>

</div>
