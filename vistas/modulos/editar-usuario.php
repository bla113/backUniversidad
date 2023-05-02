<?php

if (isset($_POST['btnEditUser'])) {
    $Item = "id";
    $valor = $_POST['btnEditUser'];
    $ususarios = ControladorUsuarios::ctrMostrarUsuarios($Item, $valor);

    //print_r($ususarios);
} else {



    $respuesta = ControladorUsuarios::ctrEditarUsuario();
    print_r($respuesta);

    echo '<script>
        window.location = "usuarios";
         </script>';
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

                                <h5 class="mb-0">Editar Usuario </h5>

                                <small class="text-muted float-end">Editar usuario</small>

                            </div>

                            <div class="card-body">

                                <?php
                                foreach ($ususarios as $key => $value) {



                                ?>

                                    <form action="" method="post">

                                        <div class="mb-3">

                                            <label class="form-label">Usuario</label>

                                            <input type="text" name="ediarUsuario" class="form-control" value="<?php echo $value['usuario'] ?>" disabled />

                                        </div>

                                        <div class="mb-3">

                                            <label class="form-label" for="basic-default-company">Company</label>

                                            <input type="email" name="editarCorreo" class="form-control" value="<?php echo $value['correo'] ?>" />

                                        </div>
                                        <div class="mb-3">

                                            <label class="form-label" for="basic-default-company">Contraseña</label>

                                            <input type="password" name="editarPassword" class="form-control" />

                                        </div>

                                        <div class="mb-3">

                                            <label class="form-label" for="basic-default-email">Perfil de Usuario</label>

                                            <div class="input-group input-group-merge">

                                                <select class="form-control" name="editarPerfil" id="editarPerfil" required>
                                                    <?php
                                                    if ($value['tipo_usuario'] == 1) {
                                                        $tipoUsuario = "Administrador";
                                                    }
                                                    if ($value['tipo_usuario'] == 2) {
                                                        $tipoUsuario = "Estudiante";
                                                    }
                                                    if ($value['tipo_usuario'] == 3) {
                                                        $tipoUsuario = "Soporte";
                                                    }
                                                    if ($value['tipo_usuario'] > 4) {
                                                        $tipoUsuario = "Administrativo";
                                                    } ?>
                                                    <option value="<?php echo $value['tipo_usuario'] ?>"> <?php echo $tipoUsuario  ?> </option>

                                                    <?php

                                                    $tipoUsuario = ControladorUsuarios::MostrarPerfil();

                                                    foreach ($tipoUsuario as $key => $value1) {

                                                        echo ' <option value="' . $value1['id'] . '">' . $value1['tipo_usuario'] . '</option>';
                                                    }

                                                    ?>


                                                </select>

                                            </div>


                                        </div>

                                        <div class="mb-3">

                                            <select class="form-control" name="editarestado" id="editarestado" required>

                                                <?php
                                                if ($value['estado'] == 1) {
                                                    $estado = "Activado";
                                                } else {
                                                    $estado = "Desactivado";
                                                } ?>
                                                <option value="<?php echo $value['estado'] ?>"> <?php echo $estado  ?> </option>
                                                <option value="1"> Activo</option>
                                                <option value="2"> Desactivado</option>


                                            </select>


                                        </div>




                                        <input type="hidden" value=<?php echo  $valor ?> name="IdUsuario">

                                        <button type="submit" name="btnEditarUsuario" class="btn btn-primary">Guardar Cambios</button>



                                        <?php

                                        $Editar = new ControladorUsuarios();
                                        $Editar->ctrEditarUsuario();


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