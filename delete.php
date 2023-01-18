<?php
// Verificar si el método HTTP es DELETE
if($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Recibir datos enviados desde el lado del cliente
    $data = json_decode(file_get_contents('php://input'), true);
    $file = $data['file'];
    $folder = $data['folder'];
    // Validar si la carpeta y el archivo existen
    if(file_exists("$folder/$file")) {
        // Eliminar el archivo
        foreach ($files as $file) {
        $file_path = "$folder/$file";
        unlink($file_path);
        }
        if(unlink("$folder/$file")) {
            // Devolver respuesta al cliente indicando que se ha eliminado el archivo
            http_response_code(200);
            echo json_encode(['message' => 'Archivo eliminado exitosamente']);
        } else {
            // Devolver respuesta al cliente indicando que ha ocurrido un error al eliminar el archivo
            http_response_code(500);
            echo json_encode(['message' => 'Error al eliminar el archivo']);
        }
    } else {
        // Devolver respuesta al cliente indicando que el archivo o la carpeta no existen
        http_response_code(404);
        echo json_encode(['message' => 'El archivo o la carpeta no existen']);
    }
 } else {
    // Devolver respuesta al cliente indicando que el método HTTP no es válido
    http_response_code(405);
    echo json_encode(['message' => 'Método HTTP no válido']);
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>