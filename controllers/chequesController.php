<?php

    require '../models/cheques.php';

    $cheques = new Cheques();

    if (isset($_POST["add"])) {
        $idcoopch = $_POST['idcoopch'];
	    $numeroCuenta =  $_POST['numeroCuenta'];
	    $numeroCheque =  $_POST['numeroCheque'];
	    $departamentoCheque =  $_POST['departamentoCheque'];
	    $fechaCheque =  $_POST['fechaCheque'];
	    $nombre =  $_POST['nombre'];
	    $monedaCheque =  $_POST['monedaCheque'];
	    $cantidadCheque =  $_POST['cantidadCheque'];
	    $cantidadLetrasCheque =  $_POST['cantidadLetrasCheque'];
        $conceptoCheque =  $_POST['conceptoCheque']; 

        echo $idcoopch. " , ". $numeroCuenta. " , ". $numeroCheque. " , ". $departamentoCheque. " , ". $fechaCheque. " , ". $nombre. " , ". $monedaCheque. " , ". $cantidadCheque. " , ". $cantidadLetrasCheque. " , ". $conceptoCheque;
        $cheques->insertar_cheque_con_comprobante_diario($numeroCheque, $numeroCuenta, $nombre, $monedaCheque, $cantidadCheque, $cantidadLetrasCheque, $conceptoCheque, $departamentoCheque, $fechaCheque, $idcoopch);
        

    }

    if (isset($_POST["id"])) {
        
    }

    if (isset($_POST["idd"])) {
        
    }

    function obtenercheques()
    {
        //$x = new Administracion();
       // $filas = $x->seleccionarCh();
       // return $filas;
    }
    


?>