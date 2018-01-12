<?php
include_once 'connect.php';

$Vfn403grgrvr = new mysqli($Vld2n41m23g2,$V3mnfj23ef1g,$Vggk1tlk5vss,$Vgxg2ndfh0tn);
if($Vfn403grgrvr->connect_error){
	die("Connection failed: ".$Vfn403grgrvr->connect_error);
}
$Vsznhu5tkhyv="SELECT * FROM `images` ORDER BY id LIMIT 10;";
$Vbz3u4crjupc = $Vfn403grgrvr->query($Vsznhu5tkhyv);
$Vcftfntid3kf = mysqli_fetch_array($Vbz3u4crjupc);
?>
<!DOCTYPE html>
<html>
<head>
<title>Test</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="gladragstest.css"/>
</head>
<body>
<?php
if ($Vbz3u4crjupc->num_rows > 0) {
    do{
    	echo '<a href="edit.php?id='.$Vcftfntid3kf['id'].'"><div class="img-item"><img src="'.$Vcftfntid3kf["img"].'" width="60" height="60"><p>'.$Vcftfntid3kf['text'].'</p><span class="img-time">'.$Vcftfntid3kf["date"].'</span></div></a>';
	}while($Vcftfntid3kf = $Vbz3u4crjupc->fetch_assoc());
} else {
    echo "0 results";
}
$Vfn403grgrvr->close();
?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input name="uploadTitle" maxlength="255"><br/>
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><br/>
    <input type="submit" value="Upload Image" name="submit">
</form>
</body>