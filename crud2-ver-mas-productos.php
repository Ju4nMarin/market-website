<?php

$conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");
$ID=$_POST['txtID'];


?>
    <?php
    include_once('crud2-index-admin-productos.php');
    ?>
 <!-- Modal EDIT -->

 <script type="text/javascript">

    function redireccionar(){
       
        document.getElementById('id01').style.display='active';
        $("#id01").trigger("click");
    } 
    setTimeout ("redireccionar()", 100); //tiempo expresado en milisegundos
</script>

 <button id="id01" style="border:none;" style="display:none" data-dismiss="modal" data-toggle="modal"  data-target="#modalEDIT" data-controls-modal="modalEDIT" data-backdrop="static" data-keyboard="false"></button>
 <form action="envio-editar.php" method="post">  
 <div class="modal fade" id="modalEDIT" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document" style="right: 340px;left: -100;">
        <div class="modal-content" style="right: 0px;width: 1202px;" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <h1 class = "informacion">DATOS</h1>
                <button type="button" class="boton-cerrar" data-dismiss="modal" >
                <i class="fa-solid fa-xmark"></i></button> 
            </div>

            <div class="form-inline">
         
            <div class="modal-body" style="padding: 10px 10px;">
                <?php
                $conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");
                $consulta_1="SELECT * FROM detalle_producto where idDetalle_producto = '$ID'";
                $consulta_2="SELECT validacion_nombre FROM (SELECT idCliente,validacion_nombre FROM cliente)alias1 , 
                (SELECT idProducto,Proveedor FROM producto WHERE idProducto = '$ID')alias2  WHERE idCliente = Proveedor";
                

                $result = mysqli_query($conexion,$consulta_1);
                $result2 = mysqli_query($conexion,$consulta_2);
                

                $mostrar = mysqli_fetch_array($result);
                $mostrar2 = mysqli_fetch_array($result2);
                
                

                ?>
                
                    <table class="table">

<thead class= "tabla-cabecera">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Fecha Ingreso</th>
        <th scope="col">Valor de Compra</th>
        <th scope="col">Proveedor</th>
    


        
        
        

        
        

    </tr>
</thead>

<tbody>
    <?php
       
       
    ?>
    <tr>
        <th><?php echo $mostrar['idDetalle_producto'] ?></th>
        <th><?php echo $mostrar['Fecha'] ?></th>
        <th><?php echo $mostrar['Valor_de_Venta'] ?> $</th>
        <th><?php echo $mostrar2['validacion_nombre'] ?></th>
        
    
    </tr>

    <?php
        
    ?>

</tbody>
</table>
                
            <div class="modal-footer">
                
                
            </div>
            
        </div>
    </div>
</div>  
   
</div>
</form>













<?php


?>