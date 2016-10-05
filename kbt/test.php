<!DOCTYPE html>
<html><head><style>
</style></head><body>
<?php
$conn = mysqli_connect('localhost','kbt','invicibility1A','kbtkund') or die("Connection failed: " . mysqli_error());
if($conn->connect_errno){
	echo 'Connect failed: '.$conn->connect_error;
}
$patients = $conn->query('SELECT * FROM patient');
if ($patients->num_rows > 0){
	while($row = $patients->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Namn: " . $row["fnamn"]. " " . $row["enamn"]. "<br>";
    }
    $terapeuts = $conn->query('SELECT * FROM terapeut');
	if ($terapeuts->num_rows > 0){
		while($row1 = $terapeuts->fetch_assoc()) {
	        echo "id: " . $row1["id"]. " - Namn: " . $row1["namn"]."<br>";
	    }
   		$boknings = $conn->query('SELECT * FROM bokning');
	    if ($boknings->num_rows > 0){
			while($row2 = $boknings->fetch_assoc()) {
				$bok=$row2["bokning_id"];
		        echo "Bokningsnummer: #" . $bok. " - Patient: " . $row[$row2["patient_id"]]." - Terapeut: ".$row2["terapeut_id"]."<br>";
		    }
		}
	}
}
$conn->close();
?></body></html>