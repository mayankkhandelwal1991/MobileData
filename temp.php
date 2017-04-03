<?php
$handle	=	fopen("data/savefile_5.txt.txt",	"r");
if($handle){
	while (($line = fgets($handle)) !== false){
	 echo strtolower($line)."</br>";
	}
}
?>