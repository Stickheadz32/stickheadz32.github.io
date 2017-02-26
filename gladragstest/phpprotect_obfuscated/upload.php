<?php
include_once 'connect.php';

$Vfn403grgrvr = new mysqli($Vld2n41m23g2,$V3mnfj23ef1g,$Vggk1tlk5vss,$Vgxg2ndfh0tn);
if($Vfn403grgrvr->connect_error){
    die("Connection failed: ".$Vfn403grgrvr->connect_error);
}
$Vrfueck4ervf = "images/";
$Va4l44lez2kn = $Vrfueck4ervf . basename($_FILES["fileToUpload"]["name"]);
$Vjt5klw1vrr0 = 1;
$Vyfh2elf452x = pathinfo($Va4l44lez2kn,PATHINFO_EXTENSION);

if(isset($_POST["submit"])) {
    $Vsxss3gys2jz = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($Vsxss3gys2jz !== false) {
        $Vjt5klw1vrr0 = 1;
    } else {
        echo "File is not an image.";
        $Vjt5klw1vrr0 = 0;
    }
    
    if ($Vjt5klw1vrr0 == 0) {
        echo "Sorry, your file was not uploaded.";
    
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $Va4l44lez2kn)) {
            $Vsznhu5tkhyv = "INSERT INTO images (id,text,img) VALUES ('','".$_POST['uploadTitle']."', '".$Va4l44lez2kn."',NOW())";
            if ($Vfn403grgrvr->query($Vsznhu5tkhyv) === TRUE) {
                header('Location: index.php');
            } else {
                echo "Error: " . $Vsznhu5tkhyv . "<br>" . $Vfn403grgrvr->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
$Vfn403grgrvr->close();
?>