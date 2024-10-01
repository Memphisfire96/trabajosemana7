<?php
  // Conectar a la base de datos
  require_once 'conexion.php';
  // Mostrar lista de clientes
  $query = "SELECT * FROM cliente";
  $result = mysqli_query($conn, $query);

  echo "<h2>Lista de Clientes</h2>";
  echo "<ul>";
  while ($cliente = mysqli_fetch_assoc($result)) {
    echo "<li>" . $cliente['nombre'] . " " . $cliente['apellido'] . " (RUT: " . $cliente['rut'] . ")</li>";
  }
  echo "</ul>";

  // Mostrar lista de planes
  $query = "SELECT * FROM planes";
  $result = mysqli_query($conn, $query);

  echo "<h2>Lista de Planes</h2>";
  echo "<ul>";
  while ($plan = mysqli_fetch_assoc($result)) {
    echo "<li>" . $plan['nombre'] . " - " . $plan['descripcion'] . "</li>";
  }
  echo "</ul>";

  // Mostrar lista de planes asignados a cada cliente
  $query = "SELECT * FROM planes_clientes";
  $result = mysqli_query($conn, $query);

  echo "<h2>Lista de Planes Asignados</h2>";
  echo "<ul>";
  while ($plan_cliente = mysqli_fetch_assoc($result)) {
    $cliente_id = $plan_cliente['cliente_id'];
    $plan_id = $plan_cliente['plan_id'];

    $query = "SELECT * FROM cliente WHERE id = '$cliente_id'";
    $result_cliente = mysqli_query($conn, $query);
    $cliente = mysqli_fetch_assoc($result_cliente);

    $query = "SELECT * FROM planes WHERE id = '$plan_id'";
    $result_plan = mysqli_query($conn, $query);
    $plan = mysqli_fetch_assoc($result_plan);

    echo "<li>" . $cliente['nombre'] . " " . $cliente['apellido'] . " - " . $plan['nombre'] . "</li>";
  }
  echo "</ul>";
?>