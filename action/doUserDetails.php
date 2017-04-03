<?php
	include_once '../checkSession.php';
	include_once '../includes/dbConnection.php';
	include_once '../includes/pagination.php';
	
	$userEmailID	=	$_SESSION['md_user_email'];
	
	$startFrom	=	$_GET['start'];
	$order		=	$_GET['order'];
	$toDate		=	$_POST['toDate'];
	$fromDate	=	$_POST['fromDate'];
	$cusName	=	$_POST['cusName'];$cusNumber	=	$_POST['cusNumber'];	
	$simIssueType	=	$_POST['simIssueType'];
	$frcAmount		=	$_POST['frcAmount'];
	if($fromDate == ""){
		$fromDate	=	"1970-01-01";
	}
	if($toDate == ""){
		$toDate		=	date("Y-m-d");
	}
	$query 			=	"select * from tbl_user_info where date between '$fromDate' and '$toDate' and  
						store_user_email='$userEmailID' ";
	$sim_type		=	$_POST['simType'];
	$companyName	=	$_POST['companyName'];
	if($sim_type != ""){
		$query	.=	"and sim_type='$sim_type'";
	}
	if($companyName != ""){
		$query	.=	"and company_name='$companyName'";
	}
	if($cusName != ''){
		$query	.=	"and cus_name like '%$cusName%'";
	}
	if($cusNumber != ''){
		$query	.=	"and cus_no like '%$cusNumber%'";
	}	
	if($frcAmount != ''){
		$query	.=	"and FRC like '%$frcAmount%'";
	}
	if($simIssueType != ''){
		$query	.=	"and sim_selection = '$simIssueType'";
	}
	if($order !='start'){
		$query 	.=	"order by $order ";
	}else{
		$query 	.=	"order by date desc ";
	}
	$result	=	mysql_query($query);
?>
<table  class="class_table_registration" align="center" cellpadding="5" cellspacing="0" >
	<tr>
		<th><a href="#" onclick="return editData(<?php echo $startFrom;?>,'cus_name');">Customer Name</a> </th>
		<th><a href="#" onclick="return editData(<?php echo $startFrom;?>,'father_name');">Father Name</a></th>
		<th>Customer No</th>
		<th>Sim No</th>
		<th>Alternate No</th>
		<th>Date</th>
		<th style="width:7%;">FRC Amount</th>
		<th>Rejection</th>
		<th>Resend Id</th>
		<th>Sim Type</th>
		<th>Company Name</th>
		<th>Issue Type</th>
		<th>Is Verified</th>
		<th>Action</th>
	</tr>
<?php 
	if(mysql_num_rows($result)>0)
	{
		if($startFrom < 0)
		{
			$startFrom =	0 ;
		}
		$totalRows	=	mysql_num_rows($result);
		if($startFrom >= $totalRows)
		{
			$startFrom	=	$startFrom	-	$noOfRecord;
		}
		$query     =    $query . " limit " . $startFrom . "," . $noOfRecord ;
        $result    =    mysql_query($query);
?>

	<?php 
		$counter	=	0;
		while($rows = mysql_fetch_array($result))
		{
			$counter++;
	?>
	<tr <?php if($counter % 2 == 0){ ?> class="class_table_evenRows" <?php } else { ?> class="class_table_oddRows" <?php }?> >
		<td><?php echo $rows['cus_name'];?></td>
		<td><?php echo $rows['father_name'];?></td>
		<td><?php echo $rows['cus_no'];?></td>
		<td><?php echo $rows['sim_no'];?></td>
		<td><?php echo $rows['altername_no'];?></td>
		<td><?php echo $rows['date'];?></td>
		<td>
			<input type="checkbox" id="isFRC<?php echo $rows['sno'];?>" value="<?php echo $rows['isFRCDone'];?>" onclick="clickOnCheckBox(<?php echo $rows['sno'];?>,'isFRCDone');"
				<?php if($rows['isFRCDone']){
						echo "checked=checked";
					}		
				?>
			/>
			<?php echo $rows['FRC'];?>
		</td>
		<td><?php if($rows['rejection'] == ""){echo "-";}else {echo $rows['rejection'];}?></td>
		<td><?php if($rows['resend_id'] == ""){echo "-";}else {echo $rows['resend_id'];}?></td>
		<td><?php echo $rows['sim_type'];?></td>
		<td><?php echo $rows['company_name'];?></td>
		<td><?php echo $rows['sim_selection'];?></td>
		<td>
			<input type="checkbox" id="isVerified<?php echo $rows['sno'];?>" value="<?php echo $rows['is_verified'];?>" onclick="clickOnCheckBox(<?php echo $rows['sno'];?>,'is_verified');"
				<?php if($rows['is_verified']){
						echo "checked=checked";
					}		
				?>
			/>
		</td>
		<td>
			<a  href="#" onclick="showPopWin('editUserDetails.php?sno=<?php echo $rows['sno'];?>',1120,450,null);">Edit/</a>
			<a  href="#" onclick="deleteUserDetail(<?php echo $rows['sno'];?>)">Delete</a>
		</td>
		<?php 			
		}
		?>
	</tr>
	<tr class="class_table_evenRows">
		<td colspan="15" style="text-align:center;">
			<?php 
				echo paginationLink("divLinkUserDetails",$totalRows,$startFrom); 
			?>
		</td>
	</tr>
	<?php 
	}else {
		?>
			<tr class="class_table_evenRows">
				<td colspan="15" style="text-align:center;height:150px;font-size:16px;font-weight:bold;color:#d63903;">
			 		No Record Found
				</td>
			</tr>
		<?php 
	}
?>
</table>
