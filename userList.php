<?php
	include_once 'checkSession.php';
	$navSelected	=	"user-list";
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="js/subModal/style.css" />
		<script type="text/javascript" src="js/subModal/common.js"></script>
		<script type="text/javascript" src="js/subModal/subModal.js"></script>
		<link rel="stylesheet" type="text/css" href="js/subModal/subModal.css" />
	    <script type="text/javascript" src="js/eye.js"></script>
	    <script type="text/javascript" src="js/utils.js"></script>
	    <script type="text/javascript" src="js/layout.js?ver=1.0.2"></script>
	    
		<script type="text/javascript" src="<?php echo $siteName;?>/js/jquery-latest.js"></script>
  		<link rel="stylesheet" href="<?php echo $siteName;?>/css/datepicker.css" type="text/css" />
		<script type="text/javascript" src="<?php echo $siteName;?>/js/datepicker.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo $siteName;?>/css/main.css" />
		<script type="text/javascript">
			var globalStartForm		=	0;
			function callmeAfterClosing(){
				window.location.reload();	
			}
			function editData(start,order)
			{
				globalStartForm	=	start;
				$.post('action/doUserDetails.php?start='+start+'&order='+order, $("#idSearchPage").serialize(),function(data)
				{
					$("#divUserData").html(data);
					$("#divUserData").show();	
					afterloading();
				});
				return false;
			}
			function afterloading(){
				$(".class_pagination a").click(function (){
					editData(this.id,'start');
				});
			}
			function deleteUserDetail(id){
				if(confirm("Are you sure want to delete this user!!")){
					$.post('action/doDeleteUserDetails.php?sno='+id,function(data)
					{
						alert(data);
						editData(globalStartForm,'start');
						afterloading();
					});
					return false;
				}
			}
			function clickOnCheckBox(id,type){
				var isVerified	=	0;
				if(type == "isFRCDone"){
					isVerified	=	$('#isFRC'+id).attr('checked')?1:0;
				}else{
					isVerified	=	$('#isVerified'+id).attr('checked')?1:0;
				}
				$.post('action/doUpdateIsVerified.php?sno='+id+'&isVerifiedVal='+isVerified+'&type='+type,function(data)
				{
					alert(data);
					editData(globalStartForm,'start');
					afterloading();
				});
				return false;				
			}
			$(function() {
		 		var currentDate	=	new Date();
		 		
			 	$('#idToDate').DatePicker({
			 		format:'Y-m-d',		 		
			 		date: currentDate,
			 		current: currentDate,
			 		starts: 1,
			 		position: 'r',
			 		onBeforeShow: function(){
			 			$('#iTodDate').DatePickerSetDate(currentDate, true);
			 		},
			 		onChange: function(formated, dates){
			 			$('#idToDate').val(formated);
		 				$('#idToDate').DatePickerHide();
			 		}
			 	});
			 	$('#idFromDate').DatePicker({
			 		format:'Y-m-d',		 		
			 		date: currentDate,
			 		current: currentDate,
			 		starts: 1,
			 		position: 'r',
			 		onBeforeShow: function(){
			 			$('#idFromDate').DatePickerSetDate(currentDate, true);
			 		},
			 		onChange: function(formated, dates){
			 			$('#idFromDate').val(formated);
			 			$('#idFromDate').DatePickerHide();
			 		}
			 	});
			});
		</script>
	</head>
	<body onload="return editData(0,'start');">
		<div class="class_wrapper">
			<?php include_once 'includes/header.php';?>
			<div class="class_div_container">
				<div class="class_div_panel_search">
					<div class="class_div_panel_header">Search User</div>
					<form action="" id="idSearchPage" name="searchPage" method="post">
						<table cellpadding="3" cellspacing="3" style="width:100%;">
							<tr>
								<td>Company Name</td>
								<td>
									<select style="width: 160px;" name="companyName">
										<option value="">Select Company Type</option>
										<option value="Aircel">Aircel</option>
										<option value="Airtel">Airtel</option>
										<option value="Reliance">Reliance</option>
										<option value="BSNL">BSNL</option>
										<option value="Idea">Idea</option>
										<option value="Vodaphone">Vodaphone</option>
										<option value="MTS">MTS</option>
										<option value="docomo">Docomo</option>
									</select>
								</td>
								<td>Sim Type</td>
								<td>
									<select style="width: 160px;" name="simType">
										<option value="">Select Sim Type</option>
										<option value="GSM">GSM</option>
										<option value="CDMA">CDMA</option>
									</select>		
								</td>
							</tr>
							<tr>
								<td>Sim ISSUE Type</td>
								<td>
									<select style="width: 160px;" name="simIssueType">
										<option value="">Select Sim Issue Type</option>
										<option value="NEW">NEW</option>
										<option value="MNP">MNP</option>
									</select>		
								</td>
								<td>FRC Amount</td>
								<td><input type="text" name="frcAmount" id="idFrcAmount" value=""></td>
							</tr>
							<tr>
								<td>From Date</td>
								<td><input type="text" name="fromDate" id="idFromDate" value=""></td>
								<td>To Date</td>
								<td><input type="text" name="toDate" id="idToDate" value=""></td>
							</tr>
							<tr>
								<td>Customer Name</td>
								<td><input type="text" name="cusName" id="idCusName" value="" placeholder="Customer name"></td>
								<td>Customer Number</td>
								<td><input type="text" name="cusNumber" id="idCusNumber" value="" placeholder="Customer number"></td>
							<tr>
								<td></td>
								<td><input value="Submit" type="button" name="btnSearch" id="idBtnSearch" onclick="return editData(0,'start');"></td>
							</tr>
						</table>
					</form>
					<div class="class_div_panel_header">Search User List</div>
					<div id="divUserData"></div>
				</div>
			</div>
			<?php include_once 'includes/footer.php';?>
		</div> 
	</body>
</html>
