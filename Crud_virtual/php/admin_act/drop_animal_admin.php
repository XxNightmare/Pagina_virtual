<?php
// Conexión a la base de datos
$conn = mysqli_connect('localhost', 'root', '', 'veterinaria');
if(!$conn){
    die('Error de conexión: '.mysqli_connect_error());
}

// Obtener el ID del animal a eliminar
$id = $_POST['id'];

// Eliminar el registro correspondiente de la tabla animales
$query = "DELETE FROM animales WHERE id = '$id'";
if(mysqli_query($conn, $query)){
    echo "El animal se eliminó correctamente.";
}else{
    echo "Error al eliminar el animal: ".mysqli_error($conn);
}

// Cerrar la conexión
mysqli_close($conn);
?>
