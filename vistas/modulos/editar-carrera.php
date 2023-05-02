<?php

if (isset($_POST['btnEditCarrera'])){
    $Item = "id";
    $valor = $_POST['btnEditCarrera'];
    $carreras = ControladorCarrera::ctrMostrarCarreras($Item, $valor);

    //print_r($carreras);



} else {
    $Item = "id";
    $valor = 1;

    $carreras = ControladorCarrera::ctrMostrarCarreras($Item, $valor);
    $respuestas=ControladorCarrera::ctrEditarCarrera();
    print_r($respuestas);
   /* $respuesta = ControladorUsuarios::ctrEditarUsuario();
    print_r($respuesta);*/

    //echo '<script>window.location = "carrera";</script>';
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

                                <h5 class="mb-0">Editar Carrera </h5>

                                <small class="text-muted float-end">Editar Carrera</small>

                            </div>

                            <div class="card-body">

                                <?php
                                foreach ($carreras as $key => $value) {



                                ?>

                                    <form action="" method="post">

                                        <div class="mb-3">

                                            <label class="form-label">Carrera</label>

                                            <input type="text" name="editarCarrera" class="form-control" value="<?php  echo  $value['carrera'] ?>" />

                                        </div>

                                        


                                       

                                        <div class="mb-3">

                                            <select class="form-control" name="estadoCarrera" id="estadoCarrera" required>

                                                <?php 
                                                if ($value['estado'] == 1) {
                                                    $estado = "Activado";
                                                } else {
                                                    $estado = "Desactivado";
                                                } ?>
                                                <option value="<?php echo $value['estado'] ?>"> <?php echo $estado?> </option>
                                                <option value="1"> Activo</option>
                                                <option value="0"> Desactivado</option>


                                            </select>


                                        </div>




                                        <input type="hidden" value=<?php echo  $valor ?> name="IdCarrera">

                                        <button type="submit" name="btnEditarCarrera" class="btn btn-primary">Guardar Cambios</button>



                                        <?php

                                        $Editar = new ControladorCarrera();
                                        $Editar->ctrEditarCarrera();


                                        ?>

                                    </form>

                            </div>

                        </div>

                    </div>

                <?php  } ?>





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