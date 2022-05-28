<?php

include_once 'db.php';

class User extends DB{

    private $nombre;
    private $username;

    public function userExists($user, $pass){
        $md5pass = md5($pass);
        $conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");
        $consulta  = "SELECT * FROM (SELECT usuario,password FROM validacion NATURAL JOIN (SELECT * FROM admin WHERE validacion_nombre = '$user')alias1  WHERE validacion_nombre = usuario)alias2  WHERE usuario = '$user' AND password = '$pass'";
        $resultado = mysqli_query($conexion, $consulta);
        $filas = mysqli_num_rows($resultado);

        if ($filas){
            return true;
        
        }else{
            return false;
        }
        
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM validacion WHERE usuario = :user');
        $query->execute(['user' => $user]);

        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['usuario'];
            $this->username = $currentUser['usuario'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
}

?>
