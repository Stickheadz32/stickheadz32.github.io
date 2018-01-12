<?php
#hämtar serveruppstart
include_once("connOpen.php");
$sql = "SELECT * FROM bilar";
$result=$conn->query($sql);
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
		<td>Förnamn</td><td>Efternamn</td><td>Personnummer</td><td>Email</td>
	</tr>
</thead>
<?php 
$total = $result->num_rows;
if ($result->num_rows > 0) {
	#do-while-sats istället för while-sats för att inte hoppa över första raden
    do{
		if($result->num_rows > $total - 10){
			#märke
    		echo '<tr><td>'.$row["marke"].
			#årsmodell
    			'</td><td>'.$row['arsmodell'].
    			#skriver ut pris i format XXXX,XX kr
    			'</td><td>'.substr($row["pris"],0,strlen($row["pris"])-2).','.substr($row["pris"],strlen($row["pris"])-2).' kr</td><tr>';
		}
	}while($row = $result->fetch_assoc());
} else {
    echo "0 results";
}
?>
</table>
<!--antal sökresultat-->
<p><?php echo $total;?> items.</p>
<form method="POST" action="bilar.php">
Märke: <input name="marke"><br>
Årsmodell: <input name="modell"><br>
Pris: <input name="pris"><br>
<button type="submit" name="submit">Skicka</button>
<?php
if(!empty($_POST)){
	$sqlinput = "INSERT INTO bilar (marke,arsmodell,pris) VALUES ('".$_POST["marke"]."','".$_POST["modell"]."','".$_POST["pris"]."')";
	if ($conn->query($sqlinput) === TRUE) {
		#laddar om sidan för att visa skickad data
		header("Refresh:0");
	} else {
	    echo "Error: " . $sqlinput . "<br>" . $conn->error;
	}
}
$conn->close();
?>
</form>
</body>
</html>