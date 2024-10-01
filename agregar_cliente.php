<?php
  // Conectar a la base de datos
  require_once 'conexion.php';

  // Verificar si se ha enviado el formulario
  if (isset($_POST['rut']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['telefono'])) {
    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // Verificar si el cliente ya existe
    $query = "SELECT * FROM cliente WHERE rut = '$rut' OR email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      echo "El cliente ya existe";
    } else {
      // Agregar cliente a la base de datos
      $query = "INSERT INTO cliente (rut, nombre, apellido, email, telefono) VALUES ('$rut', '$nombre', '$apellido', '$email', '$telefono')";
      mysqli_query($conn, $query);

      echo "Cliente agregado con éxito";
    }
  }
?>