<?php

require '../models/Cooperativas.php';

$socios = new Cooperativa();

if (isset($_POST["add"])) {
    
    $ns = $_POST["ns"];
    $nns = $_POST["nns"];
    $as = $_POST["as"];
    $aas = $_POST["aas"];
    $cs = $_POST["cs"];
    $ces = $_POST["ces"];
    $fns = $_POST["fns"];
    $cc = $_POST["cc"];
    echo $ns, $nns, $as, $aas, $cs, $fns,$ces, $cc;

    $socios->agragarSocio($ns, $nns, $as, $aas, $cs, $fns,$ces, $cc);
    
}

if (isset($_POST["id"])) {
    
    $id = $_POST["id"];
    $ns = $_POST["ns"];
    $nns = $_POST["nns"];
    $as = $_POST["as"];
    $aas = $_POST["aas"];
    $cs = $_POST["cs"];
    $ces = $_POST["ces"];
    $fns = $_POST["fns"];
    $cc = $_POST["cc"];

    echo $id, $ns, $nns, $as, $aas, $cs, $fns,$ces, $cc ;
    $socios->editarSocio($id, $ns, $nns, $as, $aas, $cs, $fns,$ces, $cc);
    
}

if (isset($_POST["idd"])) {
    
    $id = $_POST["idd"];

    $socios->eliminarSocio($id);
    
}

function socioGetSocioController()
{
    $x = new Cooperativa();
    $filas = $x->seleccionarSocio();
    return $filas;
}

$x = json_encode(socioGetSocioController());
echo $x;






?>
