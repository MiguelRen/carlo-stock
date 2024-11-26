<?php
include '../plantillas/cabecera.php';
include '../modelo_partes/m_facturas.php';
?>

<div class="row d-flex">


    <div class="col-4">
        <div class="card border border-primary">
            <div class="card-header">
                <div class="card-title">
                    <h2>
                        Gestión de facturas
                    </h2>
                </div>
                <div class="card-body">
                    <h3>Añadir factura</h3>
                    <form action="" method="post">

                        


                        <label for="numero_factura_input" class="form-label">Numero factura</label>
                        <input type="text" name="numero_factura_input" class="form-control">

                        <label for="empresa_input" class="form-label">Empresa</label>
                        <input type="text" name="empresa_input" class="form-control">

                        <label for="monto_input" class="form-label">Monto</label>
                        <input type="text" name="monto_input" class="form-control">

                        <div class="btn-group">
                            <button type="submit" name="accion" value="agregar" action>Agregar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="col-8 border">
        <table class="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nº Factura</td>
                    <td>Empresa</td>
                    <td>Monto</td>
                </tr>

            </thead>

            <tbody>


                <?php foreach ($lista_factura as $factura) { ?>


                    <tr>
                        <th> <?php echo $factura["factura_id"]; ?></th>
                        <th> <?php echo $factura["numero"]; ?></th>
                        <th> <?php echo $factura["empresa"]; ?></th>
                        <th> <?php echo $factura["monto"]; ?></th>
                    </tr>

                <?php } ?>
            </tbody>
        </table>

    </div>
</div>



<?php
include '../plantillas/pie.php'
    ?>