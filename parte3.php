<?php
$texto = "PHP no está muerto… solo sigue trabajando silenciosamente en el 80% de Internet";

// 1. Todo a minúsculas
$textoLimpio = strtolower($texto);

// 2. Convertir la frase en un array de palabras
// Usamos una expresión regular básica o explode para separar por espacios
$palabrasRaw = explode(" ", $textoLimpio);

// 3. Filtrar palabras de menos de 3 letras
$palabrasFiltradas = [];
foreach ($palabrasRaw as $p) {
    // Quitamos puntos o comas que puedan molestar
    $p = trim($p, "….,"); 
    if (strlen($p) >= 3) {
        $palabrasFiltradas[] = $p;
    }
}

// 4. Contar frecuencias
$frecuencias = array_count_values($palabrasFiltradas);

echo "Total palabras analizadas (>=3 letras): " . count($palabrasFiltradas) . "\n";
echo "Palabras que se repiten:\n";

$maxRepeticiones = 0;
$palabraMasRepetida = "";

foreach ($frecuencias as $palabra => $conteo) {
    // Solo mostramos las que aparecen más de una vez
    if ($conteo > 1) {
        echo "- '$palabra' aparece $conteo veces\n";
    }
    
    // Buscamos la que más sale
    if ($conteo > $maxRepeticiones) {
        $maxRepeticiones = $conteo;
        $palabraMasRepetida = $palabra;
    }
}

echo "-------------------------------------\n";
echo "La palabra que más veces sale es: '$palabraMasRepetida' ($maxRepeticiones veces)\n";
?>