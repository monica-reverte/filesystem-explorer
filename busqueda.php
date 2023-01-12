<?php
		$root = "root/";
        $fileName = $_POST["busquedas"];
        $opendirFile = opendir($root.$fileName);
        if (file_exists($root.$fileName)) {
        if (is_dir($root.$fileName)){
        while ($elementos = readdir($opendirFile));
        echo $elementos;
        }else {
        echo "no es un folder";
        }
        } else {
            echo "el fichero no existe";
        }
    ?>
    <a href="index.php">
    <button>Volver</button>
    </a> 