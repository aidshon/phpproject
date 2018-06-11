<?
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$user_id=$_SESSION['user_id'];
	$user=$_POST['author'];
	$blog_id=$_POST['blog_id'];
	$comment=$_POST['comment'];
	$date=$_POST['date'];

    require "connection.php";
	
		$sql = "INSERT INTO `comments` (`user_id`, `blog_id`, `comment`, `dateCom`) VALUES ('$user_id', '$blog_id', '$comment', '$date')";
	
		$result = $conn->query($sql);
		
		if ($result===True) {
	        header("location: blog.php");
	    } else {
            echo "Failed";
	    }
}
?>