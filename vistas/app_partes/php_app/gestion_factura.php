<?php
/**trae la estructuta superior pricipal o cabecera de este archivo */
include '../../estructura_principal/cabecera.php';
?>


<div class="row ">

    <!-- Seccion del área de factura  donde se anotan los aspectos basicos de una factura.-->
    <div class="col-3">
        <div class="card border border-primary">
            <div class="card-header">
                <div class="card-title">
                    <h2>
                        Gestión de facturas
                    </h2>
                </div>
                <div class="card-body ">
                    <h3>Añadir factura</h3>

                    <form action="" method="post" id="form_ppal">
                        <!-- Formulario para guardar los datos de las facturas-->

                        <div class="row float">

                            <div class="col-6 ">


                                <input type="text" name="factura_id" value="" hidden>



                                <label for="numero_factura_input" class="form-label small" value="Numero factura">Numero
                                    factura</label>
                                <input type="text" name="numero_factura_input" class=" form-control form-control-sm"
                                    value="<?php echo $numero_seleccion ?? ''; ?>" required>

                                <label for="empresa_input" class="form-label small">Empresa</label>
                                <input type="text" name="empresa_input" class="form-control form-control-sm"
                                    value="<?php echo $empresa_seleccion ?? ''; ?>" required>


                                <label for="comprador_input" class="form-label small">Comprador</label>
                                <input type="text" name="comprador_input" class="form-control form-control-sm" value="">

                                <label for="vendedor_input" class="form-label small">Vendedor</label>
                                <input type="text" name="vendedor_input" class="form-control form-control-sm" value="">


                                <label for="tipo_documento_input" class="form-label small">Tipo de Documento</label>
                                <input type="text" name="tipo_documento_input" class="form-control form-control-sm"
                                    value="">

                                <label for="tipo_pago_input" class="form-label small">Tipo de Pago</label>
                                <input type="text" name="tipo_pago_input" class="form-control form-control-sm" value="">

                                <label for="condicion_pago_input" class="form-label small">Condicion de Pago</label>
                                <input type="text" name="condicion_pago_input" class="form-control form-control-sm"
                                    value="">

                            </div>

                            <div class="col-6">

                                <label for="fecha_emision_input" class="form-label small">Fecha de Emision</label>
                                <input type="text" name="fecha_emision_input" class="form-control form-control-sm"
                                    value="">

                                <label for="fecha_vencimiento_input" class="form-label small">Fecha de
                                    vencimiento</label>
                                <input type="text" name="fecha_vencimiento_input" class="form-control form-control-sm"
                                    value="">

                                <label for="sub_total_input" class="form-label small">Sub-total</label>
                                <input type="text" name="sub_total_input" class="form-control form-control-sm" value="">


                                <label for="iva_input" class="form-label small">IVA</label>
                                <input type="text" name="iva_input" class="form-control form-control-sm" value="">

                                <label for="descuento_input" class="form-label small">Descuento</label>
                                <input type="text" name="descuento_input" class="form-control form-control-sm" value="">


                                <label for="Recargo_input" class="form-label small">Recargo</label>
                                <input type="text" name="recargo_input" class="form-control form-control-sm" value="">



                                <label for="tasa_input" class="form-label small">Tasa de cambio</label>
                                <input type="text" name="tasa_input" class="form-control form-control-sm" value="">




                            </div>
                        </div>




                        <div class="fs-5   btn-group ">
                            <!-- Boton, no para guardar el formulario, sino para pasar al modal para  agregar los  articulos de la factura-->
                            <button type="submit" name="accion" value="art" class="btn btn-primary"
                                id="boton_agregar_art">Agregar Articulos</button>
                        </div>
                        <?php
                        /**aquí se incluye el modal de "Detalles de factura" */
                        include '../php_app/modales/articulos.php';
                        ?>

                    </form>
                </div>
            </div>
        </div>
    </div>





    <!--    En esta seccion correspònde a la lista que sirve para mostrar las facturas ya guardadas -->
    <div class="col-9 border">
        <table class="table">
            <thead>
                <tr id="web">
                    <td hidden>ID</td>
                    <td class="small">Nº Factura</td>
                    <td class="small">Empresa</td>
                    <td class="small">Comprador</td>

                    <td class="small">Vendedor</td>
                    <td class="small">Tipo de Documento</td>
                    <td class="small">Tipo Pago</td>
                    <td class="small">Condicion Pago</td>

                    <td class="small">Fecha Emision</td>
                    <td class="small">Fecha Vencimiento</td>
                    <td class="small">Sub-Total</td>
                    <td class="small">IVA</td>

                    <td class="small">Descuento</td>
                    <td class="small">Rango</td>
                    <td class="small">Tasa de Cambio</td>
                </tr>

            </thead>

            <tbody>

                <!-- aqui se incrusta un codigo php para, dinamicamente, alojar los datos d e las facturas -->
                <?php foreach ($lista_factura as $factura) { ?>
                    <tr>
                        <th hidden> <?php echo $factura["factura_id"]; ?></th>
                        <th class="small"> <?php echo $factura["numero"]; ?></th>
                        <th class="small"> <?php echo $factura["empresa"]; ?></th>
                        <th class="small"> <?php echo $factura["comprador"]; ?></th>

                        <th class="small"> <?php echo $factura["vendedor"]; ?></th>
                        <th class="small"> <?php echo $factura["tipo_documento"]; ?></th>
                        <th class="small"> <?php echo $factura["tipo_pago"]; ?></th>
                        <th class="small"> <?php echo $factura["condicion_pago"]; ?></th>

                        <th class="small"> <?php echo $factura["fecha_vencimiento"]; ?></th>
                        <th class="small"> <?php echo $factura["fecha_emision"]; ?></th>
                        <th class="small"> <?php echo $factura["sub_total"]; ?></th>
                        <th class="small"> <?php echo $factura["iva"]; ?></th>

                        <th class="small"> <?php echo $factura["descuento"]; ?></th>
                        <th class="small"> <?php echo $factura["recargo"]; ?></th>
                        <th class="small"> <?php echo $factura["tasa"]; ?></th>


                        <th>
                            <form action="" method="post">
                                <input type="text" class="small" name="id_seleccion"
                                    value="<?php echo $factura["factura_id"]; ?> " hidden>

                                <button type="submit" name="accion" value="Seleccionar"
                                    class="btn btn-primary small">Editar</button>
                                <button class="btn btn-danger small" name="accion" value="Eliminar">Eliminar</button>
                            </form>
                        </th>

                    </tr>

                <?php } ?>
            </tbody>
        </table>

    </div>
</div>



<?php
/**Se incluye la el "pie" o estructura inferior base del archivo */
include '../../estructura_principal/pie.php';

?>