<?php
include_once '../../coneccion/db.php';

$coneccionBD = BD::crear_instancia();



//Recepcion de la informaciopn del formulario de facturas


if (isset($_POST) ) {


    $accion = $_POST['accion'] ?? '';

    print_r($_POST);
    switch ($accion) {
        case 'Agregar':

            $numero_factura = $_POST['numero_factura_input'] ?? '';
            $empresa = $_POST['empresa_input'] ?? '';
            $monto = $_POST['monto_input'] ?? '';


        
            $sql = "INSERT INTO factura (numero,empresa,monto) VALUES (?,?,?)";
            $consulta = $coneccionBD->prepare($sql);

            $consulta->bindParam(1, $numero_factura);
            $consulta->bindParam(2, $empresa);
            $consulta->bindParam(3, $monto);
            $consulta->execute();

            break;

        case 'Seleccionar':
            $factura_bd_id = $_POST['id_seleccion'];

            $sql = "SELECT * FROM factura WHERE factura_id = ?";
            $consulta = $coneccionBD->prepare($sql);
            $consulta->bindParam(1, $factura_bd_id);
            $consulta->execute();
            $lista_seleccion = $consulta->fetch(PDO::FETCH_ASSOC);
            
            print_r($lista_seleccion);
            $factura_id_seleccion = $lista_seleccion['factura_id'] ?? '';
            $numero_seleccion = $lista_seleccion['numero'] ?? '';
            $empresa_seleccion = $lista_seleccion['empresa'] ?? '' ;
            $monto_seleccion = $lista_seleccion['monto'] ?? '';

            
            break;

        case 'Editar':
            $numero_factura = $_POST['numero_factura_input'] ?? '';
            $empresa = $_POST['empresa_input'] ?? '';
            $monto = $_POST['monto_input'] ?? '';
            $factura_id = $_POST['factura_id'] ?? '';
            
            $sql = 'UPDATE factura SET numero = ? , empresa = ? , monto= ? WHERE factura_id = ? ';  
            $consulta = $coneccionBD->prepare($sql);
            $consulta->bindParam( 1 , $numer_factura);
            $consulta->bindParam( 2 , $empresa);
            $consulta->bindParam( 3 , $monto);
            $consulta->bindParam( 4 , $factura_id);
            print_r($sql);
            $consulta->execute();


            break;
        case 'Eliminar':
            
            $factura_id = $_POST['numero_factura_id'] ?? '';

            $sql = 'DELETE FROM factura WHERE factura_id = ?';
            $consulta = $coneccionBD->prepare($sql);
            $consulta->bindParam(1,$factura_id);
            $consulta->execute();

            break;
    }


} else {

    print_r("No hay nada en el accion de el");
}

