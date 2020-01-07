<?php

    require '../models/Administracion.php';

    $factura = new Administracion();

    if (isset($_POST["add"])) {
        $cant = $_POST["cant"];
        $desc = $_POST["desc"];
        $pr = $_POST["pr"];
        $t = $_POST["t"];
        $idFac = $_POST["idFac"];
        $factura->agragarFacd($cant, $desc, $pr, $t, $idFac);


    }

    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $cant = $_POST["cant"];
        $desc = $_POST["desc"];
        $pr = $_POST["pr"];
        $t = $_POST["t"];
        $idFac = $_POST["idFac"];
        $factura->editarFacd($id, $cant, $desc, $pr, $t, $idFac);
    }

    if (isset($_POST["idd"])) {
        $id = $_POST["idd"];
        $factura->eliminarFacd($id);
    }

    function obtenerFacturasDetalles()
    {
        $x = new Administracion();
        $filas = $x->seleccionarFacd();
        return $filas;
    }

    $x = json_encode(obtenerFacturasDetalles());
    echo $x;



?>