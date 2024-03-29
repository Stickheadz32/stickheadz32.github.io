<?php
include_once 'connect.php';

$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $sqldel = "SELECT img FROM images WHERE id=".$_GET['id'].";";
            $result = $conn->query($sqldel) or die($sqldel->error());
            $row = mysqli_fetch_array($result);
            if($result->num_rows>1)
                if(file_exists("'".$row['img']."'")){
                    delete($row['img']);
                }
            $sql = "UPDATE `images` SET text='".$_POST['uploadTitle']."',img='".$target_file."',date=NOW() WHERE id=".$_GET['id'];
            if ($conn->query($sql) === TRUE) {
                header('Location: index.php');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
$conn->close();
?>