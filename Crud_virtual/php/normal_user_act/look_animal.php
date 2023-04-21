<?php
    if(isset($_POST['email'])){
        // Conexión a la base de datos
        $conn = mysqli_connect('localhost', 'root', '', 'veterinaria');
        if(!$conn){
            die('Error de conexión: '.mysqli_connect_error());
        }

        // Obtener el ID del usuario a partir del email proporcionado
        $email = $_POST['email'];
        $sql_id = "SELECT id FROM usuarios WHERE email = '$email'";
        $result = mysqli_query($conn, $sql_id);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];

            // Obtener los datos de los animales relacionados con el ID del usuario
            $query2 = "SELECT id, nombre, raza, tamano, sexo, padecimiento FROM animales WHERE id_dueno  = '$id'";
            $result2 = mysqli_query($conn, $query2);
            if(mysqli_num_rows($result2) > 0){
                // Mostrar los datos en una tabla
                echo "<table>";
                echo "<tr><th>ID</th><th>Nombre</th><th>Raza</th><th>Tamaño</th><th>Sexo</th><th>Padecimiento</th></tr>";
                while($row2 = mysqli_fetch_assoc($result2)){
                    echo "<tr><td>".$row2['id']."</td><td>".$row2['nombre']."</td><td>".$row2['raza']."</td><td>".$row2['tamano']."</td><td>".$row2['sexo']."</td><td>".$row2['padecimiento']."</td></tr>";
                }
                echo "</table>";
                echo '<button onclick="window.location.href=\'../../normal_user/consultar_cita.php\'" class="btn btn-primary btn-block mb-4">Regresar</button>';
            }else{
                echo "No se encontraron animales relacionados con este usuario.";
            }
        }else{
            echo "No se encontró un usuario con este correo electrónico.";
        }

        // Cerrar la conexión
        mysqli_close($conn);
    }
?>
