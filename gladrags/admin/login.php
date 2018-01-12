<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])){
	if (empty($_POST['username']) || empty($_POST['password'])){
		$error = "Username or Password is invalid";
	}else{
		// Define $username and $password
		$username=$_POST['username'];
		$password=$_POST['password'];
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		include_once 'connect.php';
		$mysqli = mysqli_connect($hostname,$username,$password,$dbname);
		// To protect MySQL injection for Security purpose
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = $mysqli->real_escape_string($username);
		$password = $mysqli->real_escape_string($password);
		$password = sha1($password);
		// SQL query to fetch information of registerd users and finds user match.
		$result = $mysqli->query("select * from admin where password='$password' AND username='$username'");
		$rows = $result->num_rows;
		if ($rows == 1){
			$_SESSION['login_user']=$username; // Initializing Session
			header("location: profile.php"); // Redirecting To Other Page
		} else {
			$error = "Username or Password is invalid";
		}
		$mysqli->close(); // Closing Connection
	}
}
?>