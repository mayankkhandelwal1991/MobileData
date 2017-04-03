<?php
	include_once '../includes/globalVariables.php';
	include_once '../includes/dbConnection.php';
		$sno		=	$_GET['sno'];
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

	$queryUpdate	=		"update tbl_user_info set cus_name='$cusName',cus_no='$cusNumber',sim_no='$simNumber',
							father_name='$fatherName',altername_no='$alterNumber',FRC='$frcAmount',date='$date',
							rejection='$rejection',resend_id='$resendId',sim_type='$simType',company_name='$companyName',
							sim_selection='$issueType',temporaryNumber='$tempNumber',UPCCode='$upcCode' 
							where sno='".$sno."'";
	if(mysql_query($queryUpdate))
	{
		echo "OK";
		exit();
	}
	else 
	{
		echo "User Information not updated";
		exit();
	}
?>