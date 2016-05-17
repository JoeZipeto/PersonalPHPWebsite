<?php
// this file will serve as the connection between mysql and the webpage

	$server = "127.0.0.1";
	$username= "temp";
	$password = "";
	$Db = "mailinglist";

	$conn = mysqli_connect($server,$username,$password,$Db );
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>