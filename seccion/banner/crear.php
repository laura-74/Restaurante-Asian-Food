<?php
require_once "../../conexion.php";
$db = new Database();

// Obtener el tipo de entidad y el ID desde la URL
$tipo = $_GET['tipo'] ?? null;

if (!$tipo) {
    // Redirigir si no se proporcionan los parámetros necesarios
    header("Location: /admin/admin.php");
    exit();
}

// Determinar la tabla y los campos según el tipo
$tabla = '';
$campos = [];
switch ($tipo) {
    case 'banner':
        $tabla = 'banners';
        $campos = ['titulo', 'descripcion', 'imagenUrl'];
        break;
    case 'chefs':
        $tabla = 'chefs';
        $campos = ['nombre', 'descripcion', 'imagenUrl'];
        break;
    case 'platos':
        $tabla = 'platos';
        $campos = ['nombre', 'descripcion', 'precio', 'imagenUrl'];
        break;
    case 'testimonios':
        $tabla = 'testimonios';
        $campos = ['nombre', 'opinion'];
        break;

    default:
        // Redirigir si el tipo no es válido
        header("Location: /admin/admin.php");
        exit();
}

// Leer los datos de la base de datos

// Procesar la actualización si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = [];
    foreach ($campos as $campo) {
        $datos[$campo] = $_POST[$campo];
    }

    $db->create($tabla, $datos);

    // Redirigir de vuelta a la página de administración
    header("Location: /admin/admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar <?php echo ucfirst($tipo); ?></title>
    <link rel="stylesheet" href="/styles/bannerCrear.css">

</head>

<body>
    <header class="header">
        <h1 class="header_h1">Asian Food</h1>
    </header>
    <main class="main">
        <section class="section">

            <form class="form" method="post">
            <div class="divForm">
            <p class="parrafoForm">Crear <?php echo ucfirst($tipo); ?></p>
            </div>
                <?php foreach ($campos as $campo): ?>
                    <div class="divForm">
                        <label class="label" for="<?php echo $campo; ?>"><?php echo ucfirst($campo); ?>:</label>
                        <input class="input" type="text" id="<?php echo $campo; ?>" name="<?php echo $campo; ?>" value="" required>
                        <br>
                    </div>
                <?php endforeach; ?>
                <div class="divButton">
                    <button class="button" type="submit">Crear</button>
                    <button class="button" type="submit" onclick="window.location.href='/admin/admin.php'">Cancelar</button>
                </div>
            </form>
        </section>
    </main>
</body>

</html>