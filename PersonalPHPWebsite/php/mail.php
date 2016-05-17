<?php
	// this script is a set of all the functions I will be using for the website. its for adding, deleting and users to the database
	
	include('php/connMysqlDb.php');
	
	// add user to the database
	function add_user_email($email) 
	{
		$EMAIL =	mysql_real_escape_string($email);
		$new = mysql_query("INSERT INTO 'email'('email') VALUES ('$EMAIL')");
		return ($new !== false ? true : false);	
	}
	
	// remove user from the database
	
	function remove_user_email($email) 
	{
		$email =	mysql_real_escape_string($email);
		$remove = mysql_query("DELETE FROM ('email') WHERE 'email' == {$email}");	
	}
	
	// send mail to all
	
	function send_mail_to_all ($subject, $message,$headers) 
	{
		mail($to, $subject, $message, $headers);		
	}
	
	// check to see if the field is blank
	
	
	
?>