<?php

include('db.php');

$USUARIO=$_POST['usuario'];
$PASSWORD=$_POST['password'];


$consulta  = "SELECT * FROM (SELECT usuario,password FROM validacion NATURAL JOIN (SELECT * FROM cliente WHERE validacion_nombre = '$USUARIO')alias1  WHERE validacion_nombre = usuario)alias2  WHERE usuario = '$USUARIO' AND password = '$PASSWORD'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if ($filas){
    header("location:home.php");

}else{
    include("index.html")
    ?>
    <script>
       toastr.error('Usuario o contrasena incorrecta','Error', {
        "progressBar": true,
        "closeButton": true,
        "positionClass": "toast-top-center" 
       }) 
    </script>
    <?php

}

mysqli_free_result($resultado);
mysqli_close($conexion);


class User extends DB{
    public function getNombre(){
        return $this->$USUARIO;
    }
}


?>