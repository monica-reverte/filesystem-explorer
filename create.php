<?php

	$fileName = $_POST['file-name'];
	$path = "root/";
	$dir = $path . '/' . $fileName;

	if(is_dir($dir)) {
		echo 'File Exists';
	}
	else {
		//Check if it should be a folder or file
		if(strpos($fileName, '.') > 1) {
			if(touch($dir)) {
				echo true;
			}
			else {
				echo 'Failed to create file';
			}
		}		
		else {
			if(mkdir($dir)) {
				echo true;
			}
			else {
				echo 'Failed to create folder';
			}
		}
	}

?>

