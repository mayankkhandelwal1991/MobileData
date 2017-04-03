<?php
	include_once 'checkSession.php';
	include_once 'includes/dbConnection.php';
	
	$sno		=	$_GET['sno'];
	$queryData	=	"select * from tbl_user_info where sno='".$sno."'";
	$result		=	mysql_query($queryData);
	$rows		=	mysql_fetch_array($result);
?>
<!DOCTYPE>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo $siteName;?>/css/main.css" />
		<script type="text/javascript" src="<?php echo $siteName;?>/js/jquery-latest.js"></script>
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
			function ValidateEditUser(){
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
				$.post("action/doEditData.php?sno=<?php echo $rows['sno'] ;?>", $("#idEditUser").serialize(),function(data)
				{
					if(data == "OK"){
						$("#msg").css({"color":"green"});
						$("#msg").html("User information updated successfully done.");
						$("#msg").show();
					}else {
						$("#msg").css({"color":"red"});
						$("#msg").html(data);
						$("#msg").show();
					}	
				});
				return false;
			}
		</script>
	</head>
	<body>
		<div class="class_div_panel_header" style="padding-top:10px;">Edit User Details</div>
		<form id="idEditUser" action="" method="post" onsubmit=" return ValidateEditUser();">
			<table cellpadding="5" cellspacing="5" style="width: 100%;">
				<tr>
					<td>Customer Number:<span style="color: red;">*</span></td>
					<td><input type="text" name="cusNumber" id="idCusNumber" value="<?php echo $rows['cus_no'];?>" /></td>
					<td>Customer Name:<span style="color: red;">*</span></td>
					<td><input type="text" name="cusName" id="idCusName" value="<?php echo $rows['cus_name']; ?>" /></td>
				</tr>
				<tr>
					<td>Customer Father Name:<span style="color: red;">*</span></td>
					<td><input type="text" name="cusFatherName" id="idCusFatherName" value="<?php echo $rows['father_name']; ?>" /></td>
					<td>FRC Amount:<span style="color: red;">*</span></td>
					<td><input type="text" name="frcAmount" id="idfrcAmount" value="<?php echo $rows['FRC']; ?>" /></td>
				</tr>
				<tr>
					<td>Alternate Number:</td>
					<td><input type="text" name="alNumber" id="idAlNumber"  value="<?php echo $rows['altername_no']; ?>" /></td>
					<td>Date:<span style="color: red;">*</span></td>
					<td><input type="text" name="date" id="idDate"  value="<?php echo $rows['date']; ?>" /></td>
				</tr>
				<tr>
					<td>Sim Number:</td>
					<td><input type="text" name="simNumber" id="idSimNumber"  value="<?php echo $rows['sim_no']; ?>" /></td>
					<td>Company Name:</td>
					<td>
						<select style="width: 160px;" name="companyName">
							<option value="Aircel" <?php if($rows['company_name'] == "Aircel"){echo "selected=selected";}?>>Aircel</option>
							<option value="Airtel" <?php if($rows['company_name'] == "Airtel"){echo "selected=selected";}?>>Airtel</option>
							<option value="Reliance" <?php if($rows['company_name'] == "Reliance"){echo "selected=selected";}?>>Reliance</option>
							<option value="BSNL" <?php if($rows['company_name'] == "BSNL"){echo "selected=selected";}?>>BSNL</option>
							<option value="Idea" <?php if($rows['company_name'] == "Idea"){echo "selected=selected";}?>>Idea</option>
							<option value="Vodaphone" <?php if($rows['company_name'] == "Vodaphone"){echo "selected=selected";}?>>Vodaphone</option>
							<option value="MTS" <?php if($rows['company_name'] == "MTS"){echo "selected=selected";}?>>MTS</option>
							<option value="docomo" <?php if($rows['company_name'] == "docomo"){echo "selected=selected";}?>>Docomo</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Rejection:</td>
					<td><input type="text" name="rejection" id="idRejection"></td>
					<td>Resend Id:</td>
					<td><input type="text" name="resendId" id="idResendId"></td>
				</tr>
				<tr>
					<td>MNP/NEW SIM:</td>
					<td>
						<select style="width: 160px;" name="simIssueType" id="idSimIssueType" onchange="return showMnpTxtBox();">
							<option value="NEW" <?php if($rows['sim_selection'] == "NEW"){echo "selected=selected";}?>>NEW</option>
							<option value="MNP" <?php if($rows['sim_selection'] == "MNP"){echo "selected=selected";}?>>MNP</option>
						</select>		
					</td>
					<td>Sim Type:</td>
					<td>
						<select style="width: 160px;" name="simType">
							<option value="GSM" <?php if($rows['sim_type'] == "GSM"){echo "selected=selected";}?>>GSM</option>
							<option value="CDMA" <?php if($rows['sim_type'] == "CDMA"){echo "selected=selected";}?>>CDMA</option>
						</select>		
					</td>
				</tr>
				<tr id="mnpTxtField" style="display: none;">
					<td>Temporary Number:<span style="color: red;">*</span></td>
					<td><input type="text" name="tempNumber" id="idTempNumber" value="<?php echo $rows['temporaryNumber']; ?>" / ></td>
					<td>UPC code:<span style="color: red;">*</span></td>
					<td><input type="text" name="upcCode" id="idUpcCode"  value="<?php echo $rows['UPCCode']; ?>" /></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="btnAddUser" id="idAddUser" value="Update"></td>
				</tr>
			</table>
		</form>
		<div id="msg" align="center" class="class_div_msgIndex"></div>
	</body>
</html>
