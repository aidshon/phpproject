<?php
session_start();

    require "connection.php";
	if (isset($_GET['delBlog'])) {
		$blogId=$_GET['delBlog'];
		$sql = "DELETE FROM `blogs` WHERE `blog_id`='$blogId'" ;
		$result = $conn->query($sql);
		
		if ($result===True) {
			header("location:admin.php");
	    } else {
            echo "Deletion Failed";
	    }
	}
?>