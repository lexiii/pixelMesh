
<?php
if(!isset($index)) die();
$admin = (isset($_SESSION['username'])&&$_SESSION['username']?1:0);
include $config['root']."templates/get_blog.php";
foreach($lat as $img){
?>
<div class="panel panel-default">
  <div class="panel-body">
<div class="row">
  <div class="col-md-5">
  <img src='../res/<?php echo $img[0] ?>' width='100%' class='img-thumbnail'/><br />
</div>
  <div class="col-md-6">
  <h2><?php echo $img[1]; ?></h2>
	<p>...</p>
<div >
	<a  class='btn btn-success' href='#' >Edit</a>
	<a  class='btn btn-danger' href='#' >Delete</a>
</div>
	</div>
</div>
<br />

  </div>
</div>
<?php
}
?>

<br />
