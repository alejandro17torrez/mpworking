<?php
include 'db.php';

class User extends DB{
    private $nombre;
    public $id;
    private $username;


    public function userExists($user, $pass){
        $md5pass = $pass;
        //echo $md5pass;
        //echo $user;
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE usuario = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT usuarios.`*`,cooperativa.nombre_cooperativa 
            FROM usuarios 
            INNER JOIN cooperativa 
            ON (cooperativa.id = usuarios.id_cooperativa) 
            AND usuarios.usuario =  :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre_cooperativa'];
            $this->username = $currentUser['usuario'];
            $this->id = $currentUser['id_cooperativa'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getId(){
        return $this->id;
    }
}

?>