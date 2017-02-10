<?php
function t($a,$n){$t="";while($a){$t.="\t";$a--;}return "$t$n\n";}
function title($title){echo t(1,"<title>$title</title>");}
function charset(){echo t(1,"<meta http-equiv=\"content-type\" content=\"text/html;charset=utf-8\"/>");}
function meta($name,$content){echo t(1,"<meta name=\"$name\" content=\"$content\">");}
function cdn(){echo t(1,"<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\">").t(1,"<script src=\"js/jquery-1.12.4.min.js\" async></script>");t(1,meta('viewport','width=device-width,initial-scale=1,user-scalable=no'));}
function base($root){echo t(1,"<base href=\"$root\">");}

function headlink($attr,$url){echo t(1,"<link rel=\"$attr\" href=\"$url\"/>");}
function canonical($url){echo t(1,"<link rel=\"canonical\" content=\"".preg_replace('~^(\.\./)(.*)$~', "$2", $url)."\">");}
function css($url){echo t(1,"<link rel=\"stylesheet\" type=\"text/css\" href=\"$url\"/>");}
function defer($src){echo t(1,"<script src=\"$src\" defer></script>");}
?>