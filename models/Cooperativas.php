<?php 

	require "../conexion/conexion.php";

	/**
	 * summary
	 */

	 

    class Cooperativa                                                   
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

	    public function agragarCooperativa($nombreCooperativa, $resolucionCooperativa, $numroRUC, $user, $pass){
			$data = [
				'ncoop' => $nombreCooperativa,
				'rcoop' => $resolucionCooperativa,
				'rucoop' => $numroRUC,
			];
			$query = "INSERT INTO cooperativa (nombre_cooperativa, resolucion_cooperativa, numero_ruc) VALUES (:ncoop, :rcoop, :rucoop)";
			$x = $this->enlace->prepare($query);
			$x->execute($data);

			$query = "SELECT id FROM cooperativa ORDER BY id DESC LIMIT 1";
			$x = $this->enlace->prepare($query);
			$x->execute();
			$filas = $x->fetchAll(PDO::FETCH_ASSOC);

			$idCooperativa = null;

			foreach ($filas as $fila) {
				$idCooperativa = $fila['id'];
			}

			$dataUser = [
				'user' => $user,
				'pass' => $pass,
				'id' => $idCooperativa,
			];

			$query = "INSERT usuarios (password, id_cooperativa, usuario)
			VALUES (:pass, :id, :user)";
			$x = $this->enlace->prepare($query);
			$x->execute($dataUser);

		}

		public function editarCooperativa($id, $iduser, $nombreCooperativa, $resolucionCooperativa, $numroRUC, $user, $pass){
			$data = [
				'id' => $id,
				'ncoop' => $nombreCooperativa,
				'rcoop' => $resolucionCooperativa,
				'rucoop' => $numroRUC,
			];
			$query = "UPDATE cooperativa SET nombre_cooperativa = :ncoop, resolucion_cooperativa = :rcoop, numero_ruc = :rucoop WHERE id = :id";
			$x = $this->enlace->prepare($query);
			$x->execute($data);
			
			$data = [
				'id' => $id,
				'iduser' =>  $iduser,
				'user' => $user,
				'pass' => $pass,
			];

			$query = "UPDATE usuarios SET password = :pass, id_cooperativa = :id, usuario = :user WHERE id = :iduser";
			$x = $this->enlace->prepare($query);
			$x->execute($data);
		}

		public function seleccionarCooperativa(){
			
			$query = "SELECT coop.id, coop.nombre_cooperativa, coop.resolucion_cooperativa, us.id  AS idus, coop.numero_ruc, us.usuario, us.password FROM cooperativa coop, usuarios us WHERE us.id_cooperativa = coop.id";
			$x = $this->enlace->prepare($query);
			$x->execute();
			$filas['data'] = $x->fetchAll(PDO::FETCH_OBJ);
			return $filas;	 
		}

		public function eliminarCooperativa($id){
			
			$data = [
				'id' => $id,
			];
			$query = "DELETE FROM cooperativa WHERE `id` = :id";
			$x = $this->enlace->prepare($query);
			$x->execute($data);
			return $x;
		}



		/*
		Socios
		*/
		
		
		public function agragarSocio($nI, $nII, $aI, $aII, $car, $fn, $ced, $idCoop){
			$data = [
				'nI' => $nI,
				'nII' => $nII,
				'aI' => $aI,
				'aII' => $aII,
				'car' => $car,
				'fn' => $fn,
				'ced' => $ced,
				'idcoop' => $idCoop,
			];
			$query = "INSERT INTO `socios`(`nombreI`, `nombreII`, `apellidoI`, `apellidoII`, `cargo`, `fechaNacimiento`, `cedula`, `cooperativa_id`) VALUES (:nI, :nII ,:aI, :aII, :car, :fn, :ced, :idcoop)";
			$x = $this->enlace->prepare($query);
			$x->execute($data);
			return $x;
		}

		public function editarSocio($id, $nI, $nII, $aI, $aII, $car, $fn, $ced, $idCoop){
			$data = [
				'id' => $id,
				'nI' => $nI,
				'nII' => $nII,
				'aI' => $aI,
				'aII' => $aII,
				'car' => $car,
				'fn' => $fn,
				'ced' => $ced,
				'idcoop' => $idCoop,
			];
			$query = "UPDATE `socios` SET `nombreI`=:nI,`nombreII`=:nII,`apellidoI`=:aI,`apellidoII`=:aII,`cargo`=:car,`fechaNacimiento`=:fn,`cedula`=:ced,`cooperativa_id`=:idcoop WHERE `id`=:id";
			$x = $this->enlace->prepare($query);
			$x->execute($data);
			return $x;
		}

		public function seleccionarSocio(){
			
			$query = "SELECT so.id, coo.nombre_cooperativa, so.nombreI, 
			so.nombreII, so.apellidoI, so.apellidoII,  
			so.cedula, so.fechaNacimiento, ca.`desc`
			FROM socios so INNER JOIN cargos ca ON so.cargo = 
			ca.id INNER JOIN cooperativa coo ON 
			so.cooperativa_id = coo.id
			 ";
			$x = $this->enlace->prepare($query);
			$x->execute();	
			$filas['data'] = $x->fetchAll(PDO::FETCH_OBJ);
			return $filas;
			
			 
		}

	

		public function eliminarSocio($id){
			$data = [
				'id' => $id,
			];
			$query = "DELETE FROM `socios` WHERE `id` = :id;";
			$x = $this->enlace->prepare($query);
			$x->execute($data);
			return $x;
		}
	}


	
?>

	

 