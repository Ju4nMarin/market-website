<?php
$conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");

$ID=$_POST['ID'];
$unidades=$_POST['unidades'];
$precio=$_POST['precio'];


$consulta_1="UPDATE `entrada_inventario` SET `Valor_de_compra` = '$precio', `Cantidad_disponible` = 
'$unidades'WHERE `idEntrada_Inventario` = '$ID';";

$resultado = mysqli_query($conexion,$consulta_1);


include_once('index.php');

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