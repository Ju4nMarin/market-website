<?php

include_once 'includes/user.php';
include_once 'includes/user_session.php';

$userSession = new UserSession();
$user = new User();


if(isset($_SESSION['user'])){
    //echo "Hay sesión";
    $user->setUser($userSession->getCurrentUser());
    $conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");
    $consulta = "SELECT idCliente FROM cliente WHERE validacion_nombre = '$user'";
    $validacion_usuario = mysqli_query($conexion,$consulta);
    $arrayDatos = array();
    $arrayDatos = mysqli_fetch_row($validacion_usuario);
    $consulta2 ="SELECT idProveedor FROM proveedor WHERE idProveedor = '$arrayDatos[0]'";
    $validacion_usuario2 = mysqli_query($conexion,$consulta2);
    $arrayDatos2 = array();
    
    $arrayDatos2 = mysqli_fetch_row($validacion_usuario2);
    $ID_PROV = "";
    empty($arrayDatos2);

    if ($arrayDatos2 == 0) {
        include_once 'home2.php';
    }else {
        $ID_PROV = $arrayDatos2[0];
        include_once 'home-proveedor.php';
    }
    

}else if(isset($_POST['username']) && isset($_POST['password'])){
    //echo "Validación de login";

    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    if($user->userExists($userForm, $passForm)){
        //echo "usuario validado";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
        
        $conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");
        $consulta = "SELECT idCliente FROM cliente WHERE validacion_nombre = '$userForm'";
        $validacion_usuario = mysqli_query($conexion,$consulta);
        $arrayDatos = array();
        $arrayDatos = mysqli_fetch_row($validacion_usuario);
        $consulta2 ="SELECT idProveedor FROM proveedor WHERE idProveedor = '$arrayDatos[0]'";
        $validacion_usuario2 = mysqli_query($conexion,$consulta2);
        $arrayDatos2 = array();
        $arrayDatos2 = mysqli_fetch_row($validacion_usuario2);
        $ID_PROV = "";
        empty($arrayDatos2);

        if ($arrayDatos2 == 0) {
            include_once 'home2.php';
            
        }else {
            $ID_PROV = $arrayDatos2[0];
            include_once 'home-proveedor.php';
        }
        
        
        
    }else{
        if ($userForm == "" || $passForm == "" ) {
            include_once 'index.html';
            ?>
            <script src="js/sweetAlert-2.js"></script>
            <?php
        }else {
            //echo "nombre de usuario y/o password incorrecto";
            include_once 'index.html';
            ?>
            <script src="js/sweetAlert.js"></script>
            <?php
        }
    }

}else{
    //echo "Login";
    include_once 'index.html';
}


?>