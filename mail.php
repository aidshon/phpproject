<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$to = "shongarieva@mail.ru";
	$title = $_POST['subject'];
	$message = $_POST['message'];

    if(@mail($to, $title, $message)) {
        echo '<script language="javascript">';
        echo 'alert("Message successfully sent")';
        echo '</script>';
    }
    else{
        echo '<script language="javascript">';
        echo 'alert("Message is unsent")';
        echo '</script>';
    }
    }
?>