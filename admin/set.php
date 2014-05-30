<?php
$admin = (isset($_SESSION['username'])&&$_SESSION['username']?1:0);
// this page builds the user.config.php page. 
$output = "<?php \n //This is the config file generated with the admin panel. if it stops working. move it to return to the defaults. if you want to add your own settings, do it in config.php \n";
$name = array_keys($_POST);
for($i=0;$i<count($name);$i++){
	$nam = $name[$i];
	$val = $_POST[$name[$i]];
	if(!is_null(json_decode($val))){
		$output .= '$config["'.$nam.'"] = '.$val."; \n";
	}else{
		if($val != strip_tags($val)) {
			$output .= '$config["'.$nam.'"] = html_entity_decode("'.htmlentities($val).'");'." \n";
		}else{
			if(gettype($val)=="string")
				$output .= '$config["'.$nam.'"] = "'.htmlentities($val).'"'."; \n";
			else
				$output .= '$config["'.$nam.'"] = '.htmlentities($val)."; \n";
		}
	}
}
file_put_contents('../inc/user.config.php',$output);
header('Location:  ' . $_POST['path']."admin?p=settings");
?>
