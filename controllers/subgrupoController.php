<?php 

    require '../models/Auxiliares.php';

    $subgrupo = new Auxiliares();



    if (isset($_POST["add"])) {
    
        $nsgr = $_POST["nsgr"];
        $subgrupo->insertar_subgrupo($nsgr);
    }
    
    if (isset($_POST["id"])) {
        
        $id = $_POST["id"];
        $nsgre = $_POST["nsgre"];
        $subgrupo->actualizar_subgrupo($nsgre, $id);
    }
    
    if (isset($_POST["idd"])) {
        
        $id = $_POST["idd"];
        $subgrupo->eliminar_subgrupo($id);
    }


    function get_subgrupo()
    {
        $x = new Auxiliares();
        $filas = $x->seleccionar_subgrupo();
        return $filas;
    }

    function printing_results()
    {
        $cargos = json_encode(get_subgrupo());
        echo $cargos;

    }

    printing_results();


?>