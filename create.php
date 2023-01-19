<?php


	$fileName = $_POST['file-name'];
	$path = "root/";
	$dir = $path . '/' . $fileName;

	if(file_exists($dir)) {
		if(!is_dir($dir)){
			echo'<script type="text/javascript"> alert("Failed to create file"); window.location.href="index.php";</script>';
			header('Location: index.php');
		}else {
			echo'<script type="text/javascript"> alert("Failed to create folder"); window.location.href="index.php";</script>';
			header('Location: index.php');
		}
		
	}
	else{
		//Check if it should be a folder or file
		if(strpos($fileName, '.') > 1) {
			if(touch($dir)) {
				echo "<li><a href='root/" . $file . "'>" . $fileName . "</a><button actualPath='$folder/$file' class='editBtn'>Edit</button>button deletePath='$folder/$file'class='delete-button'>Delete</button></li>";
				header('Location: index.php');
				
			}
		}		
		else {
			if(mkdir($dir)) {
				echo "<li class='folder'>" . $fileName;
				header('Location: index.php');
				
			}
			
		}
	}

fopen($dir, 'r');



?>

