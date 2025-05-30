<?php

require_once('conexion.php');
$db = new Database();

$plastos = $db->read('plato');
$nombrePlatos = array_column($plastos, 'nombre');



// Método burbuja para ordenar el array
function burbuja(array $array): array
{
    $n = count($array);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                // Intercambiar
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }
    return $array;
}

$nombrePlatosOrdenados = burbuja($nombrePlatos);

echo "Platos ordenados\n";
print_r($nombrePlatosOrdenados);

?>
