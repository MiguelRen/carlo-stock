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
                    <form action="submit" method="post">

                        <label for="numero_factura_input" class="form-label">Numero factura</label>
                        <input type="text" name="numero_factura_input" class="form-control">

                        <label for="empresa_input" class="form-label">Empresa</label>
                        <input type="text" name="empresa_input" class="form-control">

                        <label for="monto_input" class="form-label">Monto</label>
                        <input type="text" name="monto_input" class="form-control">

                        <button>Agregar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="col-8 border">
        <table class="table">
            <thead>
                <tr>
                    <td>Nº</td>
                    <td>Empresa</td>
                    <td>Monto</td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tbody>
        </table>

    </div>
</div>



<?php
include '../plantillas/pie.php'
    ?>