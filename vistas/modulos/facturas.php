<!-- Layout wrapper -->

<?php
$item = null;
$valor = null;
$facturas = ControladorFactura::ctrMostrarFactura($item, $valor);





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
                            <div class="card mb-8">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Todos las Facturas</h5>
                                    <small class="text-muted float-end">Estado:Actualizado <i class="bx bx-upload"></i></small>
                                </div>
                                <div class="card-body">
                                    <!-- Bootstrap Dark Table -->
                                    <div class="card ">
                                        <h5 class="card-header">Facturas</h5>
                                        <div class="col-sm">
                                            <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalAgregarEstudiante">Agregar Estudiante </button>

                                        </div>
                                        <hr>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-bordered table-striped dt-responsive tablas">

                                                <thead>

                                                    <tr>

                                                        <th style="width:10px">ID</th>
                                                        <th style="width:50px">Estudiante</th>
                                                        <th>Fecha</th>
                                                        <th>Vence</th>
                                                        <th>Metodo de Pago</th>
                                                        <th>Total</th>
                                                        <th>Saldo</th>
                                                        <th>Estado</th>
                                                        <th>Acciones</th>

                                                    </tr>

                                                </thead>

                                                <tbody>
                                                    <?php
                                                    foreach ($facturas as $key => $value) {


                                                    ?>
                                                        <tr>
                                                            <td><?php echo $value['IDFACTURA'] ?></td>
                                                            <td><?php echo $value['nombre_completo'] . $value['primer_apellido'] . $value['segundo_apellido'] ?></td>
                                                            <td><?php echo date("d-m-Y", strtotime($value['fecha'] ));
                                                              ?></td>
                                                            <td><?php echo $value['fecha_vencimiento'] ?></td>

                                                            <td><?php
                                                                if ($value['metodo_pago'] == 'Credito') {
                                                                    echo '<button class="btn btn-success btn-xs ">Credito</button>';
                                                                } else {
                                                                    echo '<button class="btn btn-primary btn-xs ">Contado</button>';
                                                                }
                                                                ?></td>
                                                            <td><?php echo $value['total'] ?></td>
                                                            <td><?php echo $value['saldo'] ?></td>
                                                            <td><button class="btn btn-success btn-xs">Activado</button></td>


                                                            <td>

                                                                <form action="detalle-factura" method="post">

                                                                    <button name="btnDetalleFactura" type="submit" value="<?php echo $value['IDFACTURA'] ?>" class="btn btn-success btn-xs bx bx-detail"></button>


                                                                    <button name="btnAsignarCarrera" type="submit" value="" class="btn btn-primary  btn-xs bx bx-edit"></button>

                                                                    <button name="btnBorrarCarrera" type="submit" value="" class="btn btn-danger btn-xs bx bx-trash"></button>

                                                                    <a name="" type="submit" value="" class="btn btn-warning btn-xs  bx bx-credit-card"></a>


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


<!-- Modal Agregar Membresias -->
<div class="modal fade" id="modalAgregarEstudiante" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Seleccional Tipo de Identificaion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card-body">


                    <div class="d-flex flex-wrap" id="icons-container">
                        <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
                            <div class="card-body">
                                <a href="crear-estudiante-nacional" class="btn btn-outline-success">Nacionales</a>
                            </div>
                        </div>

                        <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
                            <div class="card-body">
                                <a href="crear-estudante-extrajero" class="btn btn-success">Extranjeros</a>

                            </div>
                        </div>
                    </div>
                </div>



                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>

                </div>
            </div>
        </form>
    </div>
</div>


<!--  -->
<div class="modal fade" id="modalAsignarMebresia" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Asignar Membresia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameWithTitle" class="form-label">Seleccione Cliente</label>
                        <select class="form-control" name="Clientes" id="Clientes" require>
                            <option value="">Seleccione un cliente</option>
                            <option value="">Jose Bladimir Rojas Ruiz</option>
                        </select>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                        <label for="emailWithTitle" class="form-label">Seleccione Estado</label>
                        <select class="form-control" name="EstadoMembresia" id="EstadoMembresia" require>
                            <option value="">Estado</option>
                            <option value="1">Pendiente</option>
                            <option value="2">Activa</option>
                            <option value="3">Descativada</option>
                        </select>
                    </div>
                    <div class="col mb-0">
                        <label for="dobWithTitle" class="form-label">Fecha de Activación</label>
                        <input type="date" id="dobWithTitle" class="form-control" placeholder="DD / MM / YY" />
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                        <label for="emailWithTitle" class="form-label">Encargado</label>
                        <input type="text" disabled name="Encargado" id="Encargado" class="form-control" value="<?php echo $_SESSION['nombre_usuario'] ?>" />
                    </div>
                    <div class="col mb-0">
                        <label for="dobWithTitle" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control" placeholder="" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Cerrar
                </button>
                <button type="button" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>
<!--  -->

<?php require('footer.php'); ?>