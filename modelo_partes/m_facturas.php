<?php 
include_once '../coneccion/db.php';

$coneccionBD = BD::crear_instancia();




//Recepcion de la informaciopn del formulario de facturas
$numero_factura = isset($_POST['numero_factura_input'])? $_POST['numero_factura_input']:"";
$empresa = isset($_POST['empresa_input'])? $_POST['empresa_input']:"";
$monto = isset($_POST['monto_input'])? $_POST['monto_input']:"";

print_r(var_dump($_POST)) ;

if(count($_POST)>0){ //condicional que  evita que  se  ingresen datos  vacios al recargar

    $sql = "INSERT INTO factura (numero,empresa,monto) VALUES (?,?,?)" ;
    $consulta = $coneccionBD->prepare($sql);
    
    $consulta->bindParam(1,$numero_factura);
    $consulta->bindParam(2,$empresa);
    $consulta->bindParam(3,$monto);
    $consulta->execute();
    

    unset($_POST); //limpiar todo lo que e staba en el $_POST
}

$consulta = $coneccionBD->prepare("SELECT * FROM factura");
$consulta->execute();
$lista_factura = $consulta->fetchAll();

