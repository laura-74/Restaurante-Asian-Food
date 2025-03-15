<?php
require_once "conexion.php";
$db = new Database();

function guardarSugerencia($db, $nombre, $correo, $telefono, $mensaje) {
  // Validar que todos los campos estén completos
  if (!empty($nombre) && !empty($correo) && !empty($telefono) && !empty($mensaje)) {
      // Insertar los datos en la tabla sugerencias
      $db->create("sugerencias", [
          "nombre" => $nombre,
          "correo" => $correo,
          "telefono" => $telefono,
          "mensaje" => $mensaje
      ]);
      return "Sugerencia enviada correctamente.";
  } else {
      return "Por favor, completa todos los campos.";
  }
}

// Procesar el formulario si se envía
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nombre = $_POST["nombre"];
  $correo = $_POST["email"];
  $telefono = $_POST["telefono"];
  $mensaje = $_POST["mensaje"];

  // Llamar a la función para guardar la sugerencia
  $resultado = guardarSugerencia($db, $nombre, $correo, $telefono, $mensaje);
  echo "<p>$resultado</p>";
}
?>