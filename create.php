<?php

	$fileName = $_POST['file-name'];
	$path = "root/";
	$dir = $path . '/' . $fileName;

	if(file_exists($dir)) {
		echo'<script type="text/javascript"> alert("File Exists"); window.location.href="index.php";</script>';
		
	}
	else {
		//Check if it should be a folder or file
		if(strpos($fileName, '.') > 1) {
			if(touch($dir)) {
				echo "<li><a href='root/" . $file . "'>" . $fileName . "</a></li>";
				header('Location: index.php');
				
			}
			else {
				echo'<script type="text/javascript"> alert("Failed to create file"); window.location.href="index.php";</script>';
				
			}
		}		
		else {
			if(mkdir($dir)) {
				echo "<li class='folder'>" . $fileName;
				header('Location: index.php');
				
			}
			else {
				echo 'Failed to create folder';
			}
		}
	}

?>

