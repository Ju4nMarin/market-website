<?php


$Usuario=$_POST['Usuario'];
$Contrasena=$_POST['Contrasena'];
$Tipo=$_POST['tipo-user'];
$ID=$_POST['ID'];
$Codigo=$_POST['Codigo'];
$Nombre=$_POST['Nombre'];
$Identificacion=$_POST['Identificador'];
$PrimerNombre=$_POST['Primer-Nombre'];
$SegundoNombre=$_POST['Segundo-Nombre'];
$PrimerApellido=$_POST['Primer-Apellido'];
$SegundoApellido=$_POST['Segundo-Apellido'];
$Correo=$_POST['Correo'];
$Telefono=$_POST['Telefono'];
$Carrera=$_POST['Carrera'];
$Calle=$_POST['Calle'];
$Num=$_POST['Num'];
$CodigoPostal=$_POST['Codigo-postal'];
$Zona=$_POST['Zona'];
$Ciudad=$_POST['Ciudad'];



$conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");

$consulta="INSERT INTO `validacion` (`usuario`, `password`) VALUES ('$Usuario', '$Contrasena');";
$consulta_2="INSERT INTO `tipo_documento` (`idTipo_Documento`, `Codigo`, `Nombre`) VALUES ('$ID', '$Codigo', '$Nombre');";
$consulta_3="INSERT INTO `persona` (`idPersona`, `Identificacion`, `Tipo_Documento_idTipo_Documento`, `nom1`, `nom2`, `apell1`, `apell2`) VALUES ('$ID', 
'$Identificacion', '$ID', '$PrimerNombre', '$SegundoNombre', '$PrimerApellido', '$SegundoApellido');";
$consulta_4= "";
$consulta_4_1= "";
$consulta_5= "INSERT INTO `ciudad` (`idCiudad`, `Nombre`) VALUES ('$ID', '$Ciudad');";
$consulta_6= "INSERT INTO `cod_postal` (`idCod_postal`, `Zona`, `Num`, `Ciudad_idCiudad`) VALUES ('$ID', '$Zona', '$CodigoPostal', '$ID');";
$consulta_7= "INSERT INTO `direccion` (`idDireccion`, `carrera`, `calle`, `Nom_C`, `Persona_idPersona`, `Cod_postal_idCod_postal`) VALUES ('$ID', '$Carrera', '$Calle', '$Num', '$ID', '$ID');";
$consulta_8= "INSERT INTO `correo` (`idCorreo`, `Correo`, `Persona_idPersona`) VALUES ('$ID', '$Correo', '$ID');";
$consulta_9= "INSERT INTO `telefono` (`idTelefono`, `Num`, `Persona_idPersona`) VALUES ('$ID', '$Telefono', '$ID');";


if ($Tipo == "cliente") {
    $consulta_4="INSERT INTO `cliente` (`idCliente`, `Persona_idPersona`, `validacion_nombre`) VALUES ('$ID', '$ID', '$Usuario');";
}elseif($Tipo == "admin"){
    $consulta_4="INSERT INTO `admin` (`idAdmin`, `Persona_idPersona`, `validacion_nombre`) VALUES ('$ID', '$ID', '$Usuario');"; 
}else{
    $consulta_4="INSERT INTO `cliente` (`idCliente`, `Persona_idPersona`, `validacion_nombre`) VALUES ('$ID', '$ID', '$Usuario');";
    $consulta_4_1 = "INSERT INTO `proveedor` (`idProveedor`, `Persona_idPersona`) VALUES ('$ID', '$ID');";
}


$consulta_validacion="SELECT usuario FROM validacion WHERE usuario = '$Usuario'";
$consulta_validacion_2="SELECT idTipo_Documento FROM tipo_documento WHERE idTipo_Documento = '$ID'";

$validacion_usuario = mysqli_query($conexion,$consulta_validacion);
$validacion_ID = mysqli_query($conexion,$consulta_validacion_2);

$arrayDatos = array();
$arrayDatos = mysqli_fetch_row($validacion_usuario);

$arrayDatos_2 = array();
$arrayDatos_2 = mysqli_fetch_row($validacion_ID);


empty($arrayDatos);

$temp = "";

if ($Usuario == "") {
    $temp = "";
}elseif ($arrayDatos == 0) {
    $temp = "";
}else{
    $temp = $arrayDatos[0];
}

empty($arrayDatos_2);

$temp2 = "";

if ($Usuario == "") {
    $temp2 = "";
}elseif ($arrayDatos == 0) {
    $temp2 = "";
}else{
    $temp2 = $arrayDatos_2[0];
}




if ($Usuario == $temp || $Usuario == "" && $ID == $temp2 || $ID == "" ) {
    include_once('crud-index-admin-user.php');

    if ($Usuario == "" || $ID == "") {
        ?>
        <script>
            Swal.fire({
            icon: 'warning',
            title: 'Datos en Blanco',
            text: 'No se ingreso un Usuario o ID',
            
        })
        </script>
        <?php
    }else {
        ?>
        <script>
        Swal.fire({
        icon: 'warning',
        title: 'Error',
        text: 'ya hay una persona con el usuario digitado o ID ',
        
        })
        </script>
        <?php
    }
   
}else {
    
    $resultado = mysqli_query($conexion,$consulta);
    $resultado = mysqli_query($conexion,$consulta_2);
    $resultado = mysqli_query($conexion,$consulta_3);
    $resultado = mysqli_query($conexion,$consulta_4);

    if ($Tipo == "proveedor") {
        $resultado = mysqli_query($conexion,$consulta_4_1);
    }

    $resultado = mysqli_query($conexion,$consulta_5);
    $resultado = mysqli_query($conexion,$consulta_6);
    $resultado = mysqli_query($conexion,$consulta_7);
    $resultado = mysqli_query($conexion,$consulta_8);
    $resultado = mysqli_query($conexion,$consulta_9); 
    
    
    

    include_once('crud-index-admin-user.php');
    
    ?>
    <script>

    Swal.fire({
        icon: 'success',
        title: 'Enviado',
        text: 'Se ha registrado los datos nuevos en la base de datos',
        
    })

        
    </script>
    <?php
    
}



?>