<?php
$conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");

$ID=$_POST['txtID'];

$consulta_1="DELETE FROM telefono where idTelefono = '$ID' ";
$consulta_4="DELETE FROM ciudad where idCiudad = '$ID' ";
$consulta_3="DELETE FROM cod_postal where idCod_postal = '$ID' ";
$consulta_2="DELETE FROM direccion where idDireccion = '$ID' ";
$consulta_5="DELETE FROM correo where idCorreo = '$ID' ";
$consulta_6="SELECT * FROM admin WHERE idAdmin = '$ID'";
$consulta_6_1="";
$consulta_7="";
$consulta_8="DELETE FROM proveedor WHERE idProveedor = '$ID'";
$consulta_9 = "DELETE FROM persona WHERE idPersona = '$ID'";
$consulta_10 = "DELETE FROM tipo_documento WHERE idTipo_Documento = '$ID'";

$validadacion = mysqli_query($conexion,$consulta_6);

$arrayDatos = array();
$arrayDatos2 = array();
$arrayDatos = mysqli_fetch_row($validadacion);
empty($arrayDatos);

if ($arrayDatos == 0) {
    $consulta_6="DELETE FROM cliente where idCliente = '$ID' ";
    $consulta_6_1="SELECT usuario FROM validacion INTERSECT SELECT validacion_nombre FROM 
    cliente WHERE idCliente = '$ID'";
    $validadacion = mysqli_query($conexion,$consulta_6_1);
    $arrayDatos2 = mysqli_fetch_row($validadacion);
    $consulta_7="DELETE FROM validacion where usuario = '$arrayDatos2[0]'";

}else {
    $consulta_6="DELETE FROM admin where idAdmin = '$ID' ";
    $consulta_6_1="SELECT usuario FROM validacion INTERSECT SELECT validacion_nombre FROM 
    admin WHERE idAdmin = '$ID'";
    $validadacion = mysqli_query($conexion,$consulta_6_1);
    $arrayDatos2 = mysqli_fetch_row($validadacion);
    $consulta_7="DELETE FROM validacion where usuario = '$arrayDatos2[0]'";
}




$resultado = mysqli_query($conexion,$consulta_1);
$resultado = mysqli_query($conexion,$consulta_2);
$resultado = mysqli_query($conexion,$consulta_3);
$resultado = mysqli_query($conexion,$consulta_4);
$resultado = mysqli_query($conexion,$consulta_5);
$resultado = mysqli_query($conexion,$consulta_6);
$resultado = mysqli_query($conexion,$consulta_7);
$resultado = mysqli_query($conexion,$consulta_8);
$resultado = mysqli_query($conexion,$consulta_9);
$resultado = mysqli_query($conexion,$consulta_10);

include_once('crud-index-admin-user.php');

?>
<script>

Swal.fire({
    icon: 'success',
    title: 'Eliminacion Exitosa',
    text: 'Se ha elimidado los datos en la base de datos',
    
})

    
</script>
<?php


?>