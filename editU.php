<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
	$pass = $_POST['password'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email=$_POST['email'];

	require "connection.php";
	if ($pass!="" && $user!="") {
		$sql = "UPDATE `users` SET `firstname` = '".$firstname."', `lastname` = '".$lastname."' , `username` = '".$user."' ,`password` = '".$pass."', `email` = '".$email."'  WHERE `users`.`username` = '".$_SESSION['username']."'";
		$result = $conn->query($sql);
	}
	else {
		echo "Enter your password";
	}
		
		if ($result===True) {
			header("location:main.php");
	$_SESSION["username"] = $user;
	} else {
    echo "Edit Failed";
	}}
?>