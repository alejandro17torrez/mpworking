<?php

    require '../models/Administracion.php';

    $retenciones = new Administracion();

    if (isset($_POST["add"])) {
        
        $nom = $_POST["nom"];
        $dir = $_POST["dir"];
        $ruc = $_POST["ruc"];
        $fn = $_POST["fn"];
        $val = $_POST["val"];
        $con = $_POST["con"];
        $lu = $_POST["lu"];
        $fe = $_POST["fe"];
        $idDoc = $_POST["idoc"];
        $retenciones->agragarRet($nom, $dir, $ruc, $nf, $val, $con, $lu, $fe, $idDoc);

    }

    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $nom = $_POST["nom"];
        $dir = $_POST["dir"];
        $ruc = $_POST["ruc"];
        $fn = $_POST["fn"];
        $val = $_POST["val"];
        $con = $_POST["con"];
        $lu = $_POST["lu"];
        $fe = $_POST["fe"];
        $idDoc = $_POST["idoc"];
        $retenciones->editarRet($id, $nom, $dir, $ruc, $nf, $val, $con, $lu, $fe, $idDoc);
    }

    if (isset($_POST["idd"])) {
        $id = $_POST["idd"];
        $retenciones->eliminarRet($id);
    }

    function obtenerRetenciones()
    {
        $x = new Administracion();
        $filas = $x->seleccionarRet();
        return $filas;
    }

    $x = json_encode(obtenerRetenciones());
    echo $x;



?>