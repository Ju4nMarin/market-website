<?php

$conexion=mysqli_connect("localhost","root","","marketplus")or die ("error de conexion");
$ID=$_POST['txtID'];


?>
    <?php
    include_once('index.php');
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
<form action="crud2-envio-editar-proveedor.php" method="post" enctype="multipart/form-data">  
 <div class="modal fade" id="modalEDIT" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <h1 class = "informacion">Ajustes</h1>
                <button type="button" class="boton-cerrar" data-dismiss="modal" >
                <i class="fa-solid fa-xmark"></i></button> 
            </div>

            <div>
         
            <div class="modal-body2" style="padding: 10px;">
                <?php
                $consulta_1="SELECT * FROM entrada_inventario where idEntrada_Inventario = '$ID'";



                $result = mysqli_query($conexion,$consulta_1);


                $mostrar = mysqli_fetch_array($result);

                ?>
                
                <div class="form-group-2">
                    
                    <input  type="hidden" value= "<?php echo $mostrar['idEntrada_Inventario'] ?>" class="form-control px-3" placeholder= "ID" name="ID">
                    <h6 style="padding-left: 5px;margin-bottom: 0px;margin-top: 10px;">Unidades</h6>
                    <input style="margin-top: 2px;margin-bottom: 17px;" type="number" value= "<?php echo $mostrar['Cantidad_disponible'] ?>" min="0" class="form-control px-3" placeholder ="Unidades"  name="unidades">
                    <h6 style="padding-left: 5px;margin-bottom: 0px;margin-top: 10px;">Valor de Venta</h6>
                    <input style="margin-top: 2px;" type="number" value= "<?php echo $mostrar['Valor_de_compra'] ?>" min="0" class="form-control px-3" placeholder ="Precio"  name="precio">


                </div>
                
                 

            </div>
            </div>
            <div class="modal-footer">

                <button type="submit" class="boton-ana4 px-3 py-1" style="border:none;margin-right: 130px;" >
                    Enviar Ajustes  
                </button>
                
                
            </div>
            
        </div>
    </div>
</div>  
   
</div>
</form>













<?php


?>