<?php
	require_once 'sessionCheck.php';
?>
<!DOCTYPE script PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<script type="text/javascript" src="js/highslide-full.min.js"></script>
		<script type="text/javascript">
			hs.graphicsDir	=	'js/highslide/graphics/';
			hs.outlineType	=	'rounded-white';
			hs.minWidth		=	'1050';
		</script>
		<script type="text/javascript">
			function editClientInfo(obj,clientId)
			{
				obj.href="doEditUserClientInfo.php?clientId="+clientId;
				//return hs.htmlExpand ( obj, { objectType : 'iframe',preserveContent: false });	
				return hs.htmlExpand(obj,{objectType:'iframe'},hs.Expander.prototype.onAfterClose = function() {
					showClientList();
				});
				
			}
			function showClientCaseInfo(obj,clientId,shortName)
			{
				obj.href="displayClientCasesInfoPage.php?clientId="+clientId+"&shortName="+shortName;
				return hs.htmlExpand ( obj, { objectType : 'iframe',preserveContent: false });
			}
			function addClientCases(obj,clientId,shortName)
			{
				obj.href="addClientCaseInfoPage.php?clientId="+clientId+"&shortName="+shortName;
				return hs.htmlExpand ( obj, { objectType : 'iframe',preserveContent: false,width:'1200'});	
			}
		</script>
		
		<script type="text/javascript">
			function addNewUserClientInfo()
			{	
				if(document.getElementById("idShortName").value=="")
				{
					alert('Client short organization name required.');
					$("#idShortName").focus();
					return false;
				}
				if(document.getElementById("idClientEmail").value!="")
				{
					var  	email			=	document.getElementById("idClientEmail").value;
					var 	emailPattern	= 	/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/ ;  
					if(email.match(emailPattern)==null)
				    {
						alert('Enter valid email');
						$("#idClientEmail").focus();
				        return false;   
				    }
				}
				if(document.getElementById("idClientPhone").value!="")
				{
					var  	userPhone			=	document.getElementById("idClientPhone").value;
					var 	phonePattern 		= 	/^[0-9]{0,15}$/; 
					if(userPhone.match(phonePattern)==null)
				    {
						alert('Enter valid phone number.');
						$("#idClientPhone").focus();
				        return false;   
				    }
				}
				if(document.getElementById("idClientMobile").value=="")
				{
					alert('Client mobile number required.');
					$("#idClientMobile").focus();
					return false;
				}
				else
				{
					var  	userMobile			=	document.getElementById("idClientMobile").value;
					var 	mobPattern 		= 	/^[0-9]{10}$/; 
					if(userMobile.match(mobPattern)==null)
				    {
						alert('Enter valid mobile number.');
						$("#idClientMobile").focus();
				        return false;   
				    }
				}
				
				$('#addnewUserClientMsg').show();
				$.post("addNewUserClient.php",$('#addNewUserClientForm').serialize(),function(data){
					$('#addnewUserClientMsg').html(data);
					clearClientInput();
					showClientList();
				});
				return false;
			}

			function clearClientInput()
			{
				$("#addNewClientDiv :input").attr('value','');
		        $("#addNewClientButton :input").attr('value','Save Client');
				return false;
			}
		</script>
	</head>
	<body>
		<div id="addNewClientDiv" class="classContainerDiv" style="min-height: 600px;overflow: auto;">
			<form id="addNewUserClientForm" action="" method="post" onsubmit="return addNewUserClientInfo();">
				<table id="table_addClient" class="classTable" align="center" cellpadding="10px;" width="100%">
					<tr>
						<td>Client Organization : </td>
						<td><input type="text" name="organizationName"></td>
						<td>Client Short Name : </td>
						<td><input type="text" id="idShortName" name="shortName"> ( For Eg : "Excise" can a short name for "Excise Commissioner" )</td>
					</tr>
					<tr>
						<td>Client Contact Person : </td>
						<td><input type="text" name="address"></td>
						<td>E-mail : </td>
						<td><input type="text" id="idClientEmail" name="clientEmail"></td>
					</tr>
					<tr>
						<td>Land Line Phone : </td>
						<td><input type="text" id="idClientPhone" name="clientPhone"></td>
						<td>Mobile Phone : </td>
						<td><input type="text" id="idClientMobile" name="clientMobile"> ( Put only 10 digit number without any prefixes like +91 etc" )</td>
					</tr>
					<tr>
						<td colspan="4"><span id="addNewClientButton"><input type="submit" value="Add Client"></span></td>
					</tr>
				</table>
			</form>
			<div id="addnewUserClientMsg" style="display: none;text-align: center;font-size: 8pt;"></div>
			<div id="clientInfoList"></div>
		</div>
	</body>
</html>
