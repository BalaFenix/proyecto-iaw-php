<?php
// Datos de los estudiantes de la consultoría CloudTech
$estudiantes = [
    "Ana" => [8, 7, 9],
    "Luis" => [5, 6, 4],
    "María" => [10, 9, 10],
    "Carlos" => [6, 6, 6]
];

// Funcion para calcular el promedio usando unicamente bucles
function calcularPromedio($notas) {
    $sumaTotal = 0;
    $totalNotas = 0;
    
    // Recorremos el array de notas para sumar sus valores manualmente
    foreach ($notas as $nota) {
        $sumaTotal += $nota;
        $totalNotas++;
    }
    
    // Evitamos division por cero si el array estuviera vacio
    if ($totalNotas === 0) {
        return 0;
    }
    
    return $sumaTotal / $totalNotas;
}

// Variables de control para el informe final
$aprobados = 0;
$suspendidos = 0;
$mejorPromedio = 0;
$mejorEstudiante = "";

echo "REPORTES DE RENDIMIENTO ACADEMICO\n";
echo "-------------------------------------\n";

// Procesamiento de la lista de estudiantes
foreach ($estudiantes as $nombre => $notas) {
    $promedio = calcularPromedio($notas);
    
    // Determinacion del estado segun la politica de la empresa 
    if ($promedio >= 6) {
        $estado = "Aprobado";
        $aprobados++;
    } else {
        $estado = "Suspenso";
        $suspendidos++;
    }
    
    // identificar el mejor promedio
    if ($promedio > $mejorPromedio) {
        $mejorPromedio = $promedio;
        $mejorEstudiante = $nombre;
    }

    echo "Estudiante: $nombre | Promedio: " . number_format($promedio, 2) . " | Estado: $estado\n";
}

echo "-------------------------------------\n";
echo "RESUMEN FINAL:\n";
echo "Total de alumnos aprobados: $aprobados\n";
echo "Total de alumnos suspendidos: $suspendidos\n";
echo "Mencion especial: $mejorEstudiante con una calificacion de " . number_format($mejorPromedio, 2) . "\n";
?>
