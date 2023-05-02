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
                       <h4 class="fw-bold py-3 mb-3 text-uppercase"><span class="text-muted fw-light"><?php echo $_GET["ruta"] ?>/</span> Universidad UCEM</h4>


                       <?php
                        $datos = ControladorProfesor::ctrCrearProfesor();
                       // print_r($datos);

                        echo $datos;

                        ?>
                       <!-- Basic Layout -->
                       <div class="row">

                           <div class=""></div>

                           <div class="sm">

                               <div class="card mb-4">

                                   <div class="card-header d-flex justify-content-between align-items-center">

                                       <h5 class="mb-0">Ingrese las Credenciales</h5>

                                       <small class="text-muted float-end">(*)Todos los Campos son Requeridos</small>

                                   </div>

                                   <form action="" method="post" enctype="multipart/form-data">

                                       <div class="card-body">

                                           <form action="" method="post">

                                               <div class="mb-3">

                                                   <label class="form-label" for="basic-icon-default-fullname">Identificación</label>

                                                   <div class="input-group input-group-merge">

                                                       <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>

                                                       <input type="text" class="form-control" name="buscarIdentificacion" placeholder="#-####-####" />

                                                       <button class="btn btn-primary" name="BTNBUSCARCEDULA" type="submit"><i class="bx bx-search-alt"></i></button>

                                                   </div>
                                                   <?php

                                                    $Identificiacion = new ControladorProfesor();

                                                    $Identificiacion->ctrBuscarProfesor();

                                                    ?>

                                               </div>


                                           </form>

                                           <?php if (isset($_POST['BTNBUSCARCEDULA'])) {

                                                $persona = ControladorProfesor::ctrBuscarProfesor();
                                                //print($persona);
                                               
                                            } else {
                                                $persona = array();
                                            }

                                            ?>


                                           <?php
                                            foreach ($persona as $key => $value) {


                                            ?>



                                               <div class="mb-3">

                                                   <label class="form-label" for="basic-icon-default-company">Indetificación</label>

                                                   <div class="input-group input-group-merge">

                                                       <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>

                                                       <input type="text" name="nuevaCedula" id="basic-icon-default-company" class="form-control" placeholder="3-101-896532" aria-label="3-101-896532" aria-describedby="basic-icon-default-company2" value="<?php echo $value['IDENTIFICACION'] ?>" />

                                                   </div>

                                               </div>

                                               <div class="mb-3">

                                                   <label class="form-label" for="basic-icon-default-email">Nombre Completo</label>

                                                   <div class="input-group input-group-merge">

                                                       <span class="input-group-text"><i class="bx bx-envelope"></i></span>

                                                       <input type="text" name="nuevoNombre" class="form-control" aria-describedby="basic-icon-default-email2" value="<?php echo $value['NOMBRE_COMPLETO'] ?>" required />


                                                   </div>


                                               </div>


                                               <div class="mb-3">

                                                   <label class="form-label" for="basic-icon-default-phone">Primer Apellido</label>

                                                   <div class="input-group input-group-merge">

                                                       <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>

                                                       <input type="text" name="nuevoPrimerApellido" class="form-control phone-mask" aria-describedby="basic-icon-default-phone2" value="<?php echo $value['PRIMER_APELLIDO'] ?>" required />

                                                   </div>

                                               </div>

                                               <div class="mb-3">

                                                   <label class="form-label" for="basic-icon-default-phone">Segundo Apellido </label>

                                                   <div class="input-group input-group-merge">

                                                       <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>

                                                       <input type="text" name="nuevoSegApellido" class="form-control phone-mask" value="<?php echo $value['SEGUNDO_APELLIDO'] ?>" required />

                                                   </div>

                                               </div>

                                               <div class="mb-3">

                                                   <label class="form-label" for="basic-icon-default-phone">Teléfono Habitación / Trabajo </label>

                                                   <div class="input-group input-group-merge">

                                                       <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>

                                                       <input type="text" name="nuevoTelefono" class="form-control phone-mask" />

                                                   </div>

                                               </div>

                                               <div class="mb-3">

                                                   <label class="form-label" for="basic-icon-default-phone">Telefono Celular</label>

                                                   <div class="input-group input-group-merge">

                                                       <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>

                                                       <input type="text" name="nuevoCelular" class="form-control phone-mask" />

                                                   </div>

                                               </div>
                                               <div class="mb-3">

                                                   <label class="form-label" for="basic-icon-default-phone">Provincia</label>

                                                   <div class="input-group input-group-merge">

                                                       <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-home"></i></span>


                                                       <select id="slt-provincias" class="form-control phone-mask" name="nuevaProvincia">



                                                           <option value="">-- Seleccione una provincia --</option>

                                                       </select>


                                                   </div>

                                               </div>

                                               <div class="mb-3">

                                                   <label class="form-label" for="basic-icon-default-phone">Cantón</label>

                                                   <div class="input-group input-group-merge">

                                                       <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-home"></i></span>


                                                       <select id="slt-cantones" class="form-control phone-mask" name="nuevoCanton">

                                                           <option value="">-- Seleccione un cantón --</option>

                                                       </select>

                                                   </div>

                                               </div>

                                               <div class="mb-3">

                                                   <label class="form-label" for="basic-icon-default-phone">Distrito</label>

                                                   <div class="input-group input-group-merge">

                                                       <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-home"></i></span>

                                                       <select id="slt-distritos" class="form-control phone-mask" name="nuevoDistrito">

                                                           <option value="">-- Seleccione un distrito --</option>

                                                       </select>

                                                   </div>

                                               </div>



                                               <div class="mb-3">

                                                   <label class="form-label" for="basic-icon-default-message">Otras Señas</label>

                                                   <div class="input-group input-group-merge">

                                                       <span id="basic-icon-default-message2" class="input-group-text"><i class="bx bx-comment"></i></span>

                                                       <textarea id="basic-icon-default-message" name="nuevaSenas" class="form-control" aria-describedby="basic-icon-default-message2" s></textarea>

                                                   </div>

                                               </div>


                                               <div class="mb-3">

                                                   <label class="form-label" for="basic-icon-default-phone">Sexo</label>

                                                   <div class="input-group input-group-merge">

                                                       <select class="form-control" name="nuevoSexo" id="">

                                                           <option value="H">Hombre</option>

                                                           <option value="M">Mujer</option>

                                                           <option value="No Binario">No Binario</option>

                                                           <option value="No Binario">Otro</option>


                                                       </select>


                                                   </div>

                                               </div>

                                               <div class="mb-3">

                                                   <label class="form-label" for="basic-icon-default-phone">Sexo</label>

                                                   <div class="input-group input-group-merge">

                                                       <select class="form-control" name="estadoCivil" id="">

                                                           <option value="Soltero">Soltero</option>

                                                           <option value="Casado">Casado</option>

                                                           <option value="Union Libre">Union Libre</option>

                                                           <option value="Divociado(a)">Divociado(a)</option>

                                                           <option value="Divociado(a)">Otro</option>

                                                       </select>


                                                   </div>

                                               </div>

                                               <div class="mb-3">

                                                   <label class="form-label" for="basic-icon-default-phone">Foto</label>

                                                   <div class="input-group input-group-merge">

                                                       <span class="input-group-text"><i class="bx bx-image"></i></span>

                                                       <input class="form form-control" type="file" value="vistas/assets/img/avatars/1.png" name="nuevaFoto" id="" required>

                                                   </div>

                                               </div>


                                               <!-- <div class="mb-3"> 

                                                   <label class="form-label" for="basic-icon-default-phone">Usuario del Estudiante</label>

                                                   <div class="input-group input-group-merge">

                                                       <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-user-voice"></i></span>


                                                       <?php
                                                        $item = "usuario";
                                                        $valor = $value['IDENTIFICACION'];
                                                        $usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                                                        //print_r($usuario);
                                                        foreach ($usuario as $key => $value) {

                                                           // echo '<input class="form form-control" type="text" value="' . $value['correo'] . '" name="usuarioEstudiante" id="" >';
                                                       ?>

                                                       <select class="form-control" name="usuarioID" id="">

                                                           <option value="<?php echo $value['id']?>"><?php echo $value['usuario']."/". $value['correo'];?></option>

                                                           

                                                       </select>


                                                 <?php   }

                                                    ?>


                                                   </div>

                                               </div>-->

                                               <button type="submit" name="btnGuardarProfesor" class="btn btn-primary">Guardar</button>



                                               <?php

                                                $crearEstudiante = new ControladorProfesor();
                                                $crearEstudiante->ctrCrearProfesor();
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