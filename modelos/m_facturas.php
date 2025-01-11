<?php
/**
 * Este archivo gestiona el modelo concerniente a la factura
 */



/**Se trae la coneccion de la base de datos */
include_once '../coneccion/db.php';

// /** Se agrega  la ruta a la base de datos  */
// include_once $_SERVER['DOCUMENT_ROOT'] . '/carlo-stock/coneccion/db.php';


class M_facturas
{
    /**
     * @var mixed - esta variable contiene una instancia de la conexion a BD
     */
    public function __construct($tipo = null)
    {

        $this->tipo = $tipo;

    }
    /**
     * Summary of obtener
     * @param mixed $datos_factura
     * @return void
     */
    public function obtener($datos_factura)
    {
        try {
            /**
             * @var string - contiene la consulta sql propiamente
             */
            $sql = "SELECT * FROM factura WHERE factura_id = ?";

            /** variable principal que contiene el valor identificativo de las facturas */
            $factura_bd_id = $datos_factura['id_seleccion'];
            $coneccion = BD::crear_instancia();
            $consulta = $coneccion->prepare($sql);
            $consulta->bindParam(1, $factura_bd_id);
            $consulta->execute();
            $lista_seleccion = $consulta->fetch(PDO::FETCH_ASSOC);

            return $lista_seleccion;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * @param mixed $datos_factura - Trae los datos desde el controlador correspondiente para guardar los datos generales de una factura
     * @return int - returna el valor del id de la factura
     */
    public function insertar_factura($datos_factura)
    {
        try {

            if (!$datos_factura || count($datos_factura) == 0) {
                throw new Exception("Theres´s function parameters problems", 1);
            }

            foreach ($datos_factura as $caracteristica => $value) {
                print_r("{ $caracteristica   $value)");
            }
            $numero_factura = $datos_factura["numero_factura_input"] ?? '';
            
            $empresa = $datos_factura["empresa_input"] ?? '';
            $vendedor = $datos_factura['vendedor'] ?? '';
            $tipo_documento = $datos_factura['tipo_documento'] ?? '';
            $tipo_pago = $datos_factura['tipo_pago'] ?? '';
            $condicion_pago = $datos_factura['condicion_pago'] ?? '';

            $fecha_vencimiento = $datos_factura['fecha_vencimiento'] ?? '';
            $fecha_emision = $datos_factura['fecha_emision'] ?? '';
            $sub_total = $datos_factura['sub_total'] ?? '';
            $iva = $datos_factura['iva'] ?? '';
            $descuento = $datos_factura['descuento'] ?? '';

            $recargo = $datos_factura['recargo'] ?? '';
            $tasa = $datos_factura['tasa'] ?? '';



            $sql = "INSERT INTO factura (numero,empresa,comprador,vendedor,tipo_documento,tipo_pago,condicion_pago,
                            fecha_vencimiento,fecha_emision,sub_total,iva,descuento,recargo,tasa) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";



            $coneccion = BD::crear_instancia();
            $consulta = $coneccion->prepare($sql);


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
            return 3;
        } catch (Throwable $e) {
            print_r("Insertar Factura Problems ".$e);
        }
    }

    public function obtener_todas()
    {
        try {
            $coneccionBD = BD::crear_instancia();

            $consulta = $coneccionBD->prepare("SELECT * FROM factura");
            $consulta->execute();
            $lista_factura = $consulta->fetchAll(PDO::FETCH_ASSOC);

            return $lista_factura;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

}


// if (isset($_POST)) {


//     $accion = $_POST['accion'] ?? '';


//     switch ($accion) {
//         case 'Agregar':

//             try {




// foreach ($_POST as $post_item => $value) {
//     if ($post_item =) {
//         # code...
//     }


// }

//agregando los articulos
// $descripcion = $_POST['modal-descripcion'];
// $tipo_unidad = $_POST['modal-unidad'];
// $tipo_art = $_POST['modal-tipo_art'];

// $cantidad = $_POST['modal-cantidad'];
// $precio = $_POST['modal-precio'];
// $iva = $_POST['modal-iva'];
// $neto = $_POST['modal-neto'];

// buscando el id de la factura donde se va a  guardar la informacion 



## imprimiendo $_POST

//consulta para ingresar los detalles
// $sql_detalle = "INSERT INTO detalle_factura (id_factura_fk,art_desc,tipo_unidad,tipo_art,cant,precio_unit,sub_iva,neto)
//             values (?,?,?,?,?,?,?,?)";


// $consulta_detalle = $coneccionBD->prepare($sql_detalle);
// $consulta_detalle->bindParam(1, $factura_id['factura_id']);
// $consulta_detalle->bindParam(2, $descripcion);
// $consulta_detalle->bindParam(3, $tipo_unidad);
// $consulta_detalle->bindParam(4, $tipo_art);
// $consulta_detalle->bindParam(5, $cantidad);
// $consulta_detalle->bindParam(6, $precio);
// $consulta_detalle->bindParam(7, $iva);
// $consulta_detalle->bindParam(8, $neto);

// $consulta_detalle->execute();



// } catch (\Throwable $th) {
//     print_r(throw $th);
// }


//             break;


//         case 'agregar_detalle':
//             try {
//                 $sql_comprobacion = 'SELECT factura_id FROM factura where numero = ?';
//                 $consulta_comprobacion = $coneccionBD->prepare($sql_comprobacion);
//                 $consulta_comprobacion->bindParam(1, $numero_factura);
//                 $consulta_comprobacion->execute();

//                 $factura_id = $consulta_comprobacion->fetch(PDO::FETCH_ASSOC);




//                 $descrip = $_POST["modal-descripcion"];
//                 $unidad = $_POST["modal-unidad"];
//                 $tipo_art = $_POST["modal-tipo_art"];
//                 $cantidad = $_POST["modal-cantidad"];
//                 $precio = $_POST["modal-precio"];

//                 $iva = $_POST["modal-iva"];
//                 $neto = $_POST["modal-neto"];



//                 $sql = "INSERT INTO factura (id_detalle_factura,id_factura_fk,art_desc,tipo_unidad,tipo_art,cant,precio_unit,sub_iva,neto)
//                 values (?,?,?,?,?,?,?,?,?)";

//                 $consulta = $connecionBD->prepare($sql);

//                 $consulta->bindParam(1, $descript);
//                 $consulta->bindParam(2, $unidad);
//                 $consulta->bindParam(3, $tipo_art);
//                 $consulta->bindParam(4, $cantidad);
//                 $consulta->bindParam(5, $precio);
//                 $consulta->bindParam(6, $iva);
//                 $consulta->bindParam(7, $neto);

//                 $consulta->execute();




//             } catch (\Throwable $th) {
//                 throw $th;
//             }

//             break;


//         case 'Seleccionar':
//             $factura_bd_id = $_POST['id_seleccion'];

//             $sql = "SELECT * FROM factura WHERE factura_id = ?";
//             $consulta = $coneccionBD->prepare($sql);
//             $consulta->bindParam(1, $factura_bd_id);
//             $consulta->execute();
//             $lista_seleccion = $consulta->fetch(PDO::FETCH_ASSOC);


//             $factura_id_seleccion = $lista_seleccion['factura_id'] ?? '';
//             $numero_seleccion = $lista_seleccion['numero'] ?? '';
//             $empresa_seleccion = $lista_seleccion['empresa'] ?? '';
//             $monto_seleccion = $lista_seleccion['comprador'] ?? '';



//             $monto_seleccion = $lista_seleccion['vendedor'] ?? '';
//             $monto_seleccion = $lista_seleccion['tipo_documento'] ?? '';
//             $monto_seleccion = $lista_seleccion['tipo_pago'] ?? '';
//             $monto_seleccion = $lista_seleccion['condicion_pago'] ?? '';

//             $monto_seleccion = $lista_seleccion['fecha_vencimiento'] ?? '';
//             $monto_seleccion = $lista_seleccion['fecha_emision'] ?? '';
//             $monto_seleccion = $lista_seleccion['sub_total'] ?? '';
//             $monto_seleccion = $lista_seleccion['iva'] ?? '';
//             $monto_seleccion = $lista_seleccion['descuento'] ?? '';

//             $monto_seleccion = $lista_seleccion['recargo'] ?? '';
//             $monto_seleccion = $lista_seleccion['tasa'] ?? '';






//             break;

//         case 'Editar':
//             $numero_factura = $_POST['numero_factura_input'] ?? '';
//             $empresa = $_POST['empresa_input'] ?? '';
//             $monto = $_POST['monto_input'] ?? '';
//             $factura_id = $_POST['factura_id'] ?? '';

//             $sql = 'UPDATE factura SET numero = ? , empresa = ? , monto= ? WHERE factura_id = ? ';
//             $consulta = $coneccionBD->prepare($sql);
//             $consulta->bindParam(1, $numero_factura);
//             $consulta->bindParam(2, $empresa);
//             $consulta->bindParam(3, $monto);
//             $consulta->bindParam(4, $factura_id);

//             $consulta->execute();


//             break;
//         case 'Eliminar':

//             $factura_id = $_POST['id_seleccion'] ?? '';

//             $sql = 'DELETE FROM factura WHERE factura_id = ?';
//             $consulta = $coneccionBD->prepare($sql);
//             $consulta->bindParam(1, $factura_id);
//             $consulta->execute();

//             break;

//         case 'art-modal':
//             print_r("aqui el print");

//             break;
//     }


// } else {

//     print_r("No hay nada en el accion de el");
// }

