<?php
require_once "../conexion.php";
$db = new Database();

// Crear un nuevo registro
/* $db->create("usuarios", ["nombre" => "Juan", "email" => "juan@example.com"]); */

// Leer registros
$banners = $db->read("banners");
$chefs = $db->read("chefs");
$platos = $db->read("platos");
$testimonios = $db->read("testimonios");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $db->delete("banners", ["id" => $id]);
    header("Location: /admin/admin.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $db->delete("chefs", ["id" => $id]);
    header("Location: /admin/admin.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $db->delete("platos", ["id" => $id]);
    header("Location: /admin/admin.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $db->delete("testimonios", ["id" => $id]);
    header("Location: /admin/admin.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>administrador</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="shortcut icon" href="/images/icon.jpg" type="image/x-icon" />


</head>

<body>
    <header class="header">
        <h1 class="header_h1">Bienvenido administrador</h1>
        <a  class="header_a" href="/index.php">Inicio</a>
    </header>
    <main class="main">
        <!-- banners -->
        <section class="banner">
        <table class="table" border="1">
                <div class="tituloBoton">
                    <p class="tituloSecciones">Sección Banners</p>
                    <button type="button" class="Agregar" onclick="location.href='/seccion/banner/crear.php?tipo=banner'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M11 11V7h2v4h4v2h-4v4h-2v-4H7v-2zm1 11C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10m0-2a8 8 0 1 0 0-16a8 8 0 0 0 0 16" />
                        </svg>
                        Agregar
                    </button>
                </div>
                <thead>
                    <th><strong>Titulo</strong></th>
                    <th><strong>Descripción</strong></th>
                    <th><strong>Imagen</strong></th>
                    <th><strong>Acciones</strong></th>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($banners as $banner) { ?>
                    <tr>
                        <td><?php echo $banner["titulo"]; ?></td>
                        <td><?php echo $banner["descripcion"]; ?></td>
                        <td><img src="<?php echo $banner["imagenUrl"]; ?>" alt=""> </td>
                        <td>
                            <div class="divAcciones">
                                <button type="button" class="editar" onclick="location.href='/seccion/banner/editar.php?tipo=banner&id=<?php echo $banner['id']; ?>'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                        <path
                                            d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"></path>
                                        <path
                                            fill-rule="evenodd"
                                            d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"></path>
                                    </svg>
                                    Actualizar
                                </button>
                                <form method="post" >
                                    <input type="hidden" name="id" value="<?php echo $banner['id']; ?>">
                                    <button class="eliminar">
                                        <span class="text">Borrar</span>
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tr>
                </tbody>
            </table>
        </section>


        <!-- chefs -->
        <section class="chefs">
            <table class="table" border="1">
                <div class="tituloBoton">
                    <p class="tituloSecciones">Sección chef </p>
                    <button type="button" class="Agregar" onclick="location.href='/seccion/banner/crear.php?tipo=chefs'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M11 11V7h2v4h4v2h-4v4h-2v-4H7v-2zm1 11C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10m0-2a8 8 0 1 0 0-16a8 8 0 0 0 0 16" />
                        </svg>
                        Agregar
                    </button>
                </div>
                <thead>
                    <th><strong>Nombre</strong></th>
                    <th><strong>Descripción</strong></th>
                    <th><strong>Imagen</strong></th>
                    <th><strong>Acciones</strong></th>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($chefs as $chef) { ?>
                    <tr>
                        <td><?php echo $chef["nombre"]; ?></td>
                        <td><?php echo $chef["descripcion"]; ?></td>
                        <td><img src="<?php echo $chef["imagenUrl"]; ?>" alt=""> </td>
                        <td>
                            <div class="divAcciones">
                                <button type="button" class="editar" onclick="location.href='/seccion/banner/editar.php?tipo=chef&id=<?php echo $chef['id']; ?>'">  
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                        <path
                                            d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"></path>
                                        <path
                                            fill-rule="evenodd"
                                            d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"></path>
                                    </svg>
                                    Actualizar
                                </button>
                                <form method="post" >
                                    <input type="hidden" name="id" value="<?php echo $chef['id']; ?>">
                                    <button class="eliminar">
                                        <span class="text">Borrar</span>
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tr>
                </tbody>
            </table>

        </section>
        <!-- Platos -->
        <section class="platos">
        <table class="table" border="1">
                <div class="tituloBoton">
                    <p class="tituloSecciones">Sección platos</p>
                    <button type="button" class="Agregar" onclick="location.href='/seccion/banner/crear.php?tipo=platos'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M11 11V7h2v4h4v2h-4v4h-2v-4H7v-2zm1 11C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10m0-2a8 8 0 1 0 0-16a8 8 0 0 0 0 16" />
                        </svg>
                        Agregar
                    </button>
                </div>
                <thead>
                    <th><strong>Nombre</strong></th>
                    <th><strong>Descripción</strong></th>
                    <th><strong>Precio</strong></th>
                    <th><strong>Imagen</strong></th>
                    <th><strong>Acciones</strong></th>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($platos as $plato) { ?>
                    <tr>
                        <td><?php echo $plato["nombre"]; ?></td>
                        <td><?php echo $plato["descripcion"]; ?></td>
                        <td><?php echo $plato["precio"]; ?></td>
                        <td><img src="<?php echo $plato["imagenUrl"]; ?>" alt=""> </td>
                        <td>
                        <div class="divAcciones">
                                <button type="button" class="editar" onclick="location.href='/seccion/banner/editar.php?tipo=plato&id=<?php echo $plato['id']; ?>'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                        <path
                                            d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"></path>
                                        <path
                                            fill-rule="evenodd"
                                            d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"></path>
                                    </svg>
                                    Actualizar
                                </button>
                                <form method="post" >
                                    <input type="hidden" name="id" value="<?php echo $plato['id']; ?>">
                                    <button class="eliminar">
                                        <span class="text">Borrar</span>
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tr>
                </tbody>
            </table>

        </section>
        <!-- Testimonios -->
        <section class="testimonios">
        <table class="table" border="1">
                <div class="tituloBoton">
                    <p class="tituloSecciones">Sección testimonios</p>
                    <button type="button" class="Agregar" onclick="location.href='/seccion/banner/crear.php?tipo=testimonios'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M11 11V7h2v4h4v2h-4v4h-2v-4H7v-2zm1 11C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10m0-2a8 8 0 1 0 0-16a8 8 0 0 0 0 16" />
                        </svg>
                        Agregar
                    </button>
                </div>
                <thead>
                    <th><strong>Nombre</strong></th>
                    <th><strong>Opinión</strong></th>
                    <th><strong>Acciones</strong></th>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($testimonios as $testimonio) { ?>
                    <tr>
                        <td><?php echo $testimonio["nombre"]; ?></td>
                        <td><?php echo $testimonio["opinion"]; ?></td>
                        <td>
                        <div class="divAcciones">
                                <button type="button" class="editar" onclick="location.href='/seccion/banner/editar.php?tipo=testimonios&id=<?php echo $testimonio['id']; ?>'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                        <path
                                            d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"></path>
                                        <path
                                            fill-rule="evenodd"
                                            d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"></path>
                                    </svg>
                                    Actualizar
                                </button>
                                <form method="post" >
                                    <input type="hidden" name="id" value="<?php echo $testimonio['id']; ?>">
                                    <button class="eliminar">
                                        <span class="text">Borrar</span>
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tr>
                </tbody>
            </table>

        </section>
    </main>
    <footer class="footer">
      <h4>Asian Food</h4>
      <p>© Todos los derechos reservados</p>
    </footer>
</body>

</html>