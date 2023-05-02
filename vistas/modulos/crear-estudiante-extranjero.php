<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->





        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <?php require('cabezote.php'); ?>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper mb-4">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-3 text-uppercase"><span class="text-muted fw-light"><?php echo $_GET["ruta"] ?>/</span> Universidad</h4>



                    <!-- Basic Layout -->
                    <div class="row">

                        <div class=""></div>

                        <div class="sm">

                            <div class="card mb-4">

                                <div class="card-header d-flex justify-content-between align-items-center">

                                    <h5 class="mb-0">Ingrese las Credenciales</h5>

                                    <small class="text-muted float-end">(*)Todos los Campos son Requeridos</small>

                                </div>

                                <div class="card-body">

                                    <form action="" method="post">

                                        <div class="mb-3">

                                            <label class="form-label" for="basic-icon-default-fullname">Identificacion</label>

                                            <div class="input-group input-group-merge">

                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>

                                                <input type="text" class="form-control" name="buscarIdentificacion" placeholder="#-####-####" />

                                                <button class="btn btn-primary" name="BTNBUSCARCEDULA" type="submit"><i class="bx bx-search-alt"></i></button>

                                            </div>
                                            <?php

                                            $Identificiacion = new ControladorEstudiante();

                                            $Identificiacion->ctrBuscarEstudinate();

                                            ?>

                                        </div>


                                    </form>

                                    <?php if (isset($_POST['BTNBUSCARCEDULA'])) {

                                        $persona = ControladorEstudiante::ctrBuscarEstudinate();
                                        //print($persona);
                                    } else {
                                        $persona = array();
                                    }

                                    ?>
                                    <div class="mb-3">

                                        <label class="form-label" for="basic-icon-default-company">Tipo de Indentificacion</label>

                                        <div class="input-group input-group-merge">


                                            <select name="tipoIdentificacion" class="form-control" id="">

                                                <option value="Cedula Nacional">Cedula Naciona</option>

                                                <option value="Identificacion Extranjera">Identificacion Extranjera</option>

                                                <option value="Numero de Pasaporte">Numero de Pasaporte</option>

                                                <option value="DIMEX">DIMEX</option>

                                                <option value="Cuidadano Residente">Cuidadano Residente</option>

                                                <option value="Cuidadano Refugiado">Cuidadano Refugiado</option>

                                                <option value="OTROS">Cuidadano Refugiado</option>

                                        </div>

                                    </div>






                                    <?php
                                    foreach ($persona as $key => $value) {


                                    ?>


                                        <div class="mb-3">

                                            <label class="form-label" >Identificacion</label>

                                            <div class="input-group input-group-merge">

                                                <span " class="input-group-text"><i class="bx bx-user"></i></span>

                                                <input type="text" class="form-control" name="nuevaIdentificacion" />

                                            </div>

                                        </div>

                                        <div class="mb-3">

                                            <label class="form-label" for="basic-icon-default-company">Indetificación</label>

                                            <div class="input-group input-group-merge">

                                                <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>

                                                <input type="text" name="nuevoCedula" id="basic-icon-default-company" class="form-control" placeholder="3-101-896532" aria-label="3-101-896532" aria-describedby="basic-icon-default-company2" value="<?php echo $value['IDENTIFICACION'] ?>" />

                                            </div>

                                        </div>

                                        <div class="mb-3">

                                            <label class="form-label" for="basic-icon-default-email">Nombre Completo</label>

                                            <div class="input-group input-group-merge">

                                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>

                                                <input type="email" name="nuevoCorreo" id="basic-icon-default-email" class="form-control" placeholder="correo@correo.com" aria-label="correo@correo.com" aria-describedby="basic-icon-default-email2" value="<?php echo $value['NOMBRE_COMPLETO'] ?>" />


                                            </div>


                                        </div>


                                        <div class="mb-3">

                                            <label class="form-label" for="basic-icon-default-phone">Teléfono</label>

                                            <div class="input-group input-group-merge">

                                                <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>

                                                <input type="text" name="nuevoTelefono" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" value="<?php echo $value['telefono'] ?>" />

                                            </div>

                                        </div>

                                        <div class="mb-3">

                                            <label class="form-label" for="basic-icon-default-phone">Teléfono Celular</label>

                                            <div class="input-group input-group-merge">

                                                <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>

                                                <input type="text" name="nuevoCelular" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" value="<?php echo $value['celular'] ?>" />

                                            </div>

                                        </div>

                                        <div class="mb-3">

                                            <label class="form-label" for="basic-icon-default-phone">Provincia</label>

                                            <div class="input-group input-group-merge">

                                                <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-home"></i></span>


                                                <select id="slt-provincias" class="form-control phone-mask" name="nuevaProvincia">

                                                    <option value="" <?php echo $value['provincia'] ?>><?php echo $value['provincia'] ?></option>

                                                    <option value="">-- Seleccione una provincia --</option>

                                                </select>


                                            </div>

                                        </div>

                                        <div class="mb-3">

                                            <label class="form-label" for="basic-icon-default-phone">Cantón</label>

                                            <div class="input-group input-group-merge">

                                                <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-home"></i></span>


                                                <select id="slt-cantones" class="form-control phone-mask" name="nuevoCanton">

                                                    <option value="" <?php echo $value['canton'] ?>><?php echo $value['canton'] ?></option>

                                                    <option value="">-- Seleccione un cantón --</option>

                                                </select>

                                            </div>

                                        </div>

                                        <div class="mb-3">

                                            <label class="form-label" for="basic-icon-default-phone">Distrito</label>

                                            <div class="input-group input-group-merge">

                                                <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-home"></i></span>



                                                <select id="slt-distritos" class="form-control phone-mask" name="nuevoDistrito">

                                                    <option value="" <?php echo $value['distrito'] ?>><?php echo $value['distrito'] ?></option>

                                                    <option value="">-- Seleccione un distrito --</option>

                                                </select>

                                            </div>

                                        </div>



                                        <div class="mb-3">

                                            <label class="form-label" for="basic-icon-default-message">Otras Señas</label>

                                            <div class="input-group input-group-merge">

                                                <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-comment"></i></span>

                                                <textarea id="basic-icon-default-message" name="nuevaSenas" class="form-control" placeholder="<?php echo $value['otras_senas'] ?>" aria-describedby="basic-icon-default-message2"></textarea>

                                            </div>

                                        </div>


                                        <div class="mb-3">

                                            <label class="form-label" for="basic-icon-default-phone">Costo Créditos</label>

                                            <div class="input-group input-group-merge">


                                                <input type="number" class="form-control" name="costoCredito" id="basic-icon-default-fullname" placeholder="Costo Creditos" aria-label="Costo Creditos" value="<?php echo $value['costo_creditos'] ?>" aria-describedby="basic-icon-default-fullname2" />

                                            </div>

                                        </div>

                                        <div class="mb-3">

                                            <label class="form-label" for="basic-icon-default-phone">Tipo Moneda</label>

                                            <div class="input-group input-group-merge">

                                                <select class="form-control" name="moneda" id="">

                                                    <option value="<?php echo $value['moneda'] ?>"><?php echo $value['moneda'] ?></option>

                                                    <option value="Colon">Colón</option>

                                                    <option value="Dolar">Dolar Americano</option>

                                                </select>


                                            </div>

                                        </div>

                                        <div class="mb-3">

                                            <label class="form-label" for="basic-icon-default-phone">Simbolo Moneda</label>

                                            <div class="input-group input-group-merge">

                                                <select class="form-control" name="simboloMoneda" id="">

                                                    <option value="<?php echo $value['simbolo'] ?>"><?php echo $value['simbolo'] ?></option>

                                                    <option value="₡">₡</option>

                                                    <option value="$">$</option>

                                                </select>

                                            </div>

                                        </div>

                                        <button type="submit" name="btnGuardarU" class="btn btn-primary">Guardar</button>

                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EditarEmpresa">

                                            Actualizar

                                        </button>


                                        <?php

                                        $configurar = new ControladorConfiguracion();

                                        $configurar->ctrGuardarConfiguracion();

                                        ?>


                                        </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- / Content -->


            <?php

                                    } ?>
            <!-- Content wrapper -->

            </div>
            <!-- / Layout page -->

        </div>




    </div>


    </form>

</div>

<?php require('footer.php'); ?>