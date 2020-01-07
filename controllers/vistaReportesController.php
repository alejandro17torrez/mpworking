<?php
    require '../models/Resumen_saldos.php';
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
        default:{
            echo "NO ESPECIFICASTE BIEN EL PARAMETRO";
         }
        break;
     }

     function mostrar()
     {
        $objeto = new Saldos();
        $mes = $_POST["mes"];
        $idCooperativa = $_POST["idcoop"];
        //ahora a llamar el metodo
        $objeto->verTotalSaldoGruposPorMes($idCooperativa,$mes);
     }
?>