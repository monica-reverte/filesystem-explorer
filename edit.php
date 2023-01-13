<?php

$newName = $_GET["fileName"];
$oldName = $_GET["oldFileName"];
$parentPath = dirname($_GET["oldPath"]);
$basePath = $_SESSION["basePath"];
$pathToEdit =  $basePath . "/" . $parentPath . "/";

// Rename file
rename($pathToEdit . $oldName, $pathToEdit . $newName);




?> 