<?php
		$root = "root/";
        $fileName = $_POST["busquedas"];
        if (file_exists($root.$fileName)) {
        if (is_dir($root.$fileName)){
        $opendirFile = opendir($root.$fileName);
        while (false !== ($file = readdir($opendirFile))){
        echo "<a href='$root/$file'> $file <br></a>";
        }
        closedir($opendirFile);
        }else{
            echo "<a href='$root/$fileName'> $fileName </a>";
        }
        }else {
        $resultado = $root.$fileName -> fetchAll();
        echo $resultado;
        }
    ?>
    <a href="index.php">
    <button>Volver</button>
    </a> 