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

