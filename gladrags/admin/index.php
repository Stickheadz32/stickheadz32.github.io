<?php
include_once 'connect.php';

$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}
?>
<!doctype html>
<html lang="sv">
<head>
<?php include_once("../html.php");
title('Start - Glad Rags');
charset();
cdn();
base('./');
meta('description','test');
meta('keywords','glad,rags,gladrags');
meta('viewport','width=device-width,initial-scale=1,maximum-scale=1');
css('css/gladrags-bootstrap.css');
css('fonts/glyph.css');?>
</head>
<body>
	<h1>Login</h1>
    <form method="post" action="" required>
        <p>Username</p>
        <input type="text" name="user" required>
        <p>Password</p>
        <input type="password" name="pass">
        <button type="submit">Login</button>
    </form>
<?php
$sql = "SELECT password FROM admin";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
if ($result->num_rows > 0) {
    // output data of each row
    do {
        if(sha1("admin")==$row['password']){
        	echo "SUCCESS.";
        }
    } while($row = $result->fetch_assoc());
} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>