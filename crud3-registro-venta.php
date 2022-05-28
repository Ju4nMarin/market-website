<?php

$ID=$_POST['txtID'];
$ID2=$_POST['txtID2'];
$USUARIO=$_POST['usuario'];

$cantidad=$_POST['unidades'];
$precio=$_POST['precio'];
$Fecha=date('Y-m-s');
$lots = $_POST['lots'];
$cantidadresta = $lots - $cantidad;

if ($cantidad == 0) {
    include_once('index.php');
    ?>
    <script>
        Swal.fire({
        icon: 'warning',
        title: 'Valor no digitado',
        text: 'Ingrese una cantidad del producto deseado',
        
    })
    </script>
    <?php
}else {
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';

    $ID_COMPRAS = substr(str_shuffle($permitted_chars), 0, 8);
    $serial = strtoupper(substr(str_shuffle($permitted_chars), 0,20));


    $subtotal = $precio * $cantidad;



    $conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");

    $consulta="INSERT INTO `detalle_ventas` (`idDetalle_Ventas`, `Ventas_idVentas`,`id_personas`,`Cantidad`,`Subtotal`) VALUES ('$ID_COMPRAS', '$ID_COMPRAS','$ID2','$cantidad','$subtotal');";
    $consulta2="INSERT INTO `ventas` (`idVentas`, `Fecha`,`Serial`,`id_productos`) VALUES ('$ID_COMPRAS', '$Fecha','$serial', '$ID');";
    $consulta3="UPDATE `entrada_inventario` SET `Cantidad_disponible` = 
    '$cantidadresta' WHERE `idEntrada_Inventario` = '$ID';";

    
    
    $resultado = mysqli_query($conexion,$consulta2);
    $resultado = mysqli_query($conexion,$consulta);
    $resultado = mysqli_query($conexion,$consulta3);

    include_once('index.php');
    
    ?>
    <script>

    Swal.fire({
        icon: 'success',
        title: 'Comprado',
        text: 'Su compra se ha registrado con exito',
        
    })

        
    </script>
    <?php
    


}



?>