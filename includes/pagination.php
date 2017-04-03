<?php 
	include_once 'globalVariables.php';	

	function paginationLink($divId,$totalRows,$startFrom){
		global $noOfRecord;
?>
	<div id="<?php echo $divId ;?>" class="class_pagination">
<?php
	$select =	$startFrom;
	$next 	=	$startFrom + $noOfRecord;
	$link 	=	"";	
	if($totalRows <= $noOfRecord)
	{
		exit();
	} 
	if($startFrom != 0)
	{
		$link = "<a id='0'>First</a> &nbsp;<a id='".($startFrom - $noOfRecord)."'>Previous</a>&nbsp;";
	}
	$val	=	0;
	if($totalRows % $noOfRecord == 0)
	{
		$val	=	1;
	}
	$noOfPages		=	ceil($totalRows/$noOfRecord);
	$noOfIteration	=	ceil(($select+1)/$noOfRecord);
	for($i = 0 ; $i <= ($totalRows/$noOfRecord)-$val ; $i++)
	{
		$startFrom	=	$i * $noOfRecord;
		$link =	$link . "|" . "<a href='#' id='$startFrom'";
		if($select == $startFrom)
		{
			if($noOfPages != 1)
			{
				$link = $link . "class='class_selected_link'>" .($i+1). "</a>";
			}
		}
		else
		{
			$link = $link . ">" .($i+1). "</a>";
		}
	}
	if($noOfIteration !=	$noOfPages)
	{
		$link =	$link . "| <a id='$next'>Next</a> &nbsp;<a id='$startFrom'>Last</a>&nbsp;";
	}
	else
	{
           $link    = $link . "|";
    }
    return $link;
?>
</div>
<?php 
	}
?>