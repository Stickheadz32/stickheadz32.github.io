<?php
$baseUrl="real-it.se/T4/Marko/GladRags/";
function t($a,$n){
	$t="";
	while($a--){
		$t.="\t";
	}return "$t$n\n";
}
function og($type,$content){
	echo t(1,"<meta property=\"og:$type\" content=\"$content\"/>");
}
function title($title){
	echo t(1,"<title>$title</title>");
	t(1,og('title',$title));
}
function charset(){
	echo t(1,"<meta http-equiv=\"content-type\" content=\"text/html;charset=utf-8\"/>");
}
function meta($name,$content){
	echo t(1,"<meta name=\"$name\" content=\"$content\">");
}
function description($content){
	meta('description',$content);
	og('description',$content);
}
function keywords($content){
	meta('keywords',$content);
}
function cacheControl($param){
	echo t(1,"<meta http-equiv=\"cache-control\" content=\"$param\"/>");
}
function cdn(){
	echo t(1,"<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\">");t(1,async("js/bootstrap-check.js"));t(1,async("js/jquery-1.12.4.min.js"));t(1,meta('viewport','width=device-width,initial-scale=1,user-scalable=no'));
}
function base($root){
	echo t(1,"<base href=\"$root\">");
}

function headlink($attr,$url){
	echo t(1,"<link rel=\"$attr\" href=\"$url\"/>");
}
function canonical($url){
	echo t(1,"<link rel=\"canonical\" content=\"".preg_replace('~^(\.\./)(.*)$~', "$2", $url)."\">");
}
function css($url){
	echo t(1,"<link rel=\"stylesheet\" type=\"text/css\" href=\"$url\"/>");
}
function script($src){
	echo t(1,"<script src=\"$src\"></script>");
}
function async($src){
	echo t(1,"<script src=\"$src\" async></script>");
}
function defer($src){
	echo t(1,"<script src=\"$src\" defer></script>");
}
?>