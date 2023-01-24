<?php

$deleteFile = $_GET["file"];

unlink($deleteFile);
echo json_encode(["file" => $deleteFile]);


?>
