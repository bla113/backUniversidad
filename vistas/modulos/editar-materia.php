<?php

if (isset($_POST['btnEditMateria'])) {
    $Item = "id";
    $valor = $_POST['btnEditMateria'];
    $materias = ControladorMateria::ctrMostrarMateria($Item, $valor);

    //print_r($materias);



} else {
    $Item = "id";
    $valor = 1;

    $carreras = ControladorMateria::ctrMostrarMateria($Item, $valor);
   // $respuestas = ControladorCarrera::ctrEditarCarrera();
   // print_r($respuestas);
    /* $respuesta = ControladorUsuarios::ctrEditarUsuario();
    print_r($respuesta);*/

    echo '<script>window.location = "materias";</script>';
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

                                <h5 class="mb-0">Editar Materia </h5>

                                <small class="text-muted float-end">Editar Materia</small>

                            </div>

                            <div class="card-body">

                                <?php
                                foreach ($materias as $key => $value) {



                                ?>

                                    <form action="" method="post">

                                        <div class="modal-body">

                                            <div class="row">

                                                <div class="col mb-3">

                                                    <label for="nameSmall" class="form-label">Ingrese la Materia</label>

                                                    <input type="text" value="<?php echo $value['materia'] ?>"  name="nuevaMateria" id="nuevaMateria" class="form-control" placeholder="Carrera" />

                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="col mb-3">

                                                    <label for="nameSmall" class="form-label">Ingrese Código</label>

                                                    <input type="text" value="<?php echo $value['codigo'] ?>" name="nuevoCodigo" id="editarCodigo" class="form-control" placeholder="Código" />

                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="col mb-3">

                                                    <label for="nameSmall" class="form-label">Ingrese Cantidad Creditos</label>

                                                    <input type="number" value="<?php echo $value['creditos'] ?>"  name="nuevoCredito" id="editarCredito" class="form-control" placeholder="Créditos" min="0" />

                                                </div>

                                            </div>

                                            <div class="row g-2">

                                                <select multiple name="nuevoRequisito[]" id="editarRequisito" class="form form-control">

                                                <option value="ADMITIDO EN U" class="form form-control">ADMITIDO EN U</option>
                                                <?php
                                                                if (empty($value['requisitos']) || $value['requisitos'] == 'null') {
                                                                    
                                                                  echo '<option class="form form-control"  value="0">PERMITIDO EN U</option>' ;

                                                                } else {

                                                                    $array = json_decode($value['requisitos'], true);

                                                                    foreach ($array as $requisitos => $requisito) {
                                                                        
                                                                        echo '<option  class="form form-control" value="'.$requisito.'" class="form form-control>'.$requisito.'</option>';
                                                                    }
                                                                }

                                                                foreach ($materias as $key => $value) {
                                                                    
                                                                     echo ' <option  class="form form-control" value="'.$value["codigo"].'" >'.$value["codigo"].'</option>'; 
                                        
                                        
                                                                    } 
                                                                   
                                                                ?>

                                                </select>

                                            </div>

                                        </div>

                                        <div class="modal-footer">

                                            <a href="materias" class="btn btn-outline-secondary">Regresar</a>


                                            <button type="submit" name="btnCrearMateria" class="btn btn-primary">Guardar</button>

                                        </div>

                            </div>

                        </div>
                        <?php
                                    // $NuevaCarrera = new ControladorCarrera();
                                    //$NuevaCarrera->ctrCtrcrearCarrera();
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