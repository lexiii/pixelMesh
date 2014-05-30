<?php
if(!isset($index)) die();
$admin = (isset($_SESSION['username'])&&$_SESSION['username']?1:0);
?>
<br />
<br />
<br />
<div class="panel panel-default">
  <div class="panel-heading">Rebuilding . . .</div>
  <div class="panel-body">
<?php include '../make_blog.php'; ?>
  </div>
  <div class="panel-footer">
<a href='admin/?p=rebuild'>Build again</a>
</div>
</div>
