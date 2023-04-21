<?php
// Iniciamos la sesión
session_start();

// Verificamos si la sesión está iniciada y si el usuario es administrador
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    // Si la sesión no está iniciada o el usuario no es administrador, redirigimos a la página de login
    header("Location: ../index.html");
    exit();
}
// Incluimos la conexión a la base de datos
include('../conexion.php');

// Si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Recibimos los datos del formulario
  $nombre = $_POST['nombre'];
  $raza = $_POST['raza'];
  $tamano = $_POST['tamano'];
  $sexo = $_POST['sexo'];
  $padecimiento = $_POST['padecimiento'];
  $email = $_POST['email'];
  $id_usuario = "";

  $sql_id = "SELECT id FROM usuarios WHERE email = '$email'";
  $resultado_id = mysqli_query($conn, $sql_id);

  if ($resultado_id && mysqli_num_rows($resultado_id) > 0) {
    $fila = mysqli_fetch_assoc($resultado_id);
    $id_usuario = $fila['id'];
    echo "El id del usuario con correo $email es $id_usuario";
  } else {
      echo "No se encontró ningún usuario con el correo $email";
  }

  // Preparamos la consulta SQL para insertar los datos
  $sql = "INSERT INTO animales (nombre, raza, tamano, sexo, padecimiento, id_dueno) 
          VALUES ('$nombre', '$raza', '$tamano', '$sexo', '$padecimiento', '$id_usuario')";

  // Ejecutamos la consulta SQL y almacenamos el resultado
  $resultado = mysqli_query($conn, $sql);

  // Verificar si se insertaron los valores correctamente
  if ($resultado) {
    header("Location: ../../normal_user/hacer_cita.php");
  } else {
    echo '<div class="alert alert-danger">Ocurrió un error al agregar el animal: ' . mysqli_error($conexion) . '</div>';
  }

  // Cerramos la conexión a la base de datos
  mysqli_close($conexion);
}
?>