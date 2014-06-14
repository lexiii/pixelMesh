<?php
// this generates a single page
function seoUrl($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}
include 'templates/get_blog.php';
$url = explode('&', $pag, 2); 
$pag =$url[0]; 
$abs = 0;
if(!is_numeric($pag)){//input is number
	for($k=0;$k<count($lat);$k++){ //that's right. K is a variable now. take that physics!
		if($pag == $lat[$k][0]){
			$pag = $k;
			$abs = 1;
		}
	}
}
$pag = (is_numeric($pag)?$pag:1);//input is number

$m = $lat[$pag][0];
$i = $pag;
$tit = seoUrl($lat[$pag][1]);
if(!$abs&&$tit!="") //this adds the title to the URL
	echo "<script>".
	"window.location.hash='$tit';".
	"</script>";
$single=1;
$met = $config['absolute_url']."page.php?".$m."&".$tit;
$single_meta = "<b>Perma-link: </b><a href='$met'>$met</a>";
include 'templates/post.php';
?>

