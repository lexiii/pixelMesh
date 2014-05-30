<?php
$db = $config['root']."inc/db.txt";
$path = $config['root']."res"; 
if(file_exists($db))
	$lat = json_decode(file_get_contents($db));
else
	$lat = [];
$latest_ctime = 0;
$latest_filename = '';    
$d = dir($path);
while (false !== ($entry = $d->read())) {
	$filepath = "{$path}/{$entry}";
	if (is_file($filepath) && filectime($filepath) > $latest_ctime) {
		$latest_ctime = filectime($filepath);
		$latest_filename = $entry;
	}
}
if(is_null($lat)){ //if db is empty
	$files = array_diff(scandir($path), array('..', '.'));
	$fl2=[];
	// rebuild database including new elements
	foreach($files as $file){
			array_push($fl2,[$file,""]);
	}
	file_put_contents("inc/db.txt", json_encode($fl2));
	$lat = $fl2;
}else if(end($lat)[0]!=$latest_filename){// if new files exitst
	$tit =  [];
	$fil =  [];
	// split multidimentional array into seprate arrays for searching
	foreach ($lat as $lat2){
		array_push($tit,$lat2[1]);
		array_push($fil,$lat2[0]);
	}
	// get files
	$files = array_diff(scandir($path), array('..', '.'));
	$fl2=[];
	// rebuild database including new elements
	$inc=0;	
	foreach($files as $file){
		if(in_array($file,$fil)){
			$ind =array_search( $file, $fil);
			array_push($fl2,[$file,$tit[$ind],$inc]);
		}else{
			array_push($fl2,[$file,"",$inc]);
		}
		$inc++;
	}
	file_put_contents($config['root']."inc/db.txt", json_encode($fl2));
	$lat = $fl2;
}

?>
