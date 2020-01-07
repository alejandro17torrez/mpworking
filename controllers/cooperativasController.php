<?php 

	require '../models/Cooperativas.php';

    $cooperativas = new Cooperativa();
    

    if (isset($_POST["add"])){
    echo "ENTRE!!";

    $nombre = $_POST["nc"];
    $resolucion = $_POST["rc"];
    $ruc = $_POST["nr"];
    $user = $_POST["un"];
    $pass = $_POST["pass"];


    $cooperativas->agragarCooperativa($nombre, $resolucion, $ruc, $user, $pass);
    
    }

    if (isset($_POST["id"])){

    echo "EXITO AL ENTRAR";    

    $id = $_POST["id"];
    $iduser = $_POST["iduser"];
    $nombre = $_POST["nc"];
    $resolucion = $_POST["rc"];
    $ruc = $_POST["nr"];
    $user = $_POST["un"];
    $pass = $_POST["pass"];
    $cooperativas->editarCooperativa($id, $iduser, $nombre, $resolucion, $ruc, $user, $pass);

    }

    if (isset($_POST["idd"])) {

        $id = $_POST["idd"];
        $cooperativas->eliminarCooperativa($id);


    }

    function cooperativaGetCooperativasController()
    {
        $x = new Cooperativa();
        $filas = $x->seleccionarCooperativa();
        return $filas;
    }


    $x = json_encode(cooperativaGetCooperativasController());
    echo $x;
    

    
    /**
     * summary
     */
    /*
    class CooperativaController 
    {
    
        public function __construct()
        {
            
        }
       

        public function createCooperativa()
        {
            $cooperativas = new Cooperativa();
            $cooperativas->agragarCooperativa($_POST["nc"], $_POST["rc"], $_POST["nr"]);

        }


    }
    */
 ?>