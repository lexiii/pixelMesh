<?php
$debug = (isset($_GET['debug'])&&$_GET['debug']==1?1:0);
$debug_text = "";
$error = "";
if(isset($_POST['site_name'])){
	$vars = ['site_name','site_url','site_path'];

	$debug_text .= json_encode($_POST)."<br />";
	foreach($vars as $var){
		if($_POST[$var]=="")
			$error .='You must fill out the '.$var.' field<br />';
	}
	if($error==""){
		$output = "<?php\n".'$config["path"] = "'.$_POST['site_path']."\";\n";
		$output .= '$config["site_title"] = "'.$_POST['site_name']."\";\n";
		$output .= '$config["absolute_url"] = "'.$_POST['site_url']."\";\n";
		$current = file_get_contents('inc/defaults2.txt');
		file_put_contents('inc/config.php', $output.$current);
		$debug_text .=$output."<br/>";
		unlink('inc/defaults2.txt');
		// SWITCH THESE LINES IN PRODUCTION!
		rename ("FIRST_RUN.php", "FIRST_RUN_BACKUP.php");
//		unlink('FIRST_RUN.php');
	}
	$page = ($error == ""? 2 : 1);
} else
	if(isset($_POST['password'])){
		$fields = ['name','password','password2'];
		foreach ($fields as $field){

			if($_POST[$field]=="")$error .= "You must fill out the ".$field." field <br/>";
		}

		$error .= ($_POST['password']!=$_POST['password2']?"Passwords don't match":
			'');

		if($error==""){

			if (!preg_match('/[A-Za-z]+[0-9]+/', $_POST['password']))$error.="Password must contain a number and a letter"; else
				if(strlen($_POST['password'])<8) /////DONT BE SO LAZY! FIGURE OUT THE REGEX FOR STRLEN (SHOULD BE {8} SOMEHOW)
					$error.="Password must be at least 8 characters long";
		}

		$debug_text .=json_encode($_POST)."<br />";

		if($error==""){
			$salt =substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"),0, 1) . substr(str_shuffle("aBcEeFgHiJkLmNoPqRstUvWxYz0123456789"),0, 5);
			$to_file = "\n".'$config["salt"] = "'.$salt.'";'."\n".'$config["admin"] = array("'.$_POST['name'].'" => "'.md5($salt.$_POST['password']).'");';
			$debug_text .=htmlspecialchars($to_file)."<br />";
			$current = file_get_contents('inc/defaults.txt');
			file_put_contents('inc/defaults2.txt',$current.$to_file) OR $error .= 'Could not write file';
		}
		$page = ($error == ""? 1 :0);
	} else {
		$page = 0;
	}

