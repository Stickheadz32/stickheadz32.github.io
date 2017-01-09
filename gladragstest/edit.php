<?php
if(empty($_GET['id']))header("Location: index.php");
include_once 'connect.php';

$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}
$sql="SELECT * FROM `images` WHERE id=".$_GET['id'].";";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
?>
<!doctype html>
<html>
<head>
<title>Edit</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="gladragstest.css"/>
</head>
<body>
<div id="item-overview" style="background-image:url(<?php echo $row['img'];?>)"></div>
<script>
var img = new Image(),imgdiv=document.getElementById("item-overview");
img.src='<?php echo $row['img'];?>';
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
$conn->close();
?>
</body>
</html>