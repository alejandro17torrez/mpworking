<?php 

    require '../models/Auxiliares.php';

    $tipo = new Auxiliares();



    if (isset($_POST["add"])) {
        $ntc = $_POST["ntc"];
        $tipo->insertar_tipo($ntc);
    }
    
    if (isset($_POST["id"])) {
        
        $id = $_POST["id"];
        $ntce = $_POST["ntce"];
        $tipo->actualizar_tipo($ntce, $id);
    }
    
    if (isset($_POST["idd"])) {
        
        $id = $_POST["idd"];
        $tipo->eliminar_tipo($id);
    }


    function get_tipo()
    {
        $x = new Auxiliares();
        $filas = $x->seleccionar_tipo();
        return $filas;
    }

    function printing_results()
    {
        $tipo = json_encode(get_tipo());
        echo $tipo;
    }

    printing_results();



?>