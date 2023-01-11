<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Document</title>
    <script src="logic.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>




<body>
        <header>         
        <nav class="navBar" >
    <form action="procesar.php" method="post">
        <input name="nombre" type="text" placeholder="Buscador">
        <input type="submit" value="Buscar">
    </form>
            </nav>  

        </header> 

    <main>

        <div class="subHeader">
            <button class="newButton">New</button>
            <button>Upload</button>
        </div>
        <div id="container-menu" class="aside">
          <button id="menu-button">Open menu</button>
          <?php generateMenu("root"); ?>
       </div>
        
    
        <div class="mainFolder" >
            <h2>Open Folder</h2>
            <button class="buttonFolder">Edit</button>
            <button class="buttonFolder">Delete</button>

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
            echo "<li><a href='root/" . $file . "'>" . $file . "</a></li>";
        }
    }
    echo "</ul>";
}

?>

