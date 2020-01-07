<?php

   require '../models/facturas.php';

    $factura = new Facturas();

    if (isset($_POST["add"])) {
        $numeroFactura = $_POST["numeroFactura"];
        $tipoMoneda = $_POST["tipoMoneda"];
        $fecha = $_POST["fecha"];
        $nombreProveedor = $_POST["nombreProveedor"];
        $numeroRUC = $_POST["numeroRUC"];
        $concepto = $_POST["concepto"];
        $tipopago = $_POST["tipopago"];
        $cuenta = $_POST["cuenta"];
        $baucher = $_POST["baucher"];
        $iva = $_POST["iva"];
        $cantidad = $_POST["cantidad"];
        $subtotal = $_POST['subtotal'];
        $idCoop = $_POST["idCoop"];
        $x = $_POST["x"];
        $producto = json_decode($x, true);
    
        echo "TODO ESTA BIEN XD: ". $numeroFactura. " , ". $tipoMoneda. " , ". $fecha. " , ". $nombreProveedor. " , ". $numeroRUC. " , ". $concepto. " , ". $cantidad. " , ".$subtotal. " , ". $tipopago. " , ". $cuenta. " , ". $baucher. " , ".$iva. " , ".$x; 

       $factura->insertar_factura_con_comprobante_diario($numeroFactura, $tipoMoneda, $fecha, $nombreProveedor, $numeroRUC, $concepto, $baucher, $tipopago, $subtotal, $iva, $cantidad, $idCoop, $producto, $cuenta);
       


    }

    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $num = $_POST["num"];
        $tm = $_POST["tm"];
        $fe = $_POST["fe"];
        $prov = $_POST["prov"];
        $ruc = $_POST["ruc"];
        $con = $_POST["con"];
        $tpago = $_POST["tpago"];
        $subt = $_POST["subt"];
        $iva = $_POST["iva"];
        $t = $_POST["t"];
        $idDoc = $_POST["idDoc"];
        //$factura->editarFac($id, $num, $tm, $fe, $prov, $ruc, $con, $tpago, $subt, $iva, $t, $idDoc);
    }

    if (isset($_POST["idd"])) {
        $id = $_POST["idd"];
        //$factura->eliminarFac($id);
    }

    /*
    function obtenerFacturas()
    {
        $x = new Administracion();
        $filas = $x->seleccionarFac();
        return $filas;
    }

    $x = json_encode(obtenerFacturas());
    echo $x;
    */



?>