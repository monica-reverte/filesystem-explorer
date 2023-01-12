<!-- <?php

$filePath = $_GET["path"];

$filename = str_replace('\\', '/', dirname(__DIR__)) . "/root" . $filePath;

$file = fopen($filename, "r");

$fileInfo = [
    "size" => 0,
    "creationDate" => "",
    "content" => ""
];

if ($file == false) {
    echo ("Error in opening file");
    exit();
}

$fileInfo["size"] = filesize($filename);
$fileInfo["creationDate"] = date("Y/m/d H:i:s", filectime($filename));
$fileInfo["content"]  = fread($file, $fileInfo["size"]);
fclose($file);

echo json_encode($fileInfo);

?> -->