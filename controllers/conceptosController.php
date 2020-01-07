<?php

require '../models/Cuentas.php';

$cuentas = new Cuenta();

if (isset($_POST["add"])) {
    
    $dc = $_POST["dc"];
    $cuentas->agragarCon($dc);
}

if (isset($_POST["id"])) {
    
    $id = $_POST["id"];
    $dc = $_POST["dc"];
    
    $cuentas->editarCon($id, $dc);
    
}

if (isset($_POST["idd"])) {
    
    $id = $_POST["idd"];

    $cuentas->eliminarCon($id);
    
}

function conceptosGetConceptosController()
{
    $x = new Cuenta();
    $filas = $x->seleccionar_conceptos();
    return $filas;
}

$x = json_encode(conceptosGetConceptosController());
echo $x;


?>
