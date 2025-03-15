<?php
require_once "conexion.php";
$db = new Database();
$banners = $db->read("banners");
$chefs = $db->read("chefs");
$platos = $db->read("platos");
$testimonios = $db->read("testimonios");

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Asian food</title>
  <link rel="stylesheet" href="/styles/styles.css" />
  <link rel="shortcut icon" href="/images/icon.jpg" type="image/x-icon" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Concert+One&family=DM+Serif+Display:ital@0;1&family=Lilita+One&family=Patua+One&family=Piedra&display=swap" />
</head>

<body>
  <!----------------------------- Header ------------------------->
  <header class="header">
    <nav class="nav">
      <h2>Asian Food</h2>
      <div class="menu">
        <a href="#">Inicio</a>
        <a href="#chef">Chef</a>
        <a href="#platos">Platos</a>
        <a href="#testimonio">Testimonios</a>
        <a href="#contacto">Contacto</a>
        <a href="/seccion/usuarios/login.php">Login</a>
      </div>
      <div class="menu-toggle">☰</div>
    </nav>

    <!-- Seccion de banner -->
    <?php foreach ($banners as $banner) { ?>

      <div class="banner">
        <div class="banner_imagen">
          <img src="<?php echo $banner['imagenUrl']; ?>" alt="" loading="lazy" />
        </div>
        <div class="banner_texto">
          <h1><?php echo $banner['titulo']; ?></h1>
          <p><?php echo $banner['descripcion']; ?></p>
        </div>
      </div>
    <?php } ?>

  </header>
  <main class="main">

    <!-- Seccion de chef -->
    <section class="chef" id="chef">
      <div class="tituloChef">
        <h2>Bienvenido a Asian Food</h2>
        <p>Los mejores platos de la ciudad</p>
      </div>

      <div class="infoChef">
        <?php foreach ($chefs as $chef) { ?>

          <div class="chef1">
            <img src="<?php echo $chef['imagenUrl']; ?>" alt="" loading="lazy" />
            <h3><?php echo $chef['nombre']; ?></h3>
            <p><?php echo $chef['descripcion']; ?></p>
          </div>
        <?php } ?>
      </div>
    </section>

    <!------------------ Seccion de platos ------------------->
    <section class="platos" id="platos">
      <h2>Platos del día</h2>
      <div class="platos__seccion">
        <?php foreach ($platos as $plato) { ?>
          <div class="plato">
            <img src="<?php echo $plato['imagenUrl']; ?>" alt="" loading="lazy" />
            <h3><?php echo $plato['nombre']; ?></h3>
            <p><?php echo $plato['descripcion']; ?></p>
            <p><?php echo $plato['precio']; ?></p>
          </div>
        <?php } ?>
      </div>
    </section>

    <!---------------------- Seccion de testimonios --------------------------->
    <section id="testimonio">
      <div class="tituloTestimonios">
        <h2>Testimonios de clientes</h2>
      </div>
    </section>

    <section class="testimonios">
      <?php foreach ($testimonios as $testimonio) { ?>
        <div class="testimonio">
          <p><?php echo $testimonio['opinion']; ?></p>
          <h3><?php echo $testimonio['nombre']; ?></h3>
        </div>
      <?php } ?>
    </section>
    <!---------------------- Seccion de testimonios --------------------------->
    <section id="contacto" class="contacto">
      <div class="tituloContacto">
        <h2>Contacto</h2>
      </div>
      <p class="parrafoContacto">Para cualquier consulta o pedido, no dudes en contactarnos</p>
      <form class="form" action="?" method="post">
        <div class="divForm">
          <label for="" class="label">Nombre:</label>
          <input type="text" class="input" id="nombre" name="nombre" placeholder="Ingrese su nombre">
        </div>
        <div class="divForm">
          <label for="" class="label">Correo electrónico:</label>
          <input type="text" class="input" name="email" id="email" placeholder="Ingrese su email">
        </div>
        <div class="divForm">
          <label for="" class="label">Teléfono:</label>
          <input type="text" class="input" name="telefono" id="telefono" placeholder="Ingrese su telefono">
        </div>
        <div class="divForm">
          <label for="mensaje" class="label">Mensaje:</label>
          <textarea class="textarea" id="mensaje" name="mensaje" rows="6" placeholder="Ingrese su mensaje"></textarea>
        </div>
        <div class="divForm">
          <button type="submit" class="bottonForm">Enviar</button>
        </div>
      </form>
    </section>

  </main>

  <!-------------------------------------- FOOTER ----------------------------------->

  <footer class="footer">
    <section class="footerInfo">

      <!------------------ Horarios ---------------->
      <div class="horarios" id="horarios">
        <h3>Horarios</h3>
        <p>Lunes a Viernes: <br> 9:00am - 9:00pm</p>

        <p>Sabado y Domingo: <br> 10:00am - 8:00pm</p>
      </div>

      <!------------------ Contacto ---------------->
      <div class="contacto" id="contacto">
        <h3>Contacto</h3>
        <p>Telefono: 123456789</p>
        <p>Correo: AsianFood@gmail.com</p>
      </div>


      <!------------- Redes sociales ---------------->
      <div class="redes" id="redes">
        <h3>Redes Sociales</h3>

        <div>
          <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24">
            <path fill="#fff"
              d="M12.001 9a3 3 0 1 0 0 6a3 3 0 0 0 0-6m0-2a5 5 0 1 1 0 10a5 5 0 0 1 0-10m6.5-.25a1.25 1.25 0 0 1-2.5 0a1.25 1.25 0 0 1 2.5 0M12.001 4c-2.474 0-2.878.007-4.029.058c-.784.037-1.31.142-1.798.332a2.9 2.9 0 0 0-1.08.703a2.9 2.9 0 0 0-.704 1.08c-.19.49-.295 1.015-.331 1.798C4.007 9.075 4 9.461 4 12c0 2.475.007 2.878.058 4.029c.037.783.142 1.31.331 1.797c.17.435.37.748.702 1.08c.337.336.65.537 1.08.703c.494.191 1.02.297 1.8.333C9.075 19.994 9.461 20 12 20c2.475 0 2.878-.007 4.029-.058c.782-.037 1.308-.142 1.797-.331a2.9 2.9 0 0 0 1.08-.703c.337-.336.538-.649.704-1.08c.19-.492.296-1.018.332-1.8c.052-1.103.058-1.49.058-4.028c0-2.474-.007-2.878-.058-4.029c-.037-.782-.143-1.31-.332-1.798a2.9 2.9 0 0 0-.703-1.08a2.9 2.9 0 0 0-1.08-.704c-.49-.19-1.016-.295-1.798-.331C14.926 4.006 14.54 4 12 4m0-2c2.717 0 3.056.01 4.123.06c1.064.05 1.79.217 2.427.465c.66.254 1.216.598 1.772 1.153a4.9 4.9 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428c.047 1.066.06 1.405.06 4.122s-.01 3.056-.06 4.122s-.218 1.79-.465 2.428a4.9 4.9 0 0 1-1.153 1.772a4.9 4.9 0 0 1-1.772 1.153c-.637.247-1.363.415-2.427.465c-1.067.047-1.406.06-4.123.06s-3.056-.01-4.123-.06c-1.064-.05-1.789-.218-2.427-.465a4.9 4.9 0 0 1-1.772-1.153a4.9 4.9 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.012 15.056 2 14.717 2 12s.01-3.056.06-4.122s.217-1.79.465-2.428a4.9 4.9 0 0 1 1.153-1.772A4.9 4.9 0 0 1 5.45 2.525c.637-.248 1.362-.415 2.427-.465C8.945 2.013 9.284 2 12.001 2" />
          </svg>
          <p>Instagram</p>
        </div>
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24">
            <path fill="#fff"
              d="M12.001 2c-5.523 0-10 4.477-10 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89c1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.344 21.129 22 16.992 22 12c0-5.523-4.477-10-10-10" />
          </svg>
          <p>Facebook</p>
        </div>
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24">
            <path fill="#fff"
              d="M10.488 14.651L15.25 21h7l-7.858-10.478L20.93 3h-2.65l-5.117 5.886L8.75 3h-7l7.51 10.015L2.32 21h2.65zM16.25 19L5.75 5h2l10.5 14z" />
          </svg>
          <p>X</p>
        </div>
    </section>



    <!------------------ Derechos ------------------>

    <section class="derechos">
      <h4>Asian Food</h4>
      <p>© Todos los derechos reservados</p>
    </section>
  </footer>
  <div class="menu-overlay"></div>
  <script src="/js/app.js"></script>
</body>

</html>