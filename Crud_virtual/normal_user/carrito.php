<?php
// Obtener el ID del usuario de la sesión
session_start();

$correo = $_SESSION['usuario'];

  // Consultar el ID del usuario utilizando el correo electrónico
  $idUsuario = 0;

  require('fpdf/fpdf.php');

  class PDF extends FPDF {
      // Encabezado del documento
      function Header() {
          // Logo o título
          $this->SetFont('Arial', 'B', 14);
          $this->Cell(0, 10, 'Reporte de Productos', 0, 1, 'C');
          $this->Ln(10);
      }
  
      // Contenido del documento
      function Content($data) {
          // Encabezados de columna
          $this->SetFont('Arial', 'B', 12);
          $this->Cell(30, 10, 'ID', 1, 0, 'C');
          $this->Cell(60, 10, 'Nombre', 1, 0, 'C');
          $this->Cell(40, 10, 'Precio', 1, 0, 'C');
          $this->Ln();
  
          // Datos de los productos
          $this->SetFont('Arial', '', 12);
          foreach ($data as $row) {
              $this->Cell(30, 10, $row['id'], 1, 0, 'C');
              $this->Cell(60, 10, $row['nombre'], 1, 0, 'C');
              $this->Cell(40, 10, $row['precio'], 1, 0, 'C');
              $this->Ln();
          }
      }
  }
  
  // Establecer conexión con la base de datos
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "vanshop";
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
      die("Error de conexión: " . $conn->connect_error);
  }
  
  // Obtener el ID del usuario o establecerlo como necesario
  $idUsuario = 1;
  
  // Obtener los productos del carrito del usuario
  $sql = "SELECT id_producto FROM carrito WHERE id_usuario = $idUsuario";
  $result = $conn->query($sql);
  
  $productIds = array();
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $productIds[] = $row['id_producto'];
      }
  }
  
  // Obtener los datos de los productos correspondientes en la tabla de productos
  $data = array();
  if (!empty($productIds)) {
      $productIdsStr = implode(',', $productIds);
      $sql = "SELECT * FROM productos WHERE id IN ($productIdsStr)";
      $result = $conn->query($sql);
  
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $data[] = $row;
          }
      }
  }
  
  $conn->close();
  
  // Crear una nueva instancia de la clase PDF
  $pdf = new PDF();
  
  // Crear una página en blanco
  $pdf->AddPage();
  
  // Generar el encabezado del documento
  $pdf->Header();
  
  // Generar el contenido del documento
  $pdf->Content($data);
  
// Salida del PDF
$pdf->Output($correo.'.pdf', 'D');
