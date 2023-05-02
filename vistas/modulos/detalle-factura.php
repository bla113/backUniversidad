<?php
$item = 'IDFACTURA';
$valor = $_POST['btnDetalleFactura'];
$facturas = ControladorFactura::ctrMostrarFactura($item, $valor);

$universidad = ControladorConfiguracion::ctrMostrarConfiguracion();

//Print_r($facturas);



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
            <div class="content-wrapper mb-4">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-3 text-uppercase"><span class="text-muted fw-light"><?php echo $_GET["ruta"] ?>/</span> Universidad</h4>

                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">

                                    <!-- Main content -->
                                    <div class="invoice p-3 mb-3">
                                        <!-- title row -->
                                        <div class="row">

                                            <?php foreach ($universidad as $key => $value) {

                                            ?>
                                                <div class="col-12">
                                                    <h4>

                                                        <i class="fas fa-globe"></i><?php echo $value['nombre_empresa'] ?>. <br>
                                                        <small class="float-right">Fecha: <?php echo date('y/m/d') ?></small>
                                                    </h4>
                                                </div>
                                                <!-- /.col -->
                                        </div>
                                        <!-- info row -->
                                        <div class="row invoice-info">
                                            <div class="col-sm-4 invoice-col">
                                                De:
                                                <address>
                                                    <strong><?php echo $value['nombre_empresa'] ?></strong><br>
                                                    <?php echo $value['provincia'] . " " . $value['canton'] . " " . $value['distrito'] ?><br>
                                                    Codigo Postal, A 94107<br>
                                                    Teléfono: <?php echo $value['telefono'] ?> <br>
                                                    Email: <?php echo $value['correo'] ?>
                                                </address>
                                            </div>


                                        <?php }  ?>
                                        <!-- /.col -->

                                        <?php foreach ($facturas  as  $factura) { ?>
                                            <div class="col-sm-4 invoice-col">
                                                Para:
                                                <address>
                                                    <strong><?php echo $factura['nombre_completo'] ?> </strong><br>
                                                    <?php echo $factura['provincia'] ?><br>
                                                    <?php echo $factura['canton'] . " , " . $factura['distrito']  ?>, A 94107<br>
                                                    Telefono: <?php echo $factura['TElESTUDIANTE'] ?><br>
                                                    Celular: <?php echo $factura['TElESTUDIANTE'] ?>
                                                </address>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 invoice-col">
                                                <b>N° de Factura: <?php echo $factura['IDFACTURA'] ?></b><br>
                                                <br>
                                                <b>Matícula N°:</b> <?php echo $factura['IDFACTURA'] ?><br>
                                                <b>Fecha Factura:</b> <?php echo $factura['fecha'] ?><br>
                                                <b>Saldo:  <strong style="color:red"><?php echo number_format($factura['saldo'],2)  ?></strong> </b> 
                                            </div>

                                        <?php } ?>
                                        <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <!-- Table row -->
                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-bordered table-striped dt-responsive tabla ">
                                                    <thead>
                                                        <tr>
                                                            <th>Detalle Materias</th>
                                                            <th>Créditos</th>
                                                            <th>Horario</th>
                                                            <th>Aula</th>
                                                            <th>Profesor</th>
                                                            <th>Día</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php

                                                        $array = json_decode($factura['materias'], true);

                                                        foreach ($array as $materias => $materia) {
                                                        ?>
                                                        <tr>
                                                            <td> <?php echo $materia['MATERIA']?></td>
                                                            <td><?php echo $materia['CREDITOS']?></td>
                                                            <td><?php echo $materia['HORARIO']?></td>
                                                            <td><?php echo $materia['AULA']?></td>
                                                            <td><?php echo $materia['PROFESOR']?></td>
                                                            <td><?php echo $materia['DIA']?></td>
                                                        </tr>
                                                   <?php }?> 
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <div class="row">
                                            <!-- accepted payments column -->
                                            <div class="col-6">
                                                <p class="lead">Metodos de Pago:</p>
                                                <img src="vistas/img/credit/visa.png" alt="Visa">
                                                <img src="vistas/img/credit/mastercard.png" alt="Mastercard">
                                                <img src="vistas/img/credit/american-express.png" alt="American Express">
                                                <img src="vistas/img/credit/sdf7897dfs8.jpg" width="45px" height="35px" alt="Paypal">

                                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                                    Edificamos Tu Futuro, atrévete a creer !
                                                    
                                                </p>
                                                <strong class="text block-24">"Piensa y trabaja"</strong>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-6">
                                                <p class="lead">Amount Due 2/22/2014</p>

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <th style="width:50%">Subtotal:</th>
                                                            <td>₡<?php echo number_format($factura['total_sin_descuento'],2)  ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Impuesto</th>
                                                            <td>₡ 0</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Dscuento:</th>
                                                            <td>₡<?php echo number_format($factura['total_descuento'],2)  ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total:</th>
                                                            <td>₡<?php echo number_format( $factura['total'],2) ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <!-- this row will not appear when printing -->
                                        <form action="pdf/imprimir-factura.php" method="post" target="_blank">
                                        <div class="row no-print">
                                            <div class="col-12">
                                                
                                                <button type="button" class="btn btn-primary float-right"><i class="bx bx-credit-card"></i>
                                                    Aplicar Pago
                                                </button>
                                                <button type="button" class="btn btn-success float-right"><i class="bx bx-mail-send"></i>
                                                    Enviar Por Correo
                                                </button>
                                                <button type="button" class="btn btn-danger float-right"><i class="bx bxl-whatsapp"></i>
                                                    Enviar Por Watsapp
                                                </button>

                                                <button type="submit"  name="btnImprimirFactura" value="<?php echo $factura['IDFACTURA'] ?>" class="btn btn-secondary float-right"><i class="bx bx-download"></i> Imprimir</button>
                                                

                                                
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.invoice -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </section>
                </div>
                <!-- / Content -->




                <!-- Content wrapper -->

            </div>
            <!-- / Layout page -->

        </div>




    </div>


    </form>

</div>



<?php require('footer.php'); ?>


