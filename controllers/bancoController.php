<?php

require '../models/Banco.php';

$cuentas = new Banco();

if (isset($_POST["add"])) {
    
    $nb = $_POST["nb"];
    $cb = $_POST["cb"];
    $cc = $_POST["cc"];
    $tc = $_POST["tc"];
    $tm = $_POST["tm"];
    $cuentas->agragarCuenta($nb, $cb, $cc, $tc, $tm);
}

if (isset($_POST["id"])) {
    
    $id = $_POST["id"];
    $nb = $_POST["nb"];
    $cb = $_POST["cb"];
    $cc = $_POST["cc"];
    $tc = $_POST["tc"];
    $tm = $_POST["tm"];
    
    $cuentas->editarCuenta($id, $nb, $cb, $cc, $tc, $tm);
    
}

if (isset($_POST["idd"])) {
    
    $id = $_POST["idd"];

    $cuentas->eliminarCuenta($id);
    
}

function GetBankController()
{
    $x = new Banco();
    $filas = $x->seleccionarCuentas();
    return $filas;
}

$x = json_encode(GetBankController());
echo $x;


?>