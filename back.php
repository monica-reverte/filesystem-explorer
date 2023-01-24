<?php

if (isset($_FILES['file'])) {
    $currentPath = $_POST['currentFolder'];

    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $newFileName = $_FILES['file']['name'];

    move_uploaded_file($_FILES['file']['tmp_name'], $currentPath . '/' . $newFileName);

    echo json_encode([
        "extension" => $extension, 
        "fileName" => $_FILES['file']['name'], 
    ]);
}

// if(isset($_POST["submit"])){

//     $fileName = $_FILES["file"]["name"];
//     $fileTmpName = $_FILES["file"]["tmp_name"];

//     $fileExt = explode(".", $fileName);
//     $fileActualExt = strtolower(end($fileExt));

//     $fileNameNew=uniqid('', true).".".$fileActualExt;
//     $fileDestination = "root/".$fileName;

//     move_uploaded_file($fileTmpName, $fileDestination);

//     header("Location: ./index.php");

// }

// if (isset($_FILES['file'])) {
//     $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
//     $newFileName = $_FILES['file']['name'];

//     move_uploaded_file($_FILES['file']['tmp_name'], $currentPath . '/' . $newFileName);

//     echo json_encode([
//         "extension" => $extension, 
//         "fileName" => $_FILES['file']['name'], 
//         "path" => $attributePath . '/' . $newFileName
//     ]);
// }

// if (isset($_FILES['nombre']['error'])) { 

//     $size = 40000; 
//     $allows = array("jpg", "pdf", "csv", "doc", "exe", "mp3", "mp4", "odt", "png", "ppt", "rar", "zip", "svg", "txt"); 
//     $load_route = $_FILES['nombre']['name'];

//     $explodedFiles = explode(".", $_FILES['nombre']['name']);
//     $extension = strtolower(end($explodedFiles));


//     if (in_array($extension, $allows)) { 

//         if ($_FILES['nombre']['size'] < ($size * 1024)) { 

//             if (move_uploaded_file($_FILES['nombre']['tmp_name'], $_SESSION["absPath"] . '/' . $load_route)) {
//                 echo "The file was uploaded successfully";
//                 header('Location: index.php');
//                 } else {
//                 echo "Error loading file";
//             }
//         } else {
//             echo "File exceeds the allowed size";
//         }
//     } else {
//         echo "file not allowed";
//     }
// }



    ?>
