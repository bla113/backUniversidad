<?php

if (isset($_POST['btnAsignarCarrera'])) {
    $Item = "id";
    $valor = $_POST['btnAsignarCarrera'];
    $estudiante = ControladorEstudiante::ctrMostrarEstudiante($Item, $valor);
    $ItemC = null;
    $valorC = null;
    $carreras = ControladorCarrera::ctrMostrarCarreras($ItemC, $valorC);
    // print_r($carreras);
    // print_r($estudiante);
} else {
   // $resp = ControladorEstudiante::ctrAsignarMatriasdeCarrera();
   // print_r($resp);
    /* $Item = "id";
    $valor = 1;

    $carreras = ControladorMateria::ctrMostrarMateria($Item, $valor);
   // $respuestas = ControladorCarrera::ctrEditarCarrera();
   // print_r($respuestas);
    /* $respuesta = ControladorUsuarios::ctrEditarUsuario();
    print_r($respuesta);*/

     echo '<script>window.location = "estudiante";</script>';
}

?>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">

    <div class="layout-container">


        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <?php require('cabezote.php');


            ?>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-sm flex-grow-1 container-p-y">

                    <h4 class="fw-bold py-3 mb-3 text-uppercase"><span class="text-muted fw-light"><?php echo $_GET["ruta"] ?>/</span> Administrar</h4>
                    <!-- Basic Layout -->



                    <div class="col-6">

                        <div class="card mb-4">

                            <div class="card-header d-flex justify-content-between align-items-center">

                                <h5 class="mb-0">Asignar Carrera </h5>

                                <small class="text-muted float-end">Asignar Carrera</small>
                                <?php $resp = ControladorEstudiante::ctrAsignarMatriasdeCarrera();
                              //  print_r($resp); ?>
                            </div>


                            <div class="card-body">

                                <form action="" method="post">

                                    <div class="mb-3">

                                        <select class="form-control" name="IdCarrera" id="IdCarrera" required>
                                            <?php foreach ($carreras as $key => $valueC) { ?>

                                                <option value="<?php echo $valueC['id'] ?>"> <?php echo $valueC['carrera'] ?> </option>

                                            <?php } ?>
                                        </select>

                                    </div>

                                    <div class="mb-3">



                                        <?php foreach ($estudiante as $key => $value) { ?>
                                            <input type="text" value="<?php echo $value['id'] ?>" name="IdEstudiante">
                                        <?php } ?>
                                        <button type="submit" name="btnAsiganarCarrera" class="btn btn-primary">Guardar Cambios</button>

                                    </div>


                                    <?php





                                    ?>

                                </form>

                            </div>
                        </div>

                    </div>

                </div>


            </div>
            <!-- / Content -->


            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

</div>

</div>










<?php require('footer.php'); ?>