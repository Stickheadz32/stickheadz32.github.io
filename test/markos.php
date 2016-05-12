<html>

<form action="markos.php" method="POST">
	<input type="radio" value="Ja" name="svar">
	<input type="radio" value="Nej" name="svar">
	<input type="submit" value="submit">
</form>

<?php

//Hämta svar från formen.
$svar = $_POST["svar"];

//Öppna fil i läsläge.
$fil = fopen("markos.txt", "r") or die("Unable to open fil!");
//Hämta filns innehåll.
$innehall = fgets($fil);
//Stäng filn.
fclose($fil);

//Dela på ja och nej.
$kolumn = explode(",", $innehall);

//Om svar är ja.
if($svar == "Ja")
{
	//Öka ja svar med 1.
	$kolumn[0]++;
}
//Annars
else if($svar == "Nej")
{
	//Öka nej svar med 1.
	$kolumn[1]++;
}

if( !empty($svar) );
{
	//Öppna fil i skrivläge.
	$fil = fopen("markos.txt", "w") or die("Unable to open fil!");
	fwrite($fil, $kolumn[0] . "," . $kolumn[1]);
	fclose($fil);

	//Skriv ut resultatet.
	echo $kolumn[0] . "," . $kolumn[1];
}

?>

</html>