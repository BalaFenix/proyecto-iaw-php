<?php
// Definimos el array con los datos iniciales que nos pide el ejercicio
$estudiantes = [
    "Ana" => [8, 7, 9],
    "Luis" => [5, 6, 4],
    "María" => [10, 9, 10],
    "Carlos" => [6, 6, 6]
];

// Función para sacar la media de un array de notas usando un bucle
function calcularPromedio($notas) {
    $suma = 0;
    $cantidad = 0;
    
    // Usamos un foreach para sumar las notas y contarlas una a una
    foreach ($notas as $nota) {
        $suma += $nota;
        $cantidad++;
    }
    
    // Si no hay notas devolvemos 0 para evitar errores
    if ($cantidad == 0) {
        return 0;
    }
    
    return $suma / $cantidad;
}

// Variables para el resumen final
$aprobados = 0;
$suspendidos = 0;
$mejorPromedio = 0;
$mejorEstudiante = "";

echo "--- RESULTADOS DE LOS ESTUDIANTES ---\n";

foreach ($estudiantes as $nombre => $notas) {
    $promedio = calcularPromedio($notas);
    
    // Decidimos si está aprobado o no
    $estado = ($promedio >= 6) ? "Aprobado" : "Suspenso";
    
    // Contadores para el final
    if ($promedio >= 6) {
        $aprobados++;
    } else {
        $suspendidos++;
    }
    
    // Para encontrar al mejor estudiante de la lista
    if ($promedio > $mejorPromedio) {
        $mejorPromedio = $promedio;
        $mejorEstudiante = $nombre;
    }

    echo "Estudiante: $nombre | Promedio: " . number_format($promedio, 2) . " | Estado: $estado\n";
}

echo "-------------------------------------\n";
echo "Total aprobados: $aprobados\n";
echo "Total suspendidos: $suspendidos\n";
echo "El estudiante con mejor nota es: $mejorEstudiante con un " . number_format($mejorPromedio, 2) . "\n";
?>
