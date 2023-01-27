<?php

$searchInputValue = $_GET['search_term'];
$foldersArray = array();
$filesArray = array();

function getFilesAndFolders($dir)
{
    foreach (glob($dir . "/*") as $ff) {
        global $foldersArray;
        global $filesArray;
        global $searchInputValue;

        if (is_dir($ff)) {
            $foldernameArr = explode("/", $ff);
            $foldername = $foldernameArr[count($foldernameArr)-1];
          if(str_contains($foldername, $searchInputValue)){
            array_push($foldersArray, $ff);
          }
    
          getFilesAndFolders($ff);
        } else {
            $filenameArr = explode("/", $ff);
            $filename = $filenameArr[count($filenameArr)-1];
            if(str_contains($filename, $searchInputValue)){
              array_push($filesArray, $ff);
            }
        }
    }
}

getFilesAndFolders('root');

echo json_encode([
    'ok' => true,
    'folders' => $foldersArray,
    'files' => $filesArray,
    'search' => $searchInputValue,
]);

?>