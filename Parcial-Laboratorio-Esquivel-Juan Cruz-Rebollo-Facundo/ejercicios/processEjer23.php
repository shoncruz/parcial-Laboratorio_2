<?php
// Ejercicio 23: Promediar los números ingresados


function ejercicio23($numeros)
{
    $sumatoria = 0;
    $cantidad = 0;
    foreach ($numeros as $numero) {
        if ($numero <= 0) {
            continue; // Ignore non-positive numbers
        }
        $sumatoria += $numero;
        $cantidad++;
    }
    if ($cantidad == 0) {
        return ["resultado23" => "No se ingresaron números válidos."];
    }
    $promedio = $sumatoria / $cantidad;
    return ["resultado23" => $promedio];
}

// Handle POST request for ejercicio 23
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (isset($input['numeros'])) {
        $result = ejercicio23($input['numeros']);
        echo json_encode($result);
        exit();
    }
}


?>