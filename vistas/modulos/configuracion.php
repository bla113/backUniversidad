<?php
$configuracion = ControladorConfiguracion::ctrMostrarConfiguracion();
//print_r($configuracion);

?>



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
      <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-3 text-uppercase"><span class="text-muted fw-light"><?php echo $_GET["ruta"] ?>/</span> Universidad</h4>


          <?php
          foreach ($configuracion as $key => $value) {

          ?>

            <!-- Basic Layout -->
            <div class="row">
              <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Configuración de la Universidad</h5>
                    <small class="text-muted float-end">(*)Todos los campos son requeridos</small>
                  </div>
                  <div class="card-body">


                    <div class="d-flex flex-wrap" id="icons-container">

                      <div class="card icon-card cursor-pointer text-center mb-4 mx-2 bg-info ">
                        <div class="card-body">
                          <i class="bx bxs-key mb-2"></i>
                          <p class="icon-name text-capitalize text-truncate mb-0 text-dark">Licencia Activa</p>
                        </div>
                      </div>


                      <div class="card icon-card cursor-pointer text-center mb-4 mx-2 bg-success">
                        <div class="card-body">
                          <i class="bx bxs-data mb-2"></i>
                          <p class="icon-name text-capitalize text-truncate mb-0 text-dark">Backup Activo</p>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Ingrese las Credenciales</h5>
                    <small class="text-muted float-end">(*)Todos los Campos son Requeridos</small>
                  </div>
                  <div class="card-body">
                    <form action="" method="POST">
                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Nombre Comercial</label>
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                          <input type="text" class="form-control" name="nuevoNombre" id="basic-icon-default-fullname" placeholder="Nombre de la Universidad" aria-label="Universidad de Exelencia" aria-describedby="basic-icon-default-fullname2" value="<?php echo $value['nombre_empresa'] ?>" />
                        </div>
                      </div>

                      <?php
                      //$respuesta = ControladorConfiguracion::ctrGuardarConfiguracion();
                      //print_r($respuesta);
                      ?>
                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Cedula Jurídica</label>
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                          <input type="text" name="nuevoCedula" id="basic-icon-default-company" class="form-control" placeholder="3-101-896532" aria-label="3-101-896532" aria-describedby="basic-icon-default-company2" value="<?php echo $value['cedula'] ?>" />
                        </div>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-email">Correo Electrónico</label>
                        <div class="input-group input-group-merge">
                          <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                          <input type="email" name="nuevoCorreo" id="basic-icon-default-email" class="form-control" placeholder="correo@correo.com" aria-label="correo@correo.com" aria-describedby="basic-icon-default-email2" value="<?php echo $value['correo'] ?>" />

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

      <?php } ?>
      <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>


  </div>

  <!-- Small Modal -->
  <div class="modal fade" id="EditarEmpresa" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!--CUERPO DEL MODAL -->

          <form action="" method="POST">
            <div class="mb-3">
              <label class="form-label" for="basic-icon-default-fullname">Nombre Comercial</label>
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                <input type="text" class="form-control" name="nuevoNombre" id="basic-icon-default-fullname" placeholder="Nombre de la Universidad" aria-label="Universidad de Exelencia" aria-describedby="basic-icon-default-fullname2" value="<?php echo $value['nombre_empresa'] ?>" />
              </div>
            </div>

            <?php
            //$respuesta = ControladorConfiguracion::ctrGuardarConfiguracion();
            //print_r($respuesta);
            ?>
            <div class="mb-3">
              <label class="form-label" for="basic-icon-default-company">Cedula Jurídica</label>
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                <input type="text" name="nuevoCedula" id="basic-icon-default-company" class="form-control" placeholder="3-101-896532" aria-label="3-101-896532" aria-describedby="basic-icon-default-company2" value="<?php echo $value['cedula'] ?>" />
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-icon-default-email">Correo Electrónico</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                <input type="email" name="nuevoCorreo" id="basic-icon-default-email" class="form-control" placeholder="correo@correo.com" aria-label="correo@correo.com" aria-describedby="basic-icon-default-email2" value="<?php echo $value['correo'] ?>" />

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

            <?php
            // $Editaconfiguracion = new ControladorConfiguracion();
            //$Editaconfiguracion->ctrGuardarConfiguracion();

            ?>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Cerrar
          </button>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
      </div>
    </div>
  </div>

  </form>

</div>

<?php require('footer.php'); ?>