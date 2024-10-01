<?php
  // Conectar a la base de datos
 require_once 'conexion.php';

  // Verificar si se ha enviado el formulario
  if (isset($_POST['email']) && isset($_POST['contraseña'])) {
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    // Verificar credenciales del usuario
    $query = "SELECT * FROM usuarios WHERE email = '$email' AND contraseña = '$contraseña'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      // Iniciar sesión del usuario
      session_start();
      $_SESSION['email'] = $email;
      header("Location: panel.php");
    } else {
      echo "Credenciales incorrectas";
    }
  }
?>
