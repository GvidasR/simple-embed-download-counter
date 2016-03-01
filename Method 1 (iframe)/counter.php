<?php 
	if (file_exists("counter.txt")) {
		$handle = fopen("counter.txt", "r");
		$fileContents = fread($handle, filesize("counter.txt"));
		fclose($handle);
	}else{
		$fileContents = 0;
	}
	if($_SERVER['REQUEST_METHOD']!="POST"){ 
?>
		<html>
			<head>
				<script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
				<script>
					$(document).ready(function(){$('.inc-counter').click(function(){$.post({url: "/"});$('.inc-counter span').text(parseInt($('.inc-counter span').text())+1);});});
				</script>
			</head>
			<body>
				<a href="randomStuff.txt" target=_blank class="inc-counter">Download (<span><?php echo $fileContents; ?></span>)</a>
			</body>
		</html>
<?php 
	}else{
		$fileContents++;
		$handle = fopen("counter.txt", "w");
		fwrite($handle, $fileContents);
		fclose($handle);
	} 
?>