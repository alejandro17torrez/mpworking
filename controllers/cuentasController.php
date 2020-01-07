<?php

require '../models/Cuentas.php';

$cuentas = new Cuenta();

if (isset($_POST["add"])) {
    
    $add = $_POST["add"];
    $cc = $_POST["cc"];
    $dc = $_POST["dc"];
    $gc = $_POST["gc"];
    $sgc = $_POST["sgc"];
    $tc = $_POST["tc"];

    $cuentas->agragarCuenta($cc, $dc, $gc, $sgc, $tc);
    
}

if (isset($_POST["id"])) {
    
    $id = $_POST["id"];
    $cc = $_POST["cc"];
    $dc = $_POST["dc"];
    $gc = $_POST["gc"];
    $sgc = $_POST["sgc"];
    $tc = $_POST["tc"];
    
    $cuentas->ucuentas($id, $cc, $dc, $gc, $sgc, $tc);
    
}

if (isset($_POST["idd"])) {
    
    $id = $_POST["idd"];

    $cuentas->eliminarCuenta($id);
    
}

function cuentasGetCuentasController()
{
    $x = new Cuenta();
    $filas = $x->seleccionarCuenta();
    
    return $filas;
}

$x = json_encode(cuentasGetCuentasController());
echo $x;






?>
