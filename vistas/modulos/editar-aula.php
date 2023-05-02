<?php

if (isset($_POST['btnEditAula'])){
    $Item = "id";
    $valor = $_POST['btnEditAula'];
    $aulas = ControladorAula::ctrMostrarAulas($Item, $valor);

    //print_r($aulas);



} else {
    $Item = "id";
    $valor = 1;

   $aulas = ControladorAula::ctrMostrarAulas($Item, $valor);
   // $respuestas=ControladorCarrera::ctrEditarCarrera();
   // print_r($respuestas);
  // $respuesta = ControladorAula::ctrEditarAula();
   // print_r($respuesta);

    echo '<script>window.location = "aulas";</script>';
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

                                <h5 class="mb-0">Editar Aula </h5>

                                <small class="text-muted float-end">Editar Aula</small>

                            </div>

                            <div class="card-body">

                                <?php
                                foreach ($aulas as $key => $value) {



                                ?>

                                    <form action="" method="post">

                                        <div class="mb-3">

                                            <label class="form-label">Aula</label>

                                            <input type="text" name="editarAula" class="form-control" value="<?php  echo  $value['aula'] ?>" />

                                        </div>

                                        


                                       

                                        <div class="mb-3">

                                            <select class="form-control" name="estadoAula" id="estadoAula" required>

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




                                        <input type="hidden" value=<?php echo  $valor ?> name="IdAula">

                                        <button type="submit" name="btneditaAula" class="btn btn-primary">Guardar Cambios</button>



                                        <?php

                                        $Editar = new ControladorAula();
                                        $Editar->ctrEditarAula();


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