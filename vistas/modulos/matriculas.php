<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->





        <!-- / Menu -->

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
                                    <h5 class="mb-0">Administrar Mebresías</h5>
                                    <small class="text-muted float-end">GYMPro</small>
                                </div>
                                <div class="card-body">


                                    <div class="d-flex flex-wrap" id="icons-container">
                                        <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
                                            <div class="card-body">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalAsignarMebresia">Asignar Membresía
                                                </button>
                                            </div>
                                        </div>

                                        <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
                                            <div class="card-body">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarMebresia">Agregar Mebresia
                                                </button>
                                            </div>
                                        </div>


                                        <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
                                            <div class="card-body">
                                                <a href="inicio" class="btn btn-success">Regresar<i class=" bx bx-repeat"></i></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl">
                            <div class="card mb-8">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Todas las Mebresias</h5>
                                    <small class="text-muted float-end">Estado:Actualizado <i class="bx bx-upload"></i></small>
                                </div>
                                <div class="card-body">
                                    <!-- Bootstrap Dark Table -->
                                    <div class="card">
                                        <h5 class="card-header">Membresías</h5>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-bordered table-striped dt-responsive tablas">

                                                <thead>

                                                    <tr>

                                                        <th style="width:10px">#</th>
                                                        <th style="width:50px">Codigo</th>
                                                        <th>Descripción</th>
                                                        <th>Precio</th>
                                                        <th>Foto</th>
                                                        <th>Estado</th>
                                                        <th>Fecha Creación</th>
                                                        <th>Acciones</th>

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <tr>
                                                        <td>1</td> 
                                                        <td>PRE123467889</td>
                                                        <td>Mebresia Estandard</td>
                                                        <td>50000</td>
                                                        <td><img src="vistas/assets/img/avatars/1.png" class="img-thumbnail" class="img-thumbnail" width="40px"></td>
                                                        <td><button class="btn btn-success btn-xs">Activado</button></td>
                                                        <td>2017-12-11 12:05:32</td>
                                                    
                                                        <td>

                                                            <div class="dropdown">
                                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="inicio"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                                                </div>
                                                            </div>

                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>PRE123467889</td>
                                                        <td>Mebresia Estandard</td>
                                                        <td>50000</td>
                                                        <td><img src="vistas/assets/img/avatars/1.png" class="img-thumbnail" width="40px"></td>
                                                        <td><button class="btn btn-success btn-xs">Activado</button></td>
                                                        <td>2017-12-11 12:05:32</td>
                                                    
                                                        <td>

                                                            <div class="dropdown">
                                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="inicio"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                                                </div>
                                                            </div>

                                                        </td>

                                                    </tr>

                                                   

                                                  
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
<div class="modal fade" id="modalAgregarMebresia" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Agregar Membresia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class="modal-body">
                    <div class="row">
                    <div class="col mb-3">
                            <label for="nameWithTitle" class="form-label">Código</label>

                            <input type="text" id="CodigoMembresia" name="CodigoMembresia" class="form-control" placeholder="COD123465798" />
                        </div>
                        <div class="col mb-3">
                            <label for="nameWithTitle" class="form-label">Descripción</label>

                            <input type="text" id="Membresia" name="DscripcionMebresia" class="form-control" placeholder="Membresia Gold" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailWithTitle" class="form-label">Precio</label>
                            <input type="text" id="PrecioMebresia" name="PrecioMebresia" class="form-control" placeholder="<?php echo Simbolo_Moneda ?> 30,100" />
                        </div>
                        <div class="col mb-0">
                            <label for="dobWithTitle" class="form-label">Foto</label>
                            <input type="file" id="fotoMebremesia" name="fotoMebremesia" class="form-control" placeholder="Fotografia" />
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Guardar Membresía</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Modal Asignar Membresias -->
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

<?php require('footer.php'); ?>