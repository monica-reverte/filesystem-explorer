<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="logic.js" defer></script>
    <title>Document</title>
    
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


        <button id="newBtn">New</button>
        <div id="newModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New</h5>
                        <button class="closeNew close" aria-label="Close alert" type="button" data-close>
                                <span aria-hidden="true">&times;</span>
                        </button>
                        
                </div>
                <div class="modal-body">
                    <form action="create.php" method="POST" id="createItems" enctype="multipart/form-data">
                        <label for="formGroupExampleInput" class="form-label">Enter folder/file name</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="file-name">
                    </form>
                </div>           
                <div id="form-id" class="modal-footer">
                    <button type="button">Cancel</button>
                    <button type="submit">Accept</button>
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


            <button id="editBtn">Edit</button>
            <div id="editModal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit</h5>
                        <button class="closeEdit close" aria-label="Close alert" type="button" data-close>
                                <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="edit.php" method="POST" id="editItems" enctype="multipart/form-data">
                            <label for="fileName" class="mb-2 modal-item modal-title">File name</label>
                            <input type="text" name="oldFileName" id="oldName" class="pt-2 pl-3 modal-item" required> <br>
                            <label for="newName" class="mb-2 modal-item modal-title">New name</label>
                            <input type="text" id="fileName" name="fileName" class="pt-2 pl-3 modal-item" required>
                        </form> 
                    </div>           
                    <div id="form-id" class="modal-footer">
                        <button type="button">Cancel</button>
                        
                        <button type="submit">Accept</button>
                    </div>
                </div>
            </div>
            

                <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Rename</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="edit.php" method="POST" id="editItems" enctype="multipart/form-data">
                                    <div class="mb-3">  
                                        <label for="fileName" class="mb-2 modal-item modal-title">File name</label>
                                        <input type="text" name="oldFileName" id="oldName" class="pt-2 pl-3 modal-item" required> <br>
                                        <label for="newName" class="mb-2 modal-item modal-title">New name</label>
                                        <input type="text" id="fileName" name="fileName" class="pt-2 pl-3 modal-item" required>
                                    </div>
                                </form> 
                            </div>
                            <div id="form-id" class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button id="your-id" type="submit" class="btn btn-primary">Accept</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
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
            echo "<li><a href='$folder/$file'> $file </a><button type=button' class='btnEdit' data-bs-toggle='modal' data-bs-target='#exampleModal'>Edit</button><button type=button' class='btnEdit' data-bs-toggle='modal' data-bs-target='#exampleModal'>Delete</button></li>";
        }
    }
    echo "</ul>";
}

?>