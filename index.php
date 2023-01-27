<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://bootswatch.com/5/flatly/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
		crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="logic.js?v=<?php echo time() ?>" defer></script>
    <title>Document</title>
    
</head>

<body>

    <header class="header">   
        
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <div class="container-fluid justify-content-start">
            
            <input type="file" class="btn m-3 btn-secondary" name="fileToUpload" id="fileToUpload">
            <input type="button" id="submitUploadBtn" class="btn m-3 btn-secondary" value="Upload File" name="submit">
            <button type="button" class="btn m-3 btn-secondary" id="newBtn">New</button>
        </div>
            <div class="d-flex m-4 search-bar">
                <input class="form-control me-sm-2" type="search" placeholder="Search" id="search-input" name="search_term">
                <button id="searchBtn" class="btn btn-secondary my-2 my-sm-0" type="submit" class="search-button">Search</button>
                <div id="search-result" class="searchResult main-header-link"></div>
            </div>
        
    </nav>

    </header>  

    <main class="main">

    <!-- Modal Create -->
    <div id="newModal" class="modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New</h5>
                    </div>
                    <div class="modal-body">
                        <form action="create.php" method="POST" id="createItems" enctype="multipart/form-data">
                            <label for="formGroupExampleInput" class="form-label">Enter folder/file name</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="file-name">
                            <button class="btn mt-1 btn-secondary" type="cancel">Cancel</button>
                            <button class="btn mt-1 btn-primary" type="submit">Accept</button>
                        </form>
                    </div>    
                </div>
            </div>
        </div>
    
        
    <!-- <div class="container-fluid aside"> -->
    <div id="mainFolder" class="container-fluid aside">
        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <button type="button" class="btn btn-primary">Open Menu</button> 
                <div class="btn-group" role="group">
                    <button id="menu-button" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <?php generateMenu("root"); ?>         
                </div>
        </div>

            <!-- Modal Edit -->

            <div class="editModal modal">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit</h5>   
                    </div>
                    <div class="modal-body">
                        <form action="edit.php" method="GET" id="editItems" enctype="multipart/form-data">
                            <label for="newName" >New name</label>
                            <input type="text" id="fileName" name="newName">
                            <input type="hidden" name="actualPathFile" id="actualPathFile">
                            <button class="btn btn-secondary cancel" type="button">Cancel</button>
                            <button class="btn mt-1 btn-primary" type="submit">Accept</button>
                        </form>
                    </div>           
                </div>
                </div>
            </div>

            <!-- Modal Delete -->
            
            <div class="deleteModal modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete</h5> 
                    </div>
                    <div class="modal-body">
                        <label for="deleteName" >Do you want to delete?</label>
                        <input type="hidden" name="deletePathFile" id="deletePathFile">
                        <button class="btn btn-secondary cancel" type="button">Cancel</button>
                        <button id ="submitDelete" class="btn mt-1 btn-primary" type="submit">Accept</button>
                    </div>           
                </div>
                </div>
            </div>
        </main>
    </body>

</html>

<?php

$extensionIcon = "";
$dir = "root";
$dirEx = explode(".", $dir);

$extension = end($dirEx);


function generateMenu($folder) {
    // Use scandir to get the files and folders inside the folder
    $files = array_diff(scandir($folder), array('.','..'));
    
    // Create a list element
    echo "<ul id='menu' class='list-group'>";
    
    // Loop through the files and folders
    foreach ($files as $file) {
        // Check if the file is a folder
        if (is_dir("$folder/$file")) {
            // If it is a folder, create a list item with the folder name
            echo "<li path='$folder/$file' class='list-group-item folder'>" . $file;
            // Call the function recursively to generate the submenu for the folder
            generateMenu("$folder/$file");

            echo "</li>";
        } else {
            
            $extensionIcon = "";

            $dirEx = explode(".", $file);

            $extension = end($dirEx);

            switch($extension){
            
            case "csv":
                $extensionIcon = "icons/csv.png";
                break;
            case "doc":
                $extensionIcon = "icons/doc.png";
                break;
            case "exe":
                $extensionIcon = "icons/exe.png";
                break;
            case "jpg":
                $extensionIcon = "icons/jpg.png";
                break;
            case "jpeg":
                $extensionIcon = "icons/jpg.png";
                break;
            case "mp3":
                $extensionIcon = "icons/mp3.png";
                break;
            case "mp4":
                $extensionIcon = "icons/mp4.png";
                break;
            case "odt":
                $extensionIcon = "icons/odt.png";
                break;
            case "pdf":
                $extensionIcon = "icons/pdf.png";
                break;
            case "png":
                $extensionIcon = "icons/png.png";
                break;
            case "rar":
                $extensionIcon = "icons/rar.png";
                break;
            case "txt":
                $extensionIcon = "icons/txt.png";
                break;
            case "zip":
                $extensionIcon = "icons/zip.png";
                break;
            case "mov":
                $extensionIcon = "icons/mp4.png";
                break;
}

            // If it is a file, create a list item with a link to the file
            echo "<li id='$folder/$file' class='list-group-item file' name = 'file-name'>
                    <a class='dropdown-item input-name' href='$folder/$file'> <img src='$extensionIcon' width='30px'>  $file </a>
                    <button actualPath='$folder/$file' class='btn m-1 btn-dark editBtn'>Edit</button>
                    <button deletePath='$folder/$file'class='btn btn-dark delete-button'>Delete</button>    
                </li>";
            $file_path = "$folder/$file";
            // Get the file size in MB
            $file_size = filesize($file_path);
            $file_size_mb = round($file_size / 1024 / 1024, 2);
            
            // Get the last modified time of the file
            $file_last_modified = filemtime($file_path);
            $file_last_modified_formatted = date('Y-m-d H:i:s', $file_last_modified);

            // Print the file size and last modified time
            echo "<br>File size: " . $file_size_mb . " MB";
            echo "<br>Modificated: " . $file_last_modified_formatted;
        }
    }
    echo "</ul>";
}

?>