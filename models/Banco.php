<?php 

	require "../conexion/conexion.php";

	/**
	 * summary
	 */


    class Banco                                                   
	{
	    /**
	     * summary
	     */
	    private $conexion;
	    private $enlace;


	    public function __construct()
	    {
	        $this->conexion = new Conexion();
	        $this->enlace = $this->conexion->Conectar(); 
	    }

	    public function agragarCuenta($nb, $cb, $cc, $tc, $tm){
			$data = [
				'nb' => $nb,
				'cb' => $cb,
				'cc' => $cc,
				'tc' => $tc,
				'tm' => $tm,
			];

			$sql = "INSERT INTO `cb`( `cuenta`, `banco`, `tmoneda`, `tipo`, `coopid`) VALUES (:cb,:nb,:tm,:tc,:cc)";
			$x = $this->enlace->prepare($sql);
			$x->execute($data);
			return $x;
		}

		public function editarCuenta($id, $nb, $cb, $cc, $tc, $tm){
			$data = [
				'id' => $id,
				'nb' => $nb,
				'cb' => $cb,
				'cc' => $cc,
				'tc' => $tc,
				'tm' => $tm,
			];
			$sql = "UPDATE `cb` SET `cuenta`=:cb,`banco`=:nb,`tmoneda`=:tm,`tipo`=:tc,`coopid`=:cc WHERE `id`= :id";
			//$query = "CALL `update_cuentasBancos` ('$id', '$nCuenta', '$mCuenta', '$tCuenta', '$banco', '$idCoop')";
			$x = $this->enlace->prepare($sql);
			$x->execute($data);
			return $x;
		}

		public function seleccionarCuentas(){
			
			$query = "CALL `select_cuentasb`()";
			$x = $this->enlace->prepare($query);
			$x->execute();
			$filas['data'] = $x->fetchAll(PDO::FETCH_OBJ);
			return $filas; 
		}


		public function eliminarCuenta($id){
			$data = [
				'id' => $id,
			];
			$sql = "DELETE FROM `cb` WHERE `id` = :id";
			//$query = "CALL `delete_cuentasBancos` ('$id')";
			$x = $this->enlace->prepare($sql);
			$x->execute($data);
			return $x;
		}

	}

	
?>
