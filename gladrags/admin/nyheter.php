<?php
	include_once 'session.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Nyheter - GladRags Admin</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<script src="../js/jquery-1.12.4.min.js" async></script>
<link rel="stylesheet" type="text/css" href="../css/bootstrap-v3.3.7.min.css">
<link rel="stylesheet" type="text/css" href="../css/gladrags-bootstrap.css">
<link rel="stylesheet" type="text/css" href="admin.css">
<script src="edit.js" defer></script>
</head>
<body>
<header>
	<nav>
	<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
	<b id="logout"><a href="logout.php">Log Out</a></b>
	</nav>
</header>
<main>
	<section>
		<a href="profile.php">Huvudmenyn</a>
		<h1>GladRags Edit - Nyheter</h1>
		<table>
			<thead>
			<?php
				include_once 'connect.php';
				$conn = new mysqli($hostname,$username,$password,$dbname);
				if($conn->connect_error){
					die("Connection failed: ".$conn->connect_error);
				}
				$conn->query("SET character_set_results = 'utf8';");
				$sql="SELECT * FROM nyheter ORDER BY publicerad_datum DESC LIMIT 10;";
				$result = $conn->query($sql);
				$row = mysqli_fetch_array($result);
				$length = $result->field_count;
				echo '<tr>';
				for ($i = 0;$i < $length;$i++){
					$field_name = $result->fetch_field_direct($i)->name;
					echo '<th class><a href="#" title="Klicka för att sortera">'.$field_name.'</a></th>';
				}
				echo '</tr>';
			?>
			</thead>
			<tbody>

			<?php
				if ($result->num_rows > 0) {
				    do{
				    	echo '<tr>';
				    	for ($i=0; $i < $length; $i++){
							$field_name = $result->fetch_field_direct($i)->name;
				    		echo '<td><a href="#">'.$row[$i].'</a></td>';
				    	}
				    	echo '</tr>';
					}while($row = $result->fetch_row());
				} else {
				    echo "0 results";
				}
				$conn->close();
			?>
			</tbody>
		</table>
		<div class="toolbar"><span id="toolbarText">TESTING.</span></div>
	</section>
</main>
</body>
</html>