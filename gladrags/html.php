<?php
function t($a,$n){$t="";while($a){$t.="\t";$a--;}return $t.$n."\n";}
function title($title){echo t(1,"<title>".$title."</title>");}
function cdn(){echo t(1,"<meta http-equiv=\"content-type\" content=\"text/html;chatset=utf-8\"/>").t(1,"<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\"/>").t(1,"<script src=\"js/jquery-1.12.4.min.js\"></script>");}
function meta($name,$content){echo t(1,"<meta name=\"".$name."\" content=\"".$content."\">");}
function headlink($attr,$url){echo t(1,"<link rel=\"canonical\" href=\"".$url."\"/>");}
?>