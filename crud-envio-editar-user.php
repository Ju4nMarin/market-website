<?php
$conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");

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
$Calle=$_POST['Calle'];
$Num=$_POST['Num'];
$CodigoPostal=$_POST['Codigo-postal'];
$Zona=$_POST['Zona'];
$Ciudad=$_POST['Ciudad'];

$consulta_1="UPDATE `persona` SET `Identificacion` = '$Identificacion', `nom1` = 
'$PrimerNombre', `nom2` = '$SegundoNombre', `apell1` = '$PrimerApellido', `apell2` = 
'$SegundoApellido' WHERE `idPersona` = '$ID';";

$consulta_2 ="UPDATE `direccion` SET `calle` = '$Calle', `Nom_C` = '$Num' WHERE `idDireccion` = '$ID';";

$consulta_3 ="UPDATE `cod_postal` SET `Zona` = '$Zona', `Num` = '$CodigoPostal' WHERE `idCod_postal` = '$ID';";

$consulta_4 = "UPDATE `ciudad` SET `Nombre` = '$Ciudad' WHERE `idCiudad` = '$ID';";

$consulta_5 = "UPDATE `telefono` SET `Num` = '$Telefono' WHERE `idTelefono` = '$ID';";

$consulta_6 = "UPDATE `tipo_documento` SET `Codigo` = '$Codigo', `Nombre` = '$Nombre' WHERE `idTipo_Documento` = '$ID';";

$consulta_7 = "UPDATE `correo` SET `Correo` = '$Correo' WHERE `idCorreo` = '$ID';";

$resultado = mysqli_query($conexion,$consulta_1);
$resultado = mysqli_query($conexion,$consulta_2);
$resultado = mysqli_query($conexion,$consulta_3);
$resultado = mysqli_query($conexion,$consulta_4);
$resultado = mysqli_query($conexion,$consulta_5);
$resultado = mysqli_query($conexion,$consulta_6);
$resultado = mysqli_query($conexion,$consulta_7);

include_once('crud-index-admin-user.php');

?>
    <script>

    Swal.fire({
        icon: 'success',
        title: 'Enviado',
        text: 'Se ha Actualizado Los datos'
        
    })

        
    </script>
    <?php

?>