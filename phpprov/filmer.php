<?php
#hämtar serveruppstart
include_once("connOpen.php");
#hämta alla filmer
$sql = "SELECT * FROM filmer JOIN personer ON filmer.id=personer.id JOIN bilar ON personer.id=bilar.id ORDER BY personnr DESC";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
</head>
<body>
<?php 
if ($result->num_rows > 0) {
	#do-while-sats istället för while-sats för att inte hoppa över första raden
    do{
    	echo '<p>'.$row['id'].'. '.$row['titel'].' - '.$row['arsmodell'].' - '.$row['fnamn'].'</p>';
	}while($row = $result->fetch_assoc());
} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>