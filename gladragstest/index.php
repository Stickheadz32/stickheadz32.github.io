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
<?php
if ($result->num_rows > 0) {
    do{
    	echo '<a href="edit.php?id='.$row['id'].'"><div class="img-item"><img src="'.$row["img"].'" width="60" height="60"><p>'.$row['text'].'</p><span class="img-time">'.$row["date"].'</span></div></a>';
	}while($row = $result->fetch_assoc());
} else {
    echo "0 results";
}
$conn->close();
?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input name="uploadTitle" maxlength="255"><br/>
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><br/>
    <input type="submit" value="Upload Image" name="submit">
</form>
</body>