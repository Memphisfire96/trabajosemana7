<?php
  // Conectar a la base de datos
  require_once 'conexion.php';
  
  // Verificar si se ha enviado el formulario
  if (isset($_POST['email']) && isset($_POST['nombreusuario']) && isset($_POST['contraseña'])) {
    $email = $_POST['email'];
    $nombreusuario = $_POST['nombreusuario'];
    $contraseña = $_POST['contraseña'];
    
    // Validar usuario y contraseña
    if (strlen($nombreusuario) < 8) {
      $error = 'El usuario debe tener al menos 8 caracteres. Por favor, inténtelo de nuevo.';
    } elseif (!preg_match('/[A-Z]/', $nombreusuario)) {
      $error = 'El usuario debe tener al menos un carácter en mayúscula. Por favor, inténtelo de nuevo.';
    } elseif (!preg_match('/[!@#$%^&*()_+=-{};:"<>,.\/~`|]/', $nombreusuario)) {
      $error = 'El usuario debe tener al menos un símbolo especial. Por favor, inténtelo de nuevo.';
    } else {
      // Verificar si el usuario ya existe
      $query = "SELECT * FROM usuarios WHERE email = '$email' OR nombreusuario = '$nombreusuario'";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
        echo "El usuario ya existe";
      } else {
        // Agregar usuario a la base de datos
        $query = "INSERT INTO usuarios (email, nombreusuario, contraseña) VALUES ('$email', '$nombreusuario', '$contraseña')";
        mysqli_query($conn, $query);

        echo "Usuario agregado con éxito";
      }
    }
    
    if (isset($error)) {
      echo "<p style='color: red;'>$error</p>";
    }
  }
?>