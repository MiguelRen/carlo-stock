<?php 
include_once '../coneccion/db.php';

$coneccionBD = BD::crear_instancia();



$consulta = $coneccionBD->prepare("SELECT * FROM factura");

$consulta->execute();

$lista_factura = $consulta->fetchAll();
