<?php
	session_Start();
	include_once 'includes/globalVariables.php';
	
	if(isset($_SESSION['md_user_email'])){
		if($_SESSION['md_user_email'] == $adminEmailId){
			header("location:$siteName/adinHomePage.php");
			exit;
		}else {
			header("location:$siteName/userList.php");
			exit;
		}
		exit;
	}
	$navSelected	=	"index";
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo $siteName;?>/css/main.css" />
		<script type="text/javascript" src="<?php echo $siteName;?>/js/jquery-latest.js"></script>
		<script type="text/javascript">
			function ValidateRegistration()
			{
				if($("#idName").val() == "")
				{
						alert("Please enter user name");
						$("#idName").focus();
						return false;
				}
				if($("#idEmail").val() == "")
				{
						alert("Please enter email id");
						$("#idEmail").focus();
						return false;
				}
				var email = $("#idEmail").val();
				var testEmail	=	/^([A-Za-z0-9./-/_])+\@([A-Za-z0-9./-/_])+\.([A-Za-z]{2,4})$/;
				if(testEmail.test(email) == false)
				{
						alert("Enter Valid Email ID");
						$("#idEmail").focus();
						return false;
				}
				if($("#idPassword").val() == "")
				{
						alert("Please enter password");
						$("#idPassword").focus();
						return false;
				}
				if($("#idConfirmPassword").val() == "")
				{
						alert("Please enter Confirm Password");
						$("#idConfirmPassword").focus();
						return false;
				}
				if($("#idPassword").val() != $("#idConfirmPassword").val())
				{
						alert("Both Password and Confirm password should be same");
						$("#idConfirmPassword").focus();
						return false;
				}
				if($("#idContact").val() == "")
				{
						alert("Please enter Contact number");
						$("#idContact").focus();
						return false;
				}
				var contact 	=	$("#idContact").val();
				var testContact	=	/^([0-9]{10})$/;
				if(testContact.test(contact) == false)
				{
						alert("Please enter 10 digit contact no");
						$("#idContact").focus();
						return false;
				}
				function Reset()
				{
					$("#idName").val("");
					$("#idPassword").val("");
					$("#idConfirmPassword").val("");
					$("#idEmail").val("");
					$("#idContact").val("");
				}
				$.post("action/doRegistration.php",$("#idRegistrationPage").serialize(),function(data)
				{
					if(data == "OK")
					{
						$("#msgIndex").css({"color":"green"});
						data	=	"User Registration Successfully Done."
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
				<div class="class_div_panel">
					<div class="class_div_panel_header">Sign Up</div>
					<form id="idRegistrationPage" action="" method="post" onsubmit="return ValidateRegistration();">
						<div>
							<label>User Name</label>
							<label style="margin-left: 58px;"><input type="text" name="name" id="idName" placeholder="User name"></label>
						</div>
						<div>
							<label>Email Id</label>
							<label style="margin-left: 80px;"><input type="email" name="email" id="idEmail" placeholder="Email address"></label>
						</div>
						<div>
							<label>Password</label>
							<label style="margin-left: 70px;"><input type="password" name="password" id="idPassword" placeholder="Password"></label>
						</div>
						<div>
							<label>Confirm Password</label>
							<label style="margin-left: 0px;"><input type="password" name="confirmPassword" id="idConfirmPassword" placeholder="Re-enter password"></label>
						</div>
						<div>
							<label>Contact No</label>
							<label style="margin-left: 57px;"><input type="text" name="contact" id="idContact" placeholder="Contact number"></label>
						</div>
						<div>
							<input style="margin-left: 185px;" type="submit" value="Sign Up">
						</div>
						<div id="msgIndex" class="class_div_msgIndex"></div>
					</form>
				</div> 
			</div>
		<?php include_once 'includes/footer.php';?>
		</div>
	</body>
</html>
