<?php

    require '../models/ComprobanteDiario.php';

    $cheques = new Comprobante();

    if (isset($_POST["add"])) {
        $fe = $_POST['fe'];
        $idf = $_POST['idf'];
        $fe = $_POST['co'];
        $fe = $_POST[''];
        
    }

    if (isset($_POST["id"])) {
        $id = $_POST['id'];
        $fe = $_POST['fe'];
        $idf = $_POST['idf'];
        $fe = $_POST['co'];
        $fe = $_POST[''];
    }

    if (isset($_POST["idd"])) {
        $id = $_POST['idd'];
    }

    function obtenercheques()
    {
        $x = new Administracion();
        $filas = $x->seleccionarCh();
        return $filas;
    }
    
    $x = json_encode(obtenercheques());
    echo $x;


?>