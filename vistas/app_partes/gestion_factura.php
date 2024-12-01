<?php
include '../estructura_principal/cabecera.php';
include '../../modelos/m_facturas.php';
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


                        <input type="text" name="factura_id" value="<?php echo $factura_id_seleccion ?>" hidden>



                        <label for="numero_factura_input" class="form-label">Numero factura</label>
                        <input 
                            type="text" 
                            name="numero_factura_input" 
                            class="form-control" 
                            value="<?php echo $numero_seleccion ?>"
                            required>

                        <label for="empresa_input" class="form-label">Empresa</label>
                        <input 
                            type="text" 
                            name="empresa_input" 
                            class="form-control" 
                            value="<?php echo $empresa_seleccion ?>"
                            required>

                        <label for="monto_input" class="form-label">Monto</label>
                        <input 
                            type="text" 
                            name="monto_input" 
                            class="form-control" 
                            value="<?php echo $monto_seleccion ?>"
                            required>

                        <div class="  btn-group ">
                            <button type="submit" name="accion" value="Agregar"class="btn btn-primary" action>Agregar</button>
                            <button type="submit" name="accion" value="Editar" class="btn btn-primary">Editar</button>
                            <button type="submit" name="accion" value="Eliminar" class="btn btn-primary">Eliminar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php

    include_once '../../coneccion/db.php';

    $coneccionBD = BD::crear_instancia();

                                        
    
    $consulta = $coneccionBD->prepare("SELECT * FROM factura");
    $consulta->execute();
    $lista_factura = $consulta->fetchAll();



    ?>



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
                        <th>
                            <form action="" method="post">
                                <input type="text" name="id_seleccion" value="<?php echo $factura["factura_id"]; ?> "
                                    hidden>
                                
                                <button type="submit" name="accion" value="Seleccionar"
                                    class="btn btn-primary">Editar</button>
                            </form>
                        </th>
                        <th><button class="btn btn-danger">Eliminar</button></th>
                    </tr>

                <?php } ?>
            </tbody>
        </table>

    </div>
</div>



<?php
include '../estructura_principal/pie.php'
    ?>