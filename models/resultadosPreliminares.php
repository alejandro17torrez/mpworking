<?php

require "../conexion/conexion.php";

class RPreliminares 
{
    
    private $sql = null;
    private $query = null;
    private $data = null;
    private $conexion = null;
    private $enlace = null;

    function __construct()
    {
        $this->conexion = new Conexion();
        $this->enlace = $this->conexion->Conectar();
        $this->data = null;
        $this->query = null;
        $this->sql = null;
    }

    //metodos de inserción:

    public function insertarComprobante($fecha, $coopid, $detid)
    {
        $data = [
            'fecha' => $fecha,
            'coopid' => $coopid,
            'detid' => $detid,
        ];
        $sql = "INSERT INTO `comprobante_diario`(`fecha`, `sumasIguales`, `cooperativa_id`, `detalle_id`, `created_at`) VALUES (:fecha, null , :coopid , :detid)";
        $query = $this->enlace->prepare($sql);
        $query->execute($data);
        return $query;
    }






}






?> 