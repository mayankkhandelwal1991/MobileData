<?php
	session_start();
	include_once 'includes/globalVariables.php';
	if(!isset($_SESSION['md_user_email']))
	{
		header("location:$siteName/index.php");
		exit;
	}
?>