<?php
	session_start();
	include_once 'includes/globalVariables.php'; 
	$navSelected	=	"login-page";
?>
<!DOCTYPE>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo $siteName;?>/css/main.css" />
		<script type="text/javascript" src="<?php echo $siteName;?>/js/jquery-latest.js"></script>
	</head>
	<body>
		<div class="class_wrapper">
			<?php include_once 'includes/header.php';?>
			<div class="class_div_container">
				<div class="class_div_panel">
					<div class="class_div_panel_header">Sign In</div>
					<form action="<?php echo $siteName;?>/action/doLogin.php" method="post">
						<div class="class_div_login">
							<div>
								<label>Email Id</label>
								<label style="margin-left: 30px;"><input type="email" name="email" id="idEmail" placeholder="Email Address"></label>
							</div>
							<div>
								<label>Password</label>
								<label style="margin-left: 20px;"><input type="password" name="password" id="idPassword" placeholder="Password"></label>
							</div>
							<div>
								<input style="margin-left: 133px;" type="submit" value="Sign In">
							</div>
							<div class="class_div_msgIndex" style="color:red">
								<?php
									if(isset($_SESSION['md_login_status']))
									{
										if(isset($_SESSION['md_login_status'])=='fail')
										{
											echo "Either Email Id or Password is wrong";
										}									
									}
									unset($_SESSION['md_login_status']);
								?>
							</div>
						</div> 
					</form>
				</div>		
			</div>
			<?php include_once 'includes/footer.php';?>
		</div>
	</body>
</html>
