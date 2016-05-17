<?php
	// this script is a set of all the functions I will be using for the website. its mostly for validation but also to send mail and add users to the database	
	include('php/connMysqlDb.php');
	// check to see if the field is	blank
	
	function Has_presence($value) 
	{
	  return	isset($value) || !empty($value);
	}
	
	function check_email($email)
	{
	 	return !filter_var($email_address,FILTER_VALIDATE_EMAIL) ? true: false;
	}
	
	//loop through each field and check if they are empty
	function required_field($required) 
	{		
		 global $errors;
		 foreach($required as $field)
		{
			$value = trim($_POST[$field]);		
			if(check_if_empty($value))
			 {
			 	$errors[$field]=ucfirst($field) . " Cannot be Blank";	 
			 }
 	 	 }
		return $errors;
 	}
?>