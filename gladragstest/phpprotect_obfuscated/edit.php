<?php
if(empty($_GET['id']))header("Location: index.php");
include_once 'connect.php';

$Vfn403grgrvr = new mysqli($Vld2n41m23g2,$V3mnfj23ef1g,$Vggk1tlk5vss,$Vgxg2ndfh0tn);
if($Vfn403grgrvr->connect_error){
	die("Connection failed: ".$Vfn403grgrvr->connect_error);
}
$Vsznhu5tkhyv="SELECT * FROM `images` WHERE id=".$_GET['id'].";";
$Vbz3u4crjupc = $Vfn403grgrvr->query($Vsznhu5tkhyv);
$Vcftfntid3kf = mysqli_fetch_array($Vbz3u4crjupc);
?>
<!doctype html>
<html>
<head>
<title>Edit</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="gladragstest.css"/>
</head>
<body>
<div id="item-overview" style="background-image:url(<?php echo $Vcftfntid3kf['img'];?>)"></div>
<script>
var img = new Image(),imgdiv=document.getElementById("item-overview");
img.src='<?php echo $Vcftfntid3kf['img'];?>';
if(img.width>400||img.height>400){
	imgdiv.style.backgroundSize="contain";
}
</script>
<p><a href="index.php"><- Back to images</a></p>
<form action="update.php?id=<?php echo $_GET['id'];?>" method="post" enctype="multipart/form-data">
    <input name="uploadTitle" maxlength="255"><br/>
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><br/>
    <input type="submit" value="Upload Image" name="submit">
</form>
<?php
$Vfn403grgrvr->close();
?>
</body>
</html>