?>
<!doctype html>
<html>
<head>
<title>
Welcome to pixelMesh!
</title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/lumen/bootstrap.min.css" />
<!-- original script by BhaumikPatel http://bootsnipp.com/snippets/featured/full-page-sign-in  -->
<style>body{background:url(img/bg.jpg) fixed;background-size:cover;margin:0;padding:0;}.wrap{height:100%;left:0;min-height:100%;position:absolute;top:0;width:100%;z-index:99;}p.form-title{color:#FFF;font-family:'Open Sans' , sans-serif;font-size:20px;font-weight:600;letter-spacing:4px;margin-top:5%;text-align:center;text-transform:uppercase;}form{margin:0 auto;width:250px;}form.login input[type="text"],form.login input[type="password"]{background:0;border:0;border-bottom:1px solid rgba(0,0,0,0.3);color:rgba(0,0,0,1.9);font-size:12px;font-style:italic;font-weight:400;letter-spacing:1px;margin:0 0 5px;outline:0;padding:5px 10px;width:100%;}form.login input[type="submit"]{cursor:pointer;font-size:14px;font-weight:500;letter-spacing:1px;margin-top:16px;outline:0;text-transform:uppercase;width:100%;}form.login .remember-forgot{float:left;margin:10px 0 0;width:100%;}form.login .forgot-pass-content{margin-bottom:10px;margin-top:10px;min-height:20px;}form.login label,form.login a{color:#FFF;font-size:12px;font-weight:400;}form.login a{transition:color .5s ease;}form.login a:hover{color:#2ecc71;}.pr-wrap{display:none;height:100%;left:0;min-height:100%;position:absolute;top:0;width:100%;z-index:999;}.show-pass-reset{display:block!important;}.pass-reset{background:#FFF;margin:22% auto 0;padding:20px 15px;position:relative;width:250px;z-index:999;}.pass-reset label{font-size:12px;font-weight:400;margin-bottom:15px;}.pass-reset input[type="email"]{background:0;border:0;border-bottom:1px solid #000;color:#000;font-size:12px;font-style:italic;font-weight:400;letter-spacing:1px;margin:5px 0;outline:0;padding:5px 10px;width:100%;}.pass-reset input[type="submit"]{border:0;cursor:pointer;font-size:14px;font-weight:500;letter-spacing:1px;margin-top:10px;outline:0;text-transform:uppercase;width:100%;}.posted-by{background-color:rgba(0,0,0,0.66);bottom:26px;color:#FFF;left:45%;margin:0 auto;padding:10px;position:absolute;}.logo{opacity:0.3;padding-bottom:5px;width:120px;}::-webkit-input-placeholder,::-moz-placeholder{color:#000;opacity:1;}:-moz-placeholder,:-ms-input-placeholder{color:#000;}form.login input[type="submit"]:hover,.pass-reset input[type="submit"]:hover{transition:background-color .5s ease;}
.panel a{	
	color:blue;
}
</style>
</head>
<body>
<?php
		$path=pathinfo($_SERVER['PHP_SELF']);
		$path=$path['dirname'].'/';
		$ser = "http://".$_SERVER['HTTP_HOST'].$path;
if($debug){
	echo "Debugging on<br />";
	echo $debug_text;
}

?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="pr-wrap">
				<div class="pass-reset">
					<label>
						Enter the email you signed up with</label>
					<input type="email" placeholder="Email" />
					<input type="submit" value="Submit" class="pass-reset-submit btn btn-success btn-sm" />
				</div>
			</div>
			<div class="wrap">
				<p class="form-title"><img class='logo' src='img/logo-white.png' /><br />
					 Welcome to pixelMesh</p>
				<form class="login" action="" method='post'>
<?php 
echo ($error==""?"":
	'<div class="alert alert-danger">'.$error.'</div>');

if($page == 0){
?> 
				<input type="text" placeholder="Username" name='name'/>
				<input type="password" placeholder="Password" name='password'/>
				<input type="password" placeholder="Password (again)" name='password2' />
				<input type="submit" value="Get Started" class="btn btn-success btn-sm" />
<?php 
} else
	if($page==1){
?>
				<input type="text" placeholder="Site Name"   name='site_name' />
				<input type="text" value="<?php echo $ser; ?>" name='site_url' />
				<input type="text" value="<?php echo $path; ?>" name='site_path' />
				<br/>
				<p>All of these settings can be changed later</p>
				<input type="submit" value="finish up" class="btn btn-success btn-sm" />
<?php  } else { ?>
<div class="panel panel-default">
  <div class="panel-body">
<h1 class='text-center'>All Done!</h1>
<p>And you thought Wordpress was easy to install.</p>
<p>Click <a href='index.php'>Here</a> to see your new blog. Go to <a href='<?php echo $ser; ?>admin'><?php echo $ser; ?>admin</a> to change your settings.</p>
<h3 class='text-right'>Enjoy!</h3>
</div>
</div>
<?php  } ?>
				</form>
			</div>
		</div>
	</div>
	<div class="posted-by">Photo by: <a href="https://www.flickr.com/photos/blmiers2/">blmiers2</a></div>
</div>
</body>
</html>
