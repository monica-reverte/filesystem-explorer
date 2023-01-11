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
           <button id="menu-button">Menu</button>
        </div>
    
        <div class="mainFolder" >
            <h2>Open Folder</h2>
            <button class="buttonFolder">Edit</button>
            <button class="buttonFolder">Delete</button>

        </div>
   
</main>


</body>
</html>

