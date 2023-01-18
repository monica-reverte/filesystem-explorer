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

            <div class="search-bar">
            <form id="search-form" action="search.php" method="post">
                <input type="text" id="search-input" name="search_term">
                <button type="submit" class="search-button">Buscar</button>
            </form>

            </div>
        <div id="search-result" class="searchResult main-header-link"></div>

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

        <!-- Modal Create -->

        <button id="newBtn">New</button>
        <div id="newModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New</h5>
                        
                        
                </div>
                <div class="modal-body">
                    <form action="create.php" method="POST" id="createItems" enctype="multipart/form-data">
                        <label for="formGroupExampleInput" class="form-label">Enter folder/file name</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="file-name">
                        <button type="cancel">Cancel</button>
                        <button type="submit">Accept</button>
                    </form>
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
        
            <!-- Modal Edit -->
            
            <div class="editModal modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit</h5>
                        
                    </div>
                    <div class="modal-body">
                        <form action="edit.php" method="GET" id="editItems" enctype="multipart/form-data">
                            <label for="newName" >New name</label>
                            <input type="text" id="fileName" name="newName">
                            <input type="hidden" name="actualPathFile" id="actualPathFile">
                            <button class="cancel" type="button">Cancel</button>
                            <button type="submit">Accept</button>
                        </form>
                    </div>           
                </div>
            </div>



</main>
</body>

</html>

<?php
function generateMenu($folder) {
    // Use scandir to get the files and folders inside the folder
    $files = array_diff(scandir($folder), array('.','..'));
    //  echo "<form action='delete.php' method='post' onsubmit='return confirm('¿Estas seguro de eliminar los archivos seleccionados?');'>";

    
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
            echo "<div class='fileContent'><a href='$folder/$file' target='_blank'></a><button class='delete-button' value='$file'>Eliminar</button>";
            echo "<div class='file' name ='file-name'><a class='input-name' href='$folder/$file'> $file </a><button actualPath='$folder/$file' class='editBtn'>Edit</button></div>";
            $file_path = "$folder/$file";
                        // Get the file size in MB
                        $file_size = filesize($file_path);
                        $file_size_mb = round($file_size / 1024 / 1024, 2);
                        
            // Get the last modified time of the file
            $file_last_modified = filemtime($file_path);
            $file_last_modified_formatted = date('Y-m-d H:i:s', $file_last_modified);
            
            // Print the file size and last modified time
            echo "<br>Tamaño del archivo: " . $file_size_mb . " MB";
            echo "<br>Última vez modificado: " . $file_last_modified_formatted;
        }
    }
    echo "</ul>";
    echo "<form action='delete.php' method='post' onsubmit='return confirm('¿Estas seguro de eliminar los archivos seleccionados?');'>";

}

?>


<script>
document.querySelectorAll('.delete-button').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var file = event.target.value;
        var folder = "<?php echo $folder ?>";
        var data = { file: file, folder: folder };
        fetch('delete.php', {
            method: 'DELETE',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(function(response) {
            return response.text();
        }).then(function(data) {
console.log(data);
// Aquí puedes actualizar la página o mostrar un mensaje de éxito/error al usuario
})
.catch(function(error) {
console.error(error);
});
});
});
</script>