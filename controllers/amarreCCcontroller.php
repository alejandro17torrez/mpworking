<?php

require '../models/Amarres.php';

$cuentas = new Cuentas_cooperativas();

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
    $x = new Cuentas_cooperativas();
    $filas = $x->seleccionarCuentasConceptos();
    
    return $filas;
}

$x = json_encode(conceptosGetConceptosController());
echo $x;


?>
