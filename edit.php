<?php

$newName = $_GET['newName'];
$actualPath = $_GET['actualPathFile'];
$indexSlashPath = strrpos($actualPath, "/");
$actualFolder = substr($actualPath, 0, $indexSlashPath + 1);

$indexExtensionPath = strrpos($actualPath, ".");
$extensionFile = substr($actualPath,$indexExtensionPath);

echo "$extensionFile";

rename($actualPath, $actualFolder . $newName . $extensionFile);
header("Location: index.php");


?> 