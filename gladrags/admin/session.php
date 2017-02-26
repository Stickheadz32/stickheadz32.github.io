<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include_once 'connect.php';
$mysqli = mysqli_connect($hostname,$username,$password,$dbname);
// Selecting Database
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$sql=$mysqli->query("select username from admin where username='$user_check'");
$row = $sql->fetch_assoc();
$login_session=$row['username'];
if(!isset($login_session)){
	$mysqli->close(); // Closing Connection
	header('Location: index.php'); // Redirecting To Home Page
}
?>