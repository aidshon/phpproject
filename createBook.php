<?
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$bookId=$_POST['bookId'];
    $bookname = $_POST['bookname'];
	$image = $_POST['bookimage'];
	$author = $_POST['bookauthor'];
	$genreId = $_POST['bookgenre'];
	$year = $_POST['bookyear'];
	$description = $_POST['bookdesc'];
	$pdf = $_POST['bookpdf'];
	$bestNew=$_POST['bestNew'];

    require "connection.php";
	
		$sql = "INSERT INTO `books` (`book_id`, `name`, `image`, `author`, `genre_id`, `year`, `description`, `pdf`, `best_new`) VALUES ('$bookId', '$bookname', '$image', '$author', '$genreId', '$year', '$description', '$pdf', '$bestNew')";
	
		$result = $conn->query($sql);
		
		if ($result===True) {
	        header("location:admin.php");
	    } else {
            echo "Insertion Failed";
	    }
}
?>