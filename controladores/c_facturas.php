<?php

/** Controladora de los procesos que reciben las peciciones desde las vistas */


/** Importa la el archivo  m_factura de los modelos  */
include_once '../modelos/m_facturas.php';
/**
 * Summary of C_facturas
 * Clase para controlar la logica relacionada con las facturas
 */
class C_facturas
{
    /**
     * Summary of todas_facturas
     * @return array - Este array contiene todas las facturas
     * @throws Throwable - returna la exepcion o el error
     */
    public function todas_facturas()
    {
        try {

            $data = new M_facturas();
            return $data->obtener_todas();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $datos = new C_facturas;
 
 echo json_encode($datos->todas_facturas());
//   return json_encode($datos->todas_facturas());;
}
