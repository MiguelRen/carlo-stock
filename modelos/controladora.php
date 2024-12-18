<?php
include_once '../coneccion/db.php';

$coneccionBD = BD::crear_instancia();


$_post = json_decode(file_get_contents('php://input'),true);
print_r($_post);