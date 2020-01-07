<?php

require '../models/ingresos.php';

$ingresos = new Ingresos();

if (isset($_POST["add"])) {
    $x = $_POST['add'];
    echo "funciona". " , ".$x;
    $idcooperativa = $_POST["idcoop"];
    $fecha = $_POST["fecha"];
    $nringreso = $_POST["nringreso"];
    $tiingreso = $_POST["tiingreso"];
    $tmonedain = $_POST["tmonedain"];
    $cantin = $_POST["cantin"];
    $cantletrasin = $_POST["cantletrasin"];
    $concepto = $_POST["concepto"];
    $cuentafectada = $_POST["cuentafectada"];
    $baucher = $_POST["baucher"];
    $cuentasbancos = $_POST["cuentasbancos"];
    $deptomunicipio = $_POST["deptomunicipio"];
    $nombre = $_POST['nombre'];
    //$ingresos->agragarRi($ti, $nom, $tm, $cant, $con, $desc, $nb, $lu, $fe, $nr, $cantle, $idDoc);
    $ingresos->insertar_recibo_ingreso_con_comprobante_diario($nringreso, $tiingreso, $nombre, $tmonedain, $cantin, $cantletrasin, $concepto, $cuentafectada, $baucher, $deptomunicipio, $fecha, $idcooperativa, $cuentasbancos);
}

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $nr = $_POST["nr"];
    $ti = $_POST["ti"];
    $nom = $_POST["nom"];
    $tm = $_POST["tm"];
    $cant = $_POST["cant"];
    $con = $_POST["con"];
    $desc = $_POST["desc"];
    $nb = $_POST["nb"];
    $lu = $_POST["lu"];
    $fe = $_POST["fe"];
    $cantle = $_POST["cantle"];
    $idDoc = $_POST["idDoc"];
    //$ingresos->editarRi($id, $ti, $nom, $tm, $cant, $con, $desc, $nb, $lu, $fe, $nr, $cantle, $idDoc);
}

if (isset($_POST["idd"])) {
    $id = $_POST["idd"];
    $ingresos->eliminarRi($id);
}

function obtenerRI()
{
   // $x = new Administracion();
    //$filas = $x->seleccionarRi();
    //return $filas;
}

//$x = json_encode(obtenerRI());
//echo $x;





?>