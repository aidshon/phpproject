<?php
session_start();
if (isset($_SESSION['username']) && ($_SESSION['username'])=='admin') {
	echo "Hello ". $_SESSION['username'];
	?>
	<form action="deadSession.php">
	<input type="submit">
	</form>
	<?php
}
else 
echo "you are not an admin";
?>