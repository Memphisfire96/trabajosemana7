<?php
  // Conectar a la base de datos
  require_once 'conexion.php';

  // Verificar si se ha enviado el formulario
  if (isset($_POST['cliente_id']) && isset($_POST['plan_id'])) {
    $cliente_id = $_POST['cliente_id'];
    $plan_id = $_POST['plan_id'];

    // Verificar si el cliente y el plan existen
    $query = "SELECT * FROM cliente WHERE id = '$cliente_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0) {
      echo "El cliente no existe";
    } else {
      $query = "SELECT * FROM planes WHERE id = '$plan_id'";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) == 0) {
        echo "El plan no existe";
      } else {
        // Asignar plan a cliente
        $query = "INSERT INTO planes_clientes (cliente_id, plan_id) VALUES ('$cliente_id', '$plan_id')";
        mysqli_query($conn, $query);

        echo "Plan asignado con éxito";
      }
    }
  }
?>