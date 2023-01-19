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