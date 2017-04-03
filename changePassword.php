<?php
	include_once 'checkSession.php';
	$navSelected	=	"change-password";
?>
<!DOCTYPE>
<html>
	<head>
		<script type="text/javascript" src="<?php echo $siteName;?>/js/jquery-latest.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo $siteName;?>/css/main.css" />	
		<script type="text/javascript">
			function ValidateChangePassword()
			{
				if($("#idOldPassword").val() == "")
				{
						alert("Please enter old password");
						$("#idOldPassword").focus();
						return false;
				}
				if($("#idNewPassword").val() == "")
				{
						alert("Please enter New password");
						$("#idNewPassword").focus();
						return false;
				}
				if($("#idConfirmPassword").val() == "")
				{
						alert("Please enter Confirm Password");
						$("#idConfirmPassword").focus();
						return false;
				}
				if($("#idNewPassword").val() != $("#idConfirmPassword").val())
				{
						alert("Both New Password and Confirm password should be same");
						$("#idConfirmPassword").focus();
						return false;
				}
				$.post("action/doChangePassword.php",$("#idChangePasswordPage").serialize(),function(data)
				{
					if(data == "OK")
					{
						data	=	"Password Change Successfully."
						$("#msgIndex").html(data);
						$("#msgIndex").show();
						Reset();
					}
					else
					{
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
					<div class="class_div_panel_header">Change Password</div>
					<form id="idChangePasswordPage" action="" method="post" onsubmit="return ValidateChangePassword();">
						<table cellpadding="5" cellspacing="5" style="width: 50%; margin :0px auto;">
							<tr>
								<td>Old Password</td>
								<td><input type="text" name="oldPassword" id="idOldPassword" placeholder="Old password"></td>
							</tr>
							<tr>
								<td>New Password</td>
								<td><input type="text" name="newPassword" id="idNewPassword" placeholder="New password"></td>
							</tr>
							<tr>
								<td>Confirm Password</td>
								<td><input type="text" name="confirmPassword" id="idConfirmPassword" placeholder="Re-enter password"></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="changePassword" id="idChangePassword" value="Change password"></td>
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
