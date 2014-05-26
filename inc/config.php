<?php
$config['root']="/projects/mycms/";
$config['site_title']="pixelMesh";
$config['tagline']="all your pics are belong to you. ";
$config['absolute_url']="://localhost/projects/mycms/";

// display options

$config['per_page'] = 5;

$config['pages']=['about'];
$config['admin_pages']=['rebuild'];
$config['links']=[];
//$config['links'][0]=["External","http://www.google.com"];


//footer
$config['footer_left']="<a href='#'>Back to top</a>";
$config['footer_right']="";

//social
$config['social_top']=['facebook','twitter','flickr'];
$config['social_foot']=['facebook','twitter','flickr'];
//url for social
$config['facebook']="https://www.facebook.com/zuck";
$config['twitter']="http://twitter.com";
$config['flickr']="http://flickr.com";
//http://lipis.github.io/bootstrap-social/ for complete list of options 

//sources
$config['bootstrap']=$config['root']."css/bootstrap.min.css";
$config['font-awesome']="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css";
