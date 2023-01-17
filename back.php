<?php
// Configuración de subida de archivos
$target_dir = "root/";
$uploadOk = 1;

// Validación y subida de archivo
if(isset($_FILES["fileToUpload"]) && !empty($_FILES["fileToUpload"]["tmp_name"])) {
    // Obtener información del archivo
    $file_name = basename($_FILES["fileToUpload"]["name"]);
    $file_size = $_FILES["fileToUpload"]["size"];
    $file_temp = $_FILES["fileToUpload"]["tmp_name"];
    $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // Validar tamaño del archivo (500KB)
    if ($file_size > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Validar tipo de archivo (solo JPG, JPEG, CSV, PNG y GIF)
    if($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif" && $file_type != "csv" ) {
        echo "Sorry, only JPG, JPEG, CSV, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Comprobar si se ha producido algún error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Crear nombre único para el archivo
        $target_file = $target_dir . uniqid() . '.' . $file_type;
        // Subir archivo
        if (move_uploaded_file($file_temp, $target_file)) {
            echo "The file ". $file_name . " has been uploaded.";
            } else {
            echo "Sorry, there was an error uploading your file.";
            }
            }
            } else {
                
            echo "No se ha subido ningún archivo";
            }
            
            // Validación y subida a carpeta específica
            $valid_folders = ['folder1', 'folder2', 'folder3'];
            $folder_name = $_POST["folder_select"];
            if(in_array($folder_name, $valid_folders)){
            $target_dir = "root/" . $_POST["folder_select"] . "/";
            $target_file = $target_dir . $file_name;
            if (move_uploaded_file($file_temp, $target_file)) {
            echo "The file ". $file_name . " has been uploaded to " . $folder_name . ".";
            header('Location: index.php');
            } else {
            echo "Sorry, there was an error uploading your file to " . $folder_name . ".";
            }
            } else {
            echo "El nombre de la carpeta seleccionada no es válido";
            }
             // Código para eliminar archivos
             if(isset($_POST['files']) && confirm('¿Estas seguro de eliminar los archivos seleccionados?')){
    if(isset($_POST['folder'])){
        $folder = $_POST['folder'];
        // Code to delete files
        foreach ($files as $file) {
            $file_path = "$folder/$file";
            // check if file exists before trying to delete it
            if (file_exists($file_path)) {
                unlink($file_path);
                echo "Archivo $file eliminado exitosamente <br>";
            } else {
                echo "El archivo $file no existe <br>";
            }
        } $files = $_POST['files'];
    } else {
        echo "No se ha seleccionado una carpeta para eliminar los archivos";
    }
    }
?>