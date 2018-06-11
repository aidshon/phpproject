<?php
require ("connection.php");
if (isset($_GET['book']))  {
	$book=$_GET['book'];
	$sql="SELECT name, description FROM books WHERE book_id='$book'";
	$result=$conn->query($sql);
	if  ($result->num_rows>0) {
		while ($row=$result->fetch_assoc()) {
			$name=$row['name'];
			$desc=$row['description'];
		}
	}
			echo $name; 
            echo $desc;
}

?>