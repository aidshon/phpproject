<?php
session_start();
include ("header.php");
?>
<p id="not-admin-text">Restricted. You are not an admin.</p>
<style type="text/css">
	#not-admin-text {
	margin-top: 100px;
	color: red;
	font-family: 'PT Sans', sans-serif;
    font-weight: bold;
    font-size: 25px;
}
</style>