<?php
include_once '../../coneccion/db.php';

$coneccionBD = BD::crear_instancia();



//Recepcion de la informaciopn del formulario de facturas


if (isset($_POST) ) {


    $accion = $_POST['accion'] ?? '';

   
    switch ($accion) {
        case 'Agregar':

            $numero_factura = $_POST['numero_factura_input'] ?? '';
            $empresa = $_POST['empresa_input'] ?? '';
            $comprador = $_POST['comprador_input'] ?? '';
            $vendedor = $_POST['vendedor_input'] ?? '';
            $tipo_documento = $_POST['tipo_documento_input'] ?? '';
            $tipo_pago = $_POST['tipo_pago_input'] ?? '';
            $condicion_pago = $_POST['condicion_pago_input'] ?? '';
            $fecha_emision = $_POST['fecha_emision_input'] ?? '';
            $fecha_vencimiento = $_POST['fecha_vencimiento_input'] ?? '';
            $sub_total = $_POST['sub_total_input'] ?? '';
            $iva = $_POST['iva_input'] ?? '';
            $descuento = $_POST['descuento_input'] ?? '';
            $recargo = $_POST['recargo_input'] ?? '';
            $tasa = $_POST['tasa_input'] ?? '';
        


            $sql = "INSERT INTO factura (numero,empresa,comprador,vendedor,tipo_documento,tipo_pago,condicion_pago,
            fecha_vencimiento,fecha_emision,sub_total,iva,descuento,recargo,tasa) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $consulta = $coneccionBD->prepare($sql);

            $consulta->bindParam(1, $numero_factura);
            $consulta->bindParam(2, $empresa);
            $consulta->bindParam(3, $comprador);
            $consulta->bindParam(4, $vendedor);
            $consulta->bindParam(5, $tipo_documento);
            $consulta->bindParam(6, $tipo_pago);
            $consulta->bindParam(7, $condicion_pago);
            $consulta->bindParam(8, $fecha_vencimiento);
            $consulta->bindParam(9, $fecha_emision);
            $consulta->bindParam(10, $sub_total);
            $consulta->bindParam(11, $iva);
            $consulta->bindParam(12, $descuento);
            $consulta->bindParam(13, $recargo);
            $consulta->bindParam(14, $tasa);


            $consulta->execute();

            break;

        case 'Seleccionar':
            $factura_bd_id = $_POST['id_seleccion'];

            $sql = "SELECT * FROM factura WHERE factura_id = ?";
            $consulta = $coneccionBD->prepare($sql);
            $consulta->bindParam(1, $factura_bd_id);
            $consulta->execute();
            $lista_seleccion = $consulta->fetch(PDO::FETCH_ASSOC);
            

            $factura_id_seleccion = $lista_seleccion['factura_id'] ?? '';
            $numero_seleccion = $lista_seleccion['numero'] ?? '';
            $empresa_seleccion = $lista_seleccion['empresa'] ?? '' ;
            $monto_seleccion = $lista_seleccion['comprador'] ?? '';


        
            $monto_seleccion = $lista_seleccion['vendedor'] ?? '';
            $monto_seleccion = $lista_seleccion['tipo_documento'] ?? '';
            $monto_seleccion = $lista_seleccion['tipo_pago'] ?? '';
            $monto_seleccion = $lista_seleccion['condicion_pago'] ?? '';

            $monto_seleccion = $lista_seleccion['fecha_vencimiento'] ?? '';
            $monto_seleccion = $lista_seleccion['fecha_emision'] ?? '';
            $monto_seleccion = $lista_seleccion['sub_total'] ?? '';
            $monto_seleccion = $lista_seleccion['iva'] ?? '';
            $monto_seleccion = $lista_seleccion['descuento'] ?? '';

            $monto_seleccion = $lista_seleccion['recargo'] ?? '';
            $monto_seleccion = $lista_seleccion['tasa'] ?? '';
            




            
            break;

        case 'Editar':
            $numero_factura = $_POST['numero_factura_input'] ?? '';
            $empresa = $_POST['empresa_input'] ?? '';
            $monto = $_POST['monto_input'] ?? '';
            $factura_id = $_POST['factura_id'] ?? '';
            
            $sql = 'UPDATE factura SET numero = ? , empresa = ? , monto= ? WHERE factura_id = ? ';  
            $consulta = $coneccionBD->prepare($sql);
            $consulta->bindParam( 1 , $numero_factura);
            $consulta->bindParam( 2 , $empresa);
            $consulta->bindParam( 3 , $monto);
            $consulta->bindParam( 4 , $factura_id);
           
            $consulta->execute();


            break;
        case 'Eliminar':

            $factura_id = $_POST['id_seleccion'] ?? '';
            print_r($factura_id ?? 'hjnmdfgvfj');
            $sql = 'DELETE FROM factura WHERE factura_id = ?';
            $consulta = $coneccionBD->prepare($sql);
            $consulta->bindParam(1,$factura_id);
            $consulta->execute();

            break;
    }


} else {

    print_r("No hay nada en el accion de el");
}
