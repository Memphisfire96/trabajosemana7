<?php
  // Verificar si el usuario ha iniciado sesión
  session_start();
  if (!isset($_SESSION['email'])) {
    header("Location: ingreso.php");
  }

  // Conectar a la base de datos
  require_once 'conexion.php';
  
  // Mostrar información del usuario
  $email = $_SESSION['email'];
  $query = "SELECT * FROM usuarios WHERE email = '$email'";
  $result = mysqli_query($conn, $query);
  $user = mysqli_fetch_assoc($result);

  echo "Bienvenido, " . $user['nombreusuario'] . "!";

  // Agregar clientes
  echo "<h2>Agregar Cliente</h2>";
  echo "<form action='agregar_cliente.php' method='post'>";
  echo "<label for='rut'>RUT:</label>";
  echo "<input type='text' id='rut' name='rut'><br><br>";
  echo "<label for='nombre'>Nombre:</label>";
  echo "<input type='text' id='nombre' name='nombre'><br><br>";
  echo "<label for='apellido'>Apellido:</label>";
  echo "<input type='text' id='apellido' name='apellido'><br><br>";
  echo "<label for='email'>Correo Electrónico:</label>";
  echo "<input type='email' id='email' name='email'><br><br>";
  echo "<label for='telefono'>Teléfono:</label>";
  echo "<input type='text' id='telefono' name='telefono'><br><br>";
  echo "<input type='submit' value='Agregar Cliente'>";
  echo "</form>";

  // Agregar planes
  echo "<h2>Agregar Plan</h2>";
  echo "<form action='agregar_plan.php' method='post'>";
  echo "<label for='nombre'>Nombre del Plan:</label>";
  echo "<input type='text' id='nombre' name='nombre'><br><br>";
  echo "<label for='descripcion'>Descripción del Plan:</label>";
  echo "<input type='text' id='descripcion' name='descripcion'><br><br>";
  echo "<input type='submit' value='Agregar Plan'>";
  echo "</form>";
?>
<?php
  // ...
  echo "<h2>Asignar Plan a Cliente</h2>";
  echo "<form action='add_plan_cliente.php' method='post'>";
  echo "<label for='cliente_id'>Seleccione un cliente:</label>";
  echo "<select id='cliente_id' name='cliente_id'>";
  $query = "SELECT * FROM cliente";
  $result = mysqli_query($conn, $query);
  while ($cliente = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $cliente['id'] . "'>" . $cliente['nombre'] . " " . $cliente['apellido'] . "</option>";
  }
  echo "</select><br><br>";
  echo "<label for='plan_id'>Seleccione un plan:</label>";
  echo "<select id='plan_id' name='plan_id'>";
  $query = "SELECT * FROM planes";
  $result = mysqli_query($conn, $query);
  while ($plan = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $plan['id'] . "'>" . $plan['nombre'] . "</option>";
  }
  echo "</select><br><br>";
  echo "<input type='submit' value='Asignar Plan'>";
  echo "</form>";
?>
// dashboard.php
<?php
  echo "<p><a href='listado.php' class='btn btn-success'>Ir al Listado de Clientes y Planes</a></p>";
?>