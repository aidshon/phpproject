<?
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["blogarray"]) && is_array($_POST["blogarray"])) {
	$blogId=$_POST['blogarray'][0];
	$image=$_POST['blogarray'][1];
	$title=$_POST['blogarray'][2];
	$description=$_POST['blogarray'][3];
	$today=getdate(date("U"));
    require "connection.php";
	
		$sql = "UPDATE `blogs` SET `image` = '$image', `title` = '$title' , `description` = '$description', `date` = '".$today[month]. ", " .$today[mday]. " " .$today[year]."' WHERE `blogs`.`blog_id` = '$blogId' ";
	
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