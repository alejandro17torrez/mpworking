<?php

    require '../models/Administracion.php';

    $retiros = new Administracion();

    if (isset($_POST["add"])) {
        $rp = $_POST["rp"];
        $tm = $_POST["tm"];
        $mon = $_POST["mon"];
        $mot = $_POST["mot"];
        $fe = $_POST["fe"];
        $idDoc = $_POST["idDoc"];
        $retiros->agragarReti($rp, $tm, $mon, $mot, $fe, $idDoc);

    }

    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $rp = $_POST["rp"];
        $tm = $_POST["tm"];
        $mon = $_POST["mon"];
        $mot = $_POST["mot"];
        $fe = $_POST["fe"];
        $idDoc = $_POST["idDoc"];
        $retiros->editarReti($id, $rp, $tm, $mon, $mot, $fe, $idDoc);
    }

    if (isset($_POST["idd"])) {
        $id = $_POST["idd"];
        $retiros->eliminarReti($id);
    }

    function obtenerRetiros()
    {
        $x = new Administracion();
        $filas = $x->seleccionarReti();
        return $filas;
    }

    $x = json_encode(obtenerRetiros());
    echo $x;



?>