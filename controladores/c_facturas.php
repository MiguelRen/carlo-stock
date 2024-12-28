<?php

/** Controladora de los procesos que reciben las peciciones desde las vistas */


include_once '../modelos/m_facturas.php';
class C_facturas
{


    public function todas_facturas()
    {
        try {
            if ($this->$_GET) {
                $data = new M_facturas();
                echo $data->obtener_todas();    
                return $data->obtener_todas();
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

}
