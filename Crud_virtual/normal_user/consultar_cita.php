<?php
// Iniciamos la sesión
session_start();

// Verificamos si la sesión está iniciada y si el usuario es administrador
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'usuario') {
    // Si la sesión no está iniciada o el usuario no es administrador, redirigimos a la página de login
    header("Location: ../index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>VETERIOC</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="../assets/css/main.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="nosotros.php" class="logo d-flex align-items-center">
                <h1>VanShop</h1>
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                <li><a href="nosotros.php">Nosotros</a></li>
                    <li><a href="hacer_cita.php">Comprar</a></li>
                    <li><a href="consultar_cita.php" class="active">Carrito</a></li>
                    <li><a href="../php/cerrar_sesion.php">Salir</a></li>
                </ul>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">
        <div style="min-height: 1vh; padding: 50px 0;" id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-item active" style="background-image: url(https://img2.rtve.es/i/?w=1600&i=1599041762848.jpg)"></div>
        </div>
    </section><!-- End Hero Section -->

    <main id="main">
        <!-- ======= Constructions Section ======= -->
        <section style="padding: 35px 0 0 0;" id="constructions" class="constructions">
            <div class="container" data-aos="fade-up">
                <form action="../php/normal_user_act/look_animal.php" method="post">
                    <div class="form-outline mb-4">
                        <input type="email" id="email" name="email" class="form-control" />
                        <label class="form-label" for="email">Email</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Buscar</button>
                </form>
                <?php
                if (isset($_POST['email'])) {
                    // Conexión a la base de datos
                    $conn = mysqli_connect('localhost', 'root', '', 'veterinaria');
                    if (!$conn) {
                        die('Error de conexión: ' . mysqli_connect_error());
                    }

                    // Obtener el ID del usuario a partir del email proporcionado
                    $email = $_POST['email'];
                    $query = "SELECT id FROM usuarios WHERE correo = '$email'";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $id = $row['id'];

                        // Obtener los datos de los animales relacionados con el ID del usuario
                        $query2 = "SELECT id, nombre, raza, tamaño, sexo, padecimiento FROM animales WHERE usuario_id = '$id'";
                        $result2 = mysqli_query($conn, $query2);
                        if (mysqli_num_rows($result2) > 0) {
                            // Mostrar los datos en una tabla
                            echo "<table>";
                            echo "<tr><th>ID</th><th>Nombre</th><th>Raza</th><th>Tamaño</th><th>Sexo</th><th>Padecimiento</th></tr>";
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                echo "<tr><td>" . $row2['id'] . "</td><td>" . $row2['nombre'] . "</td><td>" . $row2['raza'] . "</td><td>" . $row2['tamaño'] . "</td><td>" . $row2['sexo'] . "</td><td>" . $row2['padecimiento'] . "</td></tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "No se encontraron animales relacionados con este usuario.";
                        }
                    } else {
                        echo "No se encontró un usuario con este correo electrónico.";
                    }

                    // Cerrar la conexión
                    mysqli_close($conn);
                }
                ?>
            </div>
        </section><!-- End Our Projects Section -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="footer-legal text-center position-relative">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>VanShop</span></strong>. Todos los derechos reservados
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>