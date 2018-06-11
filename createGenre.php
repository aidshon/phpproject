<?
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $genrename = $_POST['genrename'];
	$description = $_POST['genredesc'];

    require "connection.php";
	if ($genreId!=NULL && $genrename!=NULL && $description!=NULL) {
		$sql = "INSERT INTO `genres` (`genre_name`, `description`) VALUES ('$genrename', '$description')";
	
		$result = $conn->query($sql);
		
		if ($result===True) {
	        header("location:admin.php");
	    } else {
            echo "Insertion Failed";
	    }
	}
	else {
		echo "No data";
	}
}
?>