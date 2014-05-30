<?php 
if(!isset($index)) die();
$admin = (isset($_SESSION['username'])&&$_SESSION['username']?1:0);
if(isset($_GET['f'])){
	$files = array_diff(scandir('tmp'), array('..', '.'));
	$file = $files[$_GET['f']];
	$name =preg_replace("/\\.[^.\\s]{3,4}$/", "", $file); 
?>
<h1>PUBLISH <small> Publishing puts an image onto the blog</small></h1>
<div class="row">
  <div class="col-md-3">

	<img src='tmp/<?php echo $file; ?>' width='100%'/>
</div>
  <div class="col-md-9">
<form action='publish.php' name='publish' method='post'>
	<input type='hidden' name='file' value='<?php echo $file; ?>' />
	<input type='text' name='title' value='<?php echo $name; ?>' /> <b>Title</b><br />
	<textarea name='comment' style="width: 300px; height: 150px;" placeholder='comment'></textarea><br /><br />
<input type='submit' value='publish' class='btn btn-info' />
</form>
</div>
</div>
<?php
}else{
?>
<script src="../js/dropzone.js"></script>
<div class="row">
  <div class="col-md-6" style='border:3px dashed rgba(0,0,0,0.2);height:400px;margin-bottom:20px'>
<h1>Upload</h1>
<form action="up.php"
	  class="dropzone"
	  id="my-awesome-dropzone">
  <div class="fallback">
	<input name="file" type="file" multiple />
  </div>
</form>
</div>
  <div class="col-md-6">
<h1>Add</h1>
<p>Relaod after uploading</p>
<?php
	$files = array_diff(scandir('tmp'), array('..', '.'));

	for($i=2;$i<count($files)+2;$i++){
		$file = $files[$i];
		echo "<a href='?p=upload&f=$i'>".
			"<img src='tmp/$file' width='100px'/>".
			"</a><br/>";
	}
?>
</div>
</div>
<?php } ?>
