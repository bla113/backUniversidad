<script>
  function confirmacion() {
    var respuesta = confirm("¿Realmente desea borrar el registro?");
    if (respuesta == true) {
      return true;
    } else {
      return false;
    }
  }
</script>

<?php



?>



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
                  <h5 class="mb-0">Administrar Usuarios</h5>
                  <small class="text-muted float-end">Actualizacion en timepo real de todas los usuarios</small>
                </div>
                <div class="card-body">


                  <div class="d-flex flex-wrap" id="icons-container">
                    <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
                      <div class="card-body">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarUsuario">Agregar Usuario
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
                  <h5 class="mb-0">Todas los usuarios</h5>
                  <small class="text-muted float-end">Estado:Actualizado <i class="bx bx-upload"></i></small>
                </div>
                <div class="card-body">
                  <!-- Bootstrap Dark Table -->
                  <div class="card">
                    <h5 class="card-header">Usuarios</h5>
                    <div class="table-responsive text-nowrap">
                      <table class="table table-bordered table-striped dt-responsive tablas ">

                        <thead>

                          <tr>

                            <th style="width:10px">#</th>

                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Perfil</th>
                            <th>Estado</th>
                            <th>Acciones</th>

                          </tr>

                        </thead>

                        <tbody>


                          <?php

                          $item = null;

                          $valor = null;

                          $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                          //print_r($usuarios);
                          ?>
                          <?php foreach ($usuarios as $key => $value) { ?>

                            <tr class="table-active">

                              <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong><?php echo $value['id'] ?></strong></td>
                              
                              <td> <?php echo $value['usuario'] ?></td>
                            
                              <td> <?php echo $value['correo'] ?></td>
                             
                              <td><span class="badge bg-label-success me-1"><?php 
                              if( $value['tipo_usuario']==1){
                                echo 'Administrador';
                              }if( $value['tipo_usuario']==2){
                                echo 'Estudiante';
                              }?></span></td>

                              <td><span class="badge bg-label-danger me-1">
                              <?php 
                              if( $value['estado']==1){
                                echo 'Activo';
                              }if( $value['estado']==2){
                                echo 'Descativado';
                              }?></span></td>
                              <td>
                               
                              <div class="dropdown">

                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">

                                    <i class="bx bx-dots-vertical-rounded"></i>

                                  </button>

                                  <div class="dropdown-menu">

                                  <form action="editar-usuario" method="post">

                                  <button class="dropdown-item" name="btnEditUser" value="<?php echo $value['id'] ?>"><i class="bx bx-pencil me-1"></i> Editar</button>
                                 
                                </form>
                                    <form action="" method="post">
                                   
                                      <input type="hidden" name="idUsuario" value="<?php echo $value['id'] ?>">

                                      <button class="dropdown-item" type="submit" onclick="return confirmacion()"><i class="bx bx-trash me-1"></i> Borrar</abutton>
                                       
                                       <?php
                                        $eliminar = new ControladorUsuarios();

                                        $eliminar->ctrBorrarUsuario();

                                        ?>

                                    </form>

                                  </div>

                                </div>

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





<!-- Modal Crear Usuarios -->
<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="modalCenterTitle">Agregar Usuario</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>


      <form action="" method="POST">

        <div class="modal-body">

          <div class="row">

            <div class="col mb-3">

              <label for="nameWithTitle" class="form-label">Seleccione Perfil</label>


              <select class="form-control" name="perfilUsuario" id="perfilUsuario" required>

                <option value="">--Seleccione un Perfil---</option>

                <?php

                $tipoUsuario = ControladorUsuarios::MostrarPerfil();

                foreach ($tipoUsuario as $key => $value) {

                  echo ' <option value="' . $value['id'] . '">' . $value['tipo_usuario'] . '</option>';
                }

                ?>


              </select>

            </div>

          </div>

          <div class="row g-2">

            <div class="col mb-0">

              <label for="nuevoUsuario" class="form-label">Ingrese el Usuario</label>

              <input type="text"  name="nuevoUsuario" class="form-control" required />

            </div>

            <div class="col mb-0">

              <label for="dobWithTitle" class="form-label">Ingrese Correo Electrónico</label>

              <input type="email"  name="nuevoCorreo" class="form-control" placeholder="nombre@dominio.com" required />

            </div>

          </div>

          <div class="row g-2">

            <div class="col mb-0">

              <label class="form-label">Contraseña </label>

              <input type="password" name="nuevoPassword" id="nuevoPassword" class="form-control">

            </div>

           

          </div>

        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">

            Cerrar
          </button>

          <button type="submit" name="btnGuardarUsuario" class="btn btn-primary">Crear Usuario</button>

        </div>
        <?php
        $usuario = new ControladorUsuarios();
        $usuario->ctrCrearUsuario();

        ?>

      </form>

    </div>

  </div>

</div>





<?php require('footer.php'); ?>