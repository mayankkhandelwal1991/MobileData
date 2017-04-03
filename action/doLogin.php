<?php
	session_start();
	include_once '../includes/globalVariables.php';
	include_once '../includes/dbConnection.php';
	
	$email		=	$_POST['email']	;
	$password	=	$_POST['password'];
	$password	=	md5($password);
	
	$checkEmail	=	"select 'a' from tbl_admin where emailId='$email' and password ='$password'";
	$result		=	mysql_query($checkEmail);
	
	if(mysql_num_rows($result)>0)
	{
		$_SESSION['md_user_email']	=	$email;
		if($email == $adminId)
		{
			header("location:$siteName/adminHomePage.php");
			exit;
		}else {
			header("location:$siteName/userHomePage.php");
		}
	}
	else
	{
		$_SESSION['md_login_status']	=	"fail";
		@header("location:$siteName/loginPage.php");	
	}
?>