<?php
// Conexión a la base de datos
$servidor = "localhost"; // Cambiar si es necesario
$usuario = "root"; // Cambiar si es necesario
$contrasena = ""; // Cambiar si es necesario
$base_datos = "veterinaria"; // Cambiar si es necesario

// Crear conexión
$conn = mysqli_connect($servidor, $usuario, $contrasena, $base_datos);

// Verificar si hay errores de conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
