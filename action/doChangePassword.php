<?php
	session_start();
	include_once '../includes/globalVariables.php';
	include_once '../includes/dbConnection.php';
	
	$newPassword	=	$_POST['newPassword'];
	$oldPassword	=	$_POST['oldPassword'];
	
	$email			=	$_SESSION['md_user_email'];
	
	if($oldPassword == $newPassword){
		echo "Old password and new password are same.";
		exit;
	}
	$updateQuery	=	"update tbl_admin set password = '$newPassword' where emailId='$email'";
	$resultQuery	=	mysql_query($updateQuery);
	if(mysql_affected_rows() > 0){
		echo "Password change successfully.";
		exit();
	}else {
		echo "Old password not match.";
		exit();
	}
?>