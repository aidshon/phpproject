<?
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["genrearray"]) && is_array($_POST["genrearray"])) {
	$genreId=$_POST['genrearray'][0];
	$name=$_POST['genrearray'][1];
	$description=$_POST['genrearray'][2];
    require "connection.php";
	
		$sql = "UPDATE `genres` SET `genre_name` = '$name' , `description` = '$description' WHERE `genres`.`genre_id` = '$genreId' ";
	
		$result = $conn->query($sql);
		
		if ($result===True) {
	      header("location:admin.php");
	    } else {
          echo '<script language="javascript">';
          echo 'alert("Edit failed")';
          echo '</script>';
	    }
}
else {
	echo "Not set";
}
?>