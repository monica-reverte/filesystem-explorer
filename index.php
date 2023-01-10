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
                    <h1>NavBar</h1>
            </nav> 

        </header> 

    <main>
         
        <div class="subHeader">
            <button>New</button>
            <button>Upload</button>
        </div>
    
        <div class="aside">
            <h2 class="asideContent">Aside</h2>


        <div class="mainFolder">
            <h2>Open Folder</h2>
            <button class="buttonFolder">Edit</button>
            <button class="buttonFolder">Delete</button>

        </div>
    </div>

</main>
</body>
</html>

<?php

// $files = scandir("uploads/"); // obtener una lista de los archivos en la carpeta "uploads"
// foreach($files as $file){ // Iterar a través de la lista de archivos
//   if($file == "." || $file == ".."){continue;} // ignorar archivos ocultos
//   echo '<a class="filesDisplay" href="uploads/'.$file.'">'.$file.'</a>'; // mostrar nombre de archivo con link para descargarlo
// }

$thefolder = "uploads/";
if ($handler = opendir($thefolder)) {
	echo "<ul>";
    while (false !== ($file = readdir($handler))) {
            echo "<li>$file</li>";
    }
    echo "</ul>";
    closedir($handler);
}

?>

