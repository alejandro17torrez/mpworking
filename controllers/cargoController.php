<?php 

    require '../models/Auxiliares.php';

    $cargos = new Auxiliares();


    if (isset($_POST["add"])) {
        $ncar = $_POST["ncar"];
        $cargos->insertar_cargos($ncar);
    }
    
    if (isset($_POST["id"])) {        
        $id = $_POST["id"];
        $ncare = $_POST["ncare"];
        $cargos->actualizar_cargos($ncare, $id);       
    }
    
    if (isset($_POST["idd"])) {
        
        $id = $_POST["idd"];
        $cargos->eliminar_cargos($id);
    }

    function get_cargos()
    {
        $x = new Auxiliares();
        $filas = $x->seleccionar_cargos();
        return $filas;
    }
    

    function printing_results()
    {
        $cargos = json_encode(get_cargos());
        echo $cargos;

    }

    printing_results();

?>
