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
	<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
	<b id="logout"><a href="logout.php">Log Out</a></b>
</header>
<main>
	<section>
		<h1>GladRags Edit</h1>
		<h2><a hreF="erbjudanden.php">Erbjudanden</a></h2>
		<p>stuff</p>
		<p>Preview</p>
		<h2><a hreF="nyheter.php">Nyheter</a></h2>
		<p>stuff</p>
	</section>
</main>
</body>
</html>