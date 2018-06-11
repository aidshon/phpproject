<?php
    $servername = "localhost";
    $username = "root";
    $name_db = "bliss";
    $password = "";
    $conn = new mysqli($servername, $username, $password, $name_db);
    if ($conn->connect_error) {
			die("Connection failed: ".$conn->connect_error);
		}
    ?>