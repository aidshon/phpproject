<?php
session_start();

    require "connection.php";
	if (isset($_GET['delGenre'])) {
		$genreId=$_GET['delGenre'];
		$sql = "DELETE FROM `genres` WHERE `genre_id`='$genreId'" ;
	
		$result = $conn->query($sql);
		
		if ($result===True) {
			header("location:admin.php");
	    } else {
            echo "Deletion Failed";
	    }
	}
?>