<?php
$db = "inc/db.txt";
$path = "res"; 
$lat = json_decode(file_get_contents($db));

$latest_ctime = 0;
$latest_filename = '';    

$d = dir($path);
while (false !== ($entry = $d->read())) {
	$filepath = "{$path}/{$entry}";
	// could do also other checks than just checking whether the entry is a file
	if (is_file($filepath) && filectime($filepath) > $latest_ctime) {
		$latest_ctime = filectime($filepath);
		$latest_filename = $entry;
	}
}
// if new files exitst
if(end($lat)[0]!=$latest_filename){
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
	foreach($files as $file){
		if(in_array($file,$fil)){
			$ind =array_search( $file, $fil);
			array_push($fl2,[$file,$tit[$ind]]);
		}else{
			array_push($fl2,[$file,""]);
		}
	}
	file_put_contents("inc/db.txt", json_encode($fl2));
	$lat = $fl2;
}

?>
