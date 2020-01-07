<?php 

    require '../models/Auxiliares.php';

    $grupos = new Auxiliares();

    if (isset($_POST["add"])) {
    
        $ngr = $_POST["ngr"];
        $grupos->insertar_grupo($ngr);
        
    }
    
    if (isset($_POST["id"])) {
        
        $id = $_POST["id"];
        $ngre = $_POST["ngre"];
        $grupos->actualizar_grupo($ngre, $id);
    }
    
    if (isset($_POST["idd"])) {
        
        $id = $_POST["idd"];
        $grupos->eliminar_grupo($id);
        
    }

    function get_grupo()
    {
        $x = new Auxiliares();
        $filas = $x->seleccionar_grupo();
        return $filas;
    }

    function printing_results()
    {
        $grupos = json_encode(get_grupo());
        echo $grupos;

    }

    printing_results();



?>