<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/conexion.php";
$db=new Database();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $usuarios = $db->read("usuario", ["correo" => $correo, "passwordUsuario" => $contrasena]);
    if (count($usuarios) > 0) {
        session_start();
        $_SESSION["usuario"] = $usuarios[0];
        header("Location: /admin/admin.php");
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="/styles/login.css" />
  <link rel="shortcut icon" href="/images/icon.jpg" type="image/x-icon" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Concert+One&family=DM+Serif+Display:ital@0;1&family=Lilita+One&family=Patua+One&family=Piedra&display=swap" />
</head>

<body>
    <header class="header">
        <h1 class="header_h1">Asian Food</h1>
    </header>
    <main class="main">
        <section class="section">
            <form class="form"  method="POST">
                <div class="divForm">
                    <p class="parrafoForm">Iniciar Sesión</p>
                </div>
                <div class="divForm">
                    <label class="label" for="">Correo electrónico</label>
                    <input class="input" type="text" name="correo" required>
                </div>
                <div class="divForm">
                    <label class="label" for="Contraseña">Contraseña</label>
                    <input class="input" type="password" name="contrasena" required>
                </div>
                <div class="divButton">
                    <button class="button" type="submit">Ingresar</button>
                </div>
            </form>
        </section>
    </main>
    <footer class="footer">

    </footer>
</body>

</html>