<?php

$deleteFile = $_GET["deletePath"]

unlink($deleteFile);
header("Location: index.php");


?>



