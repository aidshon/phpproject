<?
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["bookarray"]) && is_array($_POST["bookarray"])) {
	$bookId=$_POST['bookarray'][0];
	$name=$_POST['bookarray'][1];
	$image=$_POST['bookarray'][2];
	$author=$_POST['bookarray'][3];
	$genre=$_POST['bookarray'][4];
	$year=$_POST['bookarray'][5];
	$desc=$_POST['bookarray'][6];
	$pdf=$_POST['bookarray'][7];
	$bestNew=$_POST['bookarray'][8];
    require "connection.php";
	
		$sql = "UPDATE `books` SET `name` = '$name' , `image` = '$image', `author` = '$author' , `genre_id` = '$genre' , `year` = '$year', `description` = '$desc', 
		`pdf` = '$pdf', `best_new` = '$bestNew' WHERE `books`.`book_id` = '$bookId' ";
	
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