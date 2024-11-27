<?php 
include_once '../coneccion/db.php';

$coneccionBD = BD::crear_instancia();




//Recepcion de la informaciopn del formulario de facturas
// $numero_factura = isset($_POST['numero_factura_input'])? $_POST['numero_factura_input']:"";
// $empresa = isset($_POST['empresa_input'])? $_POST['empresa_input']:"";
// $monto = isset($_POST['monto_input'])? $_POST['monto_input']:"";



if(isset($_POST["numero_factura_input"]) && isset($_POST["empresa_input"]) && isset($_POST["monto_input"]) ){ //condicional que  evita que  se  ingresen datos  vacios al recargar

    // echo $_POST["numero_factura_input"];
    $sql = "INSERT INTO factura (numero,empresa,monto) VALUES (?,?,?)" ;
    $consulta = $coneccionBD->prepare($sql);
    
    $consulta->bindParam(1,$_POST["numero_factura_input"]);
    $consulta->bindParam(2,$_POST["empresa_input"]);
    $consulta->bindParam(3,$_POST["monto_input"]);
    $consulta->execute();
    

    $_POST["numero_factura_input"] = ""; //limpiar todo lo que e staba en el $_POST
}else{

    $message = "<script> 
                    alert('faltan campos por llenar');
                </script>";
    echo $message;
}


 print_r($_POST);
header("location: ../vistas/app_partes/gestion_factura.php");
die();