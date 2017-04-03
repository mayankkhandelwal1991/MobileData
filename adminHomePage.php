<?php
	include_once 'checkSession.php';
?>
<!DOCTYPE>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo $siteName;?>/css/main.css" />
		<script type="text/javascript" src="<?php echo $siteName;?>/js/jquery-latest.js"></script>
		<script type="text/javascript">
			function callmeAfterClosing(){
				window.location.reload();	
			}
			function editData(start,order)
			{
				$.post('action/doUserDetails.php?start='+start+'&order='+order, function(data)
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
		</script>
	</head>
	<body onload="return editData(0,'start');">
		<div class="class_wrapper">
			<?php include_once 'includes/header.php';?>
			<div id="divUserData" class="class_div_adminHomePage"></div>
			<?php include_once 'includes/footer.php';?>
		</div> 
	</body>
</html>
