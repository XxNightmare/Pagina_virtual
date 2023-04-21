<?php
// Iniciamos la sesión
session_start();

// Verificamos si la sesión está iniciada y si el usuario es administrador
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
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
                <h1>VETERIOC<span>.</span></h1>
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                <li><a href="agregar_animal.php">Agregar animal</a></li>
                    <li><a href="buscar_animales.php" class="active">Buscar animales</a></li>
                    <li><a href="eliminar_animal.php">Eliminar animales</a></li>
                    <li><a href="../php/cerrar_sesion.php">Cerrar Sesion</a></li>
                </ul>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">
        <div style="min-height: 1vh; padding: 50px 0;" id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-item active" style="background-image: url(https://images.unsplash.com/photo-1488015795646-7e22a773d72a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80)"></div>
            <div class="carousel-item" style="background-image: url(https://images.unsplash.com/photo-1607931042288-0c82960d4afc?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80)"></div>
            <div class="carousel-item" style="background-image: url(https://images.unsplash.com/photo-1605152914052-910ae67ca55d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80)"></div>
            <div class="carousel-item" style="background-image: url(https://images.unsplash.com/photo-1494870363241-b5225be3dada?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80)"></div>
            <div class="carousel-item" style="background-image: url(https://plus.unsplash.com/premium_photo-1663012999448-7f5ec5324f4e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80)"></div>
        </div>
    </section><!-- End Hero Section -->

    <main id="main">
        <!-- ======= Constructions Section ======= -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Raza</th>
                    <th scope="col">Tamaño</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Padecimiento</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conexión a la base de datos
                $conn = mysqli_connect('localhost', 'root', '', 'veterinaria');
                if (!$conn) {
                    die('Error de conexión: ' . mysqli_connect_error());
                }

                // Consulta para obtener los datos de la tabla de animales
                $query = "SELECT * FROM animales";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    // Llenar la tabla con los datos de la consulta
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $count . "</td>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['raza'] . "</td>";
                        echo "<td>" . $row['tamano'] . "</td>";
                        echo "<td>" . $row['sexo'] . "</td>";
                        echo "<td>" . $row['padecimiento'] . "</td>";
                        echo "</tr>";
                        $count++;
                    }
                } else {
                    echo "<tr><td colspan='6'>No se encontraron registros en la tabla de animales.</td></tr>";
                }

                // Cerrar la conexión
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="footer-legal text-center position-relative">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>VETERIOC</span></strong>. Todos los derechos reservados
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