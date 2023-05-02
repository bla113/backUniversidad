<?php
session_start();


?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Admin Ucem2023</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="vistas/assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="vistas/assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="vistas/assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="vistas/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="vistas/assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="vistas/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="vistas/assets/vendor/libs/apex-charts/apex-charts.css" />

<!-- Data Table -->
<link href="vistas/dist/DataTables/datatables.min.css">


<script type="text/javascript" src="vistas/js/jquery.min.js"></script>
  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="vistas/assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="vistas/assets/js/config.js"></script>


 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
  <!-- SweetAlert 2 -->
<script src="vistas/sweetalert2/sweetalert2.all.js"></script>
<!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
</head>

<body>

  <?php

if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

  if (isset($_GET["ruta"])) {

    include('modulos/menu.php');

          if ($_GET["ruta"] == "inicio" ||
            $_GET["ruta"] == "usuarios" ||
            $_GET["ruta"] == "materias" ||
            $_GET["ruta"] == "editar-materia" ||
            $_GET["ruta"] == "login" ||
            $_GET["ruta"] == "configuracion" ||
            $_GET["ruta"] == "matriculas" ||
            $_GET["ruta"] == "carrera" ||
            $_GET["ruta"] == "aulas" ||
            $_GET["ruta"] == "editar-aula" ||
            $_GET["ruta"] == "horarios" ||
            $_GET["ruta"] == "editar-horario" ||
            $_GET["ruta"] == "profesores" ||
            $_GET["ruta"] == "crear-profesor" ||
            $_GET["ruta"] == "editar-carrera" ||
            $_GET["ruta"] == "ofertas" ||
            $_GET["ruta"] == "crear-vehiculo" ||
            $_GET["ruta"] == "mantenimiento" ||
            $_GET["ruta"] == "crear-mantenimiento" ||
            $_GET["ruta"] == "editar-usuario" ||
            $_GET["ruta"] == "crear-estudiante-nacional" ||
            $_GET["ruta"] == "estudiante" ||
            $_GET["ruta"] == "facturas" ||
            $_GET["ruta"] == "detalle-factura" ||
            $_GET["ruta"] == "asignar-carrera" ||
            $_GET["ruta"] == "salir"
          ) {

            include "modulos/" . $_GET["ruta"] . ".php";

          }
           else {

            include "modulos/404.php";
          }
        } else {

    
  }




}else{

  include "modulos/login.php";
}


  ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="vistas/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="vistas/assets/vendor/libs/popper/popper.js"></script>
  <script src="vistas/assets/vendor/js/bootstrap.js"></script>
  <script src="vistas/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="vistas/assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="vistas/assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="vistas/assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="vistas/assets/js/dashboards-analytics.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- DAta Table JS -->
  <script src="vistas/dist/DataTables/datatables.min.js"></script>

  <script src="vistas/js/plantilla.js"></script>
  <script src="vistas/js/usuarios.js"></script>
  <script src="vistas/js/distribucion-cr.js"></script>
  <script src="vistas/js/formulario.js"></script>
  <script src="vistas/js/estudiante.js"></script>
  <script src="vistas/js/confirmacion.js"></script>

  
</body>

</html>