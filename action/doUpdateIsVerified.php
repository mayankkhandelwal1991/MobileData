<?php
	include_once '../checkSession.php';
	include_once '../includes/dbConnection.php';
	
	$sno		=	$_GET['sno'];
	$isVerified	=	$_GET['isVerifiedVal'];
	$type		=	$_GET['type'];
	$query 		=	"update tbl_user_info set $type=$isVerified where sno='$sno'";
	$result		=	mysql_query($query);
	if(mysql_affected_rows()>0)
	{
		echo "User Information Updated Successfully";
		exit();
	}
	else 
	{
		echo "User Information not updated";
		exit();
	}
?>