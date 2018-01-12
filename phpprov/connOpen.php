<?php
#hänta servervariabler
include_once("connName.php");
#börja serverkoppling
$conn = new mysqli($host,$user,$password,$dbname);
#kolla efter fel
if($conn->connect_error){
	die("Can't connect to database! Error: ".$conn->connect_error);
}
#Byter ut charset till UTF-8 för åäö
mysqli_set_charset($conn,"utf8");
?>