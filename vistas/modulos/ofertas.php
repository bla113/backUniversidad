<!-- Layout wrapper -->

<?php
$item = null;
$valor = null;
$ofertas = ControladorOferta::ctrMostrarOfertas($item, $valor);
//$respuesta= json_decode($estudiantes);

//print_r($ofertas);
$Configuracio=ControladorConfiguracion::ctrMostrarConfiguracion();



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
                        <div class="col-xl">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Administrar Aula</h5>
                                    <small class="text-muted float-end">UCEM</small>

                                </div>
                                <div class="card-body">


                                    <div class="d-flex flex-wrap" id="icons-container">

                                        <?php
                                        /*$item=null;
                                        $valor=null;
                                        //$prueba = ModeloAula::mdlCrearAula($item,$valor);
                                        $prueba = ModeloAula::prueba();

                                        print_r($prueba);

                                        // echo 'Hola';  */
                                        ?>
                                        <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
                                            <div class="card-body">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#carreraModal">Agregar Oferta
                                                </button>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl">
                            <div class="card mb-8">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Todos las Ofertas</h5>
                                    <small class="text-muted float-end">Estado:Actualizado <i class="bx bx-upload"></i></small>
                                </div>
                                <div class="card-body">
                                    <!-- Bootstrap Dark Table -->
                                    <div class="card">
                                        <h5 class="card-header">Aulas</h5>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-bordered table-striped dt-responsive tablas">

                                                <thead>
                                                    <tr>
                                                        <th style="width:10px">Codigo</th>
                                                        <th style="width:50px">MateriA</th>
                                                        <th>Créditos</th>
                                                        <th>Horario</th>
                                                        <th>Aula</th>
                                                        <th>Requisito</th>
                                                        <th>Dia</th>
                                                        <th>Costo</th>
                                                        <th>Estado</th>
                                                        <th>Acciones</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    foreach ($ofertas as $key => $value) {
                                                    ?>
                                                        <tr>

                                                            <td><?php echo $value['CODIGOMATERIA'] ?></td>
                                                            <td><?php echo $value['MATERIA'] ?></td>
                                                            <td><?php echo $value['CREDITOS'] ?></td>
                                                            <td><?php echo $value['HORARIO'] ?></td>
                                                            <td><?php echo $value['AULA'] ?></td>
                                                            <td><?php
                                                                if (empty($value['REQUISITOS']) || $value['REQUISITOS'] == 'null') {

                                                                    echo '<button class="btn btn-success btn-xs">PERMITIDO EN U</button>';
                                                                } else {

                                                                    $array = json_decode($value['REQUISITOS'], true);

                                                                    foreach ($array as $requisitos => $requisito) {

                                                                        echo '<button class="btn btn-secondary btn-xs">' . $requisito . '</button>';
                                                                    }
                                                                }

                                                                ?></td>
                                                            <td><?php echo $value['DIA'] ?></td>
                                                            <td><?php 

                                                            foreach ($Configuracio as $Ckey => $Cvalue) {
                                                                echo number_format($value['CREDITOS'] * $Cvalue['costo_creditos'] , 2);
                                                            }
                                                            ?></td>
                                                            <td><?php echo $value['ESTADO'] ?></td>
                                                            <td>
                                                                <form action="" method="post">

                                                                    <button name="btnEditarOferta" type="submit" value="<?php echo $value['IDOFERTA'] ?>" class="btn btn-primary btn-xs bx bx-edit"></button>

                                                                </form>

                                                                <form action="" method="post">

                                                                    <button name="btnBorrarCarrera" type="submit" onclick="return confirmacion()" value="<?php echo $value['IDOFERTA'] ?>" class="btn btn-danger btn-xs bx bx-trash"></button>

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

        <?php
        $prueba = ModeloAula::prueba();
        print_r($prueba);

        // echo 'Hola';        
        ?>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

</div>




<!-- Small Modal -->
<div class="modal fade" id="carreraModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-sm" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel2">Agregar Aula</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <form action="" method="post">

                <div class="modal-body">

                    <div class="row">

                        <div class="col mb-3">

                            <label for="nameSmall" class="form-label">Ingrese la Horario</label>

                            <input type="text" name="nuevoAula" id="nuevoAula" class="form-control" placeholder="Horario" />

                        </div>

                    </div>

                    <div class="row g-2">

                        <select name="estadoAula" id="estadoAula" class="form form-control">

                            <option class="form form-control" value="1">Activo</option>

                            <option class="form form-control" value="0">Desactivado</option>

                        </select>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>


                    <button type="submit" class="btn btn-primary">Guardar</button>

                </div>

        </div>

    </div>
    <?php
    $NuevaAula = new ControladorAula();
    $NuevaAula->ctrCtrcrearAula();
    ?>
    </form>
</div>


<?php




?>




<?php require('footer.php'); ?>