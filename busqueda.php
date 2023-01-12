<?php
		$fileName = $_POST["busquedas"];
        
        if (file_exists($fileName)) {
            echo "el fichero" .$fileName. "existe";
        } else {
            echo "el fichero no existe";
        }
    ?>