<<<<<<< HEAD
<?php

if(isset($_POST["search_term"]) && !empty($_POST["search_term"])) {
    $search_term = $_POST["search_term"];

    function searchFiles($folder, $search_term) {
        $files = array_diff(scandir($folder), array('.','..'));
        $results = array();
        foreach ($files as $file) {
            if (is_dir("$folder/$file")) {
                $results = array_merge($results, searchFiles("$folder/$file", $search_term));
            } else {
                if (strpos($file, $search_term) !== false) {
                    $results[] = "$folder/$file";
                }
            }
        }
        return $results;
    }

    $results = searchFiles('root', $search_term);

    if (empty($results)) {
        $response = array(
            'status' => 'error',
            'message' => 'No se han encontrado resultados para su búsqueda.'
        );
    } else {
        $response = array(
            'status' => 'success',
            'data' => $results
        );
    }
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Por favor ingrese un término de búsqueda.'
    );
}

echo json_encode($response);

?>
=======
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
          if(str_container($foldername, $searchInputValue)){
            array_push($foldersArray, $ff);
          }
    
          getFilesAndFolders($ff);
        } else {
           $filenameArr = explode("/", $ff);
           $filename = $filenameArr[count($filenameArr)-1];
            if(str_container($filename, $searchInputValue)){
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
    'search' => $serchInputValue,
]);

?>
>>>>>>> feature
