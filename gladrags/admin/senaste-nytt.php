<?php
	include_once 'session.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link rel="stylesheet" text="text/css" href="../css/bootstrap-v3.3.7.min.css">
<link rel="stylesheet" text="text/css" href="../css/gladrags-bootstrap.css">
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
				<td>test</td>
			</thead>
			<tr>
				<td>test</td>
			</tr>
		</table>
	</section>
</main>
</body>
</html>