<!-- Layout wrapper -->

<?php
$item = null;
$valor = null;
$materias = ControladorMateria::ctrMostrarMateria($item, $valor);
$itemC = null;
$valorC = null;

$tabla = 'cuatrimestre';
$item = null;
$valor = null;

$cuatrimestre = ModeloCuatrimestre::mdlMostrotrarCuatrimestres($tabla, $item, $valor);
//print_r($cuatrimestre);



//$carreras= ControladorCarrera::ctrMostrarCarreras($itemC,$valorC);
//$respuesta= json_decode($estudiantes);




$respuesta = ControladorMateria::ctrCrearMateria();
print_r($respuesta);

?>
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">


        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <?php require('cabezote.php');
            require('config.php');


            ?>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-3 text-uppercase"><span class="text-muted fw-light"><?php echo $_GET["ruta"] ?>/</span> Administrar</h4>
                    <!-- Basic Layout -->
                    <div class="row">

                        <div class="">

                            <div class="card-header d-flex justify-content-between align-items-center">

                                <h5 class="mb-0">Administrar Materias</h5>

                                <small class="text-muted float-end">UCEM</small>


                            </div>

                            <div class="card-body">



                                <div class="d-flex flex-wrap" id="icons-container">


                                    <div class="card icon-card cursor-pointer text-center mb-4 mx-2">

                                        <div class="card-body">


                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#carreraModal">Agregar Materia </button>

                                        </div>

                                    </div>


                                </div>

                            </div>

                        </div>

                        <div class="col-xl">

                            <div class="card mb-4">

                                <div class="card-header d-flex justify-content-between align-items-center">

                                    <h5 class="mb-0">Todos los Matrias</h5>

                                    <small class="text-muted float-end">Estado:Actualizado <i class="bx bx-upload"></i></small>

                                </div>

                                <div class="card-body">

                                    <!-- Bootstrap Dark Table -->

                                    <div class="card">

                                        <h5 class="card-header">Materias</h5>

                                        <div class="table-responsive text-nowrap">

                                            <table class="table table-bordered table-striped dt-responsive tablas">


                                                <thead>

                                                    <tr>

                                                        <th style="width:10px">Código</th>

                                                        <th>Materia</th>

                                                        <th style="width:10px">Creditos</th>

                                                        <th style="width:40px">Requisitos</th>

                                                        <th style="width:10px">Acciones</th>

                                                    </tr>

                                                </thead>


                                                <tbody>


                                                    <?php

                                                    foreach ($materias as $key => $value) {

                                                    ?>
                                                        <tr>

                                                            <td><?php echo $value['codigo'] ?></td>
                                                            <td><?php echo $value['materia'] ?></td>
                                                            <td><?php echo $value['creditos'] ?> </td>
                                                            <td><?php
                                                                if (empty($value['requisitos']) || $value['requisitos'] == 'null') {

                                                                    echo '<button class="btn btn-success btn-xs">PERMITIDO EN U</button>';
                                                                } else {

                                                                    $array = json_decode($value['requisitos'], true);

                                                                    foreach ($array as $requisitos => $requisito) {

                                                                        echo '<button class="btn btn-secondary btn-xs">' . $requisito . '</button>';
                                                                    }
                                                                }

                                                                ?>


                                                            <td>
                                                                <form action="editar-materia" method="post">

                                                                    <button name="btnEditMateria" type="submit" value="<?php echo $value['id'] ?>" class="btn btn-primary btn-xs bx bx-edit"></button>

                                                                </form>

                                                                <form action="" method="post">

                                                                    <button name="btnDeleteMateria" type="submit" onclick="return confirmacion()" value="<?php echo $value['id'] ?>" class="btn btn-danger btn-xs bx bx-trash"></button>

                                                                    <?php
                                                                    //$elilinarCarrera = new ControladorCarrera();
                                                                    //$elilinarCarrera->ctrEliminarCarrera();

                                                                    ?>
                                                                </form>

                                                            </td>

                                                        </tr>
                                                    <?php } ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <!--/ Bootstrap Dark Table -->
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




<!-- Small Modal -->
<div class="modal fade" id="carreraModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-sm" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel2">Agregar Materia</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <form action="" method="post">

                <div class="modal-body">

                    <div class="row">

                        <div class="col mb-3">

                            <label for="nameSmall" class="form-label">Ingrese la Materia</label>

                            <input type="text" name="nuevaMateria" id="nuevaMateria" class="form-control" placeholder="Carrera" />

                        </div>

                    </div>
                    <div class="row">

                        <div class="col mb-3">

                            <label for="nameSmall" class="form-label">Ingrese Código</label>

                            <input type="text" name="nuevoCodigo" id="nuevoCodigo" class="form-control" placeholder="Código" />

                        </div>

                    </div>
                    <div class="row">

                        <div class="col mb-3">

                            <label for="nameSmall" class="form-label">Ingrese Cantidad Creditos</label>

                            <input type="number" name="nuevoCredito" id="nuevoCredito" class="form-control" placeholder="Créditos" min="0" />

                        </div>

                    </div>

                    <div class="row">

                        <div class="col mb-3">

                            <label for="nameSmall" class="form-label">Ingrese Cantidad Creditos</label>

                            <select  name="nuevoCuatrimestre" id="nuevoCuatrimestre" class="form form-control">
                           
                            <?php
                            foreach ($cuatrimestre as $ckey => $cvalue) {
                            ?>
                                <option class="form form-control" value="<?php echo $cvalue['id'] ?>"><?php echo $cvalue['cuatrimestre'] ?></option>


                            <?php } ?>
                        </select>

                        </div>

                    </div>

                    <div class="row g-2">

                        <select multiple name="nuevoRequisito[]" id="nuevoRequisito" class="form form-control">
                            <option value="ADMITIDO EN U" class="form form-control">ADMITIDO EN U</option>
                            <?php
                            foreach ($materias as $key => $value) {
                            ?>
                                <option class="form form-control" value="<?php echo $value['codigo'] ?>"><?php echo $value['materia'] ?></option>


                            <?php } ?>
                        </select>

                    </div>



                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>


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


<?php




?>




<?php require('footer.php'); ?>