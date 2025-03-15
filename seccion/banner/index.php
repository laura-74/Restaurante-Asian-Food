<?php
include("../../bd.php");

$sentencia = $conn->prepare("SELECT * FROM banner");
$sentencia->execute();
$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);



include("../../templates/header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner</title>
    <link rel="stylesheet" href="/styles/bannerIndex.css" />
    <link rel="shortcut icon" href="/images/icon.jpg" type="image/x-icon" />
</head>

<body>
    <header>
        <nav class="nav">
            <h2>Asian Food</h2>
            <div class="menu">
                <a href="#">Inicio</a>
                <a href="#chef">Chef</a>
                <a href="#platos">Platos</a>
                <a href="#testimonio">Testimonios</a>
                <a href="#contacto">Contacto</a>
                <a href="#">Login</a>
            </div>
            <div class="menu-toggle">☰</div>
        </nav>
        <div class="divAgregar">
            <a class="agregarRegistro" href="/seccion/banner/crear.php">Agregar Registro</a>
        </div>
    </header>

    <main class="main">

        <table class="table" border="1">

            <thead>
                <th><strong>Id</strong></th>
                <th><strong>Titulo</strong></th>
                <th><strong>Descripción</strong></th>
                <th><strong>Enlace</strong></th>
                <th><strong>Acciones</strong></th>
            </thead>

            <tbody>
                <tr>
                    <?php foreach ($resultado as $key => $value) { ?>
                <tr class="">
                    <td scope="row">1</td>
                    <td><?php echo $value["titulo"]; ?></td>
                    <td><?php echo $value["descripcion"]; ?></td>
                    <td><?php echo $value["link"]; ?></td>
                    <td>
                        <div class="divAcciones">
                            <!-- From Uiverse.io by JaydipPrajapati1910 -->
                            <button type="button" class="editar">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    fill="currentColor"
                                    class="bi bi-arrow-repeat"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"></path>
                                    <path
                                        fill-rule="evenodd"
                                        d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"></path>
                                </svg>
                                Actualizar
                            </button>
                            <button class="eliminar"><span class="text">Borrar</span><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
                                    </svg></span>
                            </button>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tr>
            </tbody>
        </table>
    </main>

</body>

</html>