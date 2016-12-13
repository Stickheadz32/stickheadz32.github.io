<?php
#hämtar serveruppstart
include_once("connOpen.php");
#Hänta data beroende på ålder
$sql = "SELECT * FROM personer ORDER BY personnr ASC";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
</head>
<body>
<table>
<thead>
	<tr>
		<td>Förnamn</td>
		<td>Efternamn</td>
		<td>Personnummer</td>
		<td>Email</td>
	</tr>
</thead>
<?php 
if ($result->num_rows > 0) {
	#do-while-sats istället för while-sats för att inte hoppa över första raden
    do{
    	#förnamn
    	echo '<tr><td>'.$row["fnamn"].
    	#enamn
    		'</td><td>'.$row["enamn"].
    	#personnummer i format YYYYMMDD-XXXX
    		'</td><td>'.substr($row["personnr"],0,8)."-".substr($row["personnr"],8,4).
    	#email
    		'</td><td>'.$row["email"].'</td></tr>';
	}while($row = $result->fetch_assoc());
} else {
	#ifall resultatet är tomt
    echo "0 results";
}
$conn->close();
?>
</table>
</body>
</html>