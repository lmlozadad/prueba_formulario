<?php

require_once('lib/Conexion.php');

$con = new Conexion();
$response = $con->guardar($_POST['nombre'], $_POST['apellido']);
echo json_encode($response);