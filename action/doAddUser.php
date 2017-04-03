<?php
	include_once '../checkSession.php';
	include_once '../includes/dbConnection.php';
	
	$storeUserEmail	=	$_SESSION['md_user_email'];
	
	$cusName		=	$_POST['cusName'];
	$fatherName		=	$_POST['cusFatherName'];
	$cusNumber		=	$_POST['cusNumber'];
	$simNumber		=	$_POST['simNumber'];
	$alterNumber	=	$_POST['alNumber'];
	$frcAmount		=	$_POST['frcAmount'];
	$date			=	$_POST['date'];
	$rejection		=	$_POST['rejection'];
	$simType		=	$_POST['simType'];
	$companyName	=	$_POST['companyName'];
	$resendId		=	$_POST['resendId'];
	$issueType		=	$_POST['simIssueType'];
	$tempNumber		=	"";
	$upcCode		=	"";	
	if($issueType == 'MNP'){
		$tempNumber		=	$_POST['tempNumber'];
		$upcCode		=	$_POST['upcCode'];
	}
	$query		=	"select 'a' from tbl_user_info where cus_no = '$cusNumber'";
	$result		=	mysql_query($query);
	if(mysql_num_rows($result)>0){
		echo "Customer number already available.Please try again";
		exit();
	}
	else{
		$queryInsert	=	"Insert into tbl_user_info (cus_name,cus_no,sim_no,father_name,altername_no,
							FRC,date,rejection,resend_id,sim_type,company_name,sim_selection,temporaryNumber,UPCCode,store_user_email)
							values('$cusName','$cusNumber','$simNumber','$fatherName','$alterNumber','$frcAmount',
							'$date','$rejection','$resendId','$simType','$companyName','$issueType','$tempNumber','$upcCode','$storeUserEmail')";
		$result			=	mysql_query($queryInsert);
		if(mysql_affected_rows()>0)
		{
			echo "OK";
			exit();
		}
		else 
		{
			echo "Some error occured";
			exit();
		}
	}
?>