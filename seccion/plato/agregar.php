<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Asian food</title>
  <link rel="stylesheet" href="/styles/bannerCrear.css" />
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
            <form class="form" action="???" method="POST">
                <div class="divForm">
                    <p class="parrafoForm">Crear Plato</p>
                </div>
                <div class="divForm">
                    <label class="label" for="">Nombre</label>
                    <input class="input" type="text" name="nombre" required>
                </div>
                <div class="divForm">
                    <label class="label" for="Contraseña">Descripción</label>
                    <input class="input" type="text" name="descripcion" required>
                </div>  
                <div class="divForm">
                    <label class="label" for="Contraseña">Precio</label>
                    <input class="input" type="text" name="precio" required>
                </div> 
                <div class="divForm">
                    <label class="label" for="Contraseña">Url de la imagen</label>
                    <input class="input" type="text" name="enlace" required>
                </div>
                <div class="divButton">
                    <button class="button" type="submit">Crear</button>
                    <button class="button" type="submit" onclick="window.location.href='/admin/admin.php'">Cancelar</button>
                </div>
            </form>
        </section>
    </main>
    <footer class="footer">

    </footer>
</body>

</html>
