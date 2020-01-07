<?php 

	require "../conexion/conexion.php";

	/**
	 * summary
	 */


    class Cuentas_cooperativas                                                   
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

	    public function agragarCuenta_conceptos($cuecoop, $copnt, $signo){
			$data = [
				'cuecoop' => $cuecoop,
				'copnt' => $copnt,
				'signo' => $signo,
			];

			$sql = "INSERT INTO cuentas_conceptos (cuentas_coop, conceptos, signo) VALUES (:cuecoop, :copnt, :signo)";
			$x = $this->enlace->prepare($sql);
			$x->execute($data);
		}



		public function  agragarCuenta_cooperativas($cp, $ce, $sal){
			$data = [
				'cp' => $cp,
				'ce' => $ce,
				'sal' => $sal,
			];

			$sql = "INSERT INTO cuentas_cooperativas (cooperativa, cuenta, saldo) VALUES (:cp, :ce, :sal)";
			$x = $this->enlace->prepare($sql);
			$x->execute($data);
		}



		public function editarCuenta_cooperativas($id, $cp, $ce, $sal){
			
			echo "<br>"."modelo"."<br>".$id, $cp, $ce, $sal;
			$data = [
				'id' => $id,
				'cp' => $cp,
				'ce' => $ce,
				'sal' => $sal,
			];

			$sql = "UPDATE cuentas_cooperativas SET cooperativa = :cp, cuenta = :ce, saldo = :sal WHERE id = :id";
			$x = $this->enlace->prepare($sql);
			$x->execute($data);
		}



		public function editarCuenta_conceptos($id, $conceptocc, $signocc){
			
			echo "<br>"."modelo"."<br>".$id, $conceptocc, $signocc;
			$data = [
				'id' => $id,
				'conceptocc' => $conceptocc,
				'signocc' => $signocc,
			];

			$sql = "UPDATE cuentas_conceptos SET conceptos = :conceptocc, signo = :signocc WHERE id = :id";
			$x = $this->enlace->prepare($sql);
			$x->execute($data);
		}

		public function seleccionarCuentasCooperativas(){
			
			$query = "SELECT CC.id, COO.nombre_cooperativa, 
			CA.cuenta, CA.codigo, CC.saldo
			FROM cooperativa COO, catalogo CA, 
			cuentas_cooperativas CC
			WHERE COO.id = CC.cooperativa AND CA.id = CC.cuenta 
			ORDER BY codigo
			";
			$x = $this->enlace->prepare($query);
			$x->execute();
			$filas['data'] = $x->fetchAll(PDO::FETCH_OBJ);
			return $filas; 
		}


		public function seleccionarCuentasConceptos(){
			
			$query = "SELECT con.id, co.nombre_cooperativa, ca.codigo, 

			ca.cuenta, cps.concepto, con.signo  
			FROM cuentas_conceptos con, cuentas_cooperativas 
			
			coo, catalogo ca, cooperativa co, conceptos cps 
			WHERE con.cuentas_coop = coo.id AND ca.id = 
			
			coo.cuenta AND co.id = coo.cooperativa AND cps.id = 
			
			con.conceptos ORDER BY codigo
			
			";
			$x = $this->enlace->prepare($query);
			$x->execute();
			$filas['data'] = $x->fetchAll(PDO::FETCH_OBJ);
			return $filas; 
		}


		public function eliminarCuenta_cooperativas($id){
			$data = [
				'id' => $id,
			];
			$sql = "DELETE FROM cuentas_cooperativas WHERE `id` = :id";
			$x = $this->enlace->prepare($sql);
			$x->execute($data);
		}

		public function eliminarCuenta_conceptos($id){
			$data = [
				'id' => $id,
			];
			$sql = "DELETE FROM cuentas_conceptos WHERE `id` = :id";
			$x = $this->enlace->prepare($sql);
			$x->execute($data);
		}

	}

	
?>
