<?php 

	require "../conexions/conexion.php";

	/**
	 * summary
	 */


    class Administracion                                              
	{
	    /**
	     * summary
	     */
	    private $conexion;
	    private $enlace;


        /**
	     * Recibo de ingreso
	     */

	    public function __construct()
	    {
	        $this->conexion = new Conexion();
	        $this->enlace = $this->conexion->Conectar(); 
	    }

	   
       
	}

	
?>