<?php
include_once 'connect.php';

$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}
$sql="SELECT * FROM `images` ORDER BY id LIMIT 10;";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
<title>Test</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="gladragstest.css"/>
</head>
<body>
<div class="productResult">
	<a class="listShow">Sammanfattningsvy</a>
	<?php
	if ($result->num_rows > 0) {
	    do{
	    	echo '<a href="edit.php?id='.$row['id'].'"><div class="img-item"><img src="'.$row["img"].'" width="60" height="60"><h3>'.$row['text'].'</h3><p>'.$row['description'].'</p><span class="img-time">'.$row["date"].'</span></div></a>';
		}while($row = $result->fetch_assoc());
	} else {
	    echo "0 results";
	}
	$conn->close();
	?>
</div>
<script>
var doc=document;
function byId(a){return doc.getElementById(a);}
function byClass(a){return doc.getElementsByClassName(a);}
function byTag(a){return doc.getElementsByTagName(a);}
function query(a){return doc.querySelector(a);}
function event(a,event,b){
    if(event=="click")
    a.addEventListener?a.addEventListener("click",b):a.attachEvent&&a.attachEvent("onclick",b);
    else a.addEventListener?a.addEventListener(event,b):a.attachEvent&&a.attachEvent(event,b);
}
event(byClass("listShow")[0],"click",function(){
    var a=query(".productResult"),b=byClass("listShow")[0];
    a.id=a.id=="summary"?"":"summary";
    b.innerHTML=b.innerHTML=="Sammanfattningsvy"?"Ikonvy":"Sammanfattningsvy";
});
</script>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input name="uploadTitle" maxlength="255"><br/>
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><br/>
    <input type="submit" value="Upload Image" name="submit">
</form>
</body>