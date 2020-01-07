<?php
     require '../models/comprobanteDiario.php';
     $parametro=$_POST["parametro"];
     
     switch($parametro)
     {
         case "mostrar":{
            mostrar();
         }
        break;
        case "editar":{
            echo "LE PEDISTE AL SISTEMA EDITAR";
         }
        break;
        case 'mostrarMovimientos':{
            mostrarMovimientos();
        }
         break;
        default:{
            echo "NO ESPECIFICASTE BIEN EL PARAMETRO";
         }
        break;
     }
     
     function mostrar()
     {
        $objeto = new Comprobante();
        $mes = $_POST["mes"];
        $idCooperativa = $_POST["idcoop"];
        if($mes==0) {
           $objeto->verComprobantesConDescripcion($idCooperativa);
        }
        else {
         $objeto->verComprobantesConDescripcionPorMes($idCooperativa,$mes);
        }
     }

     function mostrarMovimientos()
     {
         $objeto = new Comprobante();
         $idComprobante = $_POST["idComp"];
         $objeto->verMovimientosPorIdComprobante($idComprobante);
     }
?>