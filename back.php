<?php
    $target_dir = "root/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . uniqid() . '.' . $imageFileType;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";        } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        $valid_folders = ['folder1', 'folder2', 'folder3'];
        $folder_name = $_POST["folder_select"];
        if(in_array($folder_name, $valid_folders)){
            $target_dir = "root/" . $_POST["folder_select"] . "/";
            echo $target_dir;
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                header("Location:index.php");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
       } else {
            // Error, folder name is not valid
       }

       if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // tu codigo de subida de archivo
        }
    ?>
