<?php
include_once 'login.php';
if(isset($_SESSION['login_user'])){
	header("location: profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login - GladRags Admin</title>
<link rel="stylesheet" text="text/css" href="../css/bootstrap-v3.3.7.min.css">
<link rel="stylesheet" text="text/css" href="../css/gladrags-bootstrap.css">
</head>
<body>
<main>
	<section>
		<h1>GladRags Admin</h1>
		<form action="" method="post">
			<label>UserName :</label>
			<input id="name" name="username" placeholder="username" type="text"><br/>
			<label>Password :</label>
			<input id="password" name="password" placeholder="**********" type="password">
			<input name="submit" type="submit" value=" Login ">
			<span><?php echo $error;?></span>
		</form>
	</section>
</main>
</body>
</html>