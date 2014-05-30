<?php
include('inc/users.php');
$mode = 'register';
if ($mode == 'register') { 
	$hash = (isset($_POST['hash'])?$_POST['hash']:'crap');
	if($hash == 'login')
		$action = 'login';
	$url2 = "inc/urls.txt"; // the url url (url^2)
	if(file_exists($url2)){
		$urls = json_decode(file_get_contents($url2));
		$pos = array_search($hash, $urls);
		if($pos === FALSE){
			die('wrong hash');
		}
	}else{
		die('wrong hash');
	}
	//register
	if( !isset($_POST['username']) ||
		!isset($_POST['password1']) ||
		!isset($_POST['password2']) )
		die('fill in all fields');
	if($_POST['password1']!=$_POST['password2'])
		die('passwords must match');
	if (!preg_match('/[A-Za-z]+[0-9]+/', $_POST['password1']))
		die('password must be at least 8 chars with a number');
	if(isset($users[$_POST['username']]))
		die('user exists');

	$str = '$users["'.$_POST['username'].'"] = "'.md5($_POST['password1']).'";'."\n";
	if($count[$users]==0){
	$first_line = array_shift(array_values(preg_split('/\r\n|\r|\n/', file_get_contents('inc/users.php'), 2)));
	if(substr($first_line,0,5)!='<?php')
		$str = '<?php'."\n".$str;
}
	file_put_contents('inc/users.php', $str, FILE_APPEND);
	unset($urls[$pos]);
	$urls = array_values($urls);
	file_put_contents($url2, json_encode($urls));
header( 'Location: index.php' ) ;
}else{
	echo "login";
}

?>
