<?php
	include_once '../includes/globalVariables.php';
	include_once '../includes/dbConnection.php';
	
	$name		=	$_POST['name'];
	$password	=	$_POST['password'];
	$email		=	$_POST['email'];
	$contact	=	$_POST['contact'];
	
	$password	=	md5($password);
	
	$query		=	"select 'a' from tbl_admin where emailid = '$email'";
	$result		=	mysql_query($query);
	
	if(mysql_num_rows($result)>0)	{
		echo "This email id is already register with us.Please try another one";
		exit();
	}else {
		$queryInsert	=	"Insert into tbl_admin (username,password,emailid,contactno) 
							values('$name','$password','$email','$contact')";
		$result			=	mysql_query($queryInsert);
		if(mysql_affected_rows()>0)	{
			echo "OK";
			exit();
		}else{
			echo "In user registration some error. Please try again.";
			exit();
		}
	}
?>