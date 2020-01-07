<?php

require '../models/Amarres.php';

$cuentas = new Cuentas_cooperativas();

if (isset($_POST["add"])) {
    $cp = $_POST['cp'];
    $sal = $_POST['sal'];
    $ce = $_POST['ce'];

    $cuentas->agragarCuenta_cooperativas($cp, $ce, $sal);

}

if (isset($_POST["addd"])) {
    $idcuecop = $_POST['idcuecop'];
    $signocc = $_POST['signocc'];
    $conceptocc = $_POST['conceptocc'];

    $cuentas->agragarCuenta_conceptos($idcuecop, $conceptocc, $signocc);

}

if (isset($_POST["id"])) {
    echo "Edicion!!";
    $id = $_POST['id'];
    $cp = $_POST['cp'];
    $sal = $_POST['sal'];
    $ce = $_POST['ce'];
    $cuentas->editarCuenta_cooperativas($id, $cp, $ce, $sal);

    
}


if (isset($_POST["idx"])) {
    echo "Edicion!!";
    $idx = $_POST['idx'];
    $conceptocc = $_POST['conceptocc'];
    $signocc = $_POST['signo'];
    $signos = null;
    

    if ($signocc == "i") {
        $signos = "=";
        echo $signos, $idx, $conceptocc;
    
    $cuentas->editarCuenta_conceptos($idx, $conceptocc, $signos);
    }
    elseif ($signocc == "m") {
        $signos = "+";  
        echo $signos, $idx, $conceptocc;
    
    $cuentas->editarCuenta_conceptos($idx, $conceptocc, $signos);
        
    }
    elseif ($signocc == "me") {
        $signos = "-";
        echo $signos, $idx, $conceptocc;
    
    $cuentas->editarCuenta_conceptos($idx, $conceptocc, $signos);
    }

    
}


if (isset($_POST["idd"])) {
    
    $id = $_POST["idd"];
    $cuentas->eliminarCuenta_cooperativas($id);   
}


if (isset($_POST["iddx"])) {
    
    $id = $_POST["iddx"];
    $cuentas->eliminarCuenta_conceptos($id);
    
}

function dconceptosGetdConceptosController()
{
    $x = new Cuentas_cooperativas();
    $filas = $x->seleccionarCuentasCooperativas();
    return $filas;
}

$x = json_encode(dconceptosGetdConceptosController());
echo $x;


?>
    