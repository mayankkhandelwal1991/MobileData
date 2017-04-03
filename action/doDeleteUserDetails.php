<?php
	
	include_once '../checkSession.php';
	include_once '../includes/dbConnection.php';
	
	$sno		=	$_GET['sno'];
	$queryData	=	"delete from tbl_user_info where sno='$sno'";
	if(mysql_query($queryData)){
		echo "User deleted successfully done.";
	}else {
		echo "Not deleted. Please try again";
	}
?>