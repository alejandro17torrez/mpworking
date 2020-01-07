<?php

require '../models/egresos.php';

$egresos = new Egresos();

if (isset($_POST["add"])) {
    $x = $_POST['add'];
    echo "funciona". " , ".$x;
    $idcoopre = $_POST["idcoopre"];
    $fecha = $_POST["fechare"];
    $nregreso = $_POST["nregreso"];
    $tiengreso = $_POST["tiegreso"];
    $tmonedae = $_POST["tmonedae"];
    $cante = $_POST["cante"];
    $cantletrase = $_POST["cantletrase"];
    $concepto = $_POST["concepto"];
    $cuentafectada = $_POST["cuentafectada"];
    $baucher = $_POST["baucher"];
    $cuentasbancos = $_POST["cuentasbancos"];
    $deptomunicipio = $_POST["deptomunicipio"];
    $nombre = $_POST['nombre'];

    echo "<br>";
    echo $idcoopre. " , ".$fecha. " , ".$nregreso. " , ".$tiengreso. " , ".$nombre. " , ".$tmonedae. " , ".$cante. " , ".$cantletrase. " , ".$concepto. " , ".$cuentafectada. " , ".$baucher. " , ".$cuentasbancos. " , ".$deptomunicipio;

    $egresos->insertar_recibo_egreso_con_comprobante_diario($nregreso, $tiengreso, $nombre, $tmonedae, $cante, $cantletrase, $concepto, $cuentafectada, $baucher, $deptomunicipio, $fecha, $idcoopre, $cuentasbancos);
    
    
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