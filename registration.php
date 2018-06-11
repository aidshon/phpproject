<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $firstname = $_POST['first-name'];
    $lastname = $_POST['last-name'];
    $user = $_POST['reg-username'];
    $email = $_POST['email'];
	$pass = $_POST['reg-password'];
	
	if ($firstname!=NULL && $lastname!=NULL && $user!=NULL && $email!=NULL && $pass!=NULL) {
	    require "connection.php";
		$sql = "INSERT INTO `users` (`firstname`, `lastname`, `username`, `email`, `password`) VALUES ('".$firstname."', '".$lastname."', '".$user."', '".$email."', '".$pass."');";
		$result = $conn->query($sql);
		
		if ($result===True) {
			header("location:index.php");
	    } else {
        echo "Failed";
	    }
	}
	else echo "User or password is empty";
}
?>