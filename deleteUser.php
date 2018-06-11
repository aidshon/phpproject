<?php
  session_start();  
  if(isset($_SESSION['username'])){
  	require ("connection.php");
		$sql = "Delete from users where username='".$_SESSION['username']."' ";
		$result = $conn->query($sql);
		if ($result===True) {
	        session_unset(); 
        session_destroy(); 
  
	echo "Deleted successfully";
	} else {
    echo "Failed";
	}
	$conn->close();
	 }
  else
      echo "Error";
?>