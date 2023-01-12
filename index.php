<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
		crossorigin="anonymous"></script>
    <script src="logic.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>



<body>
        <header class="header">         
        <nav class="navBar" >
    <!-- <form action="procesar.php" method="post">
        <input name="nombre" type="text" placeholder="Buscador">
        <input type="submit" value="Buscar">
    </form> -->
            </nav>  

        </header> 

    <main class="main">

        <div class="subHeader">
        <form action="back.php" method="post" enctype="multipart/form-data">
            <label for="folder_select">Select Folder:</label>
            <select name="folder_select" id="folder_select">
                <option value="folder1">Folder 1</option>
                <option value="folder2">Folder 2</option>
                <option value="folder3">Folder 3</option>
            </select>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload File" name="submit">
        </form>
        
            <button type="button" class="newButton" data-bs-toggle="modal" data-bs-target="#exampleModal">New</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    <div class="modal-body">
                        <form action="create.php" method="POST" id="createItems" enctype="multipart/form-data">
                            <div class="mb-3">  
                            <label for="formGroupExampleInput" class="form-label">Enter folder/file name</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="file-name">
                        </div>
                    </div>
                    <div id="form-id" class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button id="your-id" type="submit" class="btn btn-primary">Accept</button>
                    </div>
                </div>
            </div>
        </div>
            
                        
            <button>Upload</button>
        </div>


        <div id="container-menu" class="aside">
        

            <nav>

            <label for="touch"><span>titre</span></label>               
            <input type="checkbox" id="touch"> 

            <ul class="slide">
                <li><a href="#">Lorem Ipsum</a></li> 
                <li><a href="#">Lorem Ipsum</a></li>
                <li><a href="#">Lorem Ipsum</a></li>
                <li><a href="#">Lorem Ipsum</a></li>
            </ul>

            </nav> 


            <button id="menu-button">Open menu</button>
            <?php generateMenu("root"); ?>
            
        </div>

        
    
        <div class="mainFolder">
        
        
                
            <h2>Open Folder</h2>
            
            <button class="buttonFolder">Edit</button>
            <a href="delete.php" class="btn">Delete</a>

        </div>
</main>

</body>
</html>

<?php
function generateMenu($folder) {
    // Use scandir to get the files and folders inside the folder
    $files = array_diff(scandir($folder), array('.','..'));

    
    // Create a list element
    echo "<ul id='menu'>";
    
    // Loop through the files and folders
    foreach ($files as $file) {
        // Check if the file is a folder
        if (is_dir("$folder/$file")) {
            // If it is a folder, create a list item with the folder name
            echo "<li class='folder'>" . $file;
            // Call the function recursively to generate the submenu for the folder
            generateMenu("$folder/$file");
            echo "</li>";
        } else {
            // If it is a file, create a list item with a link to the file
            echo "<li><a href='$folder/$file'> $file </a></li>";
        }
    }
    echo "</ul>";
}

?>

