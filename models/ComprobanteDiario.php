<?php

use ___PHPSTORM_HELPERS\PS_UNRESERVE_PREFIX_this;

require "../conexion/conexion.php";

class Comprobante{
    private $conexion, $enlace, $sql, $execute, $data, $filas, $dato, $debe, $haber, $date, $asiento, $numero, $comprobante, $documento, $concepto, $signo, $grupo;
    private $id, $nombre,$codigo, $cuenta, $descripcion, $codigo_recortado;

    //constructor de clase
    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->enlace = $this->conexion->Conectar();
        $this->sql = null;
        $this->execute = null;
        $this->data = null;
        $this->numero = null;
        $this->comprobante = null;
        $this->grupo = null;
        $this->id = null;
        $this->nombre = null;
        $this->codigo = null;
        $this->cuenta = null;
        $this->descripcion = null;
    }

    public function verComprobantesConDescripcionPorMes($vidCooperativa,$vMes)
    {
        $this->data = [
            'idCoop' => $vidCooperativa,
            'mes'=>$vMes,
        ];
        $this->sql = "SELECT comprobante_diario.asiento,fecha,concepto,comprobante_diario.id FROM comprobante_diario,conceptos 
        WHERE 
        comprobante_diario.cooperativa_id = :idCoop AND 
        MONTH (comprobante_diario.fecha) = :mes AND 
        (conceptos.id = (SELECT cuentas_conceptos.conceptos AS Id_concepto FROM cuentas_conceptos 
            WHERE id = comprobante_diario.detalle_id))";
        $this->execute = $this->enlace->prepare($this->sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $this->execute->execute($this->data);
        $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);
        //esto va para el javascript wachin
        echo json_encode($this->filas);
    }

    public function verComprobantesConDescripcion($vidCooperativa)
    {
        $this->data = [
            'idCoop' => $vidCooperativa,
        ];
        $this->sql = "SELECT comprobante_diario.asiento,fecha,concepto,comprobante_diario.id FROM comprobante_diario,conceptos 
        WHERE 
        comprobante_diario.cooperativa_id=:idCoop AND 
        (conceptos.id = (SELECT cuentas_conceptos.conceptos AS Id_concepto FROM cuentas_conceptos 
            WHERE id = comprobante_diario.detalle_id))";
        $this->execute = $this->enlace->prepare($this->sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $this->execute->execute($this->data);
        $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);
        //esto va para el javascript wachin
        echo json_encode($this->filas);
    }

    public function verMovimientosPorIdComprobante($vIdComprobante)
    {
        $this->data = [
            'idCompr' => $vIdComprobante,
        ];
        $this->sql = "SELECT cat.codigo, cat.cuenta, mo.parcial, debe, haber 
        FROM movimientos mo, cuentas_conceptos coo, 
        cuentas_cooperativas cc, catalogo cat, comprobante_diario cd
        WHERE mo.cuenta_id = coo.id AND 
        coo.cuentas_coop = cc.id AND 
        cc.cuenta = cat.id AND 
        mo.comprobante_id = cd.id AND cd.id = :idCompr";
        $this->execute = $this->enlace->prepare($this->sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $this->execute->execute($this->data);
        $this->filas = $this->execute->fetchAll(PDO::FETCH_ASSOC);
        //esto va para el javascript wachin
        echo json_encode($this->filas);
    }
}

?>	