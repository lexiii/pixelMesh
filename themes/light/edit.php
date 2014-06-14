<?php $editing='about.php';?>
<h1><small>Now editing <?php echo $editing ?></small></h1>
	<form action="<?php echo $config['root']; ?>admin/edit_page.php" method='post'>
	<input type='hidden' value='<?php echo $editing; ?>' name='file'></input>
<textarea name="content" style='width:100%;' name='content' rows="10">
<?php echo file_get_contents('extra/'.$editing); ?>
</textarea>
<br />
<button type='submit' class='btn btn-primary pull-right'>Update</a>
</form>
