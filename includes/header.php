<div id="header">
	<?php
		if(isset($_SESSION['md_user_email']))
		{
	?>
		<ul>
			<li style="color: green;float:left;"><?php echo $_SESSION['md_user_email'];?></li>	
			<li style="float:right ;">
				<a href="<?php echo $siteName;?>/logout.php" >Logout</a>
			</li>
			<li <?php if($navSelected == "change-password") {echo "class='class_selected_tap'";}?>>
				<a href="<?php echo $siteName;?>/changePassword.php" >Change Password</a>
			</li>
 			<li <?php if($navSelected == "add-user") {echo "class='class_selected_tap'";}?>>
 				<a href="<?php echo $siteName;?>/addUser.php" >Add Details</a>
 			</li>
			<li <?php if($navSelected == "user-list") {echo "class='class_selected_tap'";}?>>
				<a href="<?php echo $siteName;?>/userList.php" >Search User</a>
			</li>
			
		</ul>
	<?php 
		}
		else
		{
	?>
		<ul>
			<li <?php if($navSelected == "index") {echo "class='class_selected_tap'";}?>>
				<a href="<?php echo $siteName;?>/index.php" >Sign Up</a>
			</li>
			<li <?php if($navSelected == "login-page") {echo "class='class_selected_tap'";}?>>
				<a href="<?php echo $siteName;?>/loginPage.php">Sign In</a>
			</li>
		</ul>
	<?php
	 	}
	 ?>
</div>