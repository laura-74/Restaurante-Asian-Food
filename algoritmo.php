<?php

require_once('conexion.php');
$db = new Database();

$platos = $db->read('plato');
$nombrePlatos = array_column($platos, 'nombre');



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


function autocompletar($lista, $query) {
    $resultados = [];
    $inicio = 0;
    $fin = count($lista) - 1;
    $query = strtolower($query);

    // Buscar el primer índice que podría coincidir
    while ($inicio <= $fin) {
        $medio = intval(($inicio + $fin) / 2);
        if (strpos(strtolower($lista[$medio]), $query) === 0) {
            // Buscar hacia atrás para encontrar el primer match
            $i = $medio;
            while ($i >= 0 && strpos(strtolower($lista[$i]), $query) === 0) {
                $i--;
            }
            $i++;
            // Agregar todos los matches consecutivos
            while ($i < count($lista) && strpos(strtolower($lista[$i]), $query) === 0) {
                $resultados[] = $lista[$i];
                $i++;
            }
            break;
        } elseif (strtolower($lista[$medio]) < $query) {
            $inicio = $medio + 1;
        } else {
            $fin = $medio - 1;
        }
    }
    return $resultados;
}

?>
