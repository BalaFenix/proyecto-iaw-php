<?php
$texto = "PHP no está muerto… solo sigue trabajando silenciosamente en el 80% de Internet";

// Todo a minúsculas
$textoLimpio = strtolower($texto);

// Convertir la frase en un array de palabras
$palabrasRaw = explode(" ", $textoLimpio);

// Filtrar palabras de menos de 3 letras y limpiar puntuación
$palabrasFiltradas = [];
$totalAnalizadas = 0; // Contador manual para no usar count() al final

foreach ($palabrasRaw as $p) {
    $p = trim($p, "….,"); 
    if (strlen($p) >= 3) {
        $palabrasFiltradas[] = $p;
        $totalAnalizadas++;
    }
}

// Contar frecuencias manualmente
$frecuencias = [];
foreach ($palabrasFiltradas as $palabra) {
    if (isset($frecuencias[$palabra])) {
        $frecuencias[$palabra]++;
    } else {
        $frecuencias[$palabra] = 1;
    }
}

echo "Total palabras analizadas (>=3 letras): " . $totalAnalizadas . "\n";
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
