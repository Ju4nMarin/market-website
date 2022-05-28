<?php
$conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");

$ID=$_POST['ID'];
$Nombre=$_POST['Nombre'];
$Peso=$_POST['Peso'];
$Color=$_POST['Color'];
$Categoria=$_POST['Categoria'];
$Imagen= addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

$consulta_1="UPDATE `producto` SET `Nombre` = '$Nombre', `Peso` = 
'$Peso', `Color` = '$Color', `Categoria` = '$Categoria', `Imagen` = 
'$Imagen' WHERE `idProducto` = '$ID';";

$resultado = mysqli_query($conexion,$consulta_1);


include_once('crud2-index-admin-productos.php');

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