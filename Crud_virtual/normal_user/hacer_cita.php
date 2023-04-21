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
                <h1>VETERIOC<span>.</span></h1>
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="nosotros.php">Nosotros</a></li>
                    <li><a href="hacer_cita.php" class="active">Hacer una cita</a></li>
                    <li><a href="consultar_cita.php">Consultar una cita</a></li>
                    <li><a href="../php/cerrar_sesion.php">Salir</a></li>
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
        <h1 style="text-align: center; text-transform: uppercase; padding: 1rem;">Hacer una cita</h1>
        <section style="padding: 35px 0 0 0;" id="constructions" class="constructions">
            <div class="container" data-aos="fade-up">
                <form action="../php/normal_user_act/add_animal.php" method="post">
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="nombre" name="nombre" class="form-control" />
                                <label class="form-label" for="nombre">Nombre</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="raza" name="raza" class="form-control" />
                                <label class="form-label" for="raza">Raza</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="tamano" name="tamano" class="form-control" />
                                <label class="form-label" for="tamano">Tamaño</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="sexo" name="sexo" class="form-control" />
                                <label class="form-label" for="sexo">Sexo</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="email" id="email" name="email" class="form-control" />
                        <label class="form-label" for="email">Email</label>
                    </div>


                    <!-- Message input -->
                    <div class="form-outline mb-4">
                        <textarea class="form-control" id="padecimiento" name="padecimiento" rows="4"></textarea>
                        <label class="form-label" for="padecimiento">Padecimiento</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Hacer cita</button>
                </form>
        </section><!-- End Our Projects Section -->

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