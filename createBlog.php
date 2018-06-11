<?
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$image = $_POST['image'];
    $title = $_POST['title'];
	$description = $_POST['blogdesc'];
	$today=getdate(date("U"));
    require "connection.php";
	
		$sql = "INSERT INTO `blogs` (`image`, `title`, `description`, `date`) VALUES ('$image', '$title', '$description', '".$today[month]. ", " .$today[mday]. " " .$today[year]."')";
	
		$result = $conn->query($sql);
		
		if ($result===True) {
	        header("location:admin.php");
	    } else {
            echo "Insertion Failed";
	    }
}
?>blogId