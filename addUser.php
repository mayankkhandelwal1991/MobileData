<?php
	include_once 'checkSession.php';
	$navSelected	=	"add-user";
?>
<!DOCTYPE>
<html>
	<head>
		<script type="text/javascript" src="<?php echo $siteName;?>/js/jquery-latest.js"></script>
		<link rel="stylesheet" href="<?php echo $siteName;?>/css/datepicker.css" type="text/css" />
		<script type="text/javascript" src="<?php echo $siteName;?>/js/datepicker.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo $siteName;?>/css/main.css" />
		<script type="text/javascript">
		 	$(function() {
			 	$("#idCusNumber").focus();
		 		var currentDate	=	new Date();
		 		var dd;
		 		var mm;
		 		var yyyy;
		 		dd		=	currentDate.getDate();
		 		mm		=	currentDate.getMonth();
		 		yyyy	=	currentDate.getFullYear();
				var date;
				var month;
				date	=	(+dd)+(+1);
				month	=	(+mm)+(+1);
				//document.getElementById('idDate').value = yyyy + '-' + month + '-' + dd;
		 		
			 	$('#idDate').DatePicker({
			 		format:'Y-m-d',		 		
			 		date: currentDate,
			 		current: currentDate,
			 		starts: 1,
			 		position: 'r',
			 		onBeforeShow: function(){
			 			$('#idDate').DatePickerSetDate(currentDate, true);
			 		},
			 		onChange: function(formated, dates){
							$('#idDate').val(formated);
			 		//	if ($('#closeOnSelect input').attr('checked')) {
			 				$('#idDate').DatePickerHide();
			 			//}
			 		}
			 	});
			});
			function showMnpTxtBox(){
				if($("#idSimIssueType").val() == "MNP"){
					$("#mnpTxtField").css("display","table-row");
				}else {
					$("#mnpTxtField").css("display","none");
				}
			}
			function ValidateAddUser(){
				if($("#idCusNumber").val() == ""){
						alert("Please enter customer number");
						$("#idCusNumber").focus();
						return false;
				}
				if($("#idCusName").val() == ""){
						alert("Please enter customer name");
						$("#idCusName").focus();
						return false;
				}
				if($("#idCusFatherName").val() == ""){
						alert("Please enter father name");
						$("#idCusFatherName").focus();
						return false;
				}
				if($("#idfrcAmount").val() == ""){
						alert("Please enter frc amount");
						$("#idfrcAmount").focus();
						return false;
				}
				if($("#idDate").val() == ""){
					alert("Please enter date");
					$("#idDate").focus();
					return false;
				}
				if($("#idSimIssueType").val() == "MNP"){
					if($("#idTempNumber").val() == ""){
						alert("Please enter temporary number");
						$("#idTempNumber").focus();
						return false;
					}
					if($("#idUpcCode").val() == ""){
						alert("Please enter UPC code");
						$("#idUpcCode").focus();
						return false;
					}	
				}
				$.post("action/doAddUser.php",$("#idAddUserPage").serialize(),function(data)
				{
					if(data == "OK")
					{
						$("#msgIndex").css({"color":"green"});
						data	=	"New user added successfully done.";
						$("#msgIndex").html(data);
						$("#msgIndex").show();
						Reset();
					}
					else
					{
						$("#msgIndex").css({"color":"red"});
						$("#msgIndex").html(data);
						$("#msgIndex").show();
					}	
				});
				return false;
			}
		</script>
	</head>
	<body>
		<div class="class_wrapper">
			<?php include_once 'includes/header.php';?>
			<div class="class_div_container">
				<div class="class_div_panel_search">
					<div class="class_div_panel_header">Add new user</div>
					<form id="idAddUserPage" action="" method="post" onsubmit="return ValidateAddUser();">
						<table cellpadding="5" cellspacing="5" style="width:100%;">
							<tr>
								<td>Customer Number:<span style="color: red;">*</span></td>
								<td><input type="text" name="cusNumber" id="idCusNumber" placeholder="ie. 1234567890"></td>
								<td>Customer Name:<span style="color: red;">*</span></td>
								<td><input type="text" name="cusName" id="idCusName" placeholder="Customer name"></td>
							</tr>
							<tr>
								<td>Customer Father Name:<span style="color: red;">*</span></td>
								<td><input type="text" name="cusFatherName" id="idCusFatherName" placeholder="Father name"></td>
								<td>FRC Amount:<span style="color: red;">*</span></td>
								<td><input type="text" name="frcAmount" id="idfrcAmount" placeholder="FRC amount"></td>
							</tr>
							<tr>
								<td>Alternate Number:</td>
								<td><input type="text" name="alNumber" id="idAlNumber" placeholder="Alternate number"></td>
								<td>Date:<span style="color: red;">*</span></td>
								<td><input type="text" name="date" id="idDate" value="" autocomplete="off" placeholder="date"></td>
							</tr>
							<tr>
								<td>Sim Number:</td>
								<td><input type="text" name="simNumber" id="idSimNumber" placeholder="Sim number"></td>
								<td>Company Name:</td>
								<td>
									<select style="width: 160px;" name="companyName">
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
							</tr>
							<tr>
								<td>Rejection:</td>
								<td><input type="text" name="rejection" id="idRejection" placeholder="Rejection id"></td>
								<td>Resend Id:</td>
								<td><input type="text" name="resendId" id="idResendId" placeholder="Resend id number"></td>
							</tr>
							<tr>
								<td>MNP/NEW SIM:</td>
								<td>
									<select style="width: 160px;" name="simIssueType" id="idSimIssueType" onchange="return showMnpTxtBox();">
										<option value="NEW">NEW</option>
										<option value="MNP">MNP</option>
									</select>		
								</td>
								<td>Sim Type:</td>
								<td>
									<select style="width: 160px;" name="simType">
										<option value="GSM">GSM</option>
										<option value="CDMA">CDMA</option>
									</select>		
								</td>
							</tr>
							<tr id="mnpTxtField" style="display: none;">
								<td>Temporary Number:<span style="color: red;">*</span></td>
								<td><input type="text" name="tempNumber" id="idTempNumber" placeholder="MNP temp number"></td>
								<td>UPC code:<span style="color: red;">*</span></td>
								<td><input type="text" name="upcCode" id="idUpcCode" placeholder="UPC code"></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="btnAddUser" id="idAddUser" value="Add new user"></td>
							</tr>
						</table>
						<div id="msgIndex" class="class_div_msgIndex"></div>
					</form>
				</div> 
			</div>
			<?php include_once 'includes/footer.php';?>
		</div>
	</body>
</html>