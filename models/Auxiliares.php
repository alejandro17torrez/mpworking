<?php 

    require "../conexion/conexion.php";
    
    
    class Auxiliares 
    {
        private $conexion, $enlace, $sql, $execute, $data, $filas;

        public function __construct()
        {
            $this->conexion = new Conexion();
            $this->enlace = $this->conexion->Conectar();
            $this->sql = null;
            $this->execute = null;
            $this->data = null;
        }

        public function seleccionar_cargos()
        {
            $this->sql = "SELECT * FROM cargos";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute();
            $this->filas['data'] = $this->execute->fetchAll(PDO::FETCH_OBJ);
            return $this->filas;
        }

        public function seleccionar_grupo()
        {
            $this->sql = "SELECT * FROM grupos";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute();
            $this->filas['data'] = $this->execute->fetchAll(PDO::FETCH_OBJ);
            return $this->filas;
        }

        public function seleccionar_subgrupo()
        {
            $this->sql = "SELECT * FROM subgrupos";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute();
            $this->filas['data'] = $this->execute->fetchAll(PDO::FETCH_OBJ);
            return $this->filas;
        }

        public function seleccionar_tipo()
        {
            $this->sql = "SELECT * FROM tipo_cuenta";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute();
            $this->filas['data'] = $this->execute->fetchAll(PDO::FETCH_OBJ);
            return $this->filas;
        }


        //métodos para actualizar

        public function insertar_cargos($cargo)
        {
            $this->data = [
                'cargo' => $cargo,
            ];

            $this->sql = "INSERT INTO cargos (`desc`) VALUES (:cargo)";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute($this->data);
        
        }

        public function insertar_grupo($grupo)
        {
            $this->data = [
                'grupo' => $grupo,
            ];

            $this->sql = "INSERT INTO grupos (grupo) VALUES (:grupo)";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute($this->data);
            return $this->execute;
        }

        public function insertar_subgrupo($subgrupo)
        {
            $this->data = [
                'subgrupo' => $subgrupo,
            ];

            $this->sql = "INSERT INTO subgrupos (subgrupo) VALUES (:subgrupo)";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute($this->data);
            return $this->execute;
        }

        public function insertar_tipo($tipo)
        {
            $this->data = [
                'tipo' => $tipo,
            ];

            $this->sql = "INSERT INTO tipo_cuenta (tipo) VALUES (:tipo)";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute($this->data);
            return $this->execute;
        }

        // Métodos para actualizar

        public function actualizar_cargos($cargo, $id)
        {
            $this->data = [
                'cargo' => $cargo,
                'id' => $id,
            ];

            $this->sql = "UPDATE cargos SET `desc` = :cargo WHERE id = :id";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute($this->data);
            return $this->execute;
        }

        public function actualizar_grupo($grupo, $id)
        {
            $this->data = [
                'grupo' => $grupo,
                'id' => $id,
            ];

            $this->sql = "UPDATE grupos SET grupo = :grupo WHERE id = :id";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute($this->data);
            return $this->execute;
        }

        public function actualizar_subgrupo($subgrupo, $id)
        {
            $this->data = [
                'subgrupo' => $subgrupo,
                'id' => $id,
            ];

            $this->sql = "UPDATE subgrupos SET subgrupo = :subgrupo WHERE id = :id";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute($this->data);
            return $this->execute;
        }

        public function actualizar_tipo($tipo, $id)
        {
            $this->data = [
                'tipo' => $tipo,
                'id' => $id,
            ];

            $this->sql = "UPDATE tipo_cuenta SET tipo = :tipo WHERE id = :id";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute($this->data);
            return $this->execute;
        }

        // métodos para eliminar 

        public function eliminar_cargos($id)
        {
            $this->data = [
                'id' => $id,
            ];

            $this->sql = "DELETE FROM cargos WHERE id = :id";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute($this->data);
            return $this->execute;
        }

        public function eliminar_grupo($id)
        {
            $this->data = [
                'id' => $id,
            ];

            $this->sql = "DELETE FROM grupos WHERE id = :id";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute($this->data);
            return $this->execute;
        }

        public function eliminar_subgrupo($id)
        {
            $this->data = [
                'id' => $id,
            ];

            $this->sql = "DELETE FROM subgrupos WHERE id = :id";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute($this->data);
            return $this->execute;
        }

        public function eliminar_tipo($id)
        {
            $this->data = [
                'id' => $id,
            ];

            $this->sql = "DELETE FROM tipo_cuenta WHERE id = :id";
            $this->execute = $this->enlace->prepare($this->sql);
            $this->execute->execute($this->data);
            return $this->execute;
        }

    }
    







?>