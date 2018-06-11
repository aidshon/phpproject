<?php
session_start();
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$user=$_POST['username'];
	$pass=$_POST['password'];

	if ($user!=null && $pass!=null) {
		//connection
		require "connection.php";
		$sql="SELECT user_id, username, password FROM users where username='".$user."' and password='".$pass."'";
		$result=$conn->query($sql);
		if ($result->num_rows>0) {
			//output data of each row
			while ($row=$result->fetch_assoc()) {
				//echo " userName: " . $row["username"]. "- Pass: " . $row["password"]. "<br>";
				if ($row["username"]=="bliss-admin") {
	            $_SESSION["username"]=$user;
	            $_SESSION["password"]=$pass;
	            header("location:admin.php");
				}
				else {
	            $_SESSION["username"]=$user;
	            $_SESSION['user_id']=$row['user_id'];
	            header("location:main.php");
				}
			}
		}
		else {
			echo
			"User or password is incorrect";
		}
		$conn->close(); 
	}
	else
		echo "Username or password is empty";
}
?>