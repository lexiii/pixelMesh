<?php 
if(!isset($index)) die();
$admin = (isset($_SESSION['username'])&&$_SESSION['username']?1:0);
?>
<h2>Settings</h2>
<ul class="nav nav-tabs panel-tabs">
<?php
for($i=0;$i<count($config['admin_tabs']);$i++){
	echo '<li class="panel-tab '.($i==0?'active':'').'"><a href="#'.$config['admin_tabs'][$i].'" data-toggle="tab">'.$config['admin_tabs'][$i].'</a></li>';
}
?>
</ul>
<div class="panel panel-default">
  <div class="panel-body">

<form name='settings' class='settings-tab' action='set.php' method = 'post'>

<div class="tab-content settings-tasb">
<?php 
include 'desc.php';
$setting_name = (array_keys($config));
$first = 1;
foreach($config['admin_tabs'] as $tab){
	echo '<div class="tab-pane '.($first==1?'active':'').'" id="'.$tab.'">';
	echo '<table class="table table-striped settings-table"> <tbody>';
	$first=0;
	for($i=0;$i<count($config[$tab]);$i++){
		$n = array_search($config[$tab][$i],$setting_name);
		$sname = $setting_name[$n];
		$sval  = $config[$setting_name[$n]];


		echo "<tr><td>".ucwords(str_replace("_", "  ", $sname))."</td>";
		switch(gettype($sval)){
		case "string":
			if(strlen($sval)>20){
				echo "<td><textarea name='".$sname."'>".htmlentities($sval)."</textarea></td>";
			}else{
				echo "<td><input type='text' name='".$sname."' value='".htmlentities($sval)."'</input></td>";
			}
			break;
		case "boolean":
			//echo "<td>".$sname.'</td><td><input name="checkboxes" name="'.$sname.'" id="checkboxes-0" type="checkbox"'.($sval==1?'checked':'').'></td>';
			echo '<td><input name="checkboxes"	id="checkboxes-0" disabled="disabled" type="checkbox"'.($sval==1?'checked':'').'></td>';
			break;
		case "integer":
			echo '<td><div class="input-group spinner"> <input type="text" class="form-control" name="'.$sname.'" value="'.$sval.'"> <div class="input-group-btn-vertical"> <button class="btn btn-default"><i class="fa fa-caret-up"></i></button> <button class="btn btn-default"><i class="fa fa-caret-down"></i></button> </div> </div></td>';
			break;
		case "array":
			echo "<td><input type='text' name = '".$sname."' value='".json_encode($sval)."'></input></td>";
			break;
		default:
			echo "<td>".gettype($sval)."</td>";
			break;
		}
		if(isset($comment[$sname])){
			echo "<td>".$comment[$sname]."</td>";
		}else{
			echo "<td></td>";
		}
		echo "</tr>";
	}

echo '</tbody> </table>';
	echo "</div>\n";
}
?>
<input type='submit' name='submit' class = 'btn btn-info'value = 'submit' />
</form>
</div>
</div>
</div>
<p class='text-left'><small>To fix:</small></p>
<p class='text-left'><small>Int up/down arrows disabled because of a glitch</small></p>
<p class='text-left'><small>Booleans are treated like integers</small></p>
<p class='text-left'><small>Arrays are treated like strings</small></p>
<br />
