<?php

$ID=$_POST['ID'];
$Imagen= addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
$Nombre=$_POST['Nombre'];
$Peso=$_POST['Peso'];
$Color=$_POST['Color'];
$Precio=$_POST['Precio'];
$Fecha=$_POST['Fecha'];
$categoria=$_POST['categoria'];
$proveedor=$_POST['proveedor'];




$conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");

$consulta="INSERT INTO `producto` (`idProducto`, `Nombre`,`Peso`,`Color`,`Categoria`,`Imagen`,`Proveedor`) VALUES ('$ID', '$Nombre','$Peso','$Color','$categoria','$Imagen','$proveedor');";
$consulta2="INSERT INTO `detalle_producto` (`idDetalle_producto`, `Fecha`, `Producto_idProducto`, `Valor_de_Venta`) VALUES ('$ID', '$Fecha', '$ID', '$Precio');";
$consulta3="INSERT INTO `entrada_inventario` (`idEntrada_Inventario`, `Fecha`, 
`Valor_de_compra`, `Cantidad_disponible`, `idProducto`) VALUES ('$ID', '$Fecha', '$Precio', '0', '$ID');";
$consulta_validacion_2="SELECT idProducto FROM producto WHERE idProducto = '$ID'";

$validacion_ID = mysqli_query($conexion,$consulta_validacion_2);

$arrayDatos = array();
$arrayDatos = mysqli_fetch_row($validacion_ID);

empty($arrayDatos);

$temp2 = "";

if ($ID == "") {
    $temp2 = "";
}elseif ($arrayDatos == 0) {
    $temp2 = "";
}else{
    $temp2 = $arrayDatos[0];
}




if ($ID == $temp2 || $ID == "" ) {
    include_once('crud2-index-admin-productos.php');

    if ( $ID == "") {
        ?>
        <script>
            Swal.fire({
            icon: 'warning',
            title: 'Datos en Blanco',
            text: 'No se ingreso un ID',
            
        })
        </script>
        <?php
    }else {
        ?>
        <script>
        Swal.fire({
        icon: 'warning',
        title: 'Error',
        text: 'ya hay un producto con el digitado ID ',
        
        })
        </script>
        <?php
    }
   
}else {
    
    $resultado = mysqli_query($conexion,$consulta);
    $resultado = mysqli_query($conexion,$consulta2);
    $resultado = mysqli_query($conexion,$consulta3);

    include_once('crud2-index-admin-productos.php');
    
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