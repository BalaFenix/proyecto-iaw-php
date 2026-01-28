<?php
$carrito = [
    ["producto" => "Portátil", "precio" => 1200, "cantidad" => 1],
    ["producto" => "Ratón", "precio" => 25, "cantidad" => 2],
    ["producto" => "Teclado", "precio" => 45, "cantidad" => 1],
];

// Función para sacar el total bruto del carrito
function calcularTotal($carrito) {
    $suma = 0;
    foreach ($carrito as $item) {
        $suma += $item['precio'] * $item['cantidad'];
    }
    return $suma;
}

echo "DETALLE DEL CARRITO:\n";
foreach ($carrito as $item) {
    $subtotal = $item['precio'] * $item['cantidad'];
    echo "- {$item['producto']}: {$item['precio']}€ x {$item['cantidad']} = {$subtotal}€\n";
}

$totalSinDescuento = calcularTotal($carrito);
$descuentoPorcentaje = 0;

// Aplicamos la lógica de descuentos solicitada
if ($totalSinDescuento > 1000) {
    $descuentoPorcentaje = 10;
} elseif ($totalSinDescuento > 500) {
    $descuentoPorcentaje = 5;
}

$cantidadDescontada = $totalSinDescuento * ($descuentoPorcentaje / 100);
$totalFinal = $totalSinDescuento - $cantidadDescontada;

echo "----------------------------\n";
echo "Total bruto: $totalSinDescuento €\n";
echo "Descuento aplicado: $descuentoPorcentaje%\n";
echo "TOTAL FINAL: $totalFinal €\n";
?>