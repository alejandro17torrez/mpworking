<?php 

	require "../conexion/conexion.php";

	/**
	 * summary
	 */


    class Cuenta                                                   
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

	    public function agragarCuenta($codigoCuentas, $descripcionCuentas, $grupoCuenta, $subGrupoCuenta, $tipoCuenta){
			

			$data =
			[
				':cc'=>$codigoCuentas, ':dc'=>$descripcionCuentas, ':gc'=>$grupoCuenta, 
				':sgc'=> $subGrupoCuenta , 
				':tc'=> $tipoCuenta
			];

			$query = "INSERT INTO catalogo (codigo, cuenta, grupo, subgrupo, tipo) VALUES (:cc, :dc, :gc, :sgc, :tc)";
			$x = $this->enlace->prepare($query);
			$x->execute($data);
		}

		public function ucuentas($id, $codigoCuentas, $descripcionCuentas, $grupoCuenta, $subGrupoCuenta, $tipoCuenta){
			
			$data = [
				'id' => $id,
				'cc' => $codigoCuentas,
				'dc' => $descripcionCuentas,
				'gc' => $grupoCuenta,
				'sgc' => $subGrupoCuenta,
				'tc' => $tipoCuenta,
			];
			$query = "UPDATE catalogo SET codigo =:cc, cuenta =:dc, grupo =:gc, subgrupo =:sgc, tipo =:tc WHERE id =:id";
			$x = $this->enlace->prepare($query);
			$x->execute($data);
		}

		public function seleccionarCuenta(){
			
			$query = "SELECT caa.id, caa.codigo, caa.cuenta, gr.grupo, sgr.subgrupo, tc.tipo 
			FROM catalogo caa, grupos gr, subgrupos sgr, tipo_cuenta tc
			WHERE caa.grupo = gr.id AND caa.subgrupo = sgr.id AND caa.tipo = tc.id";
			$x = $this->enlace->prepare($query);
			$x->execute();
			$filas['data'] = $x->fetchAll(PDO::FETCH_OBJ);
			return $filas; 
		}


		public function eliminarCuenta($id){
			
			$query = "DELETE FROM catalogo WHERE codigo =:bdId";
			$x = $this->enlace->prepare($query);
			$x->execute(array(':bdId'=>$id));
			return $x;
		}


		/*
		Conceptos
		*/


		public function agragarCon($con){
			
			$query = "INSERT INTO conceptos (concepto) VALUES (:con)";
			$x = $this->enlace->prepare($query);
			$x->execute(array(':con'=>$con));
		}

		public function editarCon($id, $con){
			$data = [
				'id' => $id,
				'con' => $con,
			];
			$query = "UPDATE conceptos SET concepto =:con WHERE id =:id";
			$x = $this->enlace->prepare($query);
			$x->execute($data);
		}

		public function seleccionar_conceptos(){
			
			$query = "SELECT id, concepto FROM conceptos";
			$x = $this->enlace->prepare($query);
			$x->execute();
			$filas['data'] = $x->fetchAll(PDO::FETCH_OBJ);
			return $filas; 
		}


		public function eliminarCon($id){
			$data = [
				'id' => $id,
			];
			$query = "DELETE FROM conceptos WHERE id =:id";
			$x = $this->enlace->prepare($query);
			$x->execute($data);
			
		}

	}
	
?>

	

 