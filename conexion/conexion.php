<?php 


class Conexion
{
	public function Conectar()
	{
		$conn = null;
		$host = '127.0.0.1';
		$db = 'multipro';
		$user = 'root';
		$pwd = '';
		try {
			$conn = new PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8', $user, $pwd);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch (PDOException $e) {
			echo ':( Error al conectar con la base de datos'.$e->getMessage();
			exit;
		}
		
		return $conn;
	}	
}
	
	

?>



	