<?php
  // Conectar a la base de datos
  require_once 'conexion.php';

  // Verificar si se ha enviado el formulario
  if (isset($_POST['nombre']) && isset($_POST['descripcion'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Verificar si el plan ya existe
    $query = "SELECT * FROM planes WHERE nombre = '$nombre'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      echo "El plan ya existe";
    } else {
      // Agregar plan a la base de datos
      $query = "INSERT INTO planes (nombre, descripcion) VALUES ('$nombre', '$descripcion')";
      mysqli_query($conn, $query);

      echo "Plan agregado con éxito";
    }
  }
?>