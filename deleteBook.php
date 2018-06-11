<?php
session_start();

    require "connection.php";
	if (isset($_GET['delBook'])) {
		$bookId=$_GET['delBook'];
		$sql = "DELETE FROM `books` WHERE `book_id`='$bookId'" ;
	
		$result = $conn->query($sql);
		
		if ($result===True) {
			header("location:admin.php");
	    } else {
            echo "Deletion Failed";
	    }
	}
?>