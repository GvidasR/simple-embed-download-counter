<?php 
	$counterFile = "counter.txt";
	if (file_exists($counterFile)) {
		$handle = fopen($counterFile, "r");
		$fileContents = fread($handle, filesize($counterFile));
		fclose($handle);
	}else{
		$fileContents = 0;
	}
	if($_SERVER['REQUEST_METHOD']=="POST"){ 
		$fileContents++;
		$handle = fopen($counterFile, "w");
		fwrite($handle, $fileContents);
		fclose($handle);
	}
	echo $fileContents;	
?>