<?php

$directorio = "uploads/";
$archivos = scandir($directorio);

header("Content-Type: application/json");
echo json_encode($archivos);

exit();

?